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
  if(isset($_POST['register'])){
      
       $username = $_POST['username'];
       $c_name = $_POST['c_name'];
       $p_code = $_POST['p_code'];
       $area = $_POST['area'];
       $salary = $_POST['salary'];
       $class=$_POST['class'];
       $p_no = $_POST['p_no'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $c_password = $_POST['c_password'];
      
      //echo $email;
      
      $qr="select * from guardian where email='$email'";
      $r=mysqli_query($con,$qr);
      $val=mysqli_num_rows($r);

      if($password == $c_password) { 
 
          //name	city	postal_code	area	salary_range	class_name	phone_no	email	password

          
          if($val == 0){
             $sql = "INSERT INTO tutor(name, city, postal_code, area, salary_range, class_name, phone_no, email, password) values('$username','$c_name','$p_code','$area','$salary','$class','$p_no','$email','$password')";
              mysqli_query($con, $sql);

              
              ?>
                <script>window.alert("You Have successfully Create an Accountt.")</script>
             <?php
              header('location: mindex.php'); 
          }
          else{
              //echo"mail already exits";
              ?>
                <script>window.alert("Mail Already Exists.")</script>
             <?php
          }
          
      }
      else{
         // echo"confirm password not match";
             ?>
                <script>window.alert("Confirm Passwoed doesn't Match.")</script>
             <?php
      }
  }
?>

<html>
<head>
    
    <style>
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
        .copyright{background:#A8C72D;
           text-align:center;
		   padding:15px;
		   font-size:14px;
		   }
            footer#footer{background-color: burlywood;height: 200px;}		   
            .footer_blocks{padding:20px 0px;overflow:hidden;height: 150px;}
            #footer .footer_blocks .f_block h1{border-bottom:1px solid black;
                     color:black;font-size:30px;text-align: left;}
            .f_block{width:370px;float:left;margin:0px 10px}		 
            #footer .footer_blocks .f_block .links .url_link{list-style:none;}
            #footer .footer_blocks .f_block .links .url_link li{}
            #footer .footer_blocks .f_block .links .url_link li a{color:black;background-color:burlywood ;
                     text-decoration: none;
                     font-size:15px;
                     text-height:5px;}

            #footer .footer_blocks .f_block .links .url_link li a:hover{text-decoration:underline}
        
        body{
         background-color: green;
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
    </style>
</head>
    
<body>

    <haeder>
       <div class="logo">
         <img src="../img/l.jpg"/>
        </div>
        <div class="menu">
         <ul>
             <li><a id="h"href="mindex.php">Home</a></li>
             <li><a id="g"href="guardiansignup.php">Gurdian-SignUp</a></li>
             <li><a id="ts"href="t_sign.php">Tutor-SignUp</a></li>
             <li><a id="l"href="#">Login</a>
                  <ul>
                      <li><a id="h"href="t_login.php">Tutor</a></li>
                      <li><a id="h"href="g_login.php">Guardian</a></li>      
                  </ul>
             </li>
         </ul>    
        </div>
      </haeder>
    
    <section>
    <div class="g_form">
       <h1>Tutor Form</h1>
        <form method="post" id="t_signup">
            <input type="text" placeholder="Full-Name" name="username">
            <input type="text" placeholder="City_Name" name="c_name">
            <input type="text" placeholder="Postal_code" name="p_code">
            <input type="text" placeholder="Area" name="area"> 
            <input type="text" placeholder="Salary_Range" name="salary">
            <input type="text" placeholder="Class_Name" name="class">
            <input type="text" placeholder="Phone_no" name="p_no">
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
             <input type="password" placeholder="Confirm_password" name="c_password">
            <input type="submit" name="register">
        </form>
    </div>
    </section> 
      
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