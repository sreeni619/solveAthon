<div class="row mb-3">
    <div class="col-6">
        <h2><?=$page_title;?></h2>
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
                <div class="table-responsive">
        <?php 
        if($details){
            
            echo "<table class='table table-hover tx-14 tx-nowrap mg-b-0 pl-10' id='js_dataTable'>";
            echo "<tr>";
            echo "<th width='2%'>S.No</th>";
            echo "<th width='15%'>Team Name</th>";
            echo "<th width='18%'>Student Name</th>";
            echo "<th width='10%'>Mobile</th>";
            echo "<th width='15%'>Category</th>";
            echo "<th width='20%'>Status</th>";
            echo "<th width='20%'>Submitted On</th>";
            // echo "<th width='20%'>Actions</th>";
            echo "</tr>";
            
            $i = 1;
            foreach($details as $details1){
                
                $mobile = ($details1->mobile) ? $details1->mobile : '--';
                
                echo "<tr>";
                echo "<td>".$i++."</td>";
                echo "<td>".anchor('admin/ideaDetails/'.$details1->id, $details1->team_name,'class="text-primary"')."</td>";
                echo "<td>".$details1->student_name."</td>";
                echo "<td>".$details1->mobile."</td>";
                echo "<td>".$categoriesNames[$details1->category_id]."</td>";
                echo "<td class='text-".$ideaStausColor[$details1->status]."'>".$ideaStaus[$details1->status]."</td>";
                echo "<td>".date('d-m-Y h:i A', strtotime($details1->submitted_date))."</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        }else{ ?>
            <div class="col-md-12 text-center">
                <h3 class="text-muted mx-5 my-5"> Ideas not yet submitted..!</h3>    
            </div>
        <?php } ?>
                </div>
            </div>
        </div>               

    </div>
</div>

<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';
		
		$('#js_dataTable').DataTable({
					    destroy: true,
					    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                        language: {
                            searchPlaceholder: 'Search...',
                            sSearch: '',
                            lengthMenu: '_MENU_ items/page',
                        }
                    });
	     
		
	});
</script>