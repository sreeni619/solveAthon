<div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1><?=$page_title;?></h1>
                        <div class="float-sm-right text-zero">
                            <?php echo anchor('admin/evaluators','Back to List','class="btn btn-danger btn-sm text-uppercase"'); ?>
                        </div>
                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>
            
<div class="row">
    <div class="col-md-6 offset-3">
        <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Add New Evaluator</h5>
                            <?=form_open($action);?>
                                <div class="form-group">
                                    <label for="name">Evaluator Name <span class='text-danger'>*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter Evaluator Name" value="<?php echo (set_value('name'))?set_value('name'):'';?>">
                                    <?=form_error('name','<div class="text-danger">','</div>');?>
                                </div>
                                <div class="form-group">
                                    <label for="title">Login Username <span class='text-danger'>*</span></label>
                                    <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Enter Username" readonly value="<?php echo (set_value('username'))?set_value('username'):'';?>">
                                    <?=form_error('username','<div class="text-danger">','</div>');?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="mobile" placeholder="Enter Mobile" value="<?php echo (set_value('mobile'))?set_value('mobile'):'';?>">
                                    <?=form_error('mobile','<div class="text-danger">','</div>');?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter Email" value="<?php echo (set_value('email'))?set_value('email'):'';?>">
                                    <?=form_error('email','<div class="text-danger">','</div>');?>
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                                <?php echo anchor('admin/evaluators','Cancel','class="btn btn-danger"'); ?>
                            </form>

                        </div>                      
                    </div>
    </div>
</div>

<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';
		
		$("#name").keypress(function(e){
		    
            if ($(this).val().length == 0) {
                var a = [];
                var k = e.which;

                for (i = 65; i < 122; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
			} 
			
			var name = $("#name").val();
			
			$.ajax({'type':'POST',
                    'url':base_url+'admin/generateUsername',
        			'data':{'name':name},
        			'dataType':'text',
        			'cache':false,
        			'success':function(re){
        	            $("#username").val(re);
        			}
        	});

		});
    
        
//         var name = $("#name").val();
// 			if(name == ' '){
// 			   alert("Please Enter Name");
// 			}else{
			    
// 			      if (isNaN(name)) {
//                       console.log(name + " ABC");
                      
//                       $.ajax({'type':'POST',
//         				'url':base_url+'admin/generateUsername',
//         				'data':{'name':name},
//         				'dataType':'text',
//         				'cache':false,
//         				'success':function(re){
//         				    $("#username").val(re);
//         				}
//         			  });
        			  
//                       e.preventDefault();
//                     //   return true;
//                   } else {
//                       console.log(name + " 123");
//                       e.preventDefault();
//     				  return false;
//                   }
			    
// 			}		

		
	});
</script>