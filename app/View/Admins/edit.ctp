<?php $this->start("main-content"); ?>

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit
      <small>Admins</small>
    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">General Elements</li>
    </ol> -->
  </section>


  <!-- Main content -->
        <section class="content">

          <!-- <div ng-if="showLoading">
            <img class="loading" src="<?php //echo $this->webroot; ?>/img/ajax-loader.gif" />
          </div> -->

          <div class="row">
            <div class="row" style="padding-left: 10px;">
              <div class="col-md-8">
                <?php echo $this->Session->flash(); ?>
              </div>
            </div>
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Admin</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                  echo $this->Form->create('Admin',array('type'=>'file','role'=>'form', 'multiple'));
                ?>
                <div class="box-body">
  

                  <div class="form-group">
                    <label for="FirstName">First Name</label>

                    <?php
                      echo $this->Form->input("first_name",array('class'=>'form-control','label'=>false,'placeholder'=>'Enter First Name','autofocus'=>true,'default'=>$admin['Admin']['first_name'], 'required'));
                    ?>
                  </div>

                    <div class="form-group">
                      <label for="LastName">Last Name</label>
                      <?php
                        echo $this->Form->input("last_name",array('class'=>'form-control','label'=>false,'placeholder'=>'Enter Last Name','autofocus'=>true,'default'=>$admin['Admin']['last_name'], 'required'));
                      ?>
                    </div>

                    <div class="form-group">
                      <label for="Mobile">Mobile</label>

                      <?php
                        echo $this->Form->input("mobile",array('class'=>'form-control','label'=>false,'placeholder'=>'Enter Mobile No.','autofocus'=>true,'maxlength'=>10,'default'=>$admin['Admin']['mobile'], 'required'));
                      ?>
                    </div>

                    <div class="form-group">
                      <label for="Email">Email</label>
                      <?php
                        echo $this->Form->input("email",array('class'=>'form-control','label'=>false,'placeholder'=>'Enter Email','autofocus'=>true,'default'=>$admin['Admin']['email'], 'required'));
                      ?>
                    </div>

                    <div class="form-group">
                      <label for="Access">Give Full Access?</label>
                      <?php
                      echo $this->Form->Select('access',array('0' => 'No', '1' => 'Yes'),array('empty'=>false,'label' => false,'div' => false,'class' => 'form-control','default'=>$admin['Admin']['access'],'required' => 'required'));
                      ?>

                    </div>
                    <div class="form-group">
                      <label for="TypeUser">Type of user</label>
                      <?php
                      echo $this->Form->Select('user_type',array('1' => 'Auditorium', '2' => 'Caffeteria'),array('empty'=>false,'label' => false,'div' => false,'class' => 'form-control','default'=>$admin['Admin']['user_type'],'required' => 'required'));
                      ?>

                    </div>

                  </div><!-- /.box-body -->


                  <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->



                    <button type="submit" class="btn btn-lg btn-success btn-block">Edit Admin</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div>
          </div>
        </section>
<script>

</script>
<?php $this->end("main-content"); ?>
