<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity.
 */
class Customer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
//        'category_id' => true,
        'address' => true,
        'contact_person' => true,
        'contact_email' => true,
        'contact_phone' => true,
        'occasion' => true,
        'created_by' => true,
        'modified_by' => true,
        'category' => true,
    ];
}
