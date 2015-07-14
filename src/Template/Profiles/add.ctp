<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Profiles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="profiles form large-10 medium-9 columns">
    <?= $this->Flash->render();?>
    <?= $this->Form->create($profile) ?>
    <fieldset>
        <legend><?= __('Add Profile') ?></legend>
        <?php
        echo $this->Form->input('firstname');
        echo $this->Form->input('middlename');
        echo $this->Form->input('lastname');
        echo $this->Form->input('address');
        echo $this->Form->input('phone_number');
        echo $this->Form->input('dob');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
