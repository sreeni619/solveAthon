<div class="row">
    <div class="col-md-8 offset-2">

        <div class="card h-100 mb-5">
          <div class="card-body">
            <?php if($details){ ?>
            <h5 class="card-title font-weight-bold"><?=$details->team_name;?> Details </h5>
            <table class="table"> 
                <tr>
                    <th width="30%">Student Name</th>
                    <td><?=$details->student_name;?></td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td><?=$details->mobile;?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?=$details->email;?></td>
                </tr>
                <tr>
                    <th>Team Name</th>
                    <td><?=$details->team_name;?></td>
                </tr>
                <tr>
                    <th>College</th>
                    <td><?=$details->college;?></td>
                </tr>
                <tr>
                    <th>City</th>
                    <td><?=$details->city;?></td>
                </tr>
                <tr>
                    <th>District</th>
                    <td><?=$details->district;?></td>
                </tr>
                <tr>
                    <th>State</th>
                    <td><?=$details->state;?></td>
                </tr>
            </table>
            <?php
                if($team_members){
                    echo "<h6 class='font-weight-bold mt-5'>Member Details</h6>";
                    echo "<table class='table'>";
                    echo "<tr>";
                    echo "<th>SNo</th>";
                    echo "<th>Member Name</th>";
                    echo "<th>Mobile</th>";
                    echo "<th>Email</th>";
                    echo "</tr>";
                    $m = 1;
                    foreach($team_members as $team_members1){
                        echo "<tr>";
                        echo "<td>".$m++."</td>";
                        echo "<td>".$team_members1->member_name."</td>";
                        echo "<td>".$team_members1->member_mobile."</td>";
                        echo "<td>".$team_members1->member_email."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
            <div>
                <?php echo anchor('admin/students','Back to List','class="btn btn-danger btn-sm"');?>
            </div>
            <?php } else { ?>
                <div class="text-center">
                    <img src="<?=base_url();?>assets/img/search.jpg" width="20%" />
                    <h5>No matching details found.</h5>    
                </div>
            <?php } ?>
            
            </div>
        </div>

        
    </div>
</div>