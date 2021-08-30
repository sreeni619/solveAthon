<div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1><?=$page_title;?></h1>
                        <div class="float-sm-right text-zero">
                            <?php echo anchor('admin/learning','Back to List','class="btn btn-danger btn-sm text-uppercase"'); ?>
                        </div>
                    </div>
                    <div class="separator mb-5"></div>
                </div>
            </div>
            
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4">Add New Learning</h5>
                            <?=form_open($action);?>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Enter Title">
                                    <?=form_error('title','<div class="text-danger">','</div>');?>
                                </div>
                                <div class="form-group">
                                    <label for="url">Learning URL</label>
                                    <input type="text" class="form-control" id="url" name="url" aria-describedby="URL" placeholder="Enter URL">
                                    <?=form_error('url','<div class="text-danger">','</div>');?>
                                </div>
                                <button type="submit" class="btn btn-primary mb-0">Submit</button>
                                <?php echo anchor('admin/learning','Cancel','class="btn btn-danger"'); ?>
                            </form>

                        </div>
                    </div>
    </div>
</div>