<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $profile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Profile'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Profiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="profiles view large-10 medium-9 columns">
    <h2><?= h($profile->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $profile->has('user') ? $this->Html->link($profile->user->id, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Firstname') ?></h6>
            <p><?= h($profile->firstname) ?></p>
            <h6 class="subheader"><?= __('Middlename') ?></h6>
            <p><?= h($profile->middlename) ?></p>
            <h6 class="subheader"><?= __('Lastname') ?></h6>
            <p><?= h($profile->lastname) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($profile->email) ?></p>
            <h6 class="subheader"><?= __('Phone Number') ?></h6>
            <p><?= h($profile->phone_number) ?></p>
            <h6 class="subheader"><?= __('Next Of Kin') ?></h6>
            <p><?= h($profile->next_of_kin) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($profile->id) ?></p>
            <h6 class="subheader"><?= __('Active Fg') ?></h6>
            <p><?= $this->Number->format($profile->active_fg) ?></p>
            <h6 class="subheader"><?= __('Created By') ?></h6>
            <p><?= $this->Number->format($profile->created_by) ?></p>
            <h6 class="subheader"><?= __('Modified By') ?></h6>
            <p><?= $this->Number->format($profile->modified_by) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Dob') ?></h6>
            <p><?= h($profile->dob) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($profile->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($profile->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Address') ?></h6>
            <?= $this->Text->autoParagraph(h($profile->address)) ?>
        </div>
    </div>
</div>
