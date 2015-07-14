<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inventory Entity.
 */
class Inventory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'id' => true,
        'category_id' => true,
        'name' => true,
        'description' => true,
        'rate' => true,
        'quantity' => true,
        'category' => true,
    ];
}
