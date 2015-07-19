<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
$user = $this->request->session()->read('Auth.userdetails');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('layout.css') ?>

    <!--[if lt IE 9]>
    <?= $this->Html->css('ie.css') ?>
    <?= $this->Html->script('http://html5shim.googlecode.com/svn/trunk/html5.js') ?>
    <![endif]-->
    <?= $this->Html->script(['jquery-1.5.2.min','hideshow',
        'jquery.tablesorter.min','jquery.equalHeight']);?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<header>

    <div class="header-title">
        <span><?= $this->fetch('title') ?></span>
    </div>
    <div class="header-help">
            <span>
<!--                <a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a>-->
                <?php echo $this->Html->link('Back to Dashboard',['controller'=>'users','action'=>'dashboard']);?>
            </span>
            <span>
                <?php echo $this->Html->link('Logout',['controller'=>'users','action'=>'logout']);?>
            </span>
    </div>
</header>
<div id="container">

    <div id="content">
        <?= $this->Flash->render() ?>


        <div class="row">
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <footer>
    </footer>
</div>
</body>
</html>
