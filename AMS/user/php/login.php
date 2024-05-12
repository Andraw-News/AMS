<?php 
session_start();

if(isset($_POST['gmail']) && 
   isset($_POST['password'])){

    include "../conn.php";

    $gmail = $_POST['gmail'];
    $pass = $_POST['password'];

    $data = "gmail=".$gmail;
    
    if(empty($gmail)){
      $em = "Email is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
    } else if(empty($pass)){
      $em = "Password is required";
      header("Location: ../index.php?error=$em&$data");
      exit;
    } else {

      $sql = "SELECT * FROM user WHERE gmail = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$gmail]);

        if($stmt->rowCount() == 1){
            $user = $stmt->fetch();

            $username =  $user['gmail'];
            $password =  $user['password'];
            $fname =  $user['fullname'];
            $id =  $user['id'];
            $image =  $user['image'];
            $company = $user['company'];
            $position = $user['position'];
            $facebook = $user['facebook'];

            if($username === $gmail){
                if(password_verify($pass, $password)){
                    $_SESSION['id'] = $id;
                    $_SESSION['fullname'] = $fname;
                    $_SESSION['image'] = $image;
                    $_SESSION['company'] = $company;
                    $_SESSION['position'] = $position;
                    $_SESSION['facebook'] = $facebook;
                    $_SESSION['gmail'] = $gmail;

                    header("Location: ../home1.php");
                    exit;
                } else {
                    $em = "Incorrect email or password";
                    header("Location: ../index.php?error=$em&$data");
                    exit;
                }
            } else {
                $em = "Incorrect email or password";
                header("Location: ../index.php?error=$em&$data");
                exit;
            }

        } else {
            $em = "Incorrect email or password";
            header("Location: ../index.php?error=$em&$data");
            exit;
        }
    }

} else {
  header("Location: ../index.php?error=error");
  exit;
}
?>
