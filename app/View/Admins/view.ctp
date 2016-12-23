<?php $this->start("main-content"); ?>

  <!-- Content Header (Page header) -->

    <!-- Main content -->
          <section class="content">

            <div class="row">
              <div class="row" style="padding-left: 10px;">
                <div class="col-md-8">
                  <?php echo $this->Session->flash(); ?>
                </div>
              </div>
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Admins</h3>
                    <a ng-href="add" style="float: right;"class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Admin</a>

                  </div><!-- /.box-header -->
                  <!-- form start -->

                  <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                      <table class="table table-striped table-bordered table-hover" id="dataTables">
      	            		<thead>
      			              <tr>
                            <th>#</th>
                            <th>Username</th>
                            <!-- <th>Edit</th> -->
                            <!-- <th>Delete</th> -->

      			              </tr>
      			            </thead>
                        <tbody class="tbody">
                          <?php  $i = 0;?>
                          <?php foreach ($admins as $data): ?>
                            <?php
                              $i = $i + 1;
                             ?>

                          <tr>
                              <td><span><?php echo $i; ?></span></td>
                              <td>
                                <?php echo $data['Admin']['username']; ?>
                              </td>
<!--
                              <td>
                                <?php //echo $data['Admin']['last_name']; ?>
                              </td>

                              <td>
                                <?php //echo $data['Admin']['mobile']; ?>
                              </td>

                              <td>
                                <?php //echo $data['Admin']['email']; ?>
                              </td>

                              <td>
                                <?php
                                // if($data['Admin']['access'] == 1)
                                // {
                                //   //echo "<font color='green'><b>Yes</b></font>";
                                // }
                                // else {
                                //   //echo "<font color='red'><b>No</b></font>";
                                // }
                                ?>
                              </td> -->


                              <!-- <td> -->
                                <?php
                                  // if($data['Admin']['user_type'] == 1)
                                  // {
                                  //   echo "Entry";
                                  // }
                                  // else if($data['Admin']['user_type'] == 2)
                                  // {
                                  //   echo "Auditorium";
                                  // }
                                  // else if($data['Admin']['user_type'] == 3)
                                  // {
                                  //   echo "Food Court";
                                  // }
                                  // else if($data['Admin']['user_type'] == 4)
                                  // {
                                  //   echo "Exhibition Hall 1 & 2";
                                  // }
                                  // else if($data['Admin']['user_type'] == 5)
                                  // {
                                  //   echo "Exhibition Hall 3rd";
                                  // }
                                  //echo $data['Admin']['user_type'];
                                 ?>
                              <!-- </td> -->


                              <!-- <td>
                                <a ng-href="edit/<?php //echo $data['Admin']['id']; ?>" class="btn btn-warning btn-circle"><i class="fa fa-pencil"></i></a>
                              </td> -->

                              <!-- <td>
                                <a ng-href="delete/<?php //echo $data['Admin']['id']; ?>" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure?')"><i class="fa fa-times"></i></a>
                              </td> -->
                          </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
            <ul class="pagination" style="float: right;">
            <?php
                echo $this->Paginator->prev(__('Previous'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                echo $this->Paginator->next(__('Next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
            ?>
            </ul>
                </div><!-- /.box -->
              </div>
            </div>
          </div>

        </section>
<?php $this->end("main-content"); ?>
