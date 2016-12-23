<?php $this->start('main-content'); ?>


    <section class="content-header">
      <h1>Dashboard<small>Control panel</small></h1>
    </section>

	<section class="content">


    <div class="row">
      <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
              <div class="inner">
                  <h3>
                    <?php echo $admins_count; ?>
                  </h3>
                  <p>
                    Total Admins
                  </p>
              </div>
              <div class="icon">
                  <i class="fa fa-user-secret"></i>
              </div>
              <a href="<?= $this->webroot. 'admins/view'; ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
          </div>
      </div>

      <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-blue">
              <div class="inner">
                  <h3>
                    <?php echo $events_count; ?>
                  </h3>
                  <p>
                    Total Events
                  </p>
              </div>
              <div class="icon">
                  <i class="fa fa-bell"></i>
              </div>
              <a href="<?= $this->webroot. 'events/view'; ?>" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
          </div>
      </div>

		</div>
	</section>
<br/>


<?php $this->end('main-content'); ?>
