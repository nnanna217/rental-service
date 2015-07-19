<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Quote Shipment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quotes'), ['controller' => 'Quotes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quote'), ['controller' => 'Quotes', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="quoteShipments index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('quote_id') ?></th>
            <th><?= $this->Paginator->sort('city') ?></th>
            <th><?= $this->Paginator->sort('state') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($quoteShipments as $quoteShipment): ?>
        <tr>
            <td><?= $this->Number->format($quoteShipment->id) ?></td>
            <td>
                <?= $quoteShipment->has('quote') ? $this->Html->link($quoteShipment->quote->id, ['controller' => 'Quotes', 'action' => 'view', $quoteShipment->quote->id]) : '' ?>
            </td>
            <td><?= h($quoteShipment->city) ?></td>
            <td><?= h($quoteShipment->state) ?></td>
            <td><?= h($quoteShipment->created) ?></td>
            <td><?= h($quoteShipment->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $quoteShipment->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quoteShipment->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quoteShipment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quoteShipment->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
