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

$sql = "SELECT `city_id`,`city_name` FROM `city_dt` WHERE `del_flg`=0";
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_city = $query->fetchAll(PDO::FETCH_ASSOC);

$city='';
foreach($arr_city as $val) {
    $city_id = $val['city_id'];
    $city_name = $val['city_name'];
    $city.='<option value="'.$city_id.'">'.$city_name.'</option>';
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
  <script src="js/ph_val.js"></script>
  <script src="js/alpha_space.js"></script>
  <script src="js/alpha.js"></script>
  <script src="js/mar_val.js"></script>
  <script src="js/mar_val1.js"></script>
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
      $("#marks12").hide();
      $("#marks10").hide();
      
            
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

     $("#marks_10").blur(function(){
      var marks=$("#marks_10").val();
            if(marks == 0)
            {
                $("#marks10").show();
                
          }else{
            $("#marks10").hide();
          }

          });

     $("#marks_12").blur(function(){
      var marks=$("#marks_12").val();
            if(marks == 0)
            {
                $("#marks12").show();
            }else{
              $("#marks12").hide();
            }
          });

     $("#stream_id").append($("#stream_id option").remove().sort(function(a, b) {
    var at = $(a).text(), bt = $(b).text();

    return (at > bt)?1:((at < bt)?-1:0);
      }));

     $('#stream_id option').prop('selected', function() {
        return this.defaultSelected;
    });

    $("#city_id").append($("#city_id option").remove().sort(function(a, b) {
    var at = $(a).text(), bt = $(b).text();

    return (at > bt)?1:((at < bt)?-1:0);
      }));

     $('#city_id option').prop('selected', function() {
        return this.defaultSelected;
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
<div class="navbar">
  <a href="home_page.php">Home</a>
  <a href="stream.php">Stream</a>
  <a href="reg_form.php" class="active">Registration Form</a>
  <a href="about.php">About us</a>
  
    <div class="dropdown" style="float: right;">
    <button class="dropbtn">Admin 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="city.php" style="background-color:#f9f9f9;" onmouseover="this.style.background='#f2f2f2';" onmouseout="this.style.background='#f9f9f9';">City</a>
    <a href="#" style="background-color:#f9f9f9;" onmouseover="this.style.background='#f2f2f2';" onmouseout="this.style.background='#f9f9f9';">State</a>
    <a href="log_out.php" style="color: white; background-color: #E91E63;"" onmouseover="this.style.background='#27ae60';" onmouseout="this.style.background='#E91E63';">Log out</a>
  </div>
  </div>
</div>
<div class="container"> 
     <form id="contact" action="" method="post">
    <h3>Student Registration Form</h3>
    <h4>swami vivekananda institute of science and technology</h4>

    <h3 style="font-size: 16px; color: red; font-weight: bold; float: left;"><span name="fnm" id="fnm">*Please enter your first name</span></h3>
    <h3 style="font-size: 16px; color: red; font-weight: bold; float: right; margin-right: 350px"><span name="lnm" id="lnm">*Please enter your last name</span></h3>

    
  <fieldset>
      <input placeholder="Your First Name" type="text" onkeypress="return isAlphaKey(event)" id="fname" name="fname" style="max-width: 47%; width: 47%; float: left;" required />
    
      <input placeholder="Your Last Name" type="text" onkeypress="return isAlphaKey(event)" id="lname" name="lname" style="max-width: 48%; width: 48%; float: right; margin-right: 0;" required />
    </fieldset>                                                              
      
      
     <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="father_nm" id="father_nm">*Please enter your father's name</span></h3>  

    <fieldset>
      <input placeholder="Your Father's Name" type="text" onkeypress="return isAlpha_space(event)" id="father" name="father" style="width: 98%; float: left;" required />
    </fieldset>

    <h3 style="font-size: 16px; color: red; font-weight: bold; "><span name="mother_nm" id="mother_nm">*Please enter your Mother's name</span></h3>                                                                       
    <fieldset>
      <input placeholder="Your Mother's Name" type="text" id="mother" onkeypress="return isAlpha_space(event)" name="mother" style="width: 98%; float: left;" required />
    </fieldset>
    
    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="invalid_email" id="invalid_email">*Please enter your Valid Email_Id</span></h3>
    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="uemail" id="uemail">*Please enter your Email_Id</span></h3>

    <fieldset>
      <input placeholder="Your Email Address" type="email" id="email" name="email" style="width: 98%; float: left;" required />
    </fieldset>

    
    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="ph" id="ph">*Please enter your Phone Number</span></h3>

    <fieldset>

      <select style="height: 40px;width: 5%%;border: 1px solid #dddddd; text-decoration: none;border-radius: 3px;cursor: pointer; color: #888; float: left;" required>

                        <option value="0">+91</h2></option>
                        

      </select>
      
      <input placeholder="Your Phone Number" onkeypress="return NumKey(event)" onblur="return ph_val()" min="7000000000" max="9999999999" maxlength="10" type="tel" id="mob" name="mob" style="width: 92%; float: right;" required="true" />
    </fieldset>

    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="marks10" id="marks10">*Please enter your 10th marks in percentage</span></h3>


    <fieldset>
    <input placeholder="Enter your 10th marks in percentage" maxlength="3" min="1" max="100" onblur="return mar_val()" onkeypress="return NumKey(event)" type="text" id="marks_10" name="marks_10" style="width: 98%; float: right;" required />
    </fieldset>

    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="marks12" id="marks12">*Please enter your 12th marks in percentage</span></h3>
     
    <fieldset>
    <input placeholder="Enter your 12th marks in percentage" onkeypress="return NumKey(event)" onblur="return mar_val1()" maxlength="3" min="1" max="100" type="text" id="marks_12" name="marks_12" style="width: 98%; float: right;" required />
    </fieldset>
    
    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="stream_1" id="stream_1">*Please enter your Stream</span></h3>

   
      <select name="stream_id" value="0" id="stream_id" style="height: 40px;width: 100%;border: 1px solid #dddddd; text-decoration: none;border-radius: 3px;cursor: pointer; color: #888;" required>
      
                        <option value="0" selected="selected">--Select your Stream--</h2></option>
                        <?php echo $option; ?>

      </select>

          

    <h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="add" id="add">*Please enter your Address</span></h3>
        
    <fieldset>
      <textarea placeholder="Type your Address here...." id="addrs" name="addrs" style="width: 98%; float: left;" required /></textarea>
    </fieldset>

    <select name="city_id" id="city_id" style="height: 40px;width: 100%;border: 1px solid #dddddd; text-decoration: none;border-radius: 3px;cursor: pointer; color: #888; margin-top: 10px;" required>

                        <option value="0">--Select your City--</h2></option>
                        <?php echo $city; ?>

      </select>

    <fieldset>
      <button name="submit" type="submit" id="sign_up" style="margin-top: 10px;" onmouseover="this.style.background='#436eee'" onmouseout="this.style.background='#0000cd'">Submit</button>
    </fieldset>
   <center> <p>Designed by Rvsoft Corporation </p></center>
    <center><p style="font-weight: bold;">Made In India with <span style="color: red;">Love</span></p> </center>
  </form>
</div>

</body>
</html>