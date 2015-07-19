<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Quote Entity.
 */
class Quote extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'customer_id' => true,
        'transport_cost' => true,
        'mode_of_receipt' => true,
        'date_of_event' => true,
        'total' => true,
        'created_by' => true,
        'modified_by' => true,
        'subject' => true,
        'date_of_setup' => true,
        'customer' => true,
        'quote_items' => true,
    ];
}
