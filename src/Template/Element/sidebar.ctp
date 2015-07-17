<?php //debug($users[0]->role);
//$authId = $this->request->session()->read('Auth.User.id');
?>
<div class="spacer"></div>
<?php $this->start('quick_search') ?>
<form class="quick_search">
    <input type="text" value="Quick Search"
           onfocus="if(!this._haschanged)
           {this.value=''};this._haschanged=true;">
</form>
<hr/>
<?php $this->end() ?>

<?php $this->start('customer') ?>
<h3>Customer</h3>
<ul class="toggle">
    <li class="icn_new_article"><?php echo $this->Html->link('New Client', ['controller' => 'Customers', 'action' => 'add']);?>
    </li>
    <li class="icn_categories"><?php echo $this->Html->link('View Clients', ['controller' => 'Customers', 'action' => 'index']);?></li>
</ul>
<?php $this->end() ?>

<?php $this->start('users') ?>
<h3>Users</h3>
<ul class="toggle">
    <?php if ($users[0]->role == 'admin'): ?>
        <li class="icn_add_user">
            <!--        <a href="#">Add New User</a>-->
            <?php echo $this->Html->link('Add New User', ['controller' => 'users', 'action' => 'add']);?>
        </li>
        <li class="icn_view_users">
            <?php echo $this->Html->link('View Users', ['controller' => 'users', 'action' => 'index']);?>
        </li>
    <?php endif;?>
    <li class="icn_profile">
        <?php echo $this->Html->link('Your Profile', ['controller' => 'profiles', 'action' => 'view', $users[0]->profile->id]);?>
        <!--        <a href="#">Your Profile</a>-->
    </li>
</ul>
<?php $this->end() ?>

<?php $this->start('inventory') ?>
<h3>Inventory</h3>
<ul class="toggle">
    <li class="icn_folder"><?php echo $this->Html->link('New Category',['controller'=>'categories', 'action'=>'add']);?></li>
    <li class="icn_folder"><?php echo $this->Html->link('View Categories',['controller'=>'categories', 'action'=>'index']);?></li>
    <li class="icn_photo"><?php echo $this->Html->link('Add Item',['controller'=>'inventories', 'action'=>'add']);?></li>
    <li class="icn_audio"><?php echo $this->Html->link('View Items',['controller'=>'inventories', 'action'=>'index']);?></li>
<!--    <li class="icn_video"><a href="#">Video</a></li>-->
</ul>
<?php $this->end() ?>

<?php $this->start('admin') ?>
<h3>Admin</h3>
<ul class="toggle">
    <li class="icn_settings"><a href="#">Options</a></li>
    <li class="icn_security"><a href="#">Security</a></li>
    <li class="icn_jump_back"><a href="#">Logout</a></li>
</ul>
<?php $this->end() ?>

<?php $this->start('footer') ?>
<footer>
    <hr/>
    <p><strong>Copyright &copy; 2015 Kfa Rentals</strong></p>

<!--    <p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>-->
</footer>
<?php $this->end() ?>
