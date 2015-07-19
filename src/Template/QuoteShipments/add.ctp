<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Quote Shipments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Quotes'), ['controller' => 'Quotes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quote'), ['controller' => 'Quotes', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="quoteShipments form large-10 medium-9 columns">
    <?= $this->Form->create($quoteShipment) ?>
    <fieldset>
        <legend><?= __('Add Quote Shipment') ?></legend>
        <?php
            echo $this->Form->input('quote_id', ['options' => $quotes, 'empty' => true]);
            echo $this->Form->input('address');
            echo $this->Form->input('city');
            echo $this->Form->input('state');
            echo $this->Form->input('note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
