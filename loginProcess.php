<?php
include("./dbconn.php");


$mid = $_POST['mid']; 

$mpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

if(!$mid || !$mpw) {
    echo "<script>alert('아이디와 비밀번호를 입력해주세요!');</script>";
    echo "<script>location.href=('./loginForm.php');</script>";
    exit;
}

//회원테이블에 해당 아이디가 존재하는가
$sql = "SELECT * FRO member WHERE mid = '".$mid."'";

$result = mysqli_query($conn, $sql);

$member = mysqli_fetch_assoc($result);

//비밀번호 암호화
$sql = "SELECT PASSWORD('$mpw') as pass";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$password = $row['pass'];

if(!$member['mid']||!($password == $member['mpw'])) {
    echo "<script>alert('로그인에 실패하였습니다. 아이디와 비밀번호를 확인해주세요!');</script>";
    echo "<script>location.href=('./loginForm.php');</script>";
    exit;
}

$_SESSION['ss_mb_id'] = $mid;

mysqli_close($conn);

if(isset($_SESSION['ss_mb_id'])) {
    echo "<script>alert('로그인!');</script>";
    echo "<script>location.replace=('./memberList.php');</script>";
}
?>