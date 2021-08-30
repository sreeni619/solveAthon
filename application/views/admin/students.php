<div class="row">
    <div class="col-12 mb-2">
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
        
        <?php 
            // print_r($details);
        ?>
        
        <div class="card h-100">
            <div class="card-body">
            <!--<h5 class="card-title">Students List</h5>-->
            
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputCity">State</label>
                    <?php echo form_dropdown('state', $statesList, (set_value('state'))?set_value('state'):'', 'class="form-select form-control" id="state"'); ?>
                    <?php echo form_error('state', '<div class="error">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCity">District</label>
                    <?php $districtOptions = array('all'=>'All Districts');
                            echo form_dropdown('district', $districtOptions, (set_value('district'))?set_value('district'):'', 'class="form-select form-control" id="district"'); ?>
                    <?php echo form_error('district', '<div class="error">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCity">City</label>
                    <?php $cityOptions = array('all'=>'All Cities');
                            echo form_dropdown('city', $cityOptions, (set_value('city'))?set_value('city'):'', 'class="form-select form-control" id="city"'); ?>
                    <?php echo form_error('city', '<div class="error">', '</div>'); ?>
                </div>
                <div class="form-group col-md-1">
                    <label for="inputCity">Level</label>
                    <?php echo form_dropdown('level', $levelOptions, (set_value('level'))?set_value('level'):'', 'class="form-select form-control" id="level"'); ?>
                    <?php echo form_error('level', '<div class="error">', '</div>'); ?>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCity">Program</label>
                    <?php echo form_dropdown('program', $programOptions, (set_value('program'))?set_value('program'):'', 'class="form-select form-control" id="program"'); ?>
                    <?php echo form_error('program', '<div class="error">', '</div>'); ?>
                </div>
                <div class="form-group col-md-3">
                    <label class="d-block">&nbsp;</label>
                    <button class="btn btn-danger btn-sm" id="get_details">Get Details</button>
                    <button class="btn btn-primary btn-sm" id="get_download">Download</button>
                </div>
            </div>
            
            <div class="row">
        		<div class="col-md-12" id="res"></div>
        		<div class="col-md-12 text-center" id="process" style="display: none;">
                    <?='<img src="'.base_url().'assets/img/Processing.gif"/>'; ?>                           
                </div>
            </div>
                                
            
            </div>
        </div>
                    
    </div>
</div>

<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';
        
        $("#process").hide();
        $("#get_download").prop('disabled', true);
        
		$("#state").change(function(){
			event.preventDefault();
	            	
			var state = $("#state").val();
			
			if(state == ' '){
			   alert("Please Select State");
			}else{
			  $.ajax({'type':'POST',
				'url':base_url+'admin/districtList/A',
				'data':{'state':state},
				'dataType':'text',
				'cache':false,
				'success':function(data){
					$('select[name="district"]').empty();
					$('select[name="district"]').append(data);
					$('select[name="district"]').removeAttr("disabled");
				}
			  });
			  
			}
		});

		$("#district").change(function(){
			event.preventDefault();
	            	
			var state = $("#state").val();
			var district = $("#district").val();
			
			if(state == ' ' || district == ' '){
			   alert("Please Select State and District");
			}else{
			  $.ajax({'type':'POST',
				'url':base_url+'admin/cityList/A',
				'data':{'state':state, 'district':district},
				'dataType':'text',
				'cache':false,
				'success':function(data){
					$('select[name="city"]').empty();
					$('select[name="city"]').append(data);
					$('select[name="city"]').removeAttr("disabled");
				}
			  });
			  
			}
		});
        
        $("#get_details").click(function(){
			event.preventDefault();
	        
	        var state = $("#state").val();    
	        var district = $("#district").val();
			var city = $("#city").val();
			var level = $("#level").val();
			var program = $("#program").val();
            
            $("#res").hide();
			$("#process").show();
			
			if(state == ' ' || district == ' ' || city == ' ' || level == ' ' || program == ' '){
			   alert("All fields required");
			}else{
			  $.ajax({'type':'POST',
				'url':base_url+'admin/getStudentsList',
				'data':{'state':state,'district':district,'city':city,'level':level,'program':program},
				'dataType':'text',
				'cache':false,
				'success':function(data){
				    $("#process").hide();
					$("#res").show();
					$("#res").html(data);
					$("#get_download").prop('disabled', false);
				    $('#js_dataTable').DataTable({
					    destroy: true,
					    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                        language: {
                            searchPlaceholder: 'Search...',
                            sSearch: '',
                            lengthMenu: '_MENU_ items/page',
                        }
                    });
				}
			  });
			  
			}
		});
		
		$("#get_download").click(function(){
			event.preventDefault();
	        
	        var state = $("#state").val();    
	        var district = $("#district").val();
			var city = $("#city").val();
			var level = $("#level").val();
			var program = $("#program").val();
            
            $("#get_download").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Downloading...');
			$("#get_download").prop('disabled', true);
			
			if(state == ' ' || district == ' ' || city == ' ' || level == ' ' || program == ' '){
			   alert("All fields required");
			}else{
			  $.ajax({'type':'POST',
				'url':base_url+'admin/getStudentsListDownload',
				'data':{'state':state,'district':district,'city':city,'level':level,'program':program},
				'dataType':'json',
				'cache':false,
				'success':function(data){
				    console.log(data);
				    var filename = "Students List.xls";
        			var $a = $("<a>");
                    $a.attr("href",data.file);
                    $("body").append($a);
                    $a.attr("download",filename);
                    $a[0].click();
                    $a.remove();
                    $("#get_download").html('Download');
        			$("#get_download").prop('disabled', true);

				}
			  });
			  
			}
		});

	});
</script>