<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="customers form large-10 medium-9 columns">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Add Customer') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('address');
            echo $this->Form->input('contact_person');
            echo $this->Form->input('contact_email');
            echo $this->Form->input('contact_phone');
            echo $this->Form->input('occasion',[
                'options'=>['wedding'=>'Wedding','cooperate'=> 'Cooperate']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
