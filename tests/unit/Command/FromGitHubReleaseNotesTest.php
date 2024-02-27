<?php declare(strict_types=1);

namespace Salient\Changelog\Tests\Command;

use PHPUnit\Framework\TestCase;
use Salient\Changelog\Command\FromGitHubReleaseNotes;
use Salient\Cli\CliApplication;
use Salient\Console\Catalog\ConsoleLevel as Level;
use Salient\Console\Catalog\ConsoleLevelGroup as LevelGroup;
use Salient\Console\Target\MockTarget;
use Salient\Core\Facade\Console;
use Salient\Core\Utility\File;

final class FromGitHubReleaseNotesTest extends TestCase
{
    /**
     * @dataProvider runProvider
     *
     * @param string[] $args
     * @param string[] $name
     * @param bool $outputIncludesConsoleMessages
     * @param array<array{Level::*,string}>|null $consoleMessages
     */
    public function testRun(
        string $output,
        int $exitStatus,
        array $args,
        array $name = [],
        bool $outputIncludesConsoleMessages = true,
        ?array $consoleMessages = null,
        int $runs = 1
    ): void {
        $target = $outputIncludesConsoleMessages
            ? new MockTarget(File::open('php://output', ''))
            : new MockTarget();
        Console::registerTarget($target, LevelGroup::ALL_EXCEPT_DEBUG);

        $this->expectOutputString($output);

        $basePath = File::createTempDir();
        $app = new CliApplication($basePath);

        try {
            $command = $app->get(FromGitHubReleaseNotes::class);
            $command->setName($name);
            for ($i = 0; $i < $runs; $i++) {
                $status = $command(...$args);
                $this->assertSame($exitStatus, $status, 'exit status');
            }
            if ($consoleMessages !== null) {
                $messages = $target->getMessages();
                foreach ($consoleMessages as $i => [$level, $format]) {
                    $this->assertArrayHasKey($i, $messages);
                    $this->assertSame($level, $messages[$i][0]);
                    $this->assertStringMatchesFormat($format, $messages[$i][1]);
                }
            }
        } finally {
            $app->unload();

            File::deleteDir($basePath, true);

            Console::deregisterTarget($target);
            Console::unload();
        }
    }

    /**
     * @return array<array{string,int,string[],3?:string[],4?:bool,5?:array<array{Level::*,string}>|null,6?:int}>
     */
    public static function runProvider(): array
    {
        return [
            [
                <<<'EOF'
## [v0.1.5] - 2023-09-27

### Changed

- Adopt upstream improvements to blank line handling

**Full Changelog**: https://github.com/salient-labs/php-changelog/compare/v0.1.4...v0.1.5

## [v0.1.4] - 2023-09-27

**Full Changelog**: https://github.com/salient-labs/php-changelog/compare/v0.1.3...v0.1.4

## [v0.1.3] - 2023-09-06

**Full Changelog**: https://github.com/salient-labs/php-changelog/compare/v0.1.2...v0.1.3

## [v0.1.2] - 2023-09-06

**Full Changelog**: https://github.com/salient-labs/php-changelog/compare/v0.1.1...v0.1.2

[v0.1.5]: https://github.com/salient-labs/php-changelog/compare/v0.1.4...v0.1.5
[v0.1.4]: https://github.com/salient-labs/php-changelog/compare/v0.1.3...v0.1.4
[v0.1.3]: https://github.com/salient-labs/php-changelog/compare/v0.1.2...v0.1.3
[v0.1.2]: https://github.com/salient-labs/php-changelog/releases/tag/v0.1.2

EOF,
                0,
                ['--to', 'v0.1.5', 'salient-labs/php-changelog'],
                [],
                false,
                [
                    [Level::NOTICE, '==> Retrieving releases from https://api.github.com/repos/salient-labs/php-changelog/releases'],
                    [Level::INFO, ' -> %d releases found'],
                ]
            ],
        ];
    }
}
