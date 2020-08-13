<?php
namespace Admin\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Inflector;

/**
 * Menu Entity
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string|null $controller
 * @property int|null $parent_id
 * @property int|null $lft
 * @property int|null $rght
 * @property int|null $user_id
 * @property string|null $description
 * @property string|null $robots
 * @property string|null $keywords
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $online
 *
 * @property \Admin\Model\Entity\ParentMenu $parent_menu
 * @property \Admin\Model\Entity\User $user
 * @property \Admin\Model\Entity\ChildMenu[] $child_menus
 */
class Menu extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'alias' => true,
        'controller' => true,
        'parent_id' => true,
        'lft' => true,
        'rght' => true,
        'user_id' => true,
        'description' => true,
        'robots' => true,
        'keywords' => true,
        'created' => true,
        'modified' => true,
        'online' => true,
        'parent_menu' => true,
        'user' => true,
        'child_menus' => true,
    ];

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
}
