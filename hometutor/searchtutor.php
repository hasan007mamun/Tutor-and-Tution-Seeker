
<html>
<head>
    
    <style>
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
        h1{
            text-align: center;
            font-size: 50px;
        }
        form{
            margin: 20px auto;
            width: 320px;
            
        }
        input{
            padding: 10px;
            font-size: inherit;
        }
        input{
            display: block;
            margin-bottom: 25px;
            width: 100%;
            border: 2px solid steelblue;
        }
        .g_form{
            background-color: green;
            margin-top: 80px;
            width: 100%;
        }
        
        .menu{
            width:100%;
            padding-left: 200px;
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
            background-color:#e5e67cd9;
        }
        .tinfo{
            padding-left: 365px;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .tinfo{}
    </style>
</head>
    
<body>
    <haeder>
       <div class="logo">
         <img src="../img/l.jpg"/>
        </div>
        <div class="menu">
         <ul>
             <li><a href="gpage.php">Home</a></li>
             <li><a href="searchtutor.php">SearchTutor</a></li>
             <li><a href="rating.php">RatingTutor</a></li>
             <li><a href="Logout.php">Logout</a></li>
         </ul>    
        </div>
      </haeder>
 
     <section>
    <div class="g_form">
       <h1>SearchTutors</h1>
        <form method="post" id="s_t">
            <input type="text" placeholder="City_Name" name="c_name">
            <input type="text" placeholder="Postal_code" name="p_code">
            <input type="text" placeholder="Area" name="area">
            <input type="text" placeholder="Salary_Range" name="salary">
            <input type="text" placeholder="Class_Name" name="class">
            <input type="submit" value="Search " name="search">
        </form>
    </div>
    </section>
    

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
    
    session_start();
    
    $gId = $_SESSION["gId"];
  
    if ($gId == ""){
       //   echo "gjf";
        header("Location:guardianlogin.php");
    }
    
  if(isset($_POST['search'])){
      
       $city = $_POST['c_name'];
       $postalcode= $_POST['p_code'];
       $area= $_POST['area'];
       $salary= $_POST['salary'];
       $class= $_POST['class'];
      
      $qr="select t.id,t.name,t.city,t.postal_code,t.area,t.salary_range,t.class_name,avg(r.rating) as rate from tutor as t join rating as r on r.t_id=t.id where city='$city' and postal_code='$postalcode' and area='$area' and salary_range>=$salary and class_name='$class' group by r.t_id having avg(r.rating)";
      $r=mysqli_query($con,$qr);
      $val=mysqli_num_rows($r);
      

          if($val>0)
          {      
            
              ?>
                <h1>List Of MatchingTutors</h1>
                <div class="tinfo">
                <table border="1">
                      <tr>
                          <th>Name</th>
                          <th>City</th>
                          <th>Postal_code</th>
                          <th>Area</th>
                          <th>Salary_Range</th>
                          <th>Class</th>
                          <th>Rating</th>
                       </tr>

               <?php
               while($rows=mysqli_fetch_array($r))
               {
                 ?> 
                 <tr>
                     <td> <a href='request.php?tId=<?php echo $rows['id'] ;?>'><?php echo $rows['name'];?></a> </td>
                     <td><?php echo $rows['city'];?></td>
                     <td><?php echo $rows['postal_code'];?></td>
                     <td><?php echo $rows['area'];?></td>
                     <td><?php echo $rows['salary_range'];?></td>
                     <td><?php echo $rows['class_name'];?></td>
                     <td><?php echo $rows['rate'];?></td>
                 </tr>      
                  <?php
               }
          } 
          else{
             // echo"There is no One";
                 ?>
                   <script>window.alert("No Tutor Match.")</script>
                <?php              
         }
  }
?> 
  </table> 
  </div>                    
  </div>
  </body>
    
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