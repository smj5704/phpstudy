<?php 
            include("./dbconn.php");


        ?>
<html>
    <head>
        <title>게시물 수정하기</title>
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
        <?php 
        $bno = $_GET['no']; //bno에 id값을 받아와서 넣음
        $sql = "select * from board where no ='".$bno."'";
        $result = mysqli_query($conn, $sql);
       $board = mysqli_fetch_array($result);
       
        ?>
      <!--해당 게시글불러오기-->
        <form action="./boardModifyProcess.php?no=<?php echo $bno;?>" method="post">
        
       
                <table class = "board_modify">
                    <tr>    
                        <th colspan = "3">
                        <input id="title" type="text" name="title" id="title" value="<?php echo $board['title'];?>" required/>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            작성자 : <?= $board['id'] ?>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <input type="text" name="content" id="content" value="<?php echo $board['content']; ?>" required/>
                        </td>
                    </tr>
                </table>
                    
                <div>
                    <input type="password" name="pw" id="pw"  placeholder="새 비밀번호" required/> 
                </div>
            
                
                <div style="height:50px;"></div>
                <!-- 목록, 수정, 삭제 -->
                <div >
                    
                        <a href="./boardList.php">[ Go List ] &nbsp;&nbsp;&nbsp;</a>
                        <button type="submit">[ Edit ] &nbsp;&nbsp;&nbsp;</button>
                        <a href="boardDelete.php?idx=<?php echo $board['no']; ?>">[ Delete ]</a>
                    
                </div>
           
        </form>
    </body>
</html>