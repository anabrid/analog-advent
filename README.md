# Analog Advent Calendar

This repository holds the implementation of the anabrid advent calendar website 2024.
Relevant ideas and concepts are collected at https://outline.anabrid.com/doc/analog-advent-calendar-0i37810U6T
and subpages.

## Deployment

The actual website is just a PHP file. It can be launched for testing by calling

```
php -S localhost:8080
````

on a developer system that has PHP-CLI installed.

Important: The directory `user_data` must be writable by PHP.

## Live system

Status 2024-11-30: The website is launched on tinydichter, hosted on https://analog.wtf.

## Known limitations

* Flat files. By intention, but has sever limits.
* System has an unconventional user handling with "tokens" and a homebrewn chaotic
  cookie managament.
* Traditional PHP provides near-to-no protection against HTML injection or CORS.
