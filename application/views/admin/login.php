<div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">

                            <p class=" text-white h2">MAGIC IS IN THE DETAILS</p>

                            <p class="white mb-0">
                                Please use your credentials to login.
                            </p>
                        </div>
                        <div class="form-side">
                            <h4 class="h4 mb-5">
                                Sove-A-Thon
                            </h4>
                            <h6 class="my-4">Login</h6>
                            <?php if($this->session->flashdata('message')){?> 
                                  <div class="alert alert-danger" id="msg">      
                                    <?php echo $this->session->flashdata('message')?>
                                  </div>
                            <?php } ?>
                            <?php echo form_open($action, 'class="admin"'); ?>
                                <label class="form-group has-float-label mb-4">
                                    <input type="text" id="username" name="username" class="form-control" autofocus="off" placeholder="Enter Username" value="<?php echo (set_value('username'))?set_value('username'):'';?>">
                                    <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                                    <span>Username</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password"  value="<?php echo (set_value('password'))?set_value('password'):'';?>">
                                    <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                                    <span>Password</span>
                                </label>
                                <div class="d-flex justify-content-between align-items-right">
                                    <!--<a href="#">Forget password?</a>-->
                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>