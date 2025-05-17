<?php
session_start();

// getting form data in numbers va
$numbers = $_POST['sequence'];

$_SESSION['input_data'] = $numbers;
// replaceing all new line with comma
$numbers = str_replace(array("\r\n", "\r", "\n"), ',', $numbers);
// converting string to array
$numbers = explode(',', $numbers);
// echo "<pre>";
$new_numbers = array();
// checking numbers is array or not
if(is_array($numbers)){
    // performing validation
    validation($numbers);
    $count = 0;
    $output = [];
    $last_num = [];
    foreach($numbers as $k => $v){
        // getting the count of numbers based on .
        $val_count = count(explode('.', $v));
            // checking if the number is already in $last_num array
            if(isset($last_num[$val_count])){
                // calling getNextNumber function to get the next number
                $num = getNextNumber($last_num[$val_count]);

                // number store in output array and $last_num array for refrence to generate next number
                $last_num[$val_count] = $num;
                $output[] = $num;

                /* checking count of numbers is less than count of $last_num array 
                    if true based on removing the element based on the key */
                if(($val_count-1) < count($last_num)){

                    foreach($last_num as $kk => $vv){
                        if($kk > ($val_count)){
                            unset($last_num[$kk]);
                        }
                    }

                }
            }else{
                // if key is 0 then we will call getNumber function
                if($k == 0){
                   $num = getNumber($val_count);
                }else{
                    // if key is not 0 then simpley conact the string .1 based on the value in $val_count in $last array
                    $num = $last_num[$val_count - 1].'.1';
                }
                
                // number store in output array and $last_num array for refrence to generate next number
                $last_num[$val_count] = $num;
                $output[] = $num;
               
            }
        
    }
    $_SESSION['success'] = $output;
    header("Location: final.php");
    
}else{
    $_SESSION['error'] = "Please enter a valid sequence.";
    header("Location: index.php");
}

// function take one parameter and return the number of dots like n =  3 output = 1.1.1
function getNumber($n){
    $nn =[];
    $key = 0;
    while($n > $key){
        $nn[$key] = 1;
        $key++;
    }
    $nn = implode('.', $nn);
    return $nn;
}
// function take one parameter and return next number 
function getNextNumber($n){
   // converting string to array to access the last number
    $nn = explode('.', $n);

    // adding 1 to the last number
    $nn[count($nn) - 1] = $nn[count($nn) - 1] + 1;

    // concat the array to string
    $nn = implode('.', $nn);

    return $nn;

}
function validation($numbers){
    if(empty($numbers)){
        $_SESSION['error'] = "Please enter a sequence.";
        header("Location: index.php");
        exit();
    }
    foreach($numbers as $k => $v){
        if($v == ''){
            $_SESSION['error'] = "Please enter a valid sequence.Empty string found in sequence.";
            header("Location: index.php");
            exit();
        }
        if(is_numeric(str_replace('.', '', $v)) == false){
            $_SESSION['error'] = "Please enter a valid sequence. String found in sequence.";
            header("Location: index.php");
            exit();

        }
    }

}

