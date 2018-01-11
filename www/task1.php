<html>
    <h2>Equation : y = ax + b </h2>
    <h3>Please enter the values of "a" and "b" to get the corresponding quarter :</h3>
    <form action="task1.php" method="post">
        a : <input type="number_format" name="a">
        b : <input type="number_format" name="b">
        <input type="submit" value="submit">
    </form>
</html>


<?php
/*
    x  y           a  b
    +  +  1        -  +  1         
    -  +  2        +  +  2
    -  -  3        -  -  3
    +  -  4        +  -  4 

*/

if(isset($_POST['a']) && isset($_POST['b'])){
    
    $a = isset($_POST['a'])? $_POST['a']: 0  ; 
    $b = isset($_POST['b'])? $_POST['b']: 0  ; 

}else{
    $input = explode(" ",file_get_contents('inputTask1.txt'));
    $a     = $input[0];
    $b     = $input[1];
}

    $coordinates = getCoordinates($a,$b);
    $quarter     = getQuarter($coordinates);
    
    echo "Quarter number : <strong>".$quarter."</strong>";


function getQuarter($coordinates){
    
    $quarter = 0;
    $x = $coordinates['x'];
    $y = $coordinates['y'];
    
    if($x>0 && $y>0){
        // first quarter
        $quarter = 1;
    }
    elseif($x<0 && $y>0){
        $quarter = 2;
    }
    elseif($x<0 && $y<0){
        $quarter = 3;
    }
    elseif($x>0 && $y<0){
        //fourth
        $quarter = 4;
    }

    
    return $quarter;
    
}

function getCoordinates($a,$b){
    if($a != 0){
        $coordinates['x'] = -($b/$a) ;
    }else{
        echo "Line parallel to the x axis";
        return;
    }
    if($b !=0){
        $coordinates['y'] = $b ;    
    }else{
        echo "Line parallel to the y axis";
        return;
    }
    
    return $coordinates;
}


?>