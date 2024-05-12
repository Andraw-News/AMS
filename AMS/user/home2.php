<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fullname']) && isset($_SESSION['company']) && isset($_SESSION['facebook']) && isset($_SESSION['gmail'])) {

include "conn.php";
include 'php/user.php';
$user = getUserById($_SESSION['id'], $conn);

 ?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.20.0/css/mdb.lite.min.css">

	<title></title>
  
</head>
<body>

<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">

      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center "
              style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img src="upload/profiles/<?=$user['image']?>"
                alt="No image" class="img-fluid my-5 " style="width: 120px; border-radius: 10px;">
                <div class="fallback-image"></div>
              <h5><?=$user['fullname']?></h5>
              <div>
              <a href="edit1.php" class="btn btn-info btn-sm">
            	Edit Info
            </a>
            <a href="logout.php" class="btn btn-danger btn-sm">
            	Logout
            </a>
        		</div>
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
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
                <h3>Information</h3>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?=$user['gmail']?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Company</h6>
                    <p class="text-muted"><?=$user['company']?></p>
                  </div>
                </div>

                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Position</h6>
                    <p class="text-muted"><?=$user['position']?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Facebook</h6>
                    <p class="text-muted"><?=$user['facebook']?></p>
                  </div>
                </div>
                <div class="row pt-1">
                  <div class="col-12 mb-3" >
                    <h6>Resume</h6>
                    <p><a href="upload/documents/<?=$user['documents']?>"><?=$user['documents']?></a></p>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>

<?php }else {
    header("Location: index.php");
    exit;
} ?>