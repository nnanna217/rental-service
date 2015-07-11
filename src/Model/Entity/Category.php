<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity.
 */
class Category extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'active_fg' => true,
        'parent_id' => true,
        'lft' => true,
        'rght' => true,
        'category_type' => true,
        'parent_category' => true,
        'child_categories' => true,
        'customers' => true,
    ];
}
