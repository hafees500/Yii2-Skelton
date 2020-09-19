<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Project Skelton </h1>
    <br>
</p>

Yii 2  Project Skelton  is based on Yii 2 Advanced Project Template with commonly using widgets [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

Skelton Features
-------------------

1.Rbac (Role Bsed Access Control)
2.Audit Trail
3.Rest Api Modules
4.Html Compression


DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

Before Installation:

1.Composer
2.Make sure you are using php version > php 5.4 (Prefer PHP7), if not upgrade it.
3.Check The following PHP extensions
  Ctype extension 
  MBString extension 
  OpenSSL extension 
4. enable mod_rewrite for Apache
5. Enable Authorization in server | SetEnvIf Authorization .+ HTTP_AUTHORIZATION=$0 
6. Enable short tag
7. Either GD PHP extension with FreeType support or ImageMagick PHP extension with PNG support is required for captcha



Installation step 
1. Clone Skelton application in to local directory
2. Now, move to the folder using your terminal. eg: cd  /var/www/html/Skelton.
3. Create a database in your Mysql
4. Configure the database infomartions in your config file. Path : common/config/main-local.php 
5. Open your requirements.php in browser and ensure the all requirements are passed
5. Install your application requirments using the command : composer install 
6. Run below listed migration commands one by one
    php yii migrate
    php yii migrate --migrationPath=@mdm/admin/migrations
    sudo php yii migrate --migrationPath=@bedezign/yii2/audit/migrations
7.Rename the .htaccess-config file to .htaccess


Widgets
1. DateRangePicker : https://github.com/kartik-v/yii2-date-range
2. MPDF - https://github.com/kartik-v/yii2-mpdf
3. FileInput : https://github.com/kartik-v/yii2-widget-fileinput
4. Select2 : https://github.com/2amigos/yii2-select2-widget
5. Tiny Mce Editor : https://github.com/2amigos/yii2-tinymce-widget
6. Date Time Picker : https://github.com/kartik-v/yii2-widget-datetimepicker
7. Chart : https://github.com/2amigos/yii2-chartjs-widget
8. Html Compress : https://github.com/ogheo/yii2-htmlcompress

Api Usage

Postman 
1. 	http://localhost/Skelton/app/authenticate - POST
   	body :
   		username:test
		password:123456

2. 	http://localhost/Skelton/app/user/1  - GET
	header : Authorization:Bearer <access key>
	Body :

3. 	http://localhost/Skelton/app/register
	header : Authorization:Bearer -CqtAtRGO4FMaJ7CzIySHqv-gRcY4vy8
	Body :
			username:user
			password:123456
			email:user@gmail.com