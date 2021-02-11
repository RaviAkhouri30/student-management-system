<?php
include_once("connection-pdo.php");


$action = $_REQUEST['action'];

switch ($action) {

    case 'save':
        $stream_name = $_REQUEST['stream_name'];


        $sql = "SELECT stream_id  FROM `stream_tbl` WHERE stream_name='$stream_name' AND del_flg=0";
        $query  = $pdoconn->prepare($sql);
        $query->execute();
        $stream_trade = $query->fetchAll(PDO::FETCH_ASSOC);
        if(count($stream_trade)>0)
        {
             
            die('Duplicate Entry...');
            break;
        }

        $sql = "INSERT INTO `stream_tbl`(`stream_name`) VALUE ('$stream_name')";
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
                <th>STREAM NAME</th>
                <th>EDIT</th>
                <th>DELETE</th>';

        $sql = "SELECT `stream_id`,`stream_name` FROM `stream_tbl` WHERE `del_flg`=0";
        $query  = $pdoconn->prepare($sql);
        $query->execute();
        $arr_stream = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($arr_stream as $val)
        {
            $stream_id = $val['stream_id'];
            $stream_name = $val['stream_name'];

            $html.=' </tr>
            <tr>
                <td>'. $stream_id.'</td>
                <td>'.$stream_name.'</td>
                <td> <img src="images/edit.png" style="cursor: pointer" onclick="edit_data('.$val['stream_id'].')" ></td>
                  <td> <img src="images/delete.png"  style="cursor: pointer; width:20px; height:20px;" onclick="delete_data('.$val['stream_id'].')"  ></td>
            </tr>';


        }



        $html.='</table>';

        echo $html;
        break;

    case 'del':

        $stream_id = $_REQUEST['stream_id'];
        $sqlupdate = "UPDATE `stream_tbl` SET `del_flg`=1 WHERE `stream_id`=$stream_id";
        $query  = $pdoconn->prepare($sqlupdate);
        if (!$query->execute()) {
            echo "Error Found..." .$query->errorInfo();
        } else {
            echo "Deleted Successfully";
        }
        break;

    case 'update':

        $stream_id=$_REQUEST['stream_id'];
        $stream_name=$_REQUEST['stream_name'];

        $sql ="UPDATE `stream_tbl` SET `stream_name`='$stream_name' WHERE `stream_id`=$stream_id";
        $query  = $pdoconn->prepare($sql);
        $query->execute();
        if($query)
            echo 'EDITED SUCCESSFULLY';
        else
            echo 'ERROR WHILE EDITING...';

        break;

}

?>
