<?php
    //데이터 베이스 연결하기
    include("./dbconn.php");

    $title = $_POST['title'];
    
    $id = $_POST['id'];
    $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    
    $content = $_POST['content'];
   
    $date = date('YYYY-mm-dd hh:mm:ss ');


    if($title && $id && $pw && $content) {
    
    $sql = "INSERT INTO board (title, id, pw, content, date)
    VALUES ('$title','$id','$pw','$content', now())";

    $result=mysqli_query($conn, $sql);

    echo '게시글 작성이 완료되었습니다.';
    } else {
        echo '게시글 작성 실패'
    }

    //데이터베이스와의 연결 종료
    mysqli_close($conn);



  
        $sql = "insert into board(name,pw,title,content,date) 
            values('".$name."','".$pw."','".$title."','".$content."','".$date."')"; 
        $sql = mysqli_query($conn,$sql);

        echo 
            '게시글 작성이 완료되었습니다.';
            
    } else {
           
            
    }
?>
        

