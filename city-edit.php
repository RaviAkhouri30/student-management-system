<?php
include_once("connection-pdo.php");

$city_id=$_REQUEST['city_id'];

$sql = "SELECT `city_name` FROM `city_dt` WHERE del_flg=0  AND `city_id`=$city_id";
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_city = $query->fetchAll(PDO::FETCH_ASSOC);

$city_name=$arr_city[0]['city_name'];
?>


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
    <title>city Entry</title>
    <script src="js/jquery.min.js"></script>
  <script src="js/dialog.js"></script>
  <script src="js/pwd.js"></script>
  <script src="js/num.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#stm").hide();

      $("#city_name").blur(function(){
       var name = $("#city_name").val();
        if (name == '') {
          $("#stm").show();
        } else {
          $("#stm").hide();
        }
      });
    });
    
    </script>
    

    <link rel="stylesheet" href="css/style1.css">
    <style type="text/css">
.container_edit {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

    </style>

</head>
<body>

<div class="container_edit"> 
    
   <form id="contact" action="" method="post">
   <h3>Update city</h3><br>
    

    <center><h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="stm" id="stm">*Please enter city Name</span></h3></center>

    <input type="hidden" name="city_id" id="city_id" value="<?php echo $city_id; ?>">
    
   <center> <input type="text" name="city_name" id="city_name" value="<?php echo $city_name; ?>" id="trade_name" style="height: 40px;
                                                                max-width: 50%;
                                                                resize: none;
                                                                margin: 100px,100px;
                                                                min-width: 10%;
                                                                padding: 0;
                                                                width: 50%;
                                                                border: 1px solid #ccc;
                                                                text-align: center;" 
                                                                onfocus="outline: 0;border: 1px solid #aaa;" /></center>
    <fieldset>
      <center><button name="submit" type="submit" id="sign_up" style="max-width: 48%" onclick="update_data()">Update</button></center>
    </fieldset>
 </form>

       <div id="my_data" style="color: #092756; font-size: 18px; text-align: center;"></div>
   </div>
</body>
</html>

<script>


    $( document ).ready(function() {
        show();

    });


    function update_data()
    {
        var city_id=$("#city_id").val();
        var city_name=$("#city_name").val();

        if(city_name==0)
        {
            alert("Select Your city Name Properly");
            return;
        }

        $.ajax({
            url :'city-db.php',
            type:'POST',
            dataType:'html',
            data :{
                    'action':'update',
                    'city_id':city_id,
                    'city_name':city_name
            },
            beforeSend:function(){
                $('#my_data').html('<img src="images/ajax-loader.gif" alt="Loading...">');


            },
            
            success  :function(data){
                $('#my_data').html('');
                alert(data);
                window.top.close();
                show();
            }
        });
    }

</script>