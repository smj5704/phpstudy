<html>
<head>
<title>게시판 작성 form</title>
<style>

     /* td { 
          font-size : 9pt; 
          }
     A:link {
           font : 9pt; color : black; text-decoration : none;
     font-family : 굴림; font-size : 9pt; 
     }
     A:visited {
           text-decoration : none; color : black; font-size : 9pt; 
           }
     A:hover {
           text-decoration : underline; color : black;
     font-size : 9pt; 
     } */
     a {
          text-decoration-line: none;
          text-decoration: none;
          color : black;
     }
</style>
</head>

<body>
     <?php include("./dbconn.php");?>
     <center>
     <article>
          <h1>자유 게시판 글 쓰기 </h1>
          
          <form action="./boardInsert.php" method=post>

               <table>
                   
                    <tr>
                         <td bgcolor=white>&nbsp;</td>
                
                    <tr>
                    
                         <th width=60 align=left ><label for="id">ID</label></th>
                         <td align=left >
                              <INPUT type="text" name="id" id = "id" >
                         </td>
                    </tr>

                    <tr>
                         <th width=60 align=left ><label for="pw">PW<label</th>
                         <td align=left >
                              <INPUT type="text" name="pw" id="pw">
                         </td>
                    </tr>
                    <tr>
                         <th width=60 align=left ><label for ="title">Title</label></th>
                         <td align=left >
                              <INPUT type="text" name="title" id="title">
                         </td>
                    </tr>
                    <tr>
                         <th width=60 align=left ><label for ="content">content</label></th>
                         <td align=left >
                              <TEXTAREA name="content" id="content"  ></TEXTAREA>
                         </td>
                    </tr>
               </table>
               <div>
                     <input type="submit" value="write"> </input>
                     <a href="./boardList.php" > List </a>
               </div>
                    
          </form>
               
                         <!--                          
                         <INPUT type=reset value="다시 쓰기">
                         &nbsp;&nbsp;
                         <INPUT type=button value="뒤로가기"
                         onclick="history.back(-1)"> 
                          -->
     
     </article>
     <!-- 입력 부분 끝 -->
     </center>
  
</body>
</html>


