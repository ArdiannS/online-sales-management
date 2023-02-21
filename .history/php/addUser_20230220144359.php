<?php 
    
?>
<style>
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
<html>

<form action="registerAdmin.php" method="POST" id="forma" >
      <div class="form-group">
         <h1>Add User</h1>
         <img src="logooo2.jpg" style="border-radius: 60px;height: 60px; width:70px" alt="">
         <input type="text" name="username" id="username" placeholder="Username">
         <input type="password" name="password" id="password" placeholder="Password">
         <input type="Email" name="email" id="email" placeholder="Email">
         <input type="number" name="age" id="age" placeholder="age">
         <input type="text" name="usetype" id="usetype" placeholder="UserType">
         <button type="submit" id="RegisterBtn" name="RegisterBtn">Add User</button>
    
      </div>
</form>



?>
