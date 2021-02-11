<?php
include_once("connection-pdo.php");


$action = $_REQUEST['action'];

switch ($action) {

    case 'save':
        $city_name = $_REQUEST['city_name'];


        $sql = "SELECT city_id  FROM `city_dt` WHERE city_name='$city_name' AND del_flg=0";
        $query  = $pdoconn->prepare($sql);
        $query->execute();
        $city_trade = $query->fetchAll(PDO::FETCH_ASSOC);
        if(count($city_trade)>0)
        {
             
            die('Duplicate Entry...');
            break;
        }

        $sql = "INSERT INTO `city_dt`(`city_name`) VALUE ('$city_name')";
        $query = $pdoconn->prepare($sql);
        if (!$query->execute()) {
            echo "Not Saved..." . $query->errorInfo();
        } else {
            echo "Saved Successfully ";
        }
        break;

    case 'show':
        $html='';
        $html.='<table class="responstable">
            <tr>
                <th>S.No</th>
                <th>CITY NAME</th>
                <th>EDIT</th>
                <th>DELETE</th>';

        $sql = "SELECT `city_id`,`city_name` FROM `city_dt` WHERE `del_flg`=0";
        $query  = $pdoconn->prepare($sql);
        $query->execute();
        $arr_city = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($arr_city as $val)
        {
            $city_id = $val['city_id'];
            $city_name = $val['city_name'];

            $html.=' </tr>
            <tr>
                <td>'. $city_id.'</td>
                <td>'.$city_name.'</td>
                <td> <img src="images/edit.png" style="cursor: pointer" onclick="edit_data('.$val['city_id'].')" ></td>
                  <td> <img src="images/delete.png"  style="cursor: pointer; width:20px; height:20px;" onclick="delete_data('.$val['city_id'].')"  ></td>
            </tr>';


        }



        $html.='</table>';

        echo $html;
        break;

    case 'del':

        $city_id = $_REQUEST['city_id'];
        $sqlupdate = "UPDATE `city_dt` SET `del_flg`=1 WHERE `city_id`=$city_id";
        $query  = $pdoconn->prepare($sqlupdate);
        if (!$query->execute()) {
            echo "Error Found..." .$query->errorInfo();
        } else {
            echo "Deleted Successfully";
        }
        break;

    case 'update':

        $city_id=$_REQUEST['city_id'];
        $city_name=$_REQUEST['city_name'];

        $sql ="UPDATE `city_dt` SET `city_name`='$city_name' WHERE `city_id`=$city_id";
        $query  = $pdoconn->prepare($sql);
        $query->execute();
        if($query)
            echo 'EDITED SUCCESSFULLY';
        else
            echo 'ERROR WHILE EDITING...';

        break;

}

?>
