<?php 
session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {

    include "../conn.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = "username=".$username;
    
    if(empty($username)){
      $em = "Username is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
    } else if(empty($password)){
      $em = "Password is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
    } else {

      $sql = "SELECT * FROM admin WHERE username = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$username]);

      // Fetching the user
      $user = $stmt->fetch();

      // If user exists
      if($user) {
          // Verify password
          if($password === $user['password']) {
              // Password is correct, set session variables and redirect
              $_SESSION['username'] = $username;
              header("Location: ../admin/dashboard.php");
              exit;
          } else {
              // Password is incorrect
              $em = "Incorrect username or password";
              header("Location: ../index.php?error=$em&$data");
              exit;
          }
      } else {
          // User does not exist
          $em = "Incorrect username or password";
          header("Location: ../index.php?error=$em&$data");
          exit;
      }
    }

} else {
  header("Location: ../index.php?error=error");
  exit;
}
?>
