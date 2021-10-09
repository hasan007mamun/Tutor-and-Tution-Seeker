 <?php


 $con=mysqli_connect("localhost", "root", "", "hometutor");

    if($con)
    {
        //echo "ok";
    }
    else{
        die("Connection failed because ".mysqli_connect_error());
    }
     session_start();
    
    $gId = $_GET["g_id"];
    $bMessageId = $_GET["bMessageId"];

    echo $gId;
    echo $bMessageId;

     //accept button click
  
        //ec
      //echo $email;
      
      $qr="UPDATE bmessage SET accept='no',pending='no'  WHERE id='$bMessageId'  ";
      mysqli_query($con,$qr);
     
 
       header('location: tutorinfo.php');     
    ?>