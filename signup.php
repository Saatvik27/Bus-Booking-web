<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(139.06deg, #2b3693 1.86%, #0a0e30 56.22%);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
    }
    .form {
      display: flex;
      flex-direction: column;
      width: 250px;
      margin: 10px;
    }
    h2 {
      text-align: center;
      margin: 10px 0;
    }

    .login{
position: relative;
left: 20px;
color:white;
top:10px;

    }

    input {
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .myButton {
      padding: 10px;
      background-color: #007BFF;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>


  <div class="container">
    <form class="form" id="signupForm" >
      <h2>Sign Up</h2>
      <input type="text" id="signupUsername" name='user' placeholder="Username" required>
      <input type="text" id="email" name='email' placeholder="email id" required>
      <input type="password" id ="password" name='pass' placeholder="Password" required>
      <input type="password" id ="confirmpassword" placeholder="confirm Password" required>
      <input type="submit" class="myButton" name="submit" onclick="confirmPassword()">
      <div class="login">
	<a href="signup.php">account already exsist?log in</a>
</div>
    </form>
  </div>

<script>
    const confirmpassword = document.getElementById("confirmpassword");
    const signupForm = document.getElementById("signupForm");
    const password1 = document.getElementById("password");

    signupForm.addEventListener("submit", function (e) {
        e.preventDefault();
        if (password.value === confirmpassword.value) {
            alert('Password confirmed!');
            // You can proceed with the form submission here if the passwords match.
            signupForm.submit();
        } else {
            alert('Passwords do not match. Please try again.');
        }
    });
</script>

<?php
$con=mysqli_connect("localhost","root");
if(mysqli_connect_errno()){
  echo "".mysqli_connect_error();
}
mysqli_query($con,"create database if not exists ids");
if(mysqli_errno($con)){
  echo "";
}
mysqli_select_db($con, "ids");
mysqli_query( $con,"create table if not exists login_ids(username varchar(20),email_id varchar(40),password varchar(16))");
if(mysqli_errno($con)){
  echo "".mysqli_error($con);
}
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$user = $_POST['user'];
 	$que="insert into login_ids values('$user','$email', '$pass')";
	mysqli_query($con,$que);
}
?>
</body>
</html>