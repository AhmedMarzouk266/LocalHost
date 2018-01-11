<html>
    <h2>Task 3 : Polarity</h2>
    <h3>Please enter the your Values</h3>
    <form action="task3.php" method="post">
        input : <input type="number_format" name="input">
        <input type="submit" value="submit">
    </form>

</html>




<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $input = isset($_POST['input']) ? $_POST['input'] : 0;
}else{
    $input = file_get_contents('inputTask3.txt');
}




$polarity    = getPolarity($input);
$output      = getOutput($input,$polarity);

echo "The output is : ".$output;




function getPolarity($input){
    for($i=0;$i<strlen($input); $i++){
        if($input[$i]=='1'){
            $counter++;
        }
    }

    $polarity = 'ODD';
    if($counter%2 == 0 ){ //even
        $polarity = 'EVEN';
    }
    
    return $polarity;
    
}

function getOutput ($input,$polarity){
    $polarityBit = substr($input,-1);
    if($polarityBit == 'e'){ // even
        if($polarity == 'EVEN'){
             $output = str_replace('e','0',$input);
        }else{
             $output = str_replace('e','1',$input);
        }
    }else{              // odd
        if($polarity == 'EVEN'){
             $output = str_replace('o','1',$input);
        }else{
             $output = str_replace('o','0',$input);
        }
    }
    
    return $output;
}

?>