<br/>
<div id="login-form">
    <?php echo $this->Flash->render(); ?>
    <!--    --><?php //echo $this->Session->flash('auth'); ?>
    <fieldset>
        <?php echo $this->Form->create('User'); ?>

        <?php
        echo $this->Form->input('email',array('required' => true, 'type' => 'text','placeholder'=>'Please enter your email here', 'label' => 'Enter the e-mail address you used when signing up'));
        echo $this->Form->input('password',array('type'=>'password', 'label' => 'Enter your new password here', 'required' => true));
        echo $this->Form->input('confirm_password',array('type'=>'password', 'label' => 'Re-type your new password again', 'required' => true));
        echo $this->Form->button(__('Reset'));
        echo $this->Form->end();
        ?>

        <br/>
        <small>If you are having problems retrieving your password, please contact the administrator.</small>
    </fieldset>

</div>

<div class="space45"></div>
