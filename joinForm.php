<?php
include("./dbconn.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>회원 가입 페이지</title>
<style>
	table{
		margin : auto;
		width : 400px;
		border : 1px solid gray;
		text-align : center;
	}
	.td_title{
		font-weight : bold;
		font-size : x-large;
	}
</style>
</head>
<body>
	<form name="joinform" action="joinProcess.php" method="post" >
        <table border="1">
            <tr>
                <td colspan="2" class="td_title">
                    회원가입 페이지
                </td>
            </tr>
            <tr>
                <td><label for="id">아이디 : </label></td>
                <td><input type="text" name="id" id="id"></td>
            </tr>
            <tr>
                <td><label for="pass">비밀번호 : </label></td>
                <td><input type="password" name="pass" id="pass"></td>
            </tr>
            <tr>
                <td><label for="text">이름 : </label></td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td><label for="age">나이 : </label></td>
                <td><input type="text" name="age" id="age"></td>
            </tr>
            <tr>
                <td><label for="gender1"></label>성별 :</td>
                <td>
                    <input type="radio" id="gender1" name="gender" checked value="남">남자
                    <input type="radio" id="gender2" name="gender" value="여">여자
                </td>
            </tr>
            <tr>
                <td><label for="email">이메일 : </label></td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            <tr>
                <td colspan="2">
                   
                </td>
            </tr>
        </table>
    </form>
</body>
</html>