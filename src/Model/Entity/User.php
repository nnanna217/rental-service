<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'password' => true,
        'role' => true,
        'active_fg' => true,
        'profiles' => true,
    ];

    protected function _setPassword($password){
        return (new DefaultPasswordHasher())->hash($password);
    }
}
