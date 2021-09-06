<div class="row mb-20">
    <div class="col-md-8">
        <div class="card <?="border-top-".$ideaStausColor[$Idea->status];?> pb-20">
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-12 ps-5 text-center">
                            <img class="mb-1" src="<?=base_url();?>assets/img/logo/solveathon_logo.png" width="30%"/>
                            <h3 class="mb-0"><?php echo $details->team_name; ?></h3>
                            <h4 class="mb-0"><?php echo $details->college;?></h4>
                            <p><?php echo $details->city.', '.$details->district.', '.$details->state;?></p>
                        </div>
                        <!--<div class="col-md-4 ps-5">-->
                        <!--    <p class="mb-0">Team Name</p>-->
                        <!--    <h5><?php echo $team_name; ?></h5>-->
                        <!--</div>-->
                        <div class="col-md-6">
                            <p class="mb-0">Problem Area</p>
                            <h5><?php echo $categoriesNames[$Idea->category_id]; ?></h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="mb-0">Idea Status</p>
                            <h5 class="<?="text-".$ideaStausColor[$Idea->status];?>"><?php echo $ideaStaus[$Idea->status]; ?></h5>
                        </div>
                    </div>
                    <table class="table">
                        <tr>
                            <td><h4 class="mb-0">IDEA DETAILS</h4></td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">1. Problem Statement</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($Idea->ques1);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">2. Explanation of problem and context</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($Idea->ques2);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">3. Explanation of your solution</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($Idea->ques3);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">4. Are there similar examples? If so, where and how? Please elaborate.</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($Idea->ques4);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">5. What are the challenges you might face and how can they be addressed?</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($Idea->ques5);?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6 class="mb-0">6. Any additional relevant information</h6>
                                <p class="ms-3 mb-1"><?php echo nl2br($Idea->ques6);?></p>
                            </td>
                        </tr>
                    </table>
                  </div>
            </div>    
    </div>
    <div class="col-md-4">
        <div class="card mb-4 progress-banner"><a href="#" class="card-body justify-content-between d-flex flex-row align-items-center"><div>
            <img src="<?=base_url();?>admin_assets/img/bell.png" width="30%"><div><p class="lead text-white">8 Ideas</p><p class="text-small text-white">Waiting for review</p></div></div><div><div role="progressbar" class="progress-bar-circle progress-bar-banner position-relative" data-color="white" data-trail-color="rgba(255,255,255,0.2)" aria-valuenow="8" aria-valuemax="10" data-show-percent="false"><svg viewBox="0 0 100 100" style="display: block; width: 100%;"><path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="rgba(255,255,255,0.2)" stroke-width="4" fill-opacity="0"></path><path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="white" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 301.635, 301.635; stroke-dashoffset: 60.3271;"></path></svg><div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: white;">8/10</div></div></div></a></div>
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Review</h5>
                    <form>
                        <select class="form-control mb-2">
                            <option>Select</option>
                            <option>Default Value 1</option>
                            <option>Default Value 2</option>
                            <option>Default Value 3</option>
                            <option>Other</option>
                        </select>
                        <textarea class="form-control mb-2" rows="5"></textarea>
                        <button class="btn btn-success"> Up Vote </button>
                        <button class="btn btn-danger"> Down Vote </button>
                    </form>
                </div>
            </div>
    </div>

</div>