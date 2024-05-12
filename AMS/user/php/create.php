<?php

if(isset($_POST['fullname']) && 
   isset($_POST['gmail']) &&  
   isset($_POST['password']) &&
   isset($_POST['company']) &&
   isset($_POST['position']) &&
   isset($_POST['facebook']) &&
   isset($_POST['birthday']) &&
   isset($_POST['contact']) &&
   isset($_POST['compaddress']) &&
   isset($_POST['compcontact']) &&
   isset($_POST['years']) &&
   isset($_POST['description'])){

    include "../conn.php";

    $fname = $_POST['fullname'];
    $gmail = $_POST['gmail'];
    $pass = $_POST['password'];
    $company = $_POST['company'];
    $position = $_POST['position'];
    $facebook = $_POST['facebook'];
    $birthday = $_POST['birthday'];
    $contact = $_POST['contact'];
    $compaddress = $_POST['compaddress'];
    $compcontact = $_POST['compcontact'];
    $years = $_POST['years'];
    $description = $_POST['description'];



    $data = "fname=".$fname."&gmail=".$gmail;
    
    if (empty($fname) || empty($gmail) || empty($pass)) {
        $em = "Full name, Gmail, and password are required";
        header("Location: ../signup.php?error=$em&$data");
        exit;
    } else {
        // hashing the password
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        // Check if the fullname already exists in the database
        $check_sql = "SELECT * FROM user WHERE fullname = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->execute([$fname]);
        $existing_user = $check_stmt->fetch();

        if($existing_user){
            $em = "Account already exists";
            header("Location: ../signup.php?error=$em&$data");
            exit;
        }

        // Continue with inserting the user if the fullname doesn't exist already

        // Handling image upload
        $new_img_name = "";
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $img_name = $_FILES['image']['name'];
            $img_tmp_name = $_FILES['image']['tmp_name'];
            $img_error = $_FILES['image']['error'];

            if($img_error === 0){
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);

                $allowed_img_exs = array('jpg', 'jpeg', 'png');
                if(in_array($img_ex_to_lc, $allowed_img_exs)){
                    // Concatenate Gmail with the image filename
                    $new_img_name = $fname . '_' . $img_name;
                    $img_upload_path = '../upload/profiles/'.$new_img_name;
                    move_uploaded_file($img_tmp_name, $img_upload_path);
                } else {
                    $em = "You can't upload files of this type";
                    header("Location: ../index.php?error=$em&$data");
                    exit;
                }
            } else {
                $em = "Unknown error occurred while uploading the image!";
                header("Location: ../index.php?error=$em&$data");
                exit;
            }
        }

        // Handling document upload
        $new_doc_name = "";
        if (isset($_FILES['document']['name']) && !empty($_FILES['document']['name'])) {
            $doc_name = $_FILES['document']['name'];
            $doc_tmp_name = $_FILES['document']['tmp_name'];
            $doc_error = $_FILES['document']['error'];

            if ($doc_error === 0) {
                $doc_ex = pathinfo($doc_name, PATHINFO_EXTENSION);
                $doc_ex_to_lc = strtolower($doc_ex);

                $allowed_doc_exs = array('pdf', 'doc', 'docx');
                if (in_array($doc_ex_to_lc, $allowed_doc_exs)) {
                    // Concatenate Gmail with the document filename
                    $new_doc_name = $fname . '_' . $doc_name;
                    $doc_upload_path = '../upload/documents/' . $new_doc_name;
                    move_uploaded_file($doc_tmp_name, $doc_upload_path);
                } else {
                    $em = "You can't upload documents of this type";
                    header("Location: ../index.php?error=$em&$data");
                    exit;
                }
            } else {
                $em = "Unknown error occurred while uploading the document!";
                header("Location: ../index.php?error=$em&$data");
                exit;
            }
        }

        // Insert into Database
        $sql = "INSERT INTO user(fullname, gmail, password, image, company, position, facebook, documents, birthday, contact, compaddress, compcontact, years, description) 
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$fname, $gmail, $pass, $new_img_name, $company, $position, $facebook, $new_doc_name, $birthday, $contact, $compaddress, $compcontact, $years, $description]);

        header("Location: ../index.php?success=Your account has been created successfully");
        exit;
    }
} else {
    $em = "All fields are required";
    header("Location: ../signup.php?error=$em");
    exit;
}
?>
