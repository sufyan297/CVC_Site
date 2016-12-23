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
        <?php
            echo $this->Form->create('User');
        ?>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="Search">Search</label>
                      <?php
                        echo $this->Form->input("search",array('class'=>'form-control','label'=>false,'placeholder'=>'Type anything you want to search...'));
                      ?>
                      <!-- <input type="text" class="form-control" placeholder="Type anything you want to search..." required/> -->
                      <!-- <p class="help-block">Example block-level help text here.</p> -->

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="Search">&nbsp;</label><br/>
                      <button type="submit" class="btn btn-success">Search</button>

                    </div>

                </div>
              </form>
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Events</h3>



                    <a href="<?php echo $this->Html->url(array('controller' => 'events', 'action' => 'add')); ?>" style="float: right;"class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Event</a>



                  </div><!-- /.box-header -->
                  <!-- form start -->

                  <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                      <table class="table table-striped table-bordered table-hover" id="dataTables">
      	            		<thead>
      			              <tr>
                            <th>#</th>
                            <th>##</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>

      			              </tr>
      			            </thead>
                        <tbody class="tbody">
                          <?php $no = 0; $i = 0;?>
                          <?php foreach ($events as $data): ?>
                            <?php
                              $i = $i + 1;
                              $img_path = $this->webroot."/files/event/image_file/".$data['Event']['image_dir']."/tm_".$data['Event']['image_file'];

                              if($data['Event']['image_file'] == '')
                              {
                                $img_path = $this->webroot."/img/no_img.jpg";
                              }
                             ?>

                          <tr style="cursor: pointer;">

                              <td><span><?php echo $i; ?></span></td>
                              <td>
                                  <img src="<?php echo $img_path; ?>" style="height: 100px; width: 100px;"/>
                              </td>

                              <td>
                                <?php echo $data['Event']['title']; ?>
                              </td>
                              <td>
                                <?php echo $data['Event']['description']; ?>
                              </td>

                              <td>
                                <?php
                                echo $this->Html->link($this->Html->tag('i', '',array('class' => 'fa fa-pencil')),array('controller'=>'events','action'=>'edit/'.$data['Event']['id']),array('class'=>'btn btn-warning btn-circle', 'escape' => false));
                                ?>
                              </td>

                              <td>
                                <!-- <a ng-href="delete/<?php //echo $data['User']['id']; ?>" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure? Guests will be removed too.')"><i class="fa fa-times"></i></a> -->
                                <?php
                                echo $this->Html->link($this->Html->tag('i', '',array('class' => 'fa fa-times')),array('controller'=>'events','action'=>'delete/'.$data['Event']['id']),array('class'=>'btn btn-danger btn-circle', 'escape' => false,'onclick'=>'return confirm(\'Are you sure? This action wont be rollback.\')'));
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
