<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ideas Stats</h5>
                <table class="table">
                    <tr>
                        <th>Idea Categories</th>
                        <th>Submitted Count</th>
                    </tr>
                    <?php $total_count = 0;
                        foreach($categoriesNames as $key => $value){
                            
                            if (array_key_exists($key, $categoryCount)){
                                $cnt = $categoryCount[$key];
                            }else{
                                $cnt = 0;
                            }
                            
                            echo "<tr>";
                            echo "<td>".$value."</td>";
                            echo "<td class='text-center'>".$cnt."</td>";    
                            echo "</tr>";
                            
                            $total_count = $total_count + $cnt;
                        }
                    ?>
                    <tr class="bg-gray">
                        <th class="text-right">Total Ideas</th>
                        <th class="text-center"><?php echo $total_count; ?></th>
                    </tr>
                </table>
            </div>
        </div>
        <?php
        // print_r($categoriesNames);
            // print_r($categoryCount);
        ?>
    </div>
</div>