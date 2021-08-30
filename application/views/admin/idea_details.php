            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1><?=$page_title;?></h1>
                        <div class="float-sm-right text-zero">
                            <?php echo anchor('admin/ideas','Back to List','class="btn btn-primary btn-sm text-uppercase"'); ?>
                        </div>
                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>

            <?php if($this->session->flashdata('message')){?> 
              <div align="center" class="alert alert-success" id="msg">      
                <?php echo $this->session->flashdata('message')?>
              </div>
            <?php } ?>
            
<div class="row">
    <div id="print-btn"></div>
    <div class="col-md-8 offset-2" id="print">
        <div class="card mb-4 <?="border-top-".$ideaStausColor[$details->status];?>">
            <div class="card-body">
         
                    <div class="row">
                        <div class="col-md-12 ps-5 text-center">
                            <img class="mb-1" src="<?=base_url();?>assets/img/logo/solveathon_logo.png" width="30%"/>
                            <h3 class="mb-0"><?php echo $details->team_name; ?></h3>
                            <h4 class="mb-0"><?php echo $details->college;?></h4>
                            <p><?php echo $details->city.', '.$details->district.', '.$details->state;?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-0">Problem Area</p>
                            <h5><?php echo $categoriesNames[$details->category_id]; ?></h5>
                        </div>
                        <div class="col-md-6 text-right">
                            <p class="mb-0">Idea Status</p>
                            <h5 class="<?="text-".$ideaStausColor[$details->status];?>"><?php echo $ideaStaus[$details->status]; ?></h5>
                        </div>
                    </div>
                    
                    <table class="table">
                        <tr>
                            <td><h4 class="mb-0">IDEA DETAILS</h4></td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">1. Problem Statement</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($details->ques1);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">2. Explanation of problem and context</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($details->ques2);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">3. Explanation of your solution</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($details->ques3);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">4. Are there similar examples? If so, where and how? Please elaborate.</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($details->ques4);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">5. What are the challenges you might face and how can they be addressed?</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($details->ques5);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">6. Any additional relevant information</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($details->ques6);?></p>
                            </td>
                        </tr>
                    </table>
                    
            </div>
        </div>               

    </div>
</div>

<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';
	    
	    
	});
</script>