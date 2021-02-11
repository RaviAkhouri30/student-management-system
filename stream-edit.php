<?php
include_once("connection-pdo.php");

$stream_id=$_REQUEST['stream_id'];

$sql = "SELECT `stream_name` FROM `stream_tbl` WHERE del_flg=0  AND `stream_id`=$stream_id";
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_stream = $query->fetchAll(PDO::FETCH_ASSOC);

$stream_name=$arr_stream[0]['stream_name'];
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
    <title>Stream Entry</title>
    <script src="js/jquery.min.js"></script>
  <script src="js/dialog.js"></script>
  <script src="js/pwd.js"></script>
  <script src="js/num.js"></script>
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
   <h3>Update Stream</h3><br>
    

    <center><h3 style="font-size: 16px; color: red; font-weight: bold;"><span name="stm" id="stm">*Please enter Stream Name</span></h3></center>

    <input type="hidden" name="stream_id" id="stream_id" value="<?php echo $stream_id; ?>">
    
   <center> <input type="text" name="stream_name" id="stream_name" value="<?php echo $stream_name; ?>" id="trade_name" style="height: 40px;
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
        var stream_id=$("#stream_id").val();
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
                    'action':'update',
                    'stream_id':stream_id,
                    'stream_name':stream_name
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