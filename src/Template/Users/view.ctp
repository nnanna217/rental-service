<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Profiles'), ['controller' => 'Profiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Profile'), ['controller' => 'Profiles', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($user->username) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($user->password) ?></p>
            <h6 class="subheader"><?= __('Role') ?></h6>
            <p><?= h($user->role) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
            <h6 class="subheader"><?= __('Active Fg') ?></h6>
            <p><?= $this->Number->format($user->active_fg) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($user->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($user->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Profiles') ?></h4>
    <?php if (!empty($user->profiles)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Firstname') ?></th>
            <th><?= __('Middlename') ?></th>
            <th><?= __('Lastname') ?></th>
            <th><?= __('Address') ?></th>
            <th><?= __('Email') ?></th>
            <th><?= __('Phone Number') ?></th>
            <th><?= __('Next Of Kin') ?></th>
            <th><?= __('Dob') ?></th>
            <th><?= __('Active Fg') ?></th>
            <th><?= __('Created By') ?></th>
            <th><?= __('Modified By') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->profiles as $profiles): ?>
        <tr>
            <td><?= h($profiles->id) ?></td>
            <td><?= h($profiles->user_id) ?></td>
            <td><?= h($profiles->firstname) ?></td>
            <td><?= h($profiles->middlename) ?></td>
            <td><?= h($profiles->lastname) ?></td>
            <td><?= h($profiles->address) ?></td>
            <td><?= h($profiles->email) ?></td>
            <td><?= h($profiles->phone_number) ?></td>
            <td><?= h($profiles->next_of_kin) ?></td>
            <td><?= h($profiles->dob) ?></td>
            <td><?= h($profiles->active_fg) ?></td>
            <td><?= h($profiles->created_by) ?></td>
            <td><?= h($profiles->modified_by) ?></td>
            <td><?= h($profiles->created) ?></td>
            <td><?= h($profiles->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Profiles', 'action' => 'view', $profiles->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Profiles', 'action' => 'edit', $profiles->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Profiles', 'action' => 'delete', $profiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profiles->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
