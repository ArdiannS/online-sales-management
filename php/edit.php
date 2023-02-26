<?php

include 'UserModel.php';
$user = new UserModel();
$id = $_GET['id'];
$user->setId($id);
$admin = $user->getCurrentUser();
$adminID = $admin['id'];
$currentUser = mysqli_fetch_array($user->getUserById($id));
if (isset($_POST['update'])) {
  if($_POST['username'] == null || $_POST['password'] == null || $_POST['email'] == null || $_POST['age'] == null){
    echo "<script>alert('The data has been overwritten.');
    document.location='edit.php?id=$id'</script>";
    return;
  }
  if($_POST['age'] < 0){
    echo "<script>alert('The data has been overwritten.');
    document.location='edit.php?id=$id'</script>";
    return;
  }
  $user->setUsername($_POST['username']);
  $user->setPassword(md5($_POST['password']));
  $user->setEmail($_POST['email']);
  $user->setAge($_POST['age']);
  $user->setUsertype($_POST['usetype']);
  $user->setId($id);
  $user->setLastEditedBy($admin['username']);
  if($currentUser['username'] == $_POST['username']){
    $u = $user->update();
    echo "<script>alert('The data has been overwritten.');
    document.location='dashboard.php'</script>";
   return;
  }
  if ($user->existsByUsername($user->getUsername())) {
    echo "<script>alert('ky Username ekzsiton');
     document.location='edit.php?id=$id'</script>";
    return;
  } else {
    $updatedUsername = $user->update();
    echo "<script>alert('The data has been overwritten.');
     document.location='dashboard.php'</script>";
    return;
    if ($updatedUsername != null) {
      $useri = $user->getCurrentUser();
    } else {
      echo "<script>alert('Ka ndodhur nje problem');
     document.location='profie.php'</script>";
    }
  }
}

$editingData = $user->editUserById($id);
$userData = $editingData;


?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/mysingUPstyle.css" />
  <title>Formulari i Regjistrimit</title>
</head>

<body>
  <form action="" method="POST">
    <?php
      ?>
      <div id="formulari">
        <h1>Edit
          <?php echo $userData['username'] . 's' ?> User
        </h1>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" placeholder="Username"
          value="<?php echo $userData['username'] ?>">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Password"
          value="<?php echo $userData['password'] ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $userData['email'] ?>">
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" placeholder="Age" value="<?php echo $userData['age'] ?>">
        <select name="usetype">
             <option value="ADMIN">ADMIN</option>
             <option value="USER">USER</option>
        </select>
        <button name='update'>Edito</button>
      </div>
      <?php
    
    ?>

  </form>
  <style>
    <head><style>

    /* CSS styles */
    #formulari {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f2f2f2;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    input[type=text],
    input[type=password],
    input[type=email],
    input[type=number] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: none;
      border-radius: 4px;
      background-color: #fff;
    }

    button[name=update] {
      background-color: #4CAF50;
      color: #fff;
      padding: 12px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      font-size: 16px;
    }

    button[name=update]:hover {
      background-color: #45a049;
    }
  </style>
  </head>

  </style>
</body>

</html>