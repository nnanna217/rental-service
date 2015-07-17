<div class="categories form large-8 medium-8 columns">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Add Category') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description',['cols'=>5]);
            echo $this->Form->input('parent_id', ['options' => $parentCategories, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
