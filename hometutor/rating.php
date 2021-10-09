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
        echo "gjf";
        header("Location:guardianlogin.php");
    }
    //$tid = $_GET['tId'];
    //echo $tid;
    
     if(isset($_POST['submit'])){
      
       $Id = $_POST['id'];
       $rating = $_POST['rating'];
    

     $sql = "INSERT INTO rating(g_id, t_id,rating) values(' $gId','$Id','$rating')";
      mysqli_query($con, $sql);
            ?>
                <script>window.alert("You Have successfully Create an Accountt.")</script>
             <?php
      header('location: gpage.php'); 
             
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
        .rating{
            padding-top: 60px;
        }
        input{
            width: 60px 60px;
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
             <li><a href="gpage.php">Home</a></li>
             <li><a href="searchtutor.php">SearchTutor</a></li>
             <li><a href="GuardianInfo.php">ShowRequest</a></li>
             <li><a href="#">RatingTutor</a></li>
             <li><a href="Logout.php">Logout</a></li>
         </ul>    
        </div>
      </haeder>
    
    <div class="rating">
        <form method="post">
            <center>
                <h1>Tutor-Id & Rating</h1>
                <input type="text" placeholder="Id" name="id">
                <select name="rating">
                   <option>===ratingValue==</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                 <input type="submit" value="submit" name="submit">
            </center>   
        </form>
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

</body>    
</html>