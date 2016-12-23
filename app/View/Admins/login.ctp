<?php echo $this->Form->create('Admin',array('class'=>'form-signin')); ?>
<?php
	// echo $this->Session->flash('auth');
	echo $this->Session->flash();
?>
<div class="form-group has-feedback">
  <?php echo $this->Form->input('username',array(
    'class'=>"form-control",
    'placeholder'=>'Username',
    'label'=>false,
    'required' => 'required',
    'autofocus' => 'autofocus'
  ));
  ?>
  <span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
  <?php echo $this->Form->input('password',array(
		'placeholder'=>'Password',
		'class'=>'form-control',
		'label'=>false,
		'required' => 'required'
	));
	?>
  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<?php
	echo $this->Form->input('Login',array('class'=>'btn btn-lg btn-warning btn-block','type'=>'submit','label'=>false));
?>


<?php echo $this->Form->end(); ?>
