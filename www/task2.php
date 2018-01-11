<html>
    <h2>Task 2 : number of buses </h2>
    <h3>Please enter the values of "students" and "Bus seat numbers"</h3>
    <form action="task2.php" method="post">
        N : <input type="number_format" name="students">
        K : <input type="number_format" name="nSeats">
        M : <input type="number_format" name="mSeats">
        <input type="submit" value="submit">
    </form>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $students = $_POST['students'];
    $nSeats   = $_POST['nSeats'];       
    $mSeats   = $_POST['mSeats'];
    
}else{
    $input = explode(" ",file_get_contents('inputTask2.txt'));
    $students   = $input[0];
    $nSeats     = $input[1];
    $mSeats     = $input[2];
}

 echo "Number of Buses : ";
 echo getNumberOfBuses($students,$nSeats,$mSeats);

function getNumberOfBuses($students, $nSeats, $mSeats){
   $flag = 1 ;
    
    while($students > 0 ){
        if($flag == 1){
            $students -= $nSeats;     
            $bus1++;
            $flag = 2 ;
        }else{
            $students -= $mSeats;     
            $bus2++;
            $flag = 1;
        }
        
    }
    
    return $bus1+$bus2;
}


   
?>
