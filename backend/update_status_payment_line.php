<?php 

require('../dbconnect.php');

        $id = $_POST['status_id'];

        echo  $id ;

        $sql2 ="SELECT * FROM data_insurance WHERE id = '$id' ";
        $result2 = mysqli_query($con, $sql2);
       
        foreach($result2 as $value){

             $status =   $value['status'];
        }

        
      

        if($status == '1'){

                $sql3 = "UPDATE data_insurance SET status = '0' WHERE id =  '$id'";
        
                $result3 = mysqli_query($con, $sql3) ;


        }else{             
                   $sql4 = "UPDATE data_insurance SET status = '1' WHERE id =  '$id'";
        
                $result4 = mysqli_query($con, $sql4) ;
        } 
        

       /*  $value = $_POST['value']; */
        
    

/*  echo $_POST['value'];*/


?>