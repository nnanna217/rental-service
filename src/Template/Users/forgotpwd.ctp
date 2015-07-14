<br/>
<div id="login-form">
    <?php echo $this->Flash->render(); ?>
    <!--    --><?php //echo $this->Session->flash('auth'); ?>
    <?php if ($show_form) {?>
        <fieldset>
            <?php echo $this->Form->create('User'); ?>

            <?php
            echo $this->Form->input('email',array('required' => true, 'type' => 'text','placeholder'=>'Please enter your email here', 'label' => 'Enter the e-mail address you used when signing up')); ?>

            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end()?>

            <br/>
            <small>If you are having problems retrieving your password, please contact the administrator.</small>
        </fieldset>
    <?php } ?>
</div>

<div class="space45"></div>


