<div class="row gx-lg-8 gx-xl-12 gy-10 mb-10 mb-md-14">
    <div class="col-md-6 mx-auto">
        <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="0e4PZuFtjf8"></div>
    </div>
    <div class="col-md-6 col-lg-6">
            
            <div class="col-md-12">
                <div class="card bg-soft-ash">
                  <div class="card-body py-5">
                    <h4><?php echo $team_name;?></h4>
                    <?php $i = ($Idea) ? $Idea->status : 0; ?>
                    <h5 class="mb-1 <?="text-".$ideaStausColor[$i];?>">
                        <?php 
                            $sta  = ($Idea) ? $ideaStaus[$Idea->status] : $ideaStaus[0]; 
                            echo anchor('student/ideas',$sta, "class='text-bold text-".$ideaStausColor[$i]."'");
                        ?>
                    </h5>
                  </div>
                  <!--/.card-body -->
                </div>
                <!--/.card -->
              </div>
            
        <div class="row text-center mt-6">
              <div class="col-md-4 col-lg-4">
                <a href="<?=base_url();?>student/learning">
                <div class="card bg-pale-violet">
                  <div class="card-body">
                    <img src="<?php echo base_url();?>assets/img/icons/video.svg" class="svg-inject icon-svg icon-svg-md text-violet mb-4" alt="" />
                    <h4><?php echo anchor('student/learning','Learning','class="link-violet"');?></h4>
                  </div>
                  <!--/.card-body -->
                </div>
                </a>
                <!--/.card -->
              </div>
              <!--/column -->
              
              <div class="col-md-4 col-lg-4">
                <a href="<?=base_url();?>student/my_team">
                <div class="card bg-pale-aqua">
                  <div class="card-body">
                    <img src="<?php echo base_url();?>assets/img/icons/team.svg" class="svg-inject icon-svg icon-svg-md text-aqua mb-4" alt="" />
                    <h4><?php echo anchor('student/my_team','My Teams','class="link-aqua"');?></h4>
                  </div>
                  <!--/.card-body -->
                </div>
                <!--/.card -->
                </a>
              </div>
              
              <!--/column -->
              <div class="col-md-4 col-lg-4">
                <a href="<?=base_url();?>student/my_profile">
                <div class="card bg-pale-red">
                  <div class="card-body">
                    <img src="<?php echo base_url();?>assets/img/icons/id-card.svg" class="svg-inject icon-svg icon-svg-md text-red mb-4" alt="" />
                    <h4><?php echo anchor('student/my_profile','My Profile','class="link-red"');?></h4>
                  </div>
                  <!--/.card-body -->
                </div>
                <!--/.card -->
              </div>
              </a>
              <!--/column -->
            </div>
            
    </div>
</div>