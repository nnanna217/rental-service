<div class="module_content">
<?php
    echo $this->Form->create('Customer');
    echo $this->Form->input('name');
    echo $this->Form->button("Search");
    echo $this->Form->end();
    ?>
</div>
<article class="module width_full">
    <header><h3>INVENTORY LIST</h3></header>
    <div class="module_content">
    <table  class="tablesorter" cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th>Name</th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('contact_person') ?></th>
            <th><?= $this->Paginator->sort('contact_email') ?></th>
            <th><?= $this->Paginator->sort('contact_phone') ?></th>
            <th><?= $this->Paginator->sort('customer_type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= h($customer->name) ?></td>
                <td><?= h($customer->contact_person) ?></td>
                <td><?= h($customer->contact_email) ?></td>
                <td><?= h($customer->contact_phone) ?></td>
                <td><?= h($customer->customer_type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
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
</article>
