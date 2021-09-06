<?php 
    if($Idea){
        // print_r($details);
?>
    <div class="row gx-lg-8 gy-5 mb-10 mb-md-14">
        <div class="col-md-8 offset-2">
            <div class="card <?="border-top-".$ideaStausColor[$Idea->status];?>">
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-12 ps-5 text-center">
                            <img class="mb-1" src="<?=base_url();?>assets/img/logo/solveathon_logo.png" width="30%"/>
                            <h3 class="mb-0"><?php echo $team_name; ?></h3>
                            <h4 class="mb-0"><?php echo $details->college;?></h4>
                            <p><?php echo $details->city.', '.$details->district.', '.$details->state;?></p>
                        </div>
                        <!--<div class="col-md-4 ps-5">-->
                        <!--    <p class="mb-0">Team Name</p>-->
                        <!--    <h5><?php echo $team_name; ?></h5>-->
                        <!--</div>-->
                        <div class="col-md-6">
                            <p class="mb-0">Problem Area</p>
                            <h5><?php echo $categoriesNames[$Idea->category_id]; ?></h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="mb-0">Idea Status</p>
                            <h5 class="<?="text-".$ideaStausColor[$Idea->status];?>"><?php echo $ideaStaus[$Idea->status]; ?></h5>
                        </div>
                    </div>
                    <table class="table">
                        <tr>
                            <td><h4 class="mb-0">IDEA DETAILS</h4></td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">1. Problem Statement</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($Idea->ques1);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">2. Explanation of problem and context</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($Idea->ques2);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">3. Explanation of your solution</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($Idea->ques3);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">4. Are there similar examples? If so, where and how? Please elaborate.</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($Idea->ques4);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">5. What are the challenges you might face and how can they be addressed?</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($Idea->ques5);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">6. Any additional relevant information</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($Idea->ques6);?></p>
                            </td>
                        </tr>
                    </table>
                  </div>
            </div>
        </div>
    </div>
    
<?php 
    }else{
?>
            <div class="row text-center gx-lg-8 gy-5 mb-10 mb-md-14">
              <div class="col-md-2 col-lg-2 offset-1">
                <a href="<?=base_url();?>student/submitIdea/1">
                <div class="card">
                  <figure class="card-img-top"><img class="img-fluid" src="<?=base_url();?>assets/img/Sanitization.png" srcset="<?=base_url();?>assets/img/Sanitization.png 2x" alt="Sanitation" /></figure>
                  <div class="card-body px-6 py-5">
                    <h4 class="mb-1"><?php echo anchor('student/submitIdea/1','Sanitation<br/><br/>');?></h4>
                  </div>
                </div>
                </a>
              </div>
              <div class="col-md-2 col-lg-2">
                <a href="<?=base_url();?>student/submitIdea/2">
                <div class="card">
                  <figure class="card-img-top"><img class="img-fluid" src="<?=base_url();?>assets/img/crowd_management.png" srcset="<?=base_url();?>assets/img/crowd_management@2x.png 2x" alt="Sanitization" /></figure>
                  <div class="card-body px-6 py-5">
                    <h4 class="mb-1"><?php echo anchor('student/submitIdea/2','Crowd Management');?></h4>
                  </div>
                </div>
                </a>
              </div>
              <div class="col-md-2 col-lg-2">
                <a href="<?=base_url();?>student/submitIdea/3">
                <div class="card">
                  <figure class="card-img-top"><img class="img-fluid" src="<?=base_url();?>assets/img/health.png" srcset="<?=base_url();?>assets/img/health@2x.png 2x" alt="Health" /></figure>
                  <div class="card-body px-6 py-5">
                    <h4 class="mb-1"><?php echo anchor('student/submitIdea/3','Health <br/><br/>');?></h4>
                  </div>
                </div>
                </a>
              </div>
              <div class="col-md-2 col-lg-2">
                <a href="<?=base_url();?>student/submitIdea/4">
                <div class="card">
                  <figure class="card-img-top"><img class="img-fluid" src="<?=base_url();?>assets/img/environment.png" srcset="<?=base_url();?>assets/img/environment@2x.png 2x" alt="Community Gatherings" /></figure>
                  <div class="card-body px-6 py-5">
                    <h4 class="mb-1"><?php echo anchor('student/submitIdea/4','Environment<br/><br/>');?></h4>
                  </div>
                </div>
                </a>
              </div>
              <div class="col-md-2 col-lg-2">
                <a href="<?=base_url();?>student/submitIdea/5">
                <div class="card">
                  <figure class="card-img-top"><img class="img-fluid" src="<?=base_url();?>assets/img/digital_solutions.png" srcset="<?=base_url();?>assets/img/digital_solutions@2x.png 2x" alt="Community Gatherings" /></figure>
                  <div class="card-body px-6 py-5">
                    <h4 class="mb-1"><?php echo anchor('student/submitIdea/5','Digital Solutions');?></h4>
                  </div>
                </div>
                </a>
              </div>
            </div>
<?php     
    }
?>

