<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string|null $first_name
 * @property string $lastname
 * @property string|null $role
 * @property string|null $passkey
 * @property \Cake\I18n\FrozenTime $timeout
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Bookmark[] $bookmarks
 * @property \App\Model\Entity\PhoneNumber[] $phone_numbers
 */
class User extends Entity
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
        'username' => true,
        'password' => true,
        'email' => true,
        'first_name' => true,
        'lastname' => true,
        'role' => true,
        'passkey' => true,
        'timeout' => true,
        'modified' => true,
        'created' => true,
        'bookmarks' => true,
        'phone_numbers' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
