<!DOCTYPE html>
<html>
<head>
  <title>Login & Signup</title>
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
    <form class="form" id="signupForm">
      <h2>Log in</h2>
      <input type="text" id="signupUsername" placeholder="Username" required>
      <input type="password" id "signupPassword" placeholder="Password" required>
      <button type="submit">Log in</button>
    </form>
  </div>

  <script>
    const signupForm = document.getElementById("signupForm");
    const signupUsername = document.getElementById("signupUsername");
    const signupPassword = document.getElementById("signupPassword");

    signupForm.addEventListener("submit", function (e) {
      e.preventDefault();
      // Add your signup logic here
      console.log("Signing up with username:", signupUsername.value);
    });
  </script>

<?php
$con=mysqli_connect("localhost","root");
mysqli_select_db($con, "ids");
?>

</body>
</html>