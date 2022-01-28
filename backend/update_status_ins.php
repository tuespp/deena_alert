<?php 

require('../dbconnect.php');

        $id = $_POST['status_id'];

        echo  $id ;

        $sql2 ="SELECT * FROM ins_form WHERE form_id = '$id' ";
        $result2 = mysqli_query($con, $sql2);
       
        foreach($result2 as $value){

             $status =   $value['ins_status'];
        }

        
      

        if($status == '1'){

                $sql3 = "UPDATE ins_form SET ins_status = '0' WHERE form_id =  '$id'";
        
                $result3 = mysqli_query($con, $sql3) ;


        }else{             
                   $sql4 = "UPDATE ins_form SET ins_status = '1' WHERE form_id =  '$id'";
        
                $result4 = mysqli_query($con, $sql4) ;
        } 
        

       /*  $value = $_POST['value']; */
        
    

/*  echo $_POST['value'];*/


?>