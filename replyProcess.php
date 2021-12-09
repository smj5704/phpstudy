<?php
 include("./dbconn.php");

    $rno = $_GET[$row['no']];
    $bno = $_GET['id']; //게시물번호
    $id = $_POST['id'];
    $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT); //암호화
    $content = $_POST['content'];
   
    $date = date('YYYY-mm-dd hh:mm:ss ');

    $sqlr =  "INSERT INTO reply (board_no,id, pw, content, date)
    VALUES ('".$bno."','".$id."','".$pw."','".$content."', now())";

    $resultr=mysqli_query($conn, $sqlr);

   
    if($resultr) {
        
    echo "<script>alert('댓글작성이 완료되었습니다.');</script>";
    echo "<script>location.href=('./boardView.php?id=$bno');</script>";
    } else {
        echo $sqlr; exit;
        echo "게시글 작성 실패 : " . mysqli_error($conn);
        mysqli_close($conn);
   
    }

	
?>