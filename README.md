Club Demo app
=============

This is a demonstration app designed to illustrate some of our tutorials. The following tutorials use this demo app:

* [Symfony — Dynamic forms and data transformers (part 1)](http://www.coopers-peele.com/blog/2015/03/symfony-dynamic-forms-and-data-transformers-1/)
*  [Creating admin index pages with DataTables](http://www.coopers-peele.com/blog/2015/05/admin-index-pages-with-datatables/)

**NOTE: This app is for demonstration purposes only and should not be used in any kind of production setting.**

Requirements
------------

[Composer](http://getcomposer.org)

Installation
------------

Clone repo

    git clone https://github.com/coopers-peele/club-demo.git

Cd to the project directory

    cd club-demo

Run composer install

    composer install

Create the database

	$ php app/console propel:database:create

Generate model classes from schema file

    $ php app/console propel:model:build

Creating the tables

    $ php app/console propel:sql:build
    $ php app/console propel:sql:insert --force

Load fixtures

    $ php app/console propel:fixtures:load @ClubBundle

Start the built-in web werver

    $ php app/console server:start

Open the app at http://localhost:8000