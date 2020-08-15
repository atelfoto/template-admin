# Admin plugin for CakePHP

## Installation
You can install this plugin into your CakePHP application using [composer](https://getcomposer.org).

The recommended way to install composer packages is:
```bash
composer require --dev atelfoto/template-admin
```
or add this
```json
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

### Enable prefix admin

```php
//config/routes

Router::prefix('admin', function ($routes)
{
    $routes->fallbacks(DashedRoute::class);
});
```

### Enable Theme and Layout
```php
// src/controller/AppController.php

public function beforeFilter(Event $event)
    {
        if (!is_null($this->request->getParam('prefix'))) {
            $prefix = explode('/', $this->request->getParam('prefix'))[0];

            switch ($prefix) {
                case 'admin':
                    $this->viewBuilder()->setLayout('admin');
                    $this->viewBuilder()->setTheme('Admin');
                    break;
            }
        }
    }
```
### Enable View

```php
// src/View/AppView.php

public function initialize()
    {
        $this->loadHelper('Form', [
            'templates' => 'Admin.form-template',
        ]);
    }
```
### Configure

add this
```
// config/bootstrap.php

Configure::load('Admin.config-dist', 'default', false);
```

below

```
Configure::load('app', 'default', false);
```
### Bake

#### Migrate Tables

```bash
bin/cake migrations migrate -p Admin
bin/cake migrations seed -p Admin

```

### Model

```bash
bin/cake bake model Menus
```
and paste this
```php
// Entity/Menu.php
use Cake\Utility\Inflector;

    /**
     * [_getName description]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function _getName($name)
    {
        $name = strtolower($name);

        return ucwords($name);
    }

    /**
     * [_setName description]
     * @param [type] $name [description]
     * @return [type] [<description>]
     */
    protected function _setName($name)
    {
        $name = str_replace(
            ['é', 'è', 'ê', 'ë', 'à', 'â', 'î', 'ï', 'ô', 'ù', 'û', 'É', 'È', 'Ê', 'Ë', 'À', 'Â', 'Î', 'Ï', 'Ô', 'Ù', 'Û'],
            ['e', 'e', 'e', 'e', 'a', 'a', 'i', 'i', 'o', 'u', 'u', 'e', 'e', 'e', 'e', 'a', 'a', 'i', 'i', 'o', 'u', 'u' ],
            $name
        );
        $name = inflector::camelize($name);
        $this->set('controller', Inflector::pluralize($name));

        return ucfirst($name);
    }
```
or you can take this
```bash
cp -R vendor/atelfoto/template-admin/src/Model/* src/Model/
```

#### Controller Menus

```bash
// ex. Menus for actions and prefix admin (with fields name:string and online:boolean ).

bin/cake bake controller Menus --actions index,view,add,edit,delete,deleteAll,moveUp,moveDown,online, --prefix admin -t Admin
```
in controller/admin/MenusController.php in the action Add and edit change this
```
$parentMenus = $this->Menus->ParentMenus->find('list', ['limit' => 200]);
```
for this
```php
$parentMenus = $this->Menus->ParentMenus->find(
            'treeList',
            [
                'spacer' => "---- ",
            ]
        );
```
Or you can take this
```
cp -r vendor/atelfoto/template-admin/src/Controller/Admin/* src/Controller/Admin/
```

#### Template Menus

```
bin/cake bake template Menus --prefix admin -t Admin
```
delete this
```php
//template/Admin/Menus/add.ctp in line 80
//and
//template/Admin/Menus/add.ctp in line 111
echo $this->Form->control('controller');
echo $this->Form->control('online');
```
and this in line 51
```php
//Template/Admin/Menus/index.ctp

<td><?= h($menu->online); ?></td>
```
or you can take this

```bash
 mkdir -p src/Template/Admin &&
 cp -R vendor/atelfoto/template-admin/src/Template/Admin/* src/Template/Admin/
```

### Page Menus

![Page menus](docs/menus.jpg)

![Page menus](docs/add.jpg)

![Page menus](docs/mobile.jpg)
