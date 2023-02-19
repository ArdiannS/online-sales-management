<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <!-- <link rel="stylesheet" type="text/css" href="logInFormStyle2.css"> -->
   <!-- <script src="logInFormScript2.js"></script> -->

   <style type="text/css">
      body {
         background-color: rgb(88, 88, 88);
      }

      .form-group {
         background-color: rgb(195, 192, 192);
         padding: 100px;
         border-radius: 22px;
         border: none;
      }

      form {
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;
         text-align: center;
         height: 100vh;
      }

      input {
         color: gray;
         display: block;
         margin: 20px;
         padding: 10px;
         border: 22px;
         width: 250px;
         height: 30px;
         border-radius: 14px;
      }

      button {
         border: none;
         padding: 10px;
         background-color: #1e65c8;
         border-radius: 12px;
         color: white;
         font-weight: bold;
         cursor: pointer;
         width: 150px;
         height: 40px;
      }

      h1 {
         color: #1e65c8;
         font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      }

      * {
         transition: all 1s ease-in-out;
      }
   </style>
</head>

<body>
   <?php
   ?>
   <form action="signUp.php" method="POST" id="forma" onsubmit="return validationJS();">
      <div class="form-group">
         <h1>Login Form</h1>
         <img src="logooo2.jpg" style="border-radius: 60px;height: 60px; width:70px" alt="">
         <input type="text" name="username" id="username" placeholder="Username">
         <input type="password" name="password" id="password" placeholder="Password">
         <div class="buttons9" id="buttonsPlace"> </div>
         <div class="email" id="emailPlace"></div>
         <button type="submit" id="loginBtn" name="loginBtn" onclick="showOnly();">Login</button>
         <!-- <button type="submit" id="registerBtn" name="registerBtn" onclick="showEmail();">Register</button> -->
         <p id="paragrafi">Don't have an account , <a onclick="showEmail();"
               style="text-decoration: underline; cursor: pointer;">Sign Up</a></p>
         <p id="error"></p>
      </div>
   </form>
   <script type="text/javascript">
      function validationJS() {
         var name = document.getElementById("username");
         var password = document.getElementById("password");
         var age = document.getElementById("age");
         var email = document.getElementById("email");
         var passwordInput = document.getElementById("passwordInput");
         if (name.value.trim() == "") {
            name.style.border = "solid 3px red";
            setTimeout(function () {
               name.style.border = "none";
            }, 3000);
            document.getElementById("error").innerHTML = "Shenoni Username!";
            return false;
         } else if (password.value.trim() == "") {
            password.style.border = "solid 3px red";
            document.getElementById("error").innerHTML = "Shenoni Password!";
            setTimeout(function () {
               password.style.border = "none";
            }, 3000);
            return false;
         }
         else if (password.value != passwordInput.value) {
            passwordInput.style.border = "solid 3px red";
            setTimeout(function () {
               name.style.border = "none";
            }, 3000);
            document.getElementById("error").innerHTML = "Passwordi duhet te jete i njejte";
            return false;
         } else if (email.value.trim() == "") {
            email.style.border = "solid 3px red";
            setTimeout(function () {
               name.style.border = "none";
            }, 3000);
            document.getElementById("error").innerHTML = "Email nuk duhet te jete i zbrazet";
            return false;
         } else if (age.value <= 0) {
            age.style.border = "solid 3px red";
            setTimeout(function () {
               name.style.border = "none";
            }, 3000);
            document.getElementById("error").innerHTML = "Mosha nuk duhet te jete negative";
            return false;
         }
      }




      const form = document.getElementById("emailPlace");
      const second = document.getElementById("buttonsPlace");



      const passwordInput = document.createElement('input');
      passwordInput.setAttribute('type', 'password');
      passwordInput.setAttribute('name', 'password');
      passwordInput.setAttribute('id', 'passwordInput');
      passwordInput.setAttribute('placeholder', 'Confirm Your Password');

      const email = document.createElement("input");
      email.setAttribute("type", "email");
      email.setAttribute("name", "email");
      email.setAttribute("id", "email");
      email.setAttribute("placeholder", "Email");

      const age = document.createElement("input");
      age.setAttribute("type", "number");
      age.setAttribute("name", "age");
      age.setAttribute("id", "age");
      age.setAttribute("placeholder", "Age");

      const SignIn = document.createElement("a");
      SignIn.setAttribute("href", "");
      SignIn.setAttribute("id", "SignIn");
      SignIn.textContent = "Already have an account ? Sign In";
      SignIn.style.textDecoration = "none";
      SignIn.style.color = "black";

      const textParts = SignIn.textContent.split("?");
      const textToUnderline = textParts[1].trim();

      const underlinedLink = document.createElement("a");
      underlinedLink.textContent = textToUnderline;

      const underlinedText = document.createElement("a");
      underlinedText.textContent = textToUnderline;
      underlinedText.setAttribute("href", "");
      underlinedText.style.color = "black";

      SignIn.innerHTML = textParts[0] + "? ";





      const button = document.createElement("button");
      button.type = "submit";
      button.id = "registerBtn";
      button.name = "registerBtn";
      button.innerHTML = "Register";
      button.style.display = "block";
      button.style.marginLeft = "80px"
      button.style.marginTop = "25px";



      function showEmail() {
         form.append(passwordInput, email, age, SignIn, underlinedText, button);
         document.getElementById("email").style.display = "block";
         document.getElementById("age").style.display = "block";
         document.getElementById("passwordInput").style.display = "block";
         document.getElementById("paragrafi").style.display = "none";
         document.getElementById("loginBtn").style.display = "none";
      }
      function showOnly() {
         document.getElementById("email").style.display = "none";
         document.getElementById("age").style.display = "none";

      }
   </script>
</body>

</html>