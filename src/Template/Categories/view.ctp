<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="categories view large-10 medium-9 columns">
    <h2><?= h($category->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($category->name) ?></p>
            <h6 class="subheader"><?= __('Description') ?></h6>
            <p><?= h($category->description) ?></p>
            <h6 class="subheader"><?= __('Active Fg') ?></h6>
            <p><?= h($category->active_fg) ?></p>
            <h6 class="subheader"><?= __('Parent Category') ?></h6>
            <p><?= $category->has('parent_category') ? $this->Html->link($category->parent_category->name, ['controller' => 'Categories', 'action' => 'view', $category->parent_category->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Category Type') ?></h6>
            <p><?= h($category->category_type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($category->id) ?></p>
            <h6 class="subheader"><?= __('Lft') ?></h6>
            <p><?= $this->Number->format($category->lft) ?></p>
            <h6 class="subheader"><?= __('Rght') ?></h6>
            <p><?= $this->Number->format($category->rght) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($category->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($category->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Categories') ?></h4>
    <?php if (!empty($category->child_categories)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Description') ?></th>
            <th><?= __('Active Fg') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th><?= __('Parent Id') ?></th>
            <th><?= __('Lft') ?></th>
            <th><?= __('Rght') ?></th>
            <th><?= __('Category Type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($category->child_categories as $childCategories): ?>
        <tr>
            <td><?= h($childCategories->id) ?></td>
            <td><?= h($childCategories->name) ?></td>
            <td><?= h($childCategories->description) ?></td>
            <td><?= h($childCategories->active_fg) ?></td>
            <td><?= h($childCategories->created) ?></td>
            <td><?= h($childCategories->modified) ?></td>
            <td><?= h($childCategories->parent_id) ?></td>
            <td><?= h($childCategories->lft) ?></td>
            <td><?= h($childCategories->rght) ?></td>
            <td><?= h($childCategories->category_type) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Categories', 'action' => 'view', $childCategories->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Categories', 'action' => 'edit', $childCategories->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categories', 'action' => 'delete', $childCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childCategories->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Customers') ?></h4>
    <?php if (!empty($category->customers)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Category Id') ?></th>
            <th><?= __('Address') ?></th>
            <th><?= __('Contact Person') ?></th>
            <th><?= __('Contact Email') ?></th>
            <th><?= __('Contact Phone') ?></th>
            <th><?= __('Occasion') ?></th>
            <th><?= __('Created By') ?></th>
            <th><?= __('Modified By') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($category->customers as $customers): ?>
        <tr>
            <td><?= h($customers->id) ?></td>
            <td><?= h($customers->name) ?></td>
            <td><?= h($customers->category_id) ?></td>
            <td><?= h($customers->address) ?></td>
            <td><?= h($customers->contact_person) ?></td>
            <td><?= h($customers->contact_email) ?></td>
            <td><?= h($customers->contact_phone) ?></td>
            <td><?= h($customers->occasion) ?></td>
            <td><?= h($customers->created_by) ?></td>
            <td><?= h($customers->modified_by) ?></td>
            <td><?= h($customers->created) ?></td>
            <td><?= h($customers->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Customers', 'action' => 'view', $customers->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Customers', 'action' => 'edit', $customers->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Customers', 'action' => 'delete', $customers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customers->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
