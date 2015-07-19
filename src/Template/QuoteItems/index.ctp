<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Quote Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quotes'), ['controller' => 'Quotes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quote'), ['controller' => 'Quotes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Inventories'), ['controller' => 'Inventories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inventory'), ['controller' => 'Inventories', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="quoteItems index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('quote_id') ?></th>
            <th><?= $this->Paginator->sort('inventory_id') ?></th>
            <th><?= $this->Paginator->sort('quantity') ?></th>
            <th><?= $this->Paginator->sort('price') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($quoteItems as $quoteItem): ?>
        <tr>
            <td><?= $this->Number->format($quoteItem->id) ?></td>
            <td>
                <?= $quoteItem->has('quote') ? $this->Html->link($quoteItem->quote->id, ['controller' => 'Quotes', 'action' => 'view', $quoteItem->quote->id]) : '' ?>
            </td>
            <td>
                <?= $quoteItem->has('inventory') ? $this->Html->link($quoteItem->inventory->name, ['controller' => 'Inventories', 'action' => 'view', $quoteItem->inventory->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($quoteItem->quantity) ?></td>
            <td><?= $this->Number->format($quoteItem->price) ?></td>
            <td><?= h($quoteItem->created) ?></td>
            <td><?= h($quoteItem->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $quoteItem->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quoteItem->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quoteItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quoteItem->id)]) ?>
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
