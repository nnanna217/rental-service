<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="customers view large-10 medium-9 columns">
    <h2><?= h($customer->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($customer->name) ?></p>
            <h6 class="subheader"><?= __('Category') ?></h6>
            <p><?= $customer->has('category') ? $this->Html->link($customer->category->name, ['controller' => 'Categories', 'action' => 'view', $customer->category->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Contact Person') ?></h6>
            <p><?= h($customer->contact_person) ?></p>
            <h6 class="subheader"><?= __('Contact Email') ?></h6>
            <p><?= h($customer->contact_email) ?></p>
            <h6 class="subheader"><?= __('Contact Phone') ?></h6>
            <p><?= h($customer->contact_phone) ?></p>
            <h6 class="subheader"><?= __('Occasion') ?></h6>
            <p><?= h($customer->occasion) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($customer->id) ?></p>
            <h6 class="subheader"><?= __('Created By') ?></h6>
            <p><?= $this->Number->format($customer->created_by) ?></p>
            <h6 class="subheader"><?= __('Modified By') ?></h6>
            <p><?= $this->Number->format($customer->modified_by) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($customer->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($customer->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Address') ?></h6>
            <?= $this->Text->autoParagraph(h($customer->address)) ?>
        </div>
    </div>
</div>
