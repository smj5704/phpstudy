<?php
include("./dbconn.php");

$bno = $_GET['no']; // no값을 get으로 받아서 $bno에 넣음

$id = $_POST['id'];

$pw = password_hash($_POST['pw'], PASSWORD_DEFAULT); //해쉬암호화
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('YYYY-mm-dd hh:mm:ss ');

$sql = "update board set  pw='".$pw."', title='".$title."',content='".$content."' where no='".$bno."'"; 

$result = mysqli_query($conn,$sql);


if($result) {
    echo $sql;exit;
    echo "<script>alert('게시물이 수정되었습니다.');</script>";
    echo "<script>location.href=('./boardView.php?no=$bno');</script>";
} else{
    echo $result;
echo "게시글 수정 실패 : " . mysqli_error($conn);
mysqli_close($conn);

}

?>