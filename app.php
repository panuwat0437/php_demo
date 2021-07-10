<?php
require("connection/connectdb.php");
if(isset($_POST['program'])){
    $program = $_POST['program'];
    $program= stripslashes($program);
    $uniqid = sha1(uniqid(rand(),true),false);
    if($program == "delete_data"){
        $id = $_POST['id'];
        $sqldelete = "DELETE FROM `student` WHERE `student_encodeid` = '$id'";
        $query_sql = $connectdb->query($sqldelete);
        if($query_sql){
            echo "ok";
        }else{
            echo "notok";
        }

    }
    else if($program == "insert_data"){
        $uname = $_POST['uname'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $sqlinsertdata = "INSERT INTO `student`(
            `student_encodeid`,
            `student_name`,
            `student_tel`,
            `student_email`
        )
        VALUES('$uniqid','$uname','$tel','$email')";
        $query_sql = $connectdb->query($sqlinsertdata);
        if($query_sql){
            echo "ok";
        }else{
            echo "notok";
        }

    }
    else if($program == "edit_data"){
        $encodeid = $_POST['encodeid'];
        $sqleditdata = "SELECT
        `student_encodeid`,
        `student_name`,
        `student_tel`,
        `student_email`
    FROM
        `student`
    WHERE
        `student_encodeid` = '$encodeid'";
        $query_sql = $connectdb->query($sqleditdata);
        $rowsql = mysqli_fetch_assoc($query_sql);
        if($query_sql){
            $return_arr[] = array("student_name" => $rowsql['student_name'],"student_tel" => $rowsql['student_tel'],
            "student_email" => $rowsql['student_email'], "student_encodeid" => $rowsql['student_encodeid']);
            echo json_encode($return_arr);
        }else{
            echo "notok";
        }

    }

    else if($program == "save_edit_data"){
        $id_data = $_POST['id_data'];
        $uname = $_POST['uname'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $sqlsaveeditdata = "UPDATE
        `student`
    SET
        `student_name` = '$uname',
        `student_tel` = '$tel',
        `student_email` = '$email'
    WHERE
        `student_encodeid` = '$id_data'";
        $query_sql = $connectdb->query($sqlsaveeditdata);
        if($query_sql){
            echo "ok";
        }else{
            echo "notok";
        }

    }

    else{

    }


}


?>