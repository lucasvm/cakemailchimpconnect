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
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Multiple Image Ajax plugin -->
	<script type="text/javascript" src="../js/jquery.wallform.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <link id="active_style" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/cosmo/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">App Name</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
	        <li class="active"><?php echo $this->Html->link('Home', ['controller' => 'News', 'action' => 'index']); ?></li>
	        <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage
	          <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><?php echo $this->Html->link('Manage News', ['controller' => 'News', 'action' => 'index']); ?></li>
	            <li><?php echo $this->Html->link('Manage Categories', ['controller' => 'Categories', 'action' => 'index']); ?></li>
	            <li><a href="#"><?php echo $this->Html->link('Manage MailChimp', ['controller' => 'Mailchimp', 'action' => 'listmailchimp']); ?></a></li> 
	          </ul>
	        </li>
	      </ul>
	      <div class="top-bar-section">
			    <ul class="right">
					<li><a>
					<?php
					if (is_null($this->request->session()->read('Auth.User.username'))) {

						echo $this->Html->link('Login to your account', ['controller' => 'Users', 'action' => 'login']);

					} else {

						echo "Welcome " . $this->request->session()->read('Auth.User.username') . $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']);; 

					}
					?></a>
				</li>
	            </ul>
	        </div>
	    </div>
	  </div>
	</nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
	<script>
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			// Avoid following the href location when clicking
			event.preventDefault(); 
			// Avoid having the menu to close when clicking
			event.stopPropagation(); 
			// If a menu is already open we close it
			//$('ul.dropdown-menu [data-toggle=dropdown]').parent().removeClass('open');
			// opening the one you clicked on
			$(this).parent().addClass('open');

			var menu = $(this).parent().find("ul");
			var menupos = menu.offset();
		  
			if ((menupos.left + menu.width()) + 30 > $(window).width()) {
				var newpos = - menu.width();      
			} else {
				var newpos = $(this).parent().width();
			}
			menu.css({ left:newpos });

		});
	</script>
    </footer>
</body>
</html>
