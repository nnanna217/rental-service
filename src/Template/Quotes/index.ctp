<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Quote'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quote Items'), ['controller' => 'QuoteItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quote Item'), ['controller' => 'QuoteItems', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="quotes index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('customer_id') ?></th>
            <th><?= $this->Paginator->sort('transport_cost') ?></th>
            <th><?= $this->Paginator->sort('mode_of_receipt') ?></th>
            <th><?= $this->Paginator->sort('date_of_event') ?></th>
            <th><?= $this->Paginator->sort('total') ?></th>
            <th><?= $this->Paginator->sort('created_by') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($quotes as $quote): ?>
        <tr>
            <td><?= $this->Number->format($quote->id) ?></td>
            <td>
                <?= $quote->has('customer') ? $this->Html->link($quote->customer->name, ['controller' => 'Customers', 'action' => 'view', $quote->customer->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($quote->transport_cost) ?></td>
            <td><?= $this->Number->format($quote->mode_of_receipt) ?></td>
            <td><?= h($quote->date_of_event) ?></td>
            <td><?= $this->Number->format($quote->total) ?></td>
            <td><?= $this->Number->format($quote->created_by) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $quote->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quote->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quote->id)]) ?>
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
