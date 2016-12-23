<?php $this->start("main-content"); ?>

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add
      <small>App Updates</small>
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
                  <h3 class="box-title">Add Update</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php
                  echo $this->Form->create('Appupdate',array('type'=>'file','role'=>'form', 'multiple'));
                ?>
                <div class="box-body">
                  <div class="form-group">
                     <label>File</label>
                     <!-- <span class="setrequire">*</span> -->
                     <?php
                         echo $this -> Form -> input('file_url', array('type' => 'file', 'class' => 'form-control limit-size', 'label' => false, 'div' => false , 'title' => 'File','required'=>'required')); //,'required' => 'required'
                     ?>
                  </div>
                  <div class="form-group">
                    <label for="Username">App Version</label><span style="color:red;">*</span>

                    <?php
                      echo $this->Form->input("version",array('class'=>'form-control','label'=>false,'placeholder'=>'Enter Version','autofocus'=>true, 'required'));
                    ?>
                    <!-- <p class="help-block" style="color: red;">If it's App Admin leave it blank.</p> -->

                  </div>

                  <div class="form-group">
                    <label for="Password">Description</label><span style="color:red;">*</span>

                    <?php
                      echo $this->Form->input("description",array('type'=>'textarea','class'=>'form-control','label'=>false,'placeholder'=>'Enter Description','autofocus'=>true, 'required'));
                    ?>
                  </div>

                    <!-- <div class="form-group">
                      <label for="FirstName">First Name</label>

                      <?php
                        //echo $this->Form->input("first_name",array('class'=>'form-control','label'=>false,'placeholder'=>'Enter First Name','autofocus'=>true, 'required'));
                      ?>
                    </div>

                    <div class="form-group">
                      <label for="LastName">Last Name</label>
                      <?php
                      //echo $this->Form->input("last_name",array('class'=>'form-control','label'=>false,'placeholder'=>'Enter Last Name','autofocus'=>true, 'required'));
                      ?>
                    </div> -->

                  </div><!-- /.box-body -->


                  <div class="box-footer">
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->



                    <button type="submit" class="btn btn-lg btn-success btn-block">Add Update</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div>
          </div>
        </section>
<script>

</script>
<?php $this->end("main-content"); ?>
