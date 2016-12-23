<?php $this->start("main-content"); ?>

  <!-- Content Header (Page header) -->

    <!-- Main content -->
          <section class="content" ng-controller="ViewCustomerController">

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
                    <h3 class="box-title">App Updates</h3>



                    <a href="<?php echo $this->Html->url(array('controller' => 'appupdates', 'action' => 'add')); ?>" style="float: right;"class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Update</a>



                  </div><!-- /.box-header -->
                  <!-- form start -->

                  <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                      <table class="table table-striped table-bordered table-hover" id="dataTables">
      	            		<thead>
      			              <tr>
                            <th>#</th>
                            <th>##</th>
                            <th>App Version</th>
                            <th>Description</th>
                            <th>Size</th>
                            <!-- <th>Edit</th> -->
                            <th>Delete</th>

      			              </tr>
      			            </thead>
                        <tbody class="tbody">
                          <?php $no = 0; $i = 0;?>
                          <?php foreach ($appupdates as $data): ?>
                            <?php
                              $i = $i + 1;
                              $file_path = $this->webroot."/files/appupdate/file_url/".$data['Appupdate']['file_dir']."/".$data['Appupdate']['file_url'];

                             ?>

                          <tr style="cursor: pointer;">

                              <td><span><?php echo $i; ?></span></td>
                              <td>
                                <a href="<?php echo $file_path; ?>" style="float: right;"class="btn btn-success"><i class="fa fa-download"></i>&nbsp;&nbsp;Download [<?php echo $data['Appupdate']['version']; ?>]</a>
                              </td>

                              <td>
                                <?php echo $data['Appupdate']['version']; ?>
                              </td>
                              <td>
                                <?php echo $data['Appupdate']['description']; ?>
                              </td>
                              <td>
                                <?php echo $data['Appupdate']['file_size']." MB"; ?>
                              </td>

                              <!-- <td>
                                <?php
                                //echo $this->Html->link($this->Html->tag('i', '',array('class' => 'fa fa-pencil')),array('controller'=>'appupdates','action'=>'edit/'.$data['Appupdate']['id']),array('class'=>'btn btn-warning btn-circle', 'escape' => false));
                                ?>
                              </td> -->

                              <td>
                                <!-- <a ng-href="delete/<?php //echo $data['User']['id']; ?>" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure? Guests will be removed too.')"><i class="fa fa-times"></i></a> -->
                                <?php
                                echo $this->Html->link($this->Html->tag('i', '',array('class' => 'fa fa-times')),array('controller'=>'appupdates','action'=>'delete/'.$data['Appupdate']['id']),array('class'=>'btn btn-danger btn-circle', 'escape' => false,'onclick'=>'return confirm(\'Are you sure? This action wont be rollback.\')'));
                                ?>
                              </td>

                          </tr>
                          <?php $no = $no + 1; ?>
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
            <?php
                echo $this->Paginator->counter(array('format' => 'range'));
            ?>
                </div><!-- /.box -->
              </div>
            </div>
          </div>

          </section>
<?php $this->end("main-content"); ?>
