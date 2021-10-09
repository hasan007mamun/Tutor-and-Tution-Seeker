 <html>
<head>
    
    <style>
        table{
            border: 1 ;
            background-color: aqua;
        }
        .copyright{background:#A8C72D;
           text-align:center;
		   padding:15px;
		   font-size:14px;
		   }
            .main_content{background-color: burlywood}		   
            .footer_blocks{padding:20px 0px;overflow:hidden;height: 150px;}
            #footer .footer_blocks .f_block h1{border-bottom:1px solid black;
                     color:black;font-size:30px;text-align: left;}
            .f_block{width:370px;float:left;margin:0px 10px}		 
            #footer .footer_blocks .f_block .links .url_link{list-style:none;}
            #footer .footer_blocks .f_block .links .url_link li{}
            #footer .footer_blocks .f_block .links .url_link li a{color:black;background-color:burlywood ;
                     text-decoration:none;
                     font-size:15px;
                     text-height:5px;}

            #footer .footer_blocks .f_block .links .url_link li a:hover{text-decoration:underline}
        
        body{
         background-color: green;
        }
        .menu{
            width:100%;
            padding-left: 140px;
        }
        ul{
            margin: 0px;
            padding:0px;
            list-style: none;  
        }
        ul li{
            float: left;
            width: 200px;
            height: 40px;
            opacity: .8;
            line-height: 40px;
            text-align: center;
            font-size: 20px;
            background-color: burlywood;
        }
        ul li a{
            text-decoration: none;
            color:black;
            display: block;
        }
        ul li a:hover{
            background-color: gray;
        }
        ul li ul li{
            display: none;
        }
        ul li:hover ul li{
            display: block;
        }
        .logo{
        background-color:#A8C72D;
        background-size: 100px 100px;    
        width: 100%;
        margin-bottom: 10px;    
        }
        .stable{
            padding-top: 30px;
            padding-left:500px;
            margin-bottom: 5px;
        }
        
    </style>
</head>
    
<body>

    <haeder>
       <div class="logo">
         <img src="../img/l.jpg"/>
        </div>
        <div class="menu">
         <ul>
             <li><a href="tpage.php">Home</a></li>
             <li><a href="tutorinfo.php">ShowRequest</a></li>
             <li><a href="#">Complain</a></li>
             <li><a href="payment.php">Payment</a></li>
             <li><a href="Logout.php">Logout</a></li>
         </ul>    
        </div>
      </haeder> 

</body>    


<div class="stable">
<?php
  

  //connection
  $con=mysqli_connect("localhost", "root", "", "hometutor");

    if($con)
    {
        //echo "ok";
    }
    else{
        die("Connection failed because ".mysqli_connect_error());
    }
    error_reporting(0);
    session_start();
    $tId =  $_SESSION["tutorId"]; 
    //echo $gId;
    
    //<!--Pending -->
    
    ?>
    
     <h3>Pending</h3>
    <?php
      $query="SELECT * FROM bmessage WHERE t_id=' $tId' AND pending='yes' ";
     
      $r=mysqli_query($con,$query);
      $val=mysqli_num_rows($r);
      

          if($val>0)
          {      
            
              ?>
                <form method="post">
    
                <table border="1">
                      <tr>
                         
                          <th>Day</th>
                          <th>Time</th>
                          <th>Salary</th>
                         <th>Action</th>
                         <th>Action</th>
                       </tr>
                    

               <?php
               while($rows=mysqli_fetch_array($r))
               {
                 ?> 
                 <tr>
                
                    
                     
                     <td><?php echo $rows['day'];?></td>
                     <td><?php echo $rows['tutiontime'];?></td>
                     <td><?php echo $rows['salary'];?></td>
                      <td >
                       
                          <a href='Accept.php?bMessageId=<?php echo $rows['id'] ;?>&g_id=<?php echo $rows['g_id'] ;?>  '  >Accept </a>
                          
                     
                     </td>
                     <td>
                         <a href='Reject.php?bMessageId=<?php echo $rows['id'] ;?>&g_id=<?php echo $rows['g_id'] ;?>  ' >Reject </a>
                     </td>
                
                 </tr>      
                
        
                  <?php
               }

          } 
          else{
              echo"There is no One";
         } 
    
?>
  
</table>
    </form>
    
   
    
    <!-- Accept -->
    <hr/>
    <h2>Accept </h2>
    <?php 
     $query="SELECT * FROM bmessage WHERE t_id=' $tId' AND accept = 'yes' AND pending='no' ";
     
      $r=mysqli_query($con,$query);
      $val=mysqli_num_rows($r);
      

          if($val>0)
          {      
            
              ?>
                <table border="1">
                      <tr>
                         
                          <th>Day</th>
                          <th>Time</th>
                          <th>Salary</th>
                          <th>Action</th>
            
                       </tr>
                    

               <?php
               while($rows=mysqli_fetch_array($r))
               {
                 ?> 
                 <tr>
                
                    
                     
                     <td><?php echo $rows['day'];?></td>
                     <td><?php echo $rows['tutiontime'];?></td>
                     <td><?php echo $rows['salary'];?></td>
                      <td >
                       
                          <a href='AcceptedGuardianInfo.php?g_id=<?php echo $rows['g_id'] ;?>  '  >Show Guardian </a>
                          
                     
                     </td>
                
                 </tr>      
                
        
                  <?php
               }
                      
                            
              //header('location: view.php');
             // echo "you have logged in";
          } 
          else{
              echo"There is no One";
         }

  
?>
  
</table>
    
    
    <!-- Reject -->
    <hr/>
     <h3>Reject</h3>
    <?php 
     $query="SELECT * FROM bmessage WHERE t_id=' $tId' AND accept = 'no' AND pending='no' ";
     
      $r=mysqli_query($con,$query);
      $val=mysqli_num_rows($r);
      

          if($val>0)
          {      
            
              ?>
   
                <table border="1">
                      <tr>
                         
                          <th>Day</th>
                          <th>Time</th>
                          <th>Salary</th>
                         
            
                       </tr>
                    

               <?php
               while($rows=mysqli_fetch_array($r))
               {
                 ?> 
                 <tr>
                
                    
                     
                     <td><?php echo $rows['day'];?></td>
                     <td><?php echo $rows['tutiontime'];?></td>
                     <td><?php echo $rows['salary'];?></td>
                    
                     
                
                 </tr>      
                
        
                  <?php
               }
                      
                            
              //header('location: view.php');
             // echo "you have logged in";
          } 
          else{
              echo"There is no One";
         }

  
?>
  
</table>
    
</div>
   
<footer id="footer">
<div class="main_content">
<div class="footer_blocks">

<div class="f_block">
<h1>Follow-Us</h1>

<div class="links">
<ul class="url_link">
<li><a href="#">FaceBook</a></li>
<li><a href="#">Twitter</a></li>
</ul>
</div>
</div>


<div class="f_block">
<h1>Customer-Service</h1>
<span>PhoneNo:01794747894</span><br/>
<span>Email:halmamun27@gmail.com</span>       
</div>

<div class="f_block">
<h1>Payment</h1>
<span>BkashN0:01794747894</span><br/>
<span>RocketNo:017947478941</span>       
</div>

</div>
</div>

<div class="copyright">
<div class="main_content">
&copy;All rights are reserved by VIT.COM
</div>
</div>
</footer>       
</html> 