<p align="center"><img  src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg"  width="400"></p>

## About

This is a custom API that uses [Geoname's database](https://www.geonames.org) to search Cities, Regions and Countries for the Voyarge proyect. It uses [this](https://github.com/michaeldrennen/Geonames) geonames implementation for Laravel.

### Features:

 - Register new users
 - LoginS
 - Search Cities, Regions and CountriesSea
 - Search without type of search restriction

 
## Instructions

### Requirements
-	Configure Database correctly
-	Composer Dependencies Installed
- Run the migrations

### Installation

If you want to install all of the geonames records for the US, Canada, and Mexico as well as pull in the feature codes definitions file in English:

    php artisan geonames:install --country=US --country=CA --country=MX --language=en

If you want to install all:

    php artisan geonames:install

To check all commands: 

    php artisan geonames


  