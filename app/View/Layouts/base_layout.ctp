<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title> <?php echo $page_title; ?> - CVC</title>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


	<!-- <link rel="stylesheet" href="http://www.sufyan.co.in/cvc/app/webroot/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://www.sufyan.co.in/cvc/app/webroot/css/AdminLTE.min.css">
	<link rel="stylesheet" href="http://www.sufyan.co.in/cvc/app/webroot/css/_all-skins.min.css">
	<link rel="stylesheet" href="http://www.sufyan.co.in/cvc/app/webroot/css/angular-growl.min.css">
	<link rel="stylesheet" href="http://www.sufyan.co.in/cvc/app/webroot/css/bootstrap-timepicker.min.css">
	<link rel="stylesheet" href="http://www.sufyan.co.in/cvc/app/webroot/css/daterangepicker-bs3.css">
	<link rel="stylesheet" href="http://www.sufyan.co.in/cvc/app/webroot/css/datetimepicker.css">
	<link rel="stylesheet" href="http://www.sufyan.co.in/cvc/app/webroot/css/ui-bootstrap-csp.css"> -->

	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('AdminLTE.min');
		echo $this->Html->css('_all-skins.min');
		echo $this->Html->css('angular-growl.min');
		echo $this->Html->css('bootstrap-timepicker.min');
		echo $this->Html->css('daterangepicker-bs3');
		echo $this->Html->css('datetimepicker');
		echo $this->Html->css('ui-bootstrap-csp');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="hold-transition skin-yellow sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo $this->Html->url(array('controller' => 'admins', 'action' => 'index')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>VC</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Change</b>Vadodara</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a> -->
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a>
                        <div class="pull-left">
                          <!-- <img src="" class="img-circle" alt="User Image"> -->
                        </div>
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li><!-- end message -->
                  </ul>
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
              <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a> -->
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">
              <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a> -->
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li><!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo $this->webroot; ?>/img/no_avatar.png" class="user-image" alt="User Image">
                <!-- <span class="hidden-xs" ng-bind="user.username"></span> -->
								<?php echo $this->Session->read('Auth.User.username'); ?>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo $this->webroot; ?>/img/no_avatar.png" class="img-circle" alt="User Image">
                  <p>
                    <span><?php echo $this->Session->read('Auth.User.username')." ".$this->Session->read('Auth.User.last_name'); ?></span>
                  </p>
                </li>

                <li class="user-footer">
                  <div class="pull-right">
                    <a href="<?php echo $this->Html->url(array('controller' => 'admins', 'action' => 'logout')); ?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">MAIN NAVIGATION</li>
					<li>
	        	<!-- <a href=""><i class="fa fa-dashboard"></i>Dashboard</a> -->
						<a href="<?php echo $this->Html->url(array('controller' => 'admins', 'action' => 'index')); ?>">
							 <i class="fa fa-dashboard"></i> <span>Dashboard</span>
						</a>
	        </li>
          <!-- <li><a href="#/base/projectproperties"><i class="fa fa-dashboard"></i> <span>Properties</span></a></li> -->
					<!-- <li>
						<a href="#">
							 <i class="fa fa-users"></i> <span>Members</span> <i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
										<li><a href="<?php //echo $this->Html->url(array('controller' => 'users', 'action' => 'add')); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
										<li><a href="<?php //echo $this->Html->url(array('controller' => 'users', 'action' => 'view')); ?>"><i class="fa fa-circle-o"></i> View</a></li>
						</ul>
	        </li> -->




					<li>
							<a href="#">
								 <i class="fa fa-user-secret"></i> <span>Admins</span> <i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
									<li><a href="<?php echo $this->Html->url(array('controller' => 'admins', 'action' => 'add')); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
									<li><a href="<?php echo $this->Html->url(array('controller' => 'admins', 'action' => 'view')); ?>"><i class="fa fa-circle-o"></i> View</a></li>
							</ul>
	        </li>


					<li>
							<a href="#">
								 <i class="fa fa-bell"></i> <span>Events</span> <i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
									<li><a href="<?php echo $this->Html->url(array('controller' => 'events', 'action' => 'add')); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
									<li><a href="<?php echo $this->Html->url(array('controller' => 'events', 'action' => 'view')); ?>"><i class="fa fa-circle-o"></i> View</a></li>
							</ul>
	        </li>

					<li>
							<a href="#">
								 <i class="fa fa-cogs"></i> <span>App Config</span> <i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
									<li><a href="<?php echo $this->Html->url(array('controller' => 'appupdates', 'action' => 'add')); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
									<li><a href="<?php echo $this->Html->url(array('controller' => 'appupdates', 'action' => 'view')); ?>"><i class="fa fa-circle-o"></i> View</a></li>
							</ul>
	        </li>


        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
			<?php
        echo $this->Session->flash('error');
        echo $this->Session->flash('success');
        echo $this->Session->flash('notice');
	    ?>
      <?php echo $this -> fetch('main-content'); ?>

    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2016 <a href="#">Change Vadodara Campaign</a>.</strong> All rights reserved.
    </footer>
  </div><!-- ./wrapper -->

	<!-- <script type="text/javascript" src="http://www.sufyan.co.in/cvc/app/webroot/script/jQuery-2.1.4.min.js" />
	<script type="text/javascript" src="http://www.sufyan.co.in/cvc/app/webroot/script/bootstrap.min.js" />
	<script type="text/javascript" src="http://www.sufyan.co.in/cvc/app/webroot/script/app.min.js" />
	<script type="text/javascript" src="http://www.sufyan.co.in/cvc/app/webroot/script/demo.js" />
	<script type="text/javascript" src="http://www.sufyan.co.in/cvc/app/webroot/script/bootstrap-timepicker.min.js" />
	<script type="text/javascript" src="http://www.sufyan.co.in/cvc/app/webroot/script/daterangepicker.js" />
	<script type="text/javascript" src="http://www.sufyan.co.in/cvc/app/webroot/script/fastclick.min.js" />
	<script type="text/javascript" src="http://www.sufyan.co.in/cvc/app/webroot/script/jquery.slimscroll.min.js" /> -->

	<?php
		echo $this->Html->script('jQuery-2.1.4.min');


		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('app.min');
		echo $this->Html->script('demo');
		echo $this->Html->script('bootstrap-timepicker.min');
		echo $this->Html->script('daterangepicker');
		echo $this->Html->script('fastclick.min');
		echo $this->Html->script('jquery.slimscroll.min');

		// angular files
		// echo $this->Html->script('angular.min');
		// echo $this->Html->script('app-angular');
		// echo $this->Html->script('angucomplete-alt.min');
		//File Upload Angular JS
		// echo $this->Html->script('ng-file-upload.min');

		//Async
		// echo $this->Html->script('async.min');


	 ?>
</body>
<script type="text/javascript">
		var baseUrl = "<?php echo $this->webroot; ?>";

</script>
</html>
