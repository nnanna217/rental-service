<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Quote Shipment'), ['action' => 'edit', $quoteShipment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Quote Shipment'), ['action' => 'delete', $quoteShipment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quoteShipment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Quote Shipments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quote Shipment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quotes'), ['controller' => 'Quotes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quote'), ['controller' => 'Quotes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="quoteShipments view large-10 medium-9 columns">
    <h2><?= h($quoteShipment->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Quote') ?></h6>
            <p><?= $quoteShipment->has('quote') ? $this->Html->link($quoteShipment->quote->id, ['controller' => 'Quotes', 'action' => 'view', $quoteShipment->quote->id]) : '' ?></p>
            <h6 class="subheader"><?= __('City') ?></h6>
            <p><?= h($quoteShipment->city) ?></p>
            <h6 class="subheader"><?= __('State') ?></h6>
            <p><?= h($quoteShipment->state) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($quoteShipment->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($quoteShipment->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($quoteShipment->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Address') ?></h6>
            <?= $this->Text->autoParagraph(h($quoteShipment->address)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($quoteShipment->note)) ?>
        </div>
    </div>
</div>
