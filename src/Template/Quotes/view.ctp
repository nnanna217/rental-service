<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Quote'), ['action' => 'edit', $quote->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Quote'), ['action' => 'delete', $quote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quote->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Quotes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quote'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quote Items'), ['controller' => 'QuoteItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quote Item'), ['controller' => 'QuoteItems', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="quotes view large-10 medium-9 columns">
    <h2><?= h($quote->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Customer') ?></h6>
            <p><?= $quote->has('customer') ? $this->Html->link($quote->customer->name, ['controller' => 'Customers', 'action' => 'view', $quote->customer->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Subject') ?></h6>
            <p><?= h($quote->subject) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($quote->id) ?></p>
            <h6 class="subheader"><?= __('Transport Cost') ?></h6>
            <p><?= $this->Number->format($quote->transport_cost) ?></p>
            <h6 class="subheader"><?= __('Mode Of Receipt') ?></h6>
            <p><?= $this->Number->format($quote->mode_of_receipt) ?></p>
            <h6 class="subheader"><?= __('Total') ?></h6>
            <p><?= $this->Number->format($quote->total) ?></p>
            <h6 class="subheader"><?= __('Created By') ?></h6>
            <p><?= $this->Number->format($quote->created_by) ?></p>
            <h6 class="subheader"><?= __('Modified By') ?></h6>
            <p><?= $this->Number->format($quote->modified_by) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Of Event') ?></h6>
            <p><?= h($quote->date_of_event) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($quote->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($quote->modified) ?></p>
            <h6 class="subheader"><?= __('Date Of Setup') ?></h6>
            <p><?= h($quote->date_of_setup) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Quote Items') ?></h4>
    <?php if (!empty($quote->quote_items)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Quote Id') ?></th>
            <th><?= __('Inventory Id') ?></th>
            <th><?= __('Quantity') ?></th>
            <th><?= __('Price') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($quote->quote_items as $quoteItems): ?>
        <tr>
            <td><?= h($quoteItems->id) ?></td>
            <td><?= h($quoteItems->quote_id) ?></td>
            <td><?= h($quoteItems->inventory_id) ?></td>
            <td><?= h($quoteItems->quantity) ?></td>
            <td><?= h($quoteItems->price) ?></td>
            <td><?= h($quoteItems->created) ?></td>
            <td><?= h($quoteItems->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'QuoteItems', 'action' => 'view', $quoteItems->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'QuoteItems', 'action' => 'edit', $quoteItems->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'QuoteItems', 'action' => 'delete', $quoteItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quoteItems->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
