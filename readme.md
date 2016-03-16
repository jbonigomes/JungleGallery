# PHP with MySQL FMA Exercise

jgomes01 - 12500741 - FDWT - August 2012
Adapted from Hands-On Excercises

## Description

This is the source code for the photo gallery for the PHP with MySQL FMA
Exercise The sample application can be found at:

[http://www.dcs.bbk.ac.uk/~jgomes01/jungle](http://www.dcs.bbk.ac.uk/~jgomes01/jungle)

## Installation

Before deploying this application, the necessary database tables need to be
created. If you need to create them, you should login to your database and
execute the queries found in:

    install/createSchema.sql

The `install/sampleQueries.sql` is only a reference file as the queries are
built into the application and found at:

    config.php

For the application to work correctly, read and write access to the following directories must be granted in the web-server:

    /images/gallery/
    /images/gallery/thumbs/

Typically, on an apache installation that is accessed via FTP with FileZilla,
this would be `777`, should you have a different installation, please refer to
the manual for your web-server

NB: the `install` directory should not be deployed with the application

## Configuration

All configuration settings for this application can be found in:

    config.php

Adjust these to suit your environment before deploying the application. Only
edit the value of the constants, not the constant name. More on constants at

[http://php.net/manual/en/language.constants.php](http://php.net/manual/en/language.constants.php)

The config file is divided into the following sections:

- Timezone
- Database settings
  - It is very important to set those constants correctly when deploying the
  application
- Application name
- Application paths
  - It is very important to edit `HTML_IMG_ROOT` constant for it is used to
  render images on HTML, this is the url for the images folder
- Environment
- Languages
  - Please refer to the section below when adding a new language
- SQL Queries

## Adding a new language

To add a new language, follow the steps below:

- Download the package 'Flag Icons' from

  [http://icondrawer.com/free.php](http://icondrawer.com/free.php)

- Extract the package and copy only the required flag(s) to

    images/app

  - The images used for this application are the 32px x 32px, thus located
  inside the folder named 32

  - Rename the file (keep the file extension), this application uses ISO 639-1
  codes to differentiate between languages but the images from IconDrawer use
  ISO 3166-1 alpha-2 codes

  - This link can help with the conversion:

    [http://en.wikipedia.org/wiki/List_of_ISO_639-1_codes](http://en.wikipedia.org/wiki/List_of_ISO_639-1_codes)

- Copy and paste in the same directory lang/en.php or any other language of your
choice and rename the file with the same code used for the image (keep the file
extension)

- Translate the file, not the array keys, but the values. More information can
be found in the comments section of the language file (at the top)

- On `config.php`, add the new language to the `$language` array (in the
language section), the key should be the ISO 639-1, same as above and the value
should be the language name as it should be displayed

  - For example, to add Portuguese language, a new line that reads
  `$language['pt'] = 'Português';` should be added, where `pt` is the
  `ISO 639-1` and `Português` is the language name as it should be displayed

  - More details on arrays can be found at:

    [http://php.net/manual/pt_BR/language.types.array.php](http://php.net/manual/pt_BR/language.types.array.php)

- There are two other parameters that can be amended in the language
configuration,

  - The session expiration time for remembering a user language preference:
  This is set in seconds and the default is 15 days long or 1296000, it can be
  amended on `define("APP_LANGSESSION", "1296000");`

  - The default language can be amended on `define("APP_LANG", "en");` again,
  using the `ISO 639-1` of a language that exists in the application

NB: If a user chooses a language during run time, the application default will
be overwritten for as long as the session last.

## Notes

Icons have been provided by

[http://dryicons.com](http://dryicons.com)

The flag icons by

[http://www.icondrawer.com](http://www.icondrawer.com)

XHTML and CSS validation icons by

[http://www.validationicons.com](http://www.validationicons.com)

Images were edited using GIMP

[https://www.gimp.org](https://www.gimp.org)

Special thanks to the following for providing such concise and helpful documentation

[http://php.net](http://php.net)
[http://www.w3schools.com](http://www.w3schools.com)

Thanks to StackOverflow for always being there when no one else can help

[http://stackoverflow.com](http://stackoverflow.com)

The application validates as DTD XHTML 1.0 Strict and CSS 3 and has been written
using TextMate

ENT_QUOTES, UTF-8 has been added to all htmlentities, so that different
languages can be displayed correctly on older versions of PHP (adapted from
Gerard Luskin's comments)

This application uses external html files as templates, these content cannot be
sanitised with htmlentities

## Road Map

The following two aspects of the application have been left aside for amending
them will cause a considerable addition to complexity

When submitting a form in the upload page, should user change language, the form
fields will reset. This application assumes that by the time user entered upload
data, the desired language has already been chosen

When submitting a form, if the file chosen validates but another field doesn't,
form will not remember uploaded file and file must be chosen again
