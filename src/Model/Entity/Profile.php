<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Profile Entity.
 */
class Profile extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'firstname' => true,
        'middlename' => true,
        'lastname' => true,
        'address' => true,
        'email' => true,
        'phone_number' => true,
        'next_of_kin' => true,
        'dob' => true,
        'active_fg' => true,
        'created_by' => true,
        'modified_by' => true,
        'user' => true,
    ];
}
