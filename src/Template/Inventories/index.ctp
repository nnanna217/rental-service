<div class="inventories index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('category_id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('rate') ?></th>
            <th><?= $this->Paginator->sort('quantity') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($inventories as $inventory): ?>
        <tr>
            <td>
                <?= $inventory->has('category') ? $this->Html->link($inventory->category->name, ['controller' => 'Categories', 'action' => 'view', $inventory->category->id]) : '' ?>
            </td>
            <td><?= h($inventory->name) ?></td>
            <td><?= $this->Number->format($inventory->rate) ?></td>
            <td><?= $this->Number->format($inventory->quantity) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inventory->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->id)]) ?>
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
