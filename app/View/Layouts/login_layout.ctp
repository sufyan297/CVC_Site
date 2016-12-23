<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Change Vadodara Campaign - Login
	</title>
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
	<style>
		.alert-message {
	    -moz-animation: cssAnimation 0s ease-in 5s forwards;
	    /* Firefox */
	    -webkit-animation: cssAnimation 0s ease-in 5s forwards;
	    /* Safari and Chrome */
	    -o-animation: cssAnimation 0s ease-in 5s forwards;
	    /* Opera */
	    animation: cssAnimation 0s ease-in 5s forwards;
	    -webkit-animation-fill-mode: forwards;
	    animation-fill-mode: forwards;
	    position: absolute;
	    right:0;
	}
	@keyframes cssAnimation {
	    to {
	        width:0;
	        height:0;
	        padding: 0;
	        visibility: hidden;
	    }
	}
	@-webkit-keyframes cssAnimation {
	    to {
	        width:0;
	        height:0;
	        padding: 0;
	        visibility:hidden;
	    }
	}
	</style>
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
<body class="hold-transition skin-red sidebar-mini" ng-app="vsummit">
  <div class="login-box">
    <div class="login-logo">
      <a href="#/login"><b>Change Vadodara Campaign</b></a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php echo $content_for_layout ?>
      <!-- <div class="form-group has-feedback">
        <input type="email" class="form-control" ng-model="user.email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" ng-model="user.password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">

        </div>
        <div class="col-xs-4">
          <button ng-click="login()" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div> -->

    </div>
  </div>
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
		echo $this->Html->script('angular.min');
		echo $this->Html->script('app-angular');
		//File Upload Angular JS
		echo $this->Html->script('ng-file-upload.min');

		echo $this->Html->script('daterangepicker');
		echo $this->Html->script('fastclick.min');
		echo $this->Html->script('jquery.slimscroll.min');
	 ?>
</body>
</html>
