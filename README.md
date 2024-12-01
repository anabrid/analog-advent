# Analog Advent Calendar

This repository holds the implementation of the anabrid advent calendar website 2024.
Relevant ideas and concepts are collected at https://outline.anabrid.com/doc/analog-advent-calendar-0i37810U6T
and subpages. The website was launched on the anabrid *tinydichter* VPS, deployed using
Caddy & PHP-FPM, manually synced to git remotes and public available at https://analog.wtf.

Furthermore, at Dec 01 a stripped down fork/copy of the repo was released at
https://github.com/anabrid/analog-advent containing only the data up to current day in
December.

## Code and Development

This website is kind of traditional PHP, everything is running from `website/index.php`.
This page can be launched for testing by calling:

```
cd website && php -S localhost:8080
````

on a developer system that has PHP-CLI installed.

*Important*: The directory `user_data` must be writable by PHP.

## Design choices and improvements neccessary

* This is a flat file design so it can sync nicely with git. The flat files are an ugly mix
  of CSV and JSON(-Lines), basically mimics a file based document database. The current design
  is not easily extendable, for instance we don't track any dates when user changes happen.
  It would be nice to improve that.
* System has an unconventional user handling with "tokens" and a homebrewn chaotic
  cookie managament. Obviously there is an urgent need to improve that.
* Traditional PHP provides near-to-no protection against HTML injection or CORS.
* Many problems could be solved when using a proper framework such as Symfony or Django.
  The reason we did not choose a framework was primarily the flexibility of having generic
  kind of quizzes (not limited to something which has to map on a database) and the ad-hoc
  approach of the general project without a clear perspective in mind.
