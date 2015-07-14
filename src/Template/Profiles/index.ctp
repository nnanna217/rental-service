
    <ul class="top-bar-section">
        <li class="button"><?= $this->Html->link(__('Add User'), ['action' => 'add']) ?></li>
        <li class="button"><?= $this->Html->link(__('All Staff'), ['controller' => 'Profiles', 'action' => 'index']) ?></li>
    </ul>
<div class="profiles index large-12 medium-12 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('firstname') ?></th>
            <th><?= $this->Paginator->sort('middlename') ?></th>
            <th><?= $this->Paginator->sort('lastname') ?></th>
            <th><?= $this->Paginator->sort('phone_number') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($profiles as $profile): ?>
        <tr>
            <td><?= h($profile->firstname) ?></td>
            <td><?= h($profile->middlename) ?></td>
            <td><?= h($profile->lastname) ?></td>
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
