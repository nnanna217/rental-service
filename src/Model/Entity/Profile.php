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
        'phone_number' => true,
        'dob' => true,
        'active_fg' => true,
        'created_by' => true,
        'modified_by' => true,
        'user' => true,
    ];

    protected function _getFullName()
    {
        return $this->_properties['firstname'] . '  ' .
            $this->_properties['lastname'];
    }
}
