## NAME

changelog - Generate a changelog from GitHub release notes

## SYNOPSIS

**`changelog`** \[*<u>option</u>*]... \[**`--`**] *<u>owner</u>*/*<u>repo</u>*...

## OPTIONS

- *<u>owner</u>*/*<u>repo</u>*...

  GitHub repository with release notes

  The first repo passed to **`changelog`** is regarded as the primary repository.

- **`-n`**, **`--name`** *<u>name</u>*,...

  Name to use instead of *<u>owner</u>*/*<u>repo</u>*

  May be given once per repository.

- **`-r`**, **`--releases`**\[=*<u>value</u>*,...]

  Include releases found in the repository?

  **`changelog`** only includes releases found in the primary repository by
  default. May be given once per repository.

  The default value is: `yes`

- **`-m`**, **`--missing`**\[=*<u>value</u>*,...]

  Report releases missing from the repository?

  **`changelog`** doesn't report missing releases by default. May be given once
  per repository.

  The default value is: `yes`

- **`-h`**, **`--headings`** (`auto`|`secondary`|`all`)

  Headings to insert above release notes

  In `auto` mode (the default), headings are inserted above release notes
  contributed by repositories other than the primary repository unless there
  is only one contributing repository.

  In `secondary` mode, headings are always inserted above release notes
  contributed by repositories other than the primary repository.

  The default value is: `auto`

- **`-1`**, **`--merge`**

  Merge release notes?

  If this option is given, **`-h/--headings`** is ignored.

- **`-o`**, **`--output`** *<u>file</u>*

  Write output to a file

  If *<u>file</u>* already exists, content before the first version heading ('## \[')
  is preserved.

- **`-f`**, **`--flush`**

  Flush cached release notes

- **`-q`**, **`--quiet`**

  Only print warnings and errors
