<?php
include 'UserModel.php';
$user = new UserModel();
$id = $_GET['id'];
if(session_status() != 2)
  session_start();
$user->setId($id);
$currentUser = mysqli_fetch_array($user->getUserById($id));
$oldPassword = $_POST['current_password'];
if (isset($_POST['update'])) {
  if($currentUser['password'] != md5($oldPassword)){
    $_SESSION['changePasswordTries']--;
    $retriesLeft = $_SESSION['changePasswordTries'];
    if($_SESSION['changePasswordTries'] <= 0){
      session_destroy();
      echo "<script>alert('Current password doesn't match. You don't have anymore retries available.');
      window.location.href = 'logInForm.php'</script>";
       return;
    }
    echo "<script>alert('Current password doesn't match. You don't have anymore retries available.');
    window.location.href = 'editProfile.?id=$id'</script>";
   return;
  }
  $user->setUsername($_POST['username']);
  $user->setPassword(md5($_POST['new_password']));
  $user->setEmail($_POST['email']);
  $user->setAge($_POST['age']);
  $user->setUsertype($currentUser['usetype']);
  $user->setId($id);
  if($_POST['age'] <= 0){
    echo "<script>alert('Age is invalid.');
     document.location='editProfile.php?id=$id'</script>";
    return;
  }
  if($_POST['username'] == $currentUser['username']){
    echo "<script>alert('The data has been overwritten.');
    document.location='editProfile.php?id=$id'</script>";
     $t = $user->update();
     return;
  }
  if ($user->existsByUsername($user->getUsername())) {
    echo "<script>alert('This username already exists.');
     document.location='editProfile.php?id=$id'</script>";
    return;
  } else {
    $updatedUsername = $user->update();
    $_SESSION['username'] = $updatedUsername;
    echo "<script>alert('Updated successfully.');
    document.location='editProfile.php?id=$id'</script>";
    return;
  }
}
echo "<script>alert('Updated not successfully.');
    document.location='editProfile.php?id=$id'</script>";
    return;
?>
