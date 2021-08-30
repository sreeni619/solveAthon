<div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1><?=$page_title;?></h1>
                        <div class="float-sm-right text-zero">
                            <?php echo anchor('admin/addUser','Add New','class="btn btn-primary btn-sm text-uppercase"'); ?>
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
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
        <?php 
        if($details){
            
            echo "<table class='table table-hover'>";
            echo "<tr>";
            echo "<th width='10%'>S.No</th>";
            echo "<th width='60%'>Username</th>";
            echo "<th width='30%'>Actions</th>";
            echo "</tr>";
            
            $i = 1;
            foreach($details as $details1){

                if($details1->id != 1){
                    $delete = anchor('admin/deleteUser/'.$details1->id,'Delete','class="badge badge-pill badge-dark mr-2"');    
                    if($details1->status){
                        $status = anchor('admin/userSatus/'.$details1->id.'/0','Disable','class="badge badge-pill badge-danger mr-2"');
                    }else{
                        $status = anchor('admin/userSatus/'.$details1->id.'/1','Active','class="badge badge-pill badge-success mr-2"');
                    }
                }else{
                    $delete = null;
                    $status = null;
                }
                
                
                if(md5("INDIA") != $details1->password){
                    $reset = anchor('admin/resetUser/'.$details1->id,'Reset','class="badge badge-pill badge-warning mr-2"');
                }else{
                    $reset = null;
                }
                
                echo "<tr>";
                echo "<td>".$i++."</td>";
                echo "<td>".$details1->username."</td>";
                echo "<td>".$status.$reset.$delete."</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        }else{ ?>
            <div class="col-md-12 text-center">
                <h3 class="text-muted mx-5 my-5"> Evaluators not yet created..!</h3>    
            </div>
        <?php } ?>
        
            </div>
        </div>               

    </div>
</div>

<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';
	 
		
	});
</script>