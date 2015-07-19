<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quote->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quote->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Quotes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quote Items'), ['controller' => 'QuoteItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quote Item'), ['controller' => 'QuoteItems', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="quotes form large-10 medium-9 columns">
    <?= $this->Form->create($quote) ?>
    <fieldset>
        <legend><?= __('Edit Quote') ?></legend>
        <?php
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('transport_cost');
            echo $this->Form->input('mode_of_receipt');
            echo $this->Form->input('date_of_event', ['empty' => true, 'default' => '']);
            echo $this->Form->input('total');
            echo $this->Form->input('created_by');
            echo $this->Form->input('modified_by');
            echo $this->Form->input('subject');
            echo $this->Form->input('date_of_setup', ['empty' => true, 'default' => '']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
