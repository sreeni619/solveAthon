		<div class="row gx-lg-8 gx-xl-12 gy-10 mb-10 mb-md-14 align-items-center">
			  
			<div class="col-md-8 offset-2">
			   <div class="card">
			   	<div class="card-body">
			  <?php if($this->session->flashdata('message')){?> 
              <div align="center" class="alert alert-success" id="msg">      
                <?php echo $this->session->flashdata('message')?>
              </div>
              <?php } ?>
            
			  <?php 
			 //   print_r($details); 
			    $cnt =  count($details); 
			    if($details){
			        $table_setup = array ('table_open'=> '<table class="table">');
				    $this->table->set_template($table_setup);
				    $print_fields = array('SNO', 'Name', 'Mobile', 'Email','Action');
				    $this->table->set_heading($print_fields);
				    
				    $i = 1;
				    foreach($details as $details1){
				        
				        $this->table->add_row(array($i++,
				                    $details1->member_name,
				                    $details1->member_mobile,
				                    $details1->member_email,
				                    anchor('student/edit_member/'.$details1->id,'Update','class="text-danger fw-bolder"')
				                ));
				    }
				
				    echo $this->table->generate();
				    
				    if($cnt < 4){
				        echo anchor('student/new_member','Add New Member','class="btn btn-danger btn-sm"');
				    }
				    
			    } else {
			        echo "<div class='text-center'>";
			        echo "<h4 class='text-ash'> Team member details not yet added ! </h4>";
			        echo anchor('student/new_member','Add New Member','class="btn btn-danger btn-sm"');
			        echo "</div>";
			    }
			  ?>
			  </div>
			</div>
			</div>
        </div>

<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';
        $("#msg").fadeOut(5000);
	});
</script>