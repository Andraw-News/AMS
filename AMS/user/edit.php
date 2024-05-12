<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fullname']) && isset($_SESSION['company']) && isset($_SESSION['position']) && isset($_SESSION['facebook']) && isset($_SESSION['gmail'])) {
include "conn.php";
include 'php/user.php';

$user = getUserById($_SESSION['id'], $conn);

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php if ($user) { ?>

<section class="vh-100 gradient-custom justify-content-center align-items-center">
  <div class="container ">
    <div class="justify-content-center">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px; width: 500px; left: 50%;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Edit Profile</h3>
            <form action="php/edit.php" method="POST" enctype="multipart/form-data">
                <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>

            <?php if(isset($_GET['success'])){ ?>
            <div class="alert alert-success" role="alert">
              <?php echo $_GET['success']; ?>
            </div>
            <?php } ?>
              <div class="mb-4">
                <div class="form-outline">
                  <label class="form-label" for="gmail">Email</label>
                  <input type="text" id="gmail" name="gmail" class="form-control form-control-lg" value="<?php echo $user['gmail']?>">
                </div>
              </div>

              <div class="mb-4">
                <div class="form-outline">
                  <label class="form-label" for="fullname">Full Name</label>
                  <input type="text" id="fullname" name="fullname" class="form-control form-control-lg" value="<?php echo $user['fullname']?>">
                </div>
              </div>

              <div class="mb-4">
                <div class="form-outline">
                  <label for="company" class="form-label">Company</label>
                  <input type="text" class="form-control form-control-lg" id="company" name="company" value="<?php echo $user['company']?>">
                </div>
              </div>

              <div class="mb-4">
                <div class="form-outline">
                  <label class="form-label" for="position">Position</label>
                  <input type="text" id="position" name="position" class="form-control form-control-lg" value="<?php echo $user['position']?>">
                </div>
              </div>

              <div class="mb-4">
                <div class="form-outline">
                  <label class="form-label" for="facebook">Facebook</label>
                  <input type="text" id="facebook" name="facebook" class="form-control form-control-lg" value="<?php echo $user['facebook']?>">
                </div>
              </div>

              <div class="mb-4">
                <div class="form-outline">
                  <label class="form-label" for="image">Your Current Picture</label><br>
                  <img src="upload/profiles/<?=$user['image']?>" class="img-fluid my-3" alt="No Image" style="width: 120px; border-radius: 10px;">
                        <input type="file" class="form-control" name="image" id="image">
                        <input type="text" hidden="hidden" class="form-control" name="old_pp" value="<?=$user['image']?>">
                </div>
              </div>

              <div class="mb-4">
                <div class="form-outline">
                  <label class="form-label" for="document">Resume</label><br>
                    <input type="file" class="form-control" name="document" id="document">
                    <input type="text" hidden="hidden" class="form-control" name="old_doc" value="<?=$user['documents']?>">
                </div>
              </div>

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Save" />
                <a class="account-dialog-link" style="color: gray;" href="home2.php">Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <?php }else{ 
        header("Location: home.php");
        exit;

    } ?>
</body>
</html>

<?php }else {
    header("Location: login.php");
    exit;
} ?>