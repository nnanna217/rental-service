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
            echo $this->Form->input('customer_type',['label'=>'client_type',
                'options'=>['individual'=>'Individual','cooperate'=> 'Cooperate','others'=>'Others']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
