<?php
 include("./dbconn.php");

    $rno = $_GET[$row['rno']];
    $bno = $_GET['id']; //게시물번호
    $rid = $_POST['rid'];
    $rpw = password_hash($_POST['rpw'], PASSWORD_DEFAULT); //암호화
    $rcontent = $_POST['rcontent'];
    $parent = $_GET[$row['parent']];
    $date = date('YYYY-mm-dd hh:mm:ss ');

    $sqlr =  "INSERT INTO reply (board_no,rid, rpw, rcontent, rdate,parent)
    VALUES ('".$bno."','".$rid."','".$rpw."','".$rcontent."', now(),'".$parent."')";

    $resultr=mysqli_query($conn, $sqlr);

   
    if($resultr) {
       
    echo "<script>alert('댓글작성이 완료되었습니다.');</script>";
    echo "<script>location.href=('./boardView.php?id=$bno');</script>";
    } else {
        echo $sqlr;
        echo "게시글 작성 실패 : " . mysqli_error($conn);
        mysqli_close($conn);
   
    }

	
?>