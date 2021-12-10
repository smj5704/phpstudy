<?php
  include("./dbconn.php");

    $bno=$_GET['no'];

    $sql = "delete from board where no='".$bno."'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo $sql;exit;
        echo "<script>alert('게시물이 삭제되었습니다.');</script>";
        echo "<script>location.href=('./boardList.php');</script>";
    } else{
    echo "게시글 삭제 실패 : " . mysqli_error($conn);
    mysqli_close($conn);

}

  ?>