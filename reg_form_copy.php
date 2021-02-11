<?php
include_once("connection-pdo.php");

session_start();
if(!isset($_SESSION['user_id'])){
    header("location:index.php");
    exit();
}

$sql = "SELECT `stream_id`,`stream_name` FROM `stream_tbl` WHERE `del_flg`=0";
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_stream = $query->fetchAll(PDO::FETCH_ASSOC);

$option='';
foreach($arr_stream as $val) {
    $stream_id = $val['stream_id'];
    $stream_name = $val['stream_name'];
    $option.='<option value="'.$stream_id.'">'.$stream_name.'</option>';
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>Registration page</title>
	<script src="js/jquery.min.js"></script>
  <script src="js/dialog.js"></script>
  <script src="js/pwd.js"></script>
  <script src="js/num.js"></script>
  <script src="js/alpha.js"></script>
  
  <script type="text/javascript">
    
    $(document).ready(function(){
      $("#fnm").hide();
      $("#lnm").hide();
      $("#father_nm").hide();
      $("#mother_nm").hide();
      $("#uemail").hide();
      $("#ph").hide();
      $("#invalid_ph").hide();
      $("#invalid_email").hide();
      $("#add").hide();
      $("#stream_1").hide();
      
      $("#lname").blur(function(){
        var name = $("#lname").val();
         if (name == '') {
          $("#lnm").show();
         } else {
          $("#lnm").hide();
         }
      });

      $("#fname").blur(function(){
        var name = $("#fname").val();
         if (name == '') {
          $("#fnm").show();
         } else {
          $("#fnm").hide();
         }
      });

      $("#father").blur(function(){
        var name = $("#father").val();
         if (name == '') {
          $("#father_nm").show();
         } else {
          $("#father_nm").hide();
         }
      });

      $("#mother").blur(function(){
        var name = $("#mother").val();
         if (name == '') {
          $("#mother_nm").show();
         } else {
          $("#mother_nm").hide();
         }
      });

         
        $("#email").blur(function()
                {
                    var email = $('#email').val();
          if(email== '')
                    {
                        $('#uemail').show();
            $('#invalid_email').hide();
            return false;
                    }
          if(IsEmail(email)==false)
                    {                 
            $('#invalid_email').show();
            $('#uemail').hide();
            return false;
                    }
          if(IsEmail(email)==true)
                    {
            $('#invalid_email').hide();
            $('#uemail').hide();
          }
        });


      $("#mob").blur(function(){
        var name = $("#mob").val();
        if (name == '') {
          $("#ph").show();
          $("#invalid_ph").hide();
        } else {
          $("#ph").hide();
          $("#invalid_ph").hide();
        }

          });

       $("#mob").blur(function(){
         var name = $("#mob").val();
        var length = name.length();
        if (length != 10) {
          $("#ph").hide();
          $("#invalid_ph").show();
         }
         if (length == 10) {
          $("#ph").hide();
          $("#invalid_ph").show();
          }
       });


      $("#addrs").blur(function(){
        var name = $("#addrs").val();
            if (name == '') {
              $("#add").show();
            } else {
              $("#add").hide();
            } 
      });

     $("#stream_id").blur(function(){
      var stream_id=$("#stream_id").val();
            if(stream_id==0)
            {
                $("#stream_1").show();
            }else{
              $("#stream_1").hide();
            }

          });

    });

    function IsEmail(email) 
            {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!regex.test(email)) 
                {
                   return false;
                }
                else
                {
                   return true;
                }
            }
    
      </script>
	<link rel="stylesheet" href="css/style1.css">

  

</head>
<body>

<div class="container"> 
<ul>
  <li><a href="home_page.php">Home</a></li>
  <li><a href="stream.php">Stream</a></li>
  <li><a href="reg_form.php" class="active">Registration Form</a></li>
  <li><a href="about.php">About us</a></li>
  <li style="float: right;"><a href="log_out.php">Log out</a></li>
</ul>
   
  <form id="contact" action="" method="post">
    <h3>Student Registration Form</h3>
    <h4>swami vivekananda institute of science and technology</h4>

    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="fnm" id="fnm">*Please enter your first name</span></h3>
    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="lnm" id="lnm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*Please enter your last name</span></h3>

    <input placeholder="  Your First Name" type="text" id="fname" onkeypress="return isAlphaKey(event)" name="fname" style="height: 40px;
                                                                max-width: 49%;
                                                                resize: none;
                                                                margin: 0 0 10px;
                                                                min-width: 30%;
                                                                padding: 0;
                                                                width: 50%;
                                                                border: 1px solid #ccc;" 
                                                                onfocus="outline: 0;border: 1px solid #aaa;" />
      
      <input placeholder="  Your Last Name" type="text"  id="lname" name="lname" onkeypress="return isAlphaKey(event)" style="
                                                                            height: 40px;
                                                                            max-width: 49%;
                                                                            resize: none;
                                                                            margin: 0 0 0 10px;
                                                                            min-width: 30%;
                                                                            padding: 0;
                                                                            width: 50%;
                                                                            border: 1px solid #ccc;" />

     <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="father_nm" id="father_nm">*Please enter your father's name</span></h3>  

    <fieldset>
      <input placeholder="Your Father's Name" type="text" onkeypress="return isAlphaKey(event)" id="father" name="father" />
    </fieldset>

    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="mother_nm" id="mother_nm">*Please enter your Mother's name</span></h3>                                                                       
    <fieldset>
      <input placeholder="Your Mother's Name" type="text" id="mother" onkeypress="return isAlphaKey(event)" name="mother" />
    </fieldset>
    
    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="invalid_email" id="invalid_email">*Please enter your Valid Email_Id</span></h3>
    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="uemail" id="uemail">*Please enter your Email_Id</span></h3>

    <fieldset>
      <input placeholder="Your Email Address" type="email" id="email" name="email" />
    </fieldset>

    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="invalid_ph" id="invalid_ph">*Please enter your valid Phone Number</span></h3>
    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="ph" id="ph">*Please enter your Phone Number</span></h3>

    <fieldset>
      <input placeholder="Your Phone Number" onkeypress="return NumKey(event)" type="text" id="mob" name="mob" />
    </fieldset>
    
    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="stream_1" id="stream_1">*Please enter your Stream</span></h3>

   
      <select name="stream_id" id="stream_id" style="height: 40px;width: 100%;border: 1px solid #dddddd; text-decoration: none;border-radius: 3px;cursor: pointer; color: #888;" >

                        <option value="0">--Select your Stream--</h2></option>
                        <?php echo $option; ?>

      </select>

    

    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="add" id="add">*Please enter your Address</span></h3>
        
    <fieldset>
      <textarea placeholder="Type your Address here...." id="addrs" name="addrs" /></textarea>
    </fieldset>

    <fieldset>
      <button name="submit" type="submit" id="sign_up">Submit</button>
    </fieldset>
    <p class="copyright">Designed by </a></p>
  </form>
</div>

</body>
</html>