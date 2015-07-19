<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuoteShipment Entity.
 */
class QuoteShipment extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'quote_id' => true,
        'address' => true,
        'city' => true,
        'state' => true,
        'note' => true,
        'quote' => true,
    ];
}
