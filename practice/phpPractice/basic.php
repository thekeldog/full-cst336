<!DOCTYPE html>
<html>
    <body>
        <table>
            <tr>
                <th>Number</th>
                <th>Odd/Even</th>
            </tr>
                <?php 
                $length = 9;
                $numArray = [];
                for($i=0; $i<$length; $i++){
                    $odd = "odd";
                    $numArray[$i] = rand(0,100);
                    if($numArray[$i]%2 == 0){
                       $odd = "even"; 
                    }else{
                        $odd = "odd";
                    }
                    echo "<tr><td>".$numArray[$i]."<td/>";
                    echo "<td>".$odd."<td/><tr/>";
                }
                ?>
        </table>
        <?php
            $sum = array_sum($numArray);
            $avg = $sum/$length;
            echo "<h3> Sum: ".$sum."</h3>";
            echo "<h3> Average: ".number_format($avg,2)."</h3>";
        ?>
        <br/><br/>
        <?php 
            $weekdays = array();
            $weekdays[] = "M";
            $weekdays[] = "T"; 
            array_push($weekdays,"W"); 
            echo "Displaying values using var_dump: ";
            var_dump($weekdays);
            echo "<br><br>";
            echo "Displaying values using print_r: ";
            print_r($weekdays);

        ?>
    </body>
    
    
</html>