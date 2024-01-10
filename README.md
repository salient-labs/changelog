# salient/changelog

> Generates changelogs based on [Keep a Changelog][] from GitHub release notes,
> merging and de-duplicating entries from multiple repositories if necessary.

<p>
  <a href="https://packagist.org/packages/salient/changelog"><img src="https://poser.pugx.org/salient/changelog/v" alt="Latest Stable Version" /></a>
  <a href="https://packagist.org/packages/salient/changelog"><img src="https://poser.pugx.org/salient/changelog/license" alt="License" /></a>
  <a href="https://github.com/salient-labs/php-changelog/actions"><img src="https://github.com/salient-labs/php-changelog/actions/workflows/ci.yml/badge.svg" alt="CI Status" /></a>
  <a href="https://codecov.io/gh/salient-labs/php-changelog"><img src="https://codecov.io/gh/salient-labs/php-changelog/graph/badge.svg?token=ayuRwrUY24" alt="Code Coverage" /></a>
</p>

---

## Installation

`changelog` is distributed as a PHP archive you can download and run:

```shell
wget -O changelog.phar https://github.com/salient-labs/php-changelog/releases/latest/download/changelog.phar
```

```shell
php changelog.phar --version
```

Installation with [PHIVE][] is also supported:

```shell
phive install salient-labs/php-changelog
```

```shell
./tools/changelog --version
```

> Adding `salient/changelog` to your project as a Composer dependency is not
> recommended.

## Usage

For detailed usage information, see [usage](docs/Usage.md) or run:

```shell
./tools/changelog --help
```

## Examples

### Generate a changelog for releases in one repository

#### Every release

```shell
./tools/changelog lkrms/php-util
```

#### Releases that match a regular expression

```shell
./tools/changelog --include '/^v0\.20\./' lkrms/php-util
```

#### Releases between two tags

```shell
./tools/changelog --from v0.20.55 --to v0.20.56 lkrms/php-util
```

Output:

```
## [v0.20.56] - 2023-09-06

### Deprecated

- Deprecate `Convert::lineEndingsToUnix()`

### Fixed

- Fix regression in `File::getEol()`

## [v0.20.55] - 2023-09-06

### Changed

- Add `Str::setEol()` and standardise `getEol()` methods

[v0.20.56]: https://github.com/lkrms/php-util/compare/v0.20.55...v0.20.56
[v0.20.55]: https://github.com/lkrms/php-util/releases/tag/v0.20.55
```

### Generate a changelog for releases in two repositories

The following command is used in a CI workflow to update the changelog published
with this [VS Code extension][vscode-ext].

Releases missing from the first repository are reported (e.g. _"pretty-php for
Visual Studio Code v0.4.44 was not released"_), and release notes from both
repositories are merged into one list of changes per release.

```shell
./tools/changelog \
  --releases=yes --releases=yes \
  --missing=yes --missing=no \
  --name "pretty-php for Visual Studio Code" --name "pretty-php" \
  --output CHANGELOG.md \
  --merge \
  lkrms/vscode-pretty-php lkrms/pretty-php
```

Output: [CHANGELOG.md][]

## License

MIT

[CHANGELOG.md]:
  https://github.com/lkrms/vscode-pretty-php/blob/main/CHANGELOG.md
[Keep a Changelog]: https://keepachangelog.com/en/1.1.0/
[PHIVE]: https://phar.io
[vscode-ext]:
  https://marketplace.visualstudio.com/items?itemName=lkrms.pretty-php
