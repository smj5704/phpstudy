

<?php   include("./dbconn.php");
        
    

   

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
             ul li {
               
                padding : 10px;
                 
                text-align: right;
                 list-style: none;
             } 


             .writeCount ul li a:hover {
                     color:blue;
                     font-size: 20px;
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
                    <!-- 페이징 처리 --> 
                   
                       
                         
                
                         
                       
<tfoot>

           
                    <tbody>
                   
                        <div>
                            
                       <?php 

                        if(isset($_GET["page"])){
                            $page = $_GET["page"]; //현재페이지
                            $block = $_GET["block"]; //현재 블럭
                            }else{
                                $page = 1; //게시판 처음 들어가면 1페이지
                                $block = 1;
                            }
                            
                       //게시물 개수 조회
                        $sql = "select count(*) as  'cnt' from board";
                        //쿼리 실행
                        $result = mysqli_query($conn, $sql);
                        //쿼리를 통해 얻은 레코드를 1개씩 리턴
                        $row = mysqli_fetch_assoc($result);
                        $total_count = $row['cnt'];
                    
                        $startDataRow = ($page-1)*10;

                        //리스트 조회. 시간대별로
                        $sql = "select * from board order by no asc limit $startDataRow , 10";
                        //쿼리 실행
                        $result = mysqli_query($conn, $sql);
                                        for($i=0; $row=mysqli_fetch_assoc($result); $i++):
                            
                            ?> 
                           
                            <!-- 값 찍어내기 -->
                            <tr >
                                <td width = "70" > 
                                    <?php echo  $row['no']?>
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
                        </div>
                        
                      
               
                    

                    
                        
                       
                        </tbody>
                       
                </table>
               
                <div style="height:50px;"></div>
                
               
                    
                 <!-- 페이징 출력 -->
 <?php

//현재 페이지 번호 받아옹기
    

        $conn = mysqli_connect("localhost","root","alswn1227","test");
           $sql_p="select *from board"; //전체 데이터 갯수 불러오기
           $result_p=mysqli_query($conn, $sql_p);
           $totalPage = ceil(mysqli_num_rows($result_p)/10);
           $totalBlock = ceil($totalPage/10);
           $startDataRow = ($page-1)*10;
           
           $queryLimit = "select * from board order by no desc limit $startDataRow,10";
           $rsLimit = mysqli_query($conn,$queryLimit);
           
          
               ?>
               <!-- 화면 출력 -->
              <?php 
              $block = ceil($page/10); //페이지 번호가 10을 넘어가기 전까지 이 블록은 항상 1
              
              //이전 버튼
              
                    if($page <= 1)
                    {
                      
                    }else{
                    $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
                     
                      echo "<a href='?page=1'>[ 처음으로 가기 ]$nbsp$nbsp$nbsp</a>";
                      
                      echo "<a href='?page=$pre'>[ ◀ ]$nbsp$nbsp$nbsp </a>";
                       //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
                    }
                    //페이지 번호 출력
                    $startPage=($block-1)*10+1;
                    $endPage = $startPage+9;
                        for($i=$startPage;$i<=$endPage; $i++) {
                            if($page==$i) $col="red"; //현재페이지 색깔 표시
                            else $col= "darkgray";

                            if($i>$totalPage) {break;} //페이지 더 없으면 넘어가기
                            print " <a href='./boardList.php?page=$i&block=$block'>
                                       <font color = $col>".$i."</font>
                                    </a>";
                            }
                 
                    
                    if($block >= $totalBlock){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                    }else{
                      $next = $page + 1; //next변수에 page + 1을 해준다.
                      echo "<a href='?page=$next'>[ ▶ ]</a>$nbsp$nbsp$nbsp";
                       //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                    }
                   

                    if($page >= $totalPage){ //만약 page가 페이지수보다 크거나 같다면
                       //마지막 글자에 긁은 빨간색을 적용한다.
                    }else{
                      echo "<a href='?page=$totalPage'>[ 마지막으로 가기 ]</a>"; //아니라면 마지막글자에 total_page를 링크한다.
                    }

           

    
              

               ?>
               
                <div style="height:50px;"></div>
            
                       
              

                </center>

                <div style="height:50px;"></div>

                <div class="writeCount" style="float: right; padding: 20px 100px 0px 100px;">
                    <ul>
                        <li>
                            <a href="./boardwrite.php" >[ Write ]</a>
                        </li>
                        <li>
                            <caption >TOTAL 게시물 : <?php echo number_format($total_count) ?> 개</caption>
                        </li>
                    </ul>
                </div>
               
            
       

        <?php mysqli_close($conn); ?>
    </body>
</html>