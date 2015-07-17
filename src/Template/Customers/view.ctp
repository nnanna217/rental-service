<div class="customers view large-10 medium-9 columns">
    <h2><?= h($customer->name) ?></h2>
    <div class="row">
        <div class="large-8 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($customer->name) ?></p>
            <h6 class="subheader"><?= __('Contact Person') ?></h6>
            <p><?= h($customer->contact_person) ?></p>
            <h6 class="subheader"><?= __('Contact Email') ?></h6>
            <p><?= h($customer->contact_email) ?></p>
            <h6 class="subheader"><?= __('Contact Phone') ?></h6>
            <p><?= h($customer->contact_phone) ?></p>
            <h6 class="subheader"><?= __('customer_type') ?></h6>
            <p><?= h($customer->customer_type) ?></p>
            <h6 class="subheader"><?= __('Address') ?></h6>
            <?= $this->Text->autoParagraph(h($customer->address)) ?>
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
            <p><?= $this->Time->format($customer->created,
                    \IntlDateFormatter::MEDIUM) ?></p>

        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?>
        </div>
    </div>
</div>
