<?php 


function Clean($input){

     return   strip_tags(trim($input));
}



function validate($input,$flag){

     $status = true;
    switch ($flag) {
        case 1:
            # code...
              if(empty($input)){
                  $status = false;
              }
            break;
        
        case 2: 
            if(strlen($input) < 20){
                $status = false; 
            }
            break;

        case 3:
        # code ... 
        if(strlen($input) < 6){
            $status = false; 
        }
        break;
  


    }

    return $status ; 
}

?>