<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuoteItem Entity.
 */
class QuoteItem extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'quote_id' => true,
        'inventory_id' => true,
        'quantity' => true,
        'price' => true,
        'quote' => true,
        'inventory' => true,
    ];
}
