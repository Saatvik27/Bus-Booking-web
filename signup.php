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
    button {
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
    <form class="form" id="signupForm"  >
      <h2>Sign Up</h2>
      <input type="text" id="signupUsername" name='user' placeholder="Username" required>
      <input type="text" id="email" name='email' placeholder="email id" required>
      <input type="password" id ="signupPassword1" name='pass' placeholder="Password" required>
      <input type="password" id ="signupPassword" placeholder="confirm Password" required>
      <button type="submit" name="submit" onclick="confirmPassword()">Sign Up</button>
      <div class="login">
	<a href="signup.php">account already exsist?log in</a>
</div>
    </form>
  </div>



<?php
$con=mysqli_connect("localhost","root","");
if (mysqli_connect_errno()){
echo ("error in connecting*-");}

$q1="use ids;";
mysqli_query($con, $q1);

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $user = $_POST['user'];

    $query = "insert into login_ids VALUES ('$user', '$email', '$pass');";
    
    if(mysqli_query($con, $query)){
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>

<script>

const signupForm = document.getElementById("signupForm");
const signupUsername = document.getElementById("signupUsername");
const password = document.getElementById("signupPassword1");
const confirmPasswordInput = document.getElementById("signupPassword");

signupForm.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent the default form submission

    const enteredPassword = password.value;
    const enteredConfirmPassword = confirmPasswordInput.value;

    if (enteredPassword === enteredConfirmPassword) {
        alert('Password confirmed!');
        window.location.href = "home_page.php";
    } else {
        alert('Passwords do not match. Please try again.');
    }
});

  </script>
</body>
</html>
