<div class="row mb-3">
    <div class="col-6">
        <h2><?=$page_title;?></h2>
    </div>
    <div class="col-6">
        <div class="float-sm-right text-zero">
            <?php echo anchor('admin/addEvaluator','Add New','class="btn btn-primary btn-sm text-uppercase"'); ?>
        </div>
        <!--<div class="separator mb-3"></div>-->
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
            
            echo "<table class='table table-hover' id='example'>";
            echo "<tr>";
            echo "<th width='2%'>S.No</th>";
            echo "<th width='15%'>Username</th>";
            echo "<th width='15%'>Name</th>";
            echo "<th width='20%'>Email</th>";
            echo "<th width='10%'>Mobile</th>";
            echo "<th width='20%'>Actions</th>";
            echo "</tr>";
            
            $i = 1;
            foreach($details as $details1){
                $email = ($details1->email) ? $details1->email : '--';
                $mobile = ($details1->mobile) ? $details1->mobile : '--';
                
                if($details1->status){
                    $status = anchor('admin/evaluatorSatus/'.$details1->id.'/0','Disable','class="badge badge-pill badge-danger mr-2"');
                }else{
                    $status = anchor('admin/evaluatorSatus/'.$details1->id.'/1','Active','class="badge badge-pill badge-success mr-2"');
                }
                
                if($details1->password != md5("INDIA")){
                    $reset = anchor('admin/resetEvaluator/'.$details1->id,'Reset','class="badge badge-pill badge-warning mr-2"');    
                }else{
                    $reset = null;
                }
                
                $delete = anchor('admin/deleteEvaluator/'.$details1->id,'Delete','class="badge badge-pill badge-dark mr-2"');
                
                echo "<tr>";
                echo "<td>".$i++."</td>";
                echo "<td>".$details1->username."</td>";
                echo "<td>".$details1->name."</td>";
                echo "<td>".$email."</td>";
                echo "<td>".$mobile."</td>";
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
	    
	     $('#example').DataTable();
		
	});
</script>