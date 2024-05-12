<?php  
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fullname']) && isset($_SESSION['company']) && isset($_SESSION['position']) && isset($_SESSION['facebook']) && isset($_SESSION['gmail'])) {

    if(isset($_POST['fullname']) && isset($_POST['company']) && isset($_POST['position']) && isset($_POST['facebook']) && isset($_POST['gmail'])){

        include "../conn.php";

        $fname = $_POST['fullname'];
        $company = $_POST['company'];
        $position = $_POST['position'];
        $facebook = $_POST['facebook'];
        $gmail = $_POST['gmail'];
        $old_pp = $_POST['old_pp'];
        $old_doc = $_POST['old_doc'];
        $id = $_SESSION['id'];
        $contact = $_POST['contact'];
        $birthday = $_POST['birthday'];
        $compcontact = $_POST['compcontact'];
        $compaddress = $_POST['compaddress'];
        $description = $_POST['description'];
        $years = $_POST['years'];


        if (empty($fname)) {
            $em = "Full name is required";
            header("Location: ../edit.php?error=$em");
            exit;
        } else {

            // Update image
            if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {

                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $error = $_FILES['image']['error'];

                if($error === 0){
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_to_lc = strtolower($img_ex);

                    $allowed_exs = array('jpg', 'jpeg', 'png');
                    if(in_array($img_ex_to_lc, $allowed_exs)){
                        $new_img_name = $fname . '_' . $img_name;
                        $img_upload_path = '../upload/profiles/'.$new_img_name;
                        // Delete old profile pic
                        $old_pp_des = "../upload/$old_pp";
                        if(unlink($old_pp_des)){
                            // just deleted
                            move_uploaded_file($tmp_name, $img_upload_path);
                        } else {
                            // error or already deleted
                            move_uploaded_file($tmp_name, $img_upload_path);
                        }
                    } else {
                        $em = "You can't upload files of this type";
                        header("Location: ../edit.php?error=$em&$data");
                        exit;
                    }
                } else {
                    $em = "Unknown error occurred while uploading the image!";
                    header("Location: ../edit.php?error=$em&$data");
                    exit;
                }
            }

            // Update document
            if (isset($_FILES['document']['name']) && !empty($_FILES['document']['name'])) {

                $doc_name = $_FILES['document']['name'];
                $doc_tmp_name = $_FILES['document']['tmp_name'];
                $doc_error = $_FILES['document']['error'];

                if ($doc_error === 0) {
                    $doc_ex = pathinfo($doc_name, PATHINFO_EXTENSION);
                    $doc_ex_to_lc = strtolower($doc_ex);

                    $allowed_doc_exs = array('pdf', 'doc', 'docx');
                    if (in_array($doc_ex_to_lc, $allowed_doc_exs)) {
                        $new_doc_name = $fname . '_' . $doc_name;
                        $doc_upload_path = '../upload/documents/' . $new_doc_name;
                        move_uploaded_file($doc_tmp_name, $doc_upload_path);
                    } else {
                        $em = "You can't upload documents of this type";
                        header("Location: ../edit.php?error=$em&$data");
                        exit;
                    }
                } else {
                    $em = "Unknown error occurred while uploading the document!";
                    header("Location: ../edit.php?error=$em&$data");
                    exit;
                }
            }

            // Update the Database
            $sql = "UPDATE user SET fullname=?, company=?, position=?, facebook=?, gmail=?, image=?, documents=?, contact=?, birthday=?, compcontact=?, compaddress=?, description=?, years=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$fname, $company, $position, $facebook, $gmail, $new_img_name ?? $old_pp, $new_doc_name ?? $old_doc, $contact, $birthday, $compcontact, $compaddress, $description, $years, $id]);

            $_SESSION['fullname'] = $fname;
            header("Location: ../home1.php?success=Your account has been updated successfully");
            exit;
        }
    } else {
        header("Location: ../home1.php?error=error");
        exit;
    }

} else {
    header("Location: login.php");
    exit;
}
