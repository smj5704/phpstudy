
<?php
    $mysql_host = "localhost";
    $mysql_user = "root";
    $mysql_password = "alswn1227";
     $mysql_db = "test";
    // $mysql_port = "3306";

    $conn = new mysqli($mysql_host , $mysql_user ,$mysql_password, $mysql_db);

    // mysqli_select_db($conn,$mysql_db) or die('연결실패');

    if (!$conn) {
        error_log("연결 실패 : " . mysqli_connect_errno());
        print_r($conn);
    } 

    function mq($sql)
    {
        global $db;
        return $db->query($sql);
    }

    ini_set('display_errors','Off');
    session_start();

    
    
    // $sql = "insert into board(no,title,content,date,id,pw) values('2','test2','board2',now(),'min2','min2');";

    // if(mysqli_query($conn, $sql)) {
    //     echo "새 레코드가 생성되었습니다.";
    // } else {
    //     echo "생성 실패 : " . mysqli_error($conn);
    // }

    // mysqli_close($conn);

    // for($i=0; $row=mysqli_fetch_assoc($result); $i++): 


    ?>


