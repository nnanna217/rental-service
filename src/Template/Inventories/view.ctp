<div class="inventories view large-10 medium-9 columns">
    <h2><?= h($inventory->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Category') ?></h6>
            <p><?= $inventory->has('category') ? $this->Html->link($inventory->category->name, ['controller' => 'Categories', 'action' => 'view', $inventory->category->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($inventory->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($inventory->id) ?></p>
            <h6 class="subheader"><?= __('Rate') ?></h6>
            <p><?= $this->Number->format($inventory->rate) ?></p>
            <h6 class="subheader"><?= __('Quantity') ?></h6>
            <p><?= $this->Number->format($inventory->quantity) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($inventory->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($inventory->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($inventory->description)) ?>
        </div>
    </div>
</div>
