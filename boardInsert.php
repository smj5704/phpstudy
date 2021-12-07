<?php
    //데이터 베이스 연결하기
    include("./dbconn.php");

    
    $name = $_POST['name'];
    $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('YYYY-mm-dd hh:mm:ss ');

    if($name && $pw && $title && $content){
        $sql = "insert into board(name,pw,title,content,date) 
            values('".$name."','".$pw."','".$title."','".$content."','".$date."')"; 
        $sql = mysqli_query($conn,$sql);

        echo 
            '게시글 작성이 완료되었습니다.';
            
    } else {
           
            
    }
?>
        

