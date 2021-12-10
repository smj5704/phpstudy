
<?php 
            include("./dbconn.php");


        ?>
<html>
<head>

<meta charset="UTF-8">
<title>login Page</title>
	<style>
        * {
            margin: 0;
            padding: 0;
        }
        
        #body {
            width: 100%;
            height: 850px;
            display: flex;
        }
        
        #body #login_area {
            width: 70%;
            height: 500px;
            margin: auto; 
            padding-top: 5%;
        }
        
     
        #body #login_area fieldset {
            height: 450px;
            width: 50%;
            margin: auto;
        }
        
        #body #login_area fieldset #form_title {
            font-size: 30px;
            text-align: center;
            height: 50px;
            margin-top: 3%;
        }
        
        #body #login_area fieldset #login_input input {
            width: 90%;
            height: 40px;
            display: flex;
            position: relative;
            top: 15px;
            left: 30px;
        }
        
        #body #login_area fieldset #login_save {
            font-size: 20px;
            position: relative;
            top: 20px;
            left: 30px;
        }
        
        #body #login_area fieldset #login_bt {
           
            display: block;
            width: 90%;
            height: 60px;
            text-align: center;
            text-decoration-line: none;
            font-size: 20px;
            position: relative;
            top: 13px;
            left: 30px;
            
        }
        #body #login_area fieldset #login_bt:hover {
            background-color: gray;
        }
        #body #login_area fieldset #login_bt span {
            vertical-align: middle;
        }
       
        #body #login_area fieldset #login_a {
            margin: auto;
            width: 90%;
            text-align: center;
            position: relative;
            top: 60px;
            display: flex;
            justify-content: flex-start;
            font-size: 25px;
        }
      
        #body #login_area fieldset #login_a a:hover {
            text-decoration-line: underline;
            opacity: 1;
                font-size: 23px;
        }
        #body #login_area fieldset #login_a a {
            font-size: 20px;
            float: right;
            text-decoration-line: none;
            color: gray;
            
            opacity: 0.6;

            transition: 0.3s;
        }
      
      
        
    </style>
</head>
<body>
	

    <div id="body">
        <div id="login_area">
            
            <form name="loginform" action="./loginProcess.php" method="post">
                <fieldset>
                    <div id="form_title"> Login Page! </div>
                    <hr>
                    <div id="login_input">
                        <input type="text" name="mid" id="mid" placeholder="아이디를 입력해 주세요.">
                        <br>
                        <input type="password" name="mpw" id="mpw" placeholder="비밀번호를 입력해 주세요.">
                    </div>
                   
                    <br>
                    <button type=submit id="login_bt" >[ login ] </button>      
                         
                    <div id="login_a">
                        <a id="login_a1" href="./joinForm.php">[ Join ]</a>
                    </div>
                   
                </fieldset>
            </form>
        </div>
    </div>
    
    
 
</body>
</html>