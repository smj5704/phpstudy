<?php
    //데이터 베이스 연결하기
    include("./dbconn.php");

    $title = $_POST['title'];
    
    $id = $_POST['id'];
    $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT); //해쉬값으로 암호화
    
    $content = $_POST['content'];
   
    $date = date('YYYY-mm-dd hh:mm:ss ');


    // if($title && $id && $pw && $content) {
    
    $sql =  "INSERT INTO board (title, id, pw, content, date)
    VALUES ('".$title."','".$id."','".$pw."','".$content."', now())";
    $result=mysqli_query($conn, $sql);

    if($result) {
    echo "<script>alert('게시글 작성이 완료되었습니다.');</script>";
    echo "<script>location.href=('./boardList.php');</script>";
    } else {

        echo "게시글 작성 실패 : " . mysqli_error($conn);
        mysqli_close($conn);
   
    }


  
      ?>
        

