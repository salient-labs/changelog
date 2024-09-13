# salient/changelog

> Generates changelogs based on [Keep a Changelog][] from GitHub release notes,
> merging and de-duplicating entries from multiple repositories if needed.

<p>
  <a href="https://packagist.org/packages/salient/changelog"><img src="https://poser.pugx.org/salient/changelog/v" alt="Latest Stable Version" /></a>
  <a href="https://packagist.org/packages/salient/changelog"><img src="https://poser.pugx.org/salient/changelog/license" alt="License" /></a>
  <a href="https://github.com/salient-labs/changelog/actions"><img src="https://github.com/salient-labs/changelog/actions/workflows/ci.yml/badge.svg" alt="CI Status" /></a>
  <a href="https://codecov.io/gh/salient-labs/changelog"><img src="https://codecov.io/gh/salient-labs/changelog/graph/badge.svg?token=ayuRwrUY24" alt="Code Coverage" /></a>
</p>

## Installation

`changelog` is distributed as a PHP archive you can download and run:

```shell
wget -O changelog.phar https://github.com/salient-labs/changelog/releases/latest/download/changelog.phar
```

```shell
php changelog.phar --version
```

Installation with [PHIVE][] is also supported:

```shell
phive install salient-labs/changelog
```

```shell
./tools/changelog --version
```

Adding `salient/changelog` to your project as a Composer dependency is not
recommended.

## Usage

For detailed usage information, see [usage](docs/Usage.md) or run:

```shell
./tools/changelog --help
```

## Examples

Generate a changelog for every release in a repository:

```shell
./tools/changelog salient-labs/toolkit
```

Generate a changelog for releases that match a regular expression:

```shell
./tools/changelog --include '/^v0\.20\./' salient-labs/toolkit
```

Generate a changelog for releases between two tags:

```shell
./tools/changelog --from v0.20.55 --to v0.20.56 salient-labs/toolkit
```

```markdown
## [v0.20.56] - 2023-09-06

### Deprecated

- Deprecate `Convert::lineEndingsToUnix()`

### Fixed

- Fix regression in `File::getEol()`

## [v0.20.55] - 2023-09-06

### Changed

- Add `Str::setEol()` and standardise `getEol()` methods

[v0.20.56]: https://github.com/salient-labs/toolkit/compare/v0.20.55...v0.20.56
[v0.20.55]: https://github.com/salient-labs/toolkit/releases/tag/v0.20.55
```

Merge release notes from two repositories into one list of changes per release,
report releases missing from the first repository, and update `CHANGELOG.md`
(used in a CI workflow to generate [this changelog][changelog]):

```shell
./tools/changelog \
  --releases=yes --releases=yes \
  --missing=yes --missing=no \
  --name "pretty-php for Visual Studio Code" --name "pretty-php" \
  --output "CHANGELOG.md" \
  --merge \
  lkrms/vscode-pretty-php lkrms/pretty-php
```

## License

This project is licensed under the [MIT License][].

[changelog]: https://github.com/lkrms/vscode-pretty-php/blob/main/CHANGELOG.md
[Keep a Changelog]: https://keepachangelog.com/en/1.1.0/
[MIT License]: LICENSE
[PHIVE]: https://phar.io
