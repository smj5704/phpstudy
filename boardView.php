<?php 
            include("./dbconn.php");


        ?>
<html>
    <head><meta charset="utf-8"/>
        <title>게시물 상세보기</title>
        <style>
            body {
                margin: 30px;
                width: 90%;
               
            }

            .boardView{
                text-align: center;
                display: flex;
            justify-content: center;
            border-collapse: collapse;
             
               
             font-size: 14px;
            }
           .dadat_view {
               border : none;
           }

            table {
                width: 800px;;
            }
            .reply_view {
                width: 800px;
                margin-top: 100px;
                word-break: break-all;
            }

            .dat_view {
                font-size : 14px; 
                padding: 10px 0 15px 0;
                text-align: center;
                
            }

            tr, th, td{
                
                height: 50px;
                border-bottom: 1px solid darkgray;
            }
            a {
                
                text-decoration-line: none;
                text-decoration: none;
                color : darkgray;
                opacity: 0.6;
                transition: 0.3s;
            }

             button {
                border: none;

                cursor: pointer;

                background-color: white;
               
                color : darkgray;

                text-align: center;

                opacity: 0.6;

                transition: 0.3s;
            }

            button:hover {
                color:gray;
                opacity: 1;
                font-size: 20px;
                font-weight: 900px;
            }

            a:hover {
                         opacity: 1;
                        font-weight: 900px;
                        color:gray;
                        font-size: 20px;
                }
            .dap_ins {
                    margin-top:50px;
                    }    

            textarea {  
                height: 60px;
                width: 100%;
                resize: none;
                
                }
            .dap_ins input {
                width: 30%;
               margin-right: 10px;
            }
        </style>
    </head>

    <body>
        
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
      <div class="boardView">
            <table >
                <tr>    
                    <th colspan = "3" style="text-align:left;">
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
                        <td colspan="3" style="height:500px; text-align:center;">
                         <?php echo $board['content']?>
                        </td>
                    </tr>
                
            </table>
            <div style="height:20px;"></div>
                <!-- 목록, 수정, 삭제 -->
            <div >
                    
                <a href="./boardList.php">[ Go List ] &nbsp;&nbsp;&nbsp;</a>
                <a href="./boardModify.php?idx=<?php echo $board['id']; ?>">[ Edit ] &nbsp;&nbsp;&nbsp;</a>
                <a href="boardDelete.php?idx=<?php echo $board['id']; ?>">[ Delete ]</a>
                    
            </div>
        </div>

        <div style="height:20px;"></div>
            
        <!--댓글 불러오기 -->
        
        <div  class = "reply_view">
        
        <h4 style="text-align: center;">< Reply List ></h4>
            <?php
               
                $sql3 = "select * from reply where board_no='".$bno."' order by id asc";
                $result = mysqli_query($conn, $sql3);

               

                for($j=0; $row=mysqli_fetch_assoc($result);$j++):
            ?>
            <div class="dat_view">
                <table class="dat_view">
                
                    <tr>
                        <th width = "50">
                            no<?= $row['no']?>
                        </th>
                        <th width = "50">
                           id : <?= $row['id']?>
                        </th>
                        
                        <td width = "120">
                           date : <?= $row['date'] ?>
                        </td>
                       
                    </tr>
                    <tr>
                        <td colspan = "3" style="height:100px;" >
                            <?= $row['content'] ?>
                        </td>
                    </tr>
                    
                
                </table>
                <!-- 대댓글 불러옹기 -->
                <?php 
                $rno = $row['no'];
                
                $sql3_r = "select * from reply where parent= (select min(no) from reply) order by id asc";
               echo $sql3_r;exit;
                // echo $sql3_r;exit;
                $result_r = mysqli_query($conn, $sql3_r);

                    for ($r=0; $row=mysqli_fetch_assoc($result_r);$r++) :
                        ?>
                <table class="dadat_view">
                 <tr>
                        <th width = "50">
                            ===>
                        </th>
                        <th width = "50">
                           id : <?= $row['id']?>
                        </th>
                        
                        <td width = "120">
                           date : <?= $row['date'] ?>
                        </td>
                       <td width = "50">
                            <?= $row['no'] ?>
                        </td>
                        <td  width = "120">
                            <?= $row['content'] ?>
                        </td>
                    </tr>

                </table>
                <?php 
                    endfor;
                    ?>
                <!--대댓글 작성 란 -->
                <div class = "rereply" style = "float:right; " > 
                    <div style = "margin-bottom:10px;">
                        <b > [ <?= $row['id'];?> 님의  답글 작성 ]</b>
                    </div>

                    <div id="noneDiv">
                        <form  action="./replyProcess.php?bno=<? echo $bno; ?> && rno=<? echo $rno; ?>" method="post">
                            <input type="text" name="id" id="id" class="id" size="15" placeholder="아이디를 입력하세요">
                            <input type="password" name="pw" id="pw" class="pw" size="15" placeholder="비밀번호를 입력하세요">
                            <div style="margin-top:10px; ">
                                <textarea name="content" class="content" id="content" ></textarea>
                            </div>
                            
                            <button >[ re ]</button>
                            <a class="dat_edit_bt"> [ edit ] </a>
                            <a class="dat_delete_bt"> [ delete ] </a>
                        </form>
                    </div>
                </div>
           

            </div>
           
            <?php
               endfor;
               ?>
               
            <!--댓글 작성란 -->
            <div class="dap_ins">
                <form action="./replyProcess.php?id=<?php echo $bno; ?>" method="post">
                <h5>[ 댓글 작성 ]</h5>
                    <input type="text" name="id" id="id" class="id" size="15" placeholder="아이디를 입력하세요">
                    <input type="password" name="pw" id="pw" class="pw" size="15" placeholder="비밀번호를 입력하세요">
                    <div style="margin-top:10px; ">
                        <textarea name="content" class="content" id="content" ></textarea>
                        <button style = "margin-top:10px;" id="rep_bt" >[reply write]</button>
                    </div>
                </form>
	        </div>

                </div>
               
               
         

        </div>
       

    </body>
</html>