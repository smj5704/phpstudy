<?php 
            include("./dbconn.php");


        ?>
<html>
    <head>
        <title>게시물 상세보기</title>
        <style>
            body {
                margin: 30px;
            }

            .board_view {
                width: 800px;
                
                border-collapse: collapse;
                margin:auto;
                text-align: center;
                font-size: 14px;
                padding: 20px 300px 0px 300px;
                border:1px solid darkgray;
            }

            tr, th, td{
                
                height: 50px;
                font-size: 20px;
            }
        a {
              
              text-decoration-line: none;
             text-decoration: none;
             color : black;
          }
          .reply_view {
            width: 800px;
           text-align: center;
            border-top: none; 
            border-bottom: none; 
            border-left: none; 
            border-right: none; 


          }
        </style>
    </head>

    <body>
        <center>
        <?php 
        $bno = $_GET['id']; //bno에 id값을 받아와서 넣음
        $hit = "select * from board where id ='".$bno."'";
		$hit = mysqli_query($conn,$hit);
		$hit = mysqli_fetch_array($hit);
        $hit = $hit['hit'] + 1;
		$fet = "update board set hit = '".$hit."' where no = '".$bno."'"; // 쓰이는부분?
		$fet = mysqli_query($conn,$fet);
		$sql = "select * from board where no='".$bno."'"; /* 받아온 idx값을 선택 */
		$sql = mysqli_query($conn,$sql);
		$board = mysqli_fetch_array($sql);

        ?>
      <!--해당 게시글불러오기-->
            <table class = "board_view">
                <tr>    
                    <th colspan = "3">
                        <?php echo $board['title'] ?>
                    </th>
                </tr>

                
                    <tr>
                        <td>
                            작성자 : <?php echo $board['id'] ?>
                        </td>
                        <td >
                            작성일 : <?php echo $board['date'] ?> 
                        </td>
                        <td >
                            조회 : <?php echo $board['hit'] ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                         <?php echo $board['content']?>
                        </td>
                    </tr>
                
            </table>
        <div style="height:50px;"></div>
            <!-- 목록, 수정, 삭제 -->
            <div >
                
                    <a href="./boardList.php">[ Go List ] &nbsp;&nbsp;&nbsp;</a>
                    <a href="./boardModify.php?idx=<?php echo $board['id']; ?>">[ Edit ] &nbsp;&nbsp;&nbsp;</a>
                    <a href="boardDelete.php?idx=<?php echo $board['id']; ?>">[ Delete ]</a>
                
            </div>
        </div>

        <!--댓글 불러오기 -->
        <div >
            <h3>댓글 목록</h3>
            <?php
                $sql3 = "select * from reply where board_no='".$bno."' order by id desc";
                $result = mysqli_query($conn, $sql3);
                for($j=0; $row=mysqli_fetch_assoc($result);$j++):
            ?>

            <table class = "reply_view">
                <tr>
                    <th width = "50px">
                        <?php echo $row['id'];?>
                    </th>
                    
                    <td widtj = "120">
                    <?php echo $row['date']; ?>
                    </td>
                    <td>
                        <div width = "500"></div>
                    </td>
                </tr>
                <tr>
                    <td colspan = "2" >
                        <?php echo $row['content']; ?>
                    </td>
                </tr>
                
                <?php
               endfor;
               ?>
            </table>
            <div style = "text-align: left; padding-left : 1000px;">
                    
                    <a href="#"> [ 답글 ] </a>
                
            </div>
            
               
         

        </div>
        </center>

    </body>
</html>