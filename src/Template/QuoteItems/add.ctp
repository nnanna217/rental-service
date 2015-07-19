<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Quote Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Quotes'), ['controller' => 'Quotes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quote'), ['controller' => 'Quotes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Inventories'), ['controller' => 'Inventories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inventory'), ['controller' => 'Inventories', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="quoteItems form large-10 medium-9 columns">
    <?= $this->Form->create($quoteItem) ?>
    <fieldset>
        <legend><?= __('Add Quote Item') ?></legend>
        <?php
            echo $this->Form->input('quote_id', ['options' => $quotes, 'empty' => true]);
            echo $this->Form->input('inventory_id', ['options' => $inventories, 'empty' => true]);
            echo $this->Form->input('quantity');
            echo $this->Form->input('price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
