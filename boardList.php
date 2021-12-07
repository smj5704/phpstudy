<?php include("./dbconn.php");

    //게시물 개수 조회
    $sql = "select count(*) as  'cnt' from board";
    //쿼리 실행
    $result = mysqli_query($conn, $sql);
    //쿼리를 통해 얻은 레코드를 1개씩 리턴
    $row = mysqli_fetch_assoc($result);
    $total_count = $row['cnt'];

    //리스트 조회. 시간대별로
    $sql = "select * from board order by date desc";
    //쿼리 실행
    $result = mysqli_query($conn, $sql);

    


?>


<html>
    <head>
        <title>게시판</title>
        
        <style>
           body {
           
            margin: 30px;
           }
           table {
                width: 100%;
                height: 200px;
                
                margin:auto;
                text-align: center;
                font-size: 14px;
                padding: 20px 100px 0px 100px;

            }

            tr {
                border:1px solid darkgray;
                height: 50px;
                font-size: 20px;
            }
            thead {
                background-color: darkgray;
            }
            a {
              
                 text-decoration-line: none;
                text-decoration: none;
                color : black;
             }
             


        </style>

        <!-- <script>
            $(function(){
            $(".read_click").click(function(){
                var action_url = $(this).attr("data-action");
                $(location).attr("href",action_url);
            });
        }); -->
    </script>
    </head>
    
    <body>
    
        
        <center>
            <h2>자유 게시판</h2>
            <form action="#" method="post">
            
                <table>
                
                    <thead>
                        
                            <th>번호</th>
                            <th>제목</th>
                            <th>작성자</th>
                            <th>작성일</th>
                            <th>조회수</th>
                            
                    </thead>

                    <!-- 값 찍어내기 -->
                    <tbody>
                        <?php
                        
                            for($i=0; $row=mysqli_fetch_assoc($result);$i++):
                            
                            ?>
                    
                            <tr >
                                <td width = "70" > 
                                    <?php echo $i+1?> 
                                </td>
                                <td width = "500"> 
                                    <a href="./boardView.php?id=<?php echo $row["no"];?>">
                                    <?php echo $row['title'] ?></a>
                                </td>
                                <td width = "120">
                                    <?php echo $row['id'] ?>
                                </td>
                                <td width = "100">
                                    <?php echo $row['date'] ?>
                                </td>
                                <td width = "70">
                                    <?php echo $row['hit'] ?>
                                </td>
                                
                            </tr>
                            
                        <?php endfor; ?>
                        
                        </tbody>
                </table>
                <div style="height:50px;"></div>
                </center>
                <div style="float: right; padding: 20px 100px 0px 100px;">
                <caption>TOTAL 게시물 : <?php echo number_format($total_count) ?> 개</caption>
                <!-- <a href="./boardList.php">[ Go List ] &nbsp;&nbsp;&nbsp;</a></li> -->
                    <!-- <a href="#"> [ Edit ] &nbsp;&nbsp;&nbsp; </a>
                    <a href="#"> [ Delete ] </a> -->
                </div>
            
       

        <?php mysqli_close($conn); ?>
    </body>
</html>