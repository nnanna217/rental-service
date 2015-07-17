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

$cakeDescription = 'Dashboard I Admin Panel';
$user = $this->request->session()->read('Auth.userdetails');
?>
<!doctype html>
<html lang="en">

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

<!--    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />-->
    <!--[if lt IE 9]>
    <!--<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />-->
<!--    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>-->
<!--    <![endif]-->

    <?= $this->Html->script(['jquery-1.5.2.min','hideshow',
        'jquery.tablesorter.min','jquery.equalHeight']);?>

<!--    <script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>-->
<!--    <script src="js/hideshow.js" type="text/javascript"></script>-->
<!--    <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>-->
<!--    <script type="text/javascript" src="js/jquery.equalHeight.js"></script>-->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script type="text/javascript">
        $(document).ready(function()
            {
                $(".tablesorter").tablesorter();
            }
        );
        $(document).ready(function() {

            //When page loads...
            $(".tab_content").hide(); //Hide all content
            $("ul.tabs li:first").addClass("active").show(); //Activate first tab
            $(".tab_content:first").show(); //Show first tab content

            //On Click Event
            $("ul.tabs li").click(function() {

                $("ul.tabs li").removeClass("active"); //Remove any "active" class
                $(this).addClass("active"); //Add "active" class to selected tab
                $(".tab_content").hide(); //Hide all tab content

                var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                $(activeTab).fadeIn(); //Fade in the active ID content
                return false;
            });

        });
    </script>
    <script type="text/javascript">
        $(function(){
            $('.column').equalHeight();
        });
    </script>

</head>


<body>

<header id="header">

    <hgroup>

        <h1 class="site_title"><a href="index.html">Website Admin</a></h1>
        <h2 class="section_title">Dashboard</h2>
        <div class="btn_view_site">
<!--            <a href="http://www.medialoot.com">View Site</a>-->
            <?php echo $this->Html->link('Logout',['action'=>'logout']) ?>
        </div>
    </hgroup>
</header> <!-- end of header bar -->

<section id="secondary_bar">
    <div class="user">
        <p><?php echo $user[0]->profile->full_name?></p>
        <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
    </div>
    <div class="breadcrumbs_container">
        <article class="breadcrumbs">
            <a href="index.html">
                Website Admin</a>
            <div class="breadcrumb_divider">
            </div> <a class="current">Dashboard</a>
        </article>
    </div>
</section><!-- end of secondary bar -->

<aside id="sidebar" class="column">
    <?php
    echo $this->element('sidebar',['users'=>$user]);
    ?>

    <?php
    echo $this->fetch('customer');
    echo $this->fetch('inventory');
    echo $this->fetch('users');
    if($user[0]->role == 'admin'):
    echo $this->fetch('admin');
    endif;
    echo $this->fetch('footer');
    ?>
<!--    <form class="quick_search">-->
<!--        <input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">-->
<!--    </form>-->
<!--    <hr/>-->
<!--    <h3>Content</h3>-->
<!--    <ul class="toggle">-->
<!--        <li class="icn_new_article"><a href="#">New Article</a></li>-->
<!--        <li class="icn_edit_article"><a href="#">Edit Articles</a></li>-->
<!--        <li class="icn_categories"><a href="#">Categories</a></li>-->
<!--        <li class="icn_tags"><a href="#">Tags</a></li>-->
<!--    </ul>-->
<!--    <h3>Users</h3>-->
<!--    <ul class="toggle">-->
<!--        <li class="icn_add_user"><a href="#">Add New User</a></li>-->
<!--        <li class="icn_view_users"><a href="#">View Users</a></li>-->
<!--        <li class="icn_profile"><a href="#">Your Profile</a></li>-->
<!--    </ul>-->
<!--    <h3>Media</h3>-->
<!--    <ul class="toggle">-->
<!--        <li class="icn_folder"><a href="#">File Manager</a></li>-->
<!--        <li class="icn_photo"><a href="#">Gallery</a></li>-->
<!--        <li class="icn_audio"><a href="#">Audio</a></li>-->
<!--        <li class="icn_video"><a href="#">Video</a></li>-->
<!--    </ul>-->
<!--    <h3>Admin</h3>-->
<!--    <ul class="toggle">-->
<!--        <li class="icn_settings"><a href="#">Options</a></li>-->
<!--        <li class="icn_security"><a href="#">Security</a></li>-->
<!--        <li class="icn_jump_back"><a href="#">Logout</a></li>-->
<!--    </ul>-->
<!---->
<!--    <footer>-->
<!--        <hr />-->
<!--        <p><strong>Copyright &copy; 2011 Website Admin</strong></p>-->
<!--        <p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>-->
<!--    </footer>-->
</aside><!-- end of sidebar -->

<section id="main" class="column">
    <div id="content">
        <?= $this->Flash->render() ?>

        <div class="row">
            <?= $this->fetch('content') ?>
        </div>
    </div>
</section>
</body>

</html>