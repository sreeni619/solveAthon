<div class="row">
    <div class="col-md-12">
        
        <?php 
            // print_r($details);
        ?>
        
        <div class="card h-100">
            <div class="card-body">
            <h5 class="card-title">Students List</h5>
            <table class="table table-hover">
                <tr>
                    <th>SNo</th>
                    <th>Student Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Team Name</th>
                </tr>
            <?php $i = 1;
                foreach($details as $details1){
                    echo "<tr>";
                    echo "<td>".$i++."</td>";
                    echo "<td>".$details1->student_name."</td>";
                    echo "<td>".$details1->mobile."</td>";
                    echo "<td>".$details1->email."</td>";
                    echo "<td>".anchor('admin/team_details/'.$details1->id,$details1->team_name,'class="text-danger"')."</td>";
                    echo "<tr>";
                }
            ?>
            </table>                     
            </div>
        </div>
                    
        
        
        
    </div>
</div>