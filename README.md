# Admin plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:

```
composer require --dev atelfoto/template-admin
```
or add this
```
    "repositories": [{
        "type": "vcs",
        "url": "https://github.com/atelfoto/template-admin"

    }],
    "require-dev": {
        "atelfoto/template-admin": "*@dev",
    }
```
in your composer.json


### Enable Plugin

```php
// src/Application.php

public function bootstrap()
{
    $this->addPlugin('Admin');
}
```
or add this

```
bin/cake plugin load Admin
```
### Bake

#### controller

```php
// ex. Articles for actions and prefix admin 

bin/cake bake controller Articles --actions index,add,edit,view,delete,deleteAll,online, --prefix admin -t Admin
```
#### Template
```
bin/cake bake template Articles --prefix admin -t Admin
```
