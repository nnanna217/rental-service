<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Quote Item'), ['action' => 'edit', $quoteItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Quote Item'), ['action' => 'delete', $quoteItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quoteItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Quote Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quote Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quotes'), ['controller' => 'Quotes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quote'), ['controller' => 'Quotes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Inventories'), ['controller' => 'Inventories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inventory'), ['controller' => 'Inventories', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="quoteItems view large-10 medium-9 columns">
    <h2><?= h($quoteItem->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Quote') ?></h6>
            <p><?= $quoteItem->has('quote') ? $this->Html->link($quoteItem->quote->id, ['controller' => 'Quotes', 'action' => 'view', $quoteItem->quote->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Inventory') ?></h6>
            <p><?= $quoteItem->has('inventory') ? $this->Html->link($quoteItem->inventory->name, ['controller' => 'Inventories', 'action' => 'view', $quoteItem->inventory->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($quoteItem->id) ?></p>
            <h6 class="subheader"><?= __('Quantity') ?></h6>
            <p><?= $this->Number->format($quoteItem->quantity) ?></p>
            <h6 class="subheader"><?= __('Price') ?></h6>
            <p><?= $this->Number->format($quoteItem->price) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($quoteItem->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($quoteItem->modified) ?></p>
        </div>
    </div>
</div>
