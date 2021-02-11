<?php
include_once("connection-pdo.php");

session_start();

if(isset($_POST['sign_in']))
{
    if(empty($_POST['user_id']) || empty($_POST['pwd']))
    {
        $message='*ALL FIELDS ARE REQUIRED';
    }
    else
    {

        $sql = "SELECT * FROM `user_dt` WHERE `user_id`=:user_id AND `pwd`=:pwd";

        $query  = $pdoconn->prepare($sql);
        $query->execute(
            array(
                'user_id'=>$_POST["user_id"],
                'pwd'=> md5($_POST["pwd"])
            )
        );
        $count=$query->rowCount();
        if($count>0)
        {
            $_SESSION['user_id']=$_POST["user_id"];
            
            header('location: home_page.php');
        }
        else
        {
            $message='*WRONG USERNAME AND PASSWORD';
        }

    }
}

$msg_error='';
if(isset($_REQUEST['msg']))
{
    $msg_error=$_REQUEST['msg'];
}

?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login page</title>
  <link rel="stylesheet" href="css/style.css">
  
  <style>
.form_error{
  color: red;
  text-align: center;
  align-content: center;
  font-weight: bold;
   }

  </style>
  <script src="js/jquery.min.js"></script>
  <script src="js/dialog.js"></script>
  <script src="js/pwd.js"></script>
  <script type="text/javascript"> 
    $(document).ready(function(){
      $("#uname").hide();
      $("#pass").hide();

      $("#user_id").blur(function(){
        var name = $("#user_id").val();
         if (name == '') {
          $("#uname").show();
         } else {
          $("#uname").hide();
         }
      });

      $("#pwd").blur(function(){
        var password = $("#pwd").val();
         if (password == '') {
          $("#pass").show();
         } else {
          $("#pass").hide();
         }
      });
    });
     
  </script>

</head>

<body>
  <div class="vid-container">
  <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
      <source src="video/video_bg.webm" type="video/webm">
  </video>
  <div class="inner-container">
    
      <div class="box">
      <h1>Login</h1>

        <?php
    if(isset($message))
     {
        echo '<h1 style="font-size: 16px; color: #ff1c1c; font-weight: bold; text-align: center; font-family: "Arial Hebrew", Arial, sans-serif;">'.$message.'</h1>';
    }
        ?>

         <div id="msg_error" style="font-size: 16px; font-weight: bold; color: #ff1c1c; text-align: center; font-family: "Arial Hebrew", Arial, sans-serif;"> <?php echo $msg_error; ?> </div>


      <form method="post" onsubmit="return dialog()">

      <center><span class="form_error" name="uname " id="uname">*Please enter User Name</span></center>
      <center><span class="form_error" name="pass " id="pass">*Please enter your Password</span></center>
      <input type="text" name="user_id" id="user_id" placeholder="Username"/>

      <input type="Password" onkeypress="return ispwd(event)" name="pwd" id="pwd" placeholder="Password"/>

      <input type="submit" name="sign_in" id="sign_in" value="Sign In" style="background:#0000cd;border:0;color:#fff;padding:10px;font-size:20px;width:330px;margin:20px auto;display:block;cursor:pointer;"  onmouseover="this.style.background='#436eee'" onmouseout="this.style.background='#0000cd'" />

      
      </form>
    </div>
  </div>
</div>
    
</body>
</html>
