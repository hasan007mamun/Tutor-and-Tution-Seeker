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

  if(isset($_POST['login'])){
      
       $email = $_POST['email'];
       $password = $_POST['password'];
      
      //echo $email;
      
      $qr="select * from tutor where email='$email' and password='$password'";
      $r=mysqli_query($con,$qr);
      $val=mysqli_num_rows($r);
      $tutorInfo = mysqli_fetch_assoc($r);
 
          
          if($val == 1){
              
                $_SESSION["tutorId"] = $tutorInfo['id'];
        
             //echo $tutorInfo['id'];
    
            header('location:tpage.php');
              
          }
          else{
              //echo"incorrect password or email";
                 ?>
                   <script>window.alert("Password Or Mail Incorrect.")</script>
                 <?php
          }

  }
?>

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
        .menu{
            width:100%;
            padding-left: 200px;
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
                      <li><a id="h"href="guardianlogin.php">Guardian</a></li>      
                  </ul>
             </li>
         </ul>    
        </div>
      </haeder>
    
    <section>
    <div class="g_form">
       <h1>Tutor Login</h1>
        <form method="post" id="t_login">
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
           <input type="submit" value="Login" name="login">
        </form>
    </div>
    </section>
    
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

</body>    
</html>