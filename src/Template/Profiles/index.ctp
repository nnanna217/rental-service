<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Profile'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="profiles index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('firstname') ?></th>
            <th><?= $this->Paginator->sort('middlename') ?></th>
            <th><?= $this->Paginator->sort('lastname') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('phone_number') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($profiles as $profile): ?>
        <tr>
            <td><?= $this->Number->format($profile->id) ?></td>
            <td>
                <?= $profile->has('user') ? $this->Html->link($profile->user->id, ['controller' => 'Users', 'action' => 'view', $profile->user->id]) : '' ?>
            </td>
            <td><?= h($profile->firstname) ?></td>
            <td><?= h($profile->middlename) ?></td>
            <td><?= h($profile->lastname) ?></td>
            <td><?= h($profile->email) ?></td>
            <td><?= h($profile->phone_number) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $profile->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $profile->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $profile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profile->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
