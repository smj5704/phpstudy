<html>
<head>
<title>게시판 작성 form</title>
<style>
     body{
          width: 100%;
          margin: auto;
        
     }
 
  
     a {
          text-decoration-line: none;
          text-decoration: none;
          color : black;
     }
     div {
          padding : 20px;
     }
    
     textarea { 
          height: 30px;
          width: 100%;
          resize: none;
          
     }
     button {
          opacity: 0.6;

          transition: 0.3s;
          
          border: none;

          cursor: pointer;

          background-color: white;
          
          font-size: 20px;

          text-align: center;
     }

     button:hover {
          opacity: 1;
          font-size: 25px;
     }
     
</style>
</head>

<body>
     <?php include("./dbconn.php");?>
     
     
   
     <center>
           <div style = "width:800px; padding : 50px;">
          
               <div class = "writeTable" >
                <h3 style="text-align: center;">자유 게시판 글 쓰기 </h3>
                    <form action="./boardInsert.php" method=post>

                              <div class="insert_title">
                                   <textarea  style="border: 0.8px solid darkgray; " name="title" id="title" rows="1" cols="80" placeholder="제목을 입력하세요" maxlength="100" required></textarea>
                              </div>
                              
                              <div id = "insert_idpw" >
                                   <label for="id">ID</label> <INPUT  style="border:  0.8px solid darkgray;" type="text" name="id" id = "id" placeholder="아이디를 입력하세요">
                                   <label for="pw">PW<label><INPUT  style="border: 0.8px solid darkgray;" type="text" name="pw" id="pw" placeholder="비밀번호를 입력하세요">
                              </div>
                              


                              <div id="insert_content">
                                   <textarea  style="border: 0.8px solid darkgray; height:100px;" rows="15" cols="55" name="content" id="content" placeholder="내용을 입력하세요" maxlength="100" required></textarea>
                              </div>


                              <center>
                              <div class="bt_se">
                                   <button type="submit" >[ Write ]</button>
                              </div>
                              </center>
                    </form>
               </div>
           </div>
     </center>
                    
                    

    
  
</body>
</html>


