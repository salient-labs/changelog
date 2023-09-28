# salient/changelog

> A changelog generator

<p>
  <a href="https://packagist.org/packages/salient/changelog"><img src="https://poser.pugx.org/salient/changelog/v" alt="Latest Stable Version" /></a>
  <a href="https://packagist.org/packages/salient/changelog"><img src="https://poser.pugx.org/salient/changelog/license" alt="License" /></a>
  <a href="https://github.com/salient-labs/php-changelog/actions"><img src="https://github.com/salient-labs/php-changelog/actions/workflows/ci.yml/badge.svg" alt="CI Status" /></a>
  <a href="https://codecov.io/gh/salient-labs/php-changelog"><img src="https://codecov.io/gh/salient-labs/php-changelog/graph/badge.svg?token=ayuRwrUY24" alt="Code Coverage" /></a>
</p>

---

This package provides a command-line utility that generates a changelog from the
release notes of one or more GitHub repositories.

[This changelog][CHANGELOG.md], for example, can be generated with the following
command:

```shell
changelog \
    lkrms/vscode-pretty-php lkrms/pretty-php \
    --releases=yes --releases=yes \
    --missing=yes --missing=no \
    --merge
```

The format is based on [Keep a Changelog][].

## Installation

You can use [Composer][] to add `salient/changelog` to your project for use
during development:

```shell
composer require --dev salient/changelog
```

And run it from your `vendor/bin` directory:

```shell
vendor/bin/changelog --version
```

Alternatively, you can [download][] the latest version packaged as a PHP archive
and run it directly:

```shell
wget -O changelog.phar https://github.com/salient-labs/php-changelog/releases/latest/download/changelog.phar
```

```shell
chmod +x changelog.phar
```

```shell
./changelog.phar --version
```

## Usage

Run `changelog --help` for usage information. It is also available
[here](docs/Usage.md).

## License

MIT

[CHANGELOG.md]: https://github.com/lkrms/vscode-pretty-php/blob/eaa276518f938cd53342313bc6d4308a756783f8/CHANGELOG.md
[Keep a Changelog]: https://keepachangelog.com/en/1.1.0/
[Composer]: https://getcomposer.org
[download]: https://github.com/salient-labs/php-changelog/releases/latest/download/changelog.phar
