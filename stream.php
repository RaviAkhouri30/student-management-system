<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>Stream Entry</title>
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
      $("#stm").hide();

      $("#stream_name").blur(function(){
       var name = $("#stream_name").val();
        if (name == '') {
          $("#stm").show();
        } else {
          $("#stm").hide();
        }
      });
    });
    
    </script>
    

	<link rel="stylesheet" href="css/style1.css">

</head>
<body>

  <body>
 <div class="navbar">
  <a href="home_page.php">Home</a>
  <a href="stream.php"  class="active">Stream</a>
  <a href="reg_form.php">Registration Form</a>
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
   <h3>Stream Entry</h3><br>
    
    <center><h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="stm" id="stm">*Please enter Stream Name</span></h3></center>
    
    <center><input placeholder="   Stream" type="text" id="stream_name" name="stream_name" style="height: 40px;
                                                                max-width: 50%;
                                                                resize: none;
                                                                margin: 100px,100px;
                                                                min-width: 30%;
                                                                padding: 0;
                                                                width: 50%;
                                                                border: 1px solid #ccc;" 
                                                                onfocus="outline: 0;border: 1px solid #aaa;" /></center><br>
      
      
    <fieldset>
      <center><button name="submit" type="submit" id="sign_up" style="max-width: 25%;background-color: #0000cd;" onmouseover="this.style.background='#436eee'" onmouseout="this.style.background='#0000cd'" onclick="save_data()">Save</button></center>
    </fieldset>
 </form>

       <div id="my_data" style="color: #092756; font-size: 18px; text-align: center;"></div>

        <table>

        </table>


    </div>


<script>

    function save_data()

    {
        var stream_name=$("#stream_name").val();
        if(stream_name==0)
        {
            alert("Select Your Stream Name Properly");
            return;
        }

        $.ajax({
            url :'stream-db.php',
            type:'POST',
            dataType:'html',
            data :{
                   'action':'save',
                   'stream_name':stream_name
            },
            beforeSend:function(){
                $('#my_data').html('<img src="images/ajax-loader.gif" alt="Loading...">');


            },
            success  :function(data){
                $('#my_data').html(data);

                show();
            }
        });
    }

    function show()    //show function is used to show the content of the table on the page.
    {

        $.ajax({
            url :'stream-db.php',
            type:'POST',
            dataType:'html',
            data :{
                'action':'show'
            },
            beforeSend:function(){
                $('#my_data').html('<img src="images/ajax-loader.gif" alt="Loading...">');

            },
            
            success  :function(data){
               $('#my_data').html(data);
               

            }
        });
    }

    $( document ).ready(function() {
        show();

    });

    function delete_data(stream_id)
    {
        $.ajax({
            url :'stream-db.php',
            type:'POST',
            dataType:'html',
            data :{
                'action':'del',
                'stream_id':stream_id
            },
            beforeSend:function(){
                $('#my_data').html('<img src="images/ajax-loader.gif" alt="Loading...">');
            },
            
            success  :function(data){
                $('#my_data').html(data);
                show();
            }
        });
    }

    function edit_data(stream_id)
    {
        myWindow = window.open("stream-edit.php?stream_id="+stream_id, "myWindow", "width=600,height=500");

    }


</script>

</body>
</html>