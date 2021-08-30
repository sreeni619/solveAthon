<div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1><?=$page_title;?></h1>
                        <div class="float-sm-right text-zero">
                            <?php echo anchor('admin/users','Back to List','class="btn btn-danger btn-sm text-uppercase"'); ?>
                        </div>
                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>
            
<div class="row">
    <div class="col-md-6 offset-3">
        <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Add New User</h5>
                            <?=form_open($action);?>
                                <div class="form-group">
                                    <label for="title">Login Username <span class='text-danger'>*</span></label>
                                    <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Enter Username" value="<?php echo (set_value('username'))?set_value('username'):'';?>">
                                    <?=form_error('username','<div class="text-danger">','</div>');?>
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                                <?php echo anchor('admin/users','Cancel','class="btn btn-danger"'); ?>
                            </form>

                        </div>
                    </div>
    </div>
</div>

<script>
	$(document).ready(function(){
		var base_url = '<?php echo base_url(); ?>';
		
	});
</script>