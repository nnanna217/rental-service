<div class="inventories form large-10 medium-9 columns">
    <?= $this->Form->create($inventory) ?>
    <fieldset>
        <legend><?= __('Edit Inventory') ?></legend>
        <?php
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('rate');
            echo $this->Form->input('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
