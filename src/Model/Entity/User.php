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
        'email' => true,
        'password' => true,
        'role' => true,
        'active_fg' => true,
        'profiles' => true,
        'created_by' => true,
        'modified_by' => true,
    ];

    protected function _setPassword($password){
        return (new DefaultPasswordHasher())->hash($password);
    }

    public static function encrypt($keyword){
        $sha1_pass = sha1($keyword);
        $md5_pass = md5($keyword);

        $sha1_arr = str_split($sha1_pass, 10);
        $md5_arr = str_split($md5_pass, 10);

        return $sha1_arr[0] . $md5_arr[0] . $sha1_arr[1] . $md5_arr[1] . $sha1_arr[2];

    }
}
