<?php
    function countList(){
        if(func_num_args() == 0){
            return false;
        }//end of if
        else{
            $count=0;
            for($i=0; $i<func_num_args(); $i++){
                $count += func_get_arg($i);
            }//end of for
            return $count;
        } //end of else
    }//end of function
    echo countList(1,5,9);
?>
