<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class adminActions {
    private $host  = 'localhost';
    private $user  = 'root';
	private $password   = '';
	private $database  = 'alumni';   
	private $adminTable = 'admin';
	private $alumniTable = 'user';
	private $dbConnect = false;

    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
    public function getTotalAlumni(){
		$sqlQuery = "SELECT COUNT(*) AS total_alumni FROM " . $this->alumniTable . " 
                    WHERE is_approve = 1 ";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $totalUsers = $row['total_alumni'];
           return $totalUsers;
        } else {
            echo "Query failed: " . mysqli_error($this->dbConnect);

        }
	}

    public function getTotalSignups(){
		$sqlQuery = "SELECT COUNT(*) AS total_alumni FROM " . $this->alumniTable . " ";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $totalUsers = $row['total_alumni'];
           return $totalUsers;
        } else {
            echo "Query failed: " . mysqli_error($this->dbConnect);

        }
	}

    public function checkLogin(){
		if(empty($_SESSION['username'])) {
			header("Location: ../adminlog.php");
		}
	}
    
    public function getBdayEvents(){
        // Get the current month and year
        $currentMonth = date('m');
        // Fetch data from database
        $sqlQuery = "SELECT fullname, birthday FROM user WHERE MONTH(birthday) = $currentMonth";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        $events = array();
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                
                while($row = mysqli_fetch_assoc($result)) {
                    // Extract month and day from the birthdate
                    $birthdate = date('m-d', strtotime($row['birthday']));
                    
                    // Concatenate current year with month and day
                    $formattedDate = date('Y') . '-' . $birthdate;
                    $events[] = array(
                        'title' => $row['fullname'],
                        'start' => $formattedDate
                    );
                } 
            }
            echo json_encode($events);
        } else {
            echo "Query failed: " . mysqli_error($this->dbConnect);
        }
    }

    public function getBdayCelebs(){
        // Get the current month and year
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Construct the start and end date range for the current month
        $startDate = "$currentYear-$currentMonth-01";
        $endDate = date('Y-m-t', strtotime($startDate)); // 't' returns the number of days in the given month
        // Fetch data from database
        $sqlQuery = "SELECT fullname, DATE_FORMAT(birthday, '%M %e') AS birthdate, gmail FROM user WHERE MONTH(birthday) = $currentMonth";
        $result = mysqli_query($this->dbConnect, $sqlQuery);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="d-flex flex-row comment-row m-t-0">
                        <div class="comment-text w-100">
                            <h6 class="font-medium">' .$row['fullname']. '</h6>
                            <div class="comment-footer">
                                <span class="text-muted float-right">' .$row['birthdate']. '</span>
                                <span class="action-icons">
                                    <a href="TEST.php?name=' .$row['fullname']. '&email=' .$row['gmail']. '">
                                        <i class="ti-pencil-alt"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    ';
                }
                
            } else {
                echo '
                <tr>
                    <td colspan="7">
                        <div class="alert alert-danger rounded" role="alert"> No Birthday Celebrants </div>
                    </td>
                </tr>';
            }
        } else {
            echo "Query failed: " . mysqli_error($this->dbConnect);
        }
    }

    public function sendEmail(){
        $AddrTo = $_POST['to'];   
        // Explode the input string into an array using comma as delimiter
        $gmailesses = explode(",", $AddrTo);
        
        // Trim each value to remove leading/trailing spaces
        $gmailesses = array_map('trim', $gmailesses);
        
        $mailSubj = $_POST['subject'];
        $mailBody = $_POST['body'];
        
        //Load Composer's autoloader
        require 'PHPMailer/vendor/autoload.php';
        
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        
        
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'adrianandrewbalita@trimexcolleges.edu.ph';                     //SMTP username
            $mail->Password   = '0.m4j47klanf';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 587;
            $mail->SMTPSecure = 'tls';                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('adrianandrewbalita@trimexcolleges.edu.ph');
            foreach ($gmailesses as $EmailAddress) {
                $mail->addAddress($EmailAddress); //Add a recipient
            }
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $mailSubj;
            $mail->Body    = $mailBody;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            $alert="Message has been sent";
        } catch (Exception $e) {
            $alert="Message could not be sent";
        }
        $response = array("alert" => $alert);
        echo json_encode($response);
    }

    public function getAlumniList(){
        // Fetch data from database
        $sqlQuery = "SELECT * FROM " . $this->alumniTable . " WHERE is_approve = 1";
        $result = mysqli_query($this->dbConnect, $sqlQuery);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <tr>
                        <td>
                            <div class="n-chk align-self-center text-center">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input user-checkbox">
                                    <label class="form-check-label"></label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span><img src="../upload/profiles/'.$row['image'].'" alt="user" class="rounded-circle" width="45" height="45" /> '.$row['fullname'].'</span>
                        </td>
                        <td>'.$row['gmail'].'</td>
                        <td class="mt-3">
                            <button type="button" id="'.$row['id'].'" class="btn btn-info btn-sm mb-1 view">
                            <i class="fas fa-eye"></i></button>
                            <button type="button" id="'.$row['id'].'" class="btn btn-primary btn-sm mb-1 edit">
                            <i class="fas fa-edit"></i></button>
                        </td>
                    </tr>
                    ';
                }
                
            } else {
                echo '
                <tr>
                    <td colspan="7">
                        <div class="alert alert-danger rounded" role="alert"> 0 Results </div>
                    </td>
                </tr>';
            }
        } else {
            echo "Query failed: " . mysqli_error($this->dbConnect);
        }
    }
    
    public function editAlumniProfile(){
        // Fetch data from database
        $sqlQuery = "SELECT * FROM " . $this->alumniTable . " 
                    WHERE id = '" . $_POST['ID'] . "' ";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <form id="AlumniForm" method="POST">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="ID" value="'.$row['id'].'" placeholder="ID" readonly>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="FullName" value="'.$row['fullname'].'" placeholder="Name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="email" class="form-control" name="EmailAdd" value="'.$row['gmail'].'" placeholder="Email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" name="PhoneNumber" value="'.$row['contact'].'" placeholder="Phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                                </div>
                                <input type="date" class="form-control" name="BirthDate" value="'.$row['birthday'].'">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-suitcase"></i></span>
                                </div>
                                <input type="text" class="form-control" name="Job" value="'.$row['position'].'" placeholder="Job">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <div class="b-label">
                                <label for="inputDesc" class="control-label col-form-label">Job Description</label>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="JobDescript" rows="3">'.$row['description'].'</textarea>
                        </div>
                    </div>
                        <input type="hidden" name="action" id="btn_action" value="UpdateAlumniProfile">
                        <button type="submit" class="btn btn-rounded btn-primary mb-1"> Save </button>
                    </form>';   
                }
                
            } else {
                echo '<div class="alert alert-danger rounded" role="alert"> 0 Results </div>';
            }
        } else {
            echo "Query failed: " . mysqli_error($this->dbConnect);
        }
    }

    public function updateAlumniProfile(){
			$sqlUpdate = "
				UPDATE " . $this->alumniTable . " 
				SET fullname = '" . $_POST['FullName'] . "', gmail = '" . $_POST['EmailAdd'] . "',
                contact = '" . $_POST['PhoneNumber'] . "', position = '" . $_POST['Job'] . "',
                birthday = '" . $_POST['BirthDate'] . "', description = '" . $_POST['JobDescript'] . "'
				WHERE id ='" . $_POST['ID'] . "' ";
			$result = mysqli_query($this->dbConnect, $sqlUpdate);
			if (!$result) {
				die('Error in query: ' . mysqli_error($this->dbConnect));
			} else {
				echo "Alumni's Profile Succesfully Updated!";
			}
    }

    public function viewAlumniProfile(){
        // Fetch data from database
        $sqlQuery = "SELECT * FROM " . $this->alumniTable . " 
                    WHERE id = '" . $_POST['ID'] . "' ";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="../upload/profiles/'.$row['image'].'" class="rounded-circle" width="100" height="100">
                                <h4 class="card-title m-t-10">'.$row['fullname'].'</h4>
                                <h6 class="card-subtitle">' .$row['position']. ' ' .$row['company']. '</h6>
                            </center>
                        </div>
                        <div>
                            <hr> </div>
                        <div class="card-body"> 
                            <small class="text-muted">Email address </small>
                            <h6>' .$row['gmail']. '</h6> 
                            <small class="text-muted p-t-30 db">Phone</small>
                            <h6>' .$row['contact']. '</h6> 
                            <small class="text-muted p-t-30 db">Birth Date</small>
                            <h6>' .$row['birthday']. '</h6>
                            <small class="text-muted p-t-30 db">Company</small>
                            <h6>' .$row['company']. '</h6>
                            <small class="text-muted p-t-30 db">Address</small>
                            <h6>' .$row['compaddress']. '</h6>
                            <small class="text-muted p-t-30 db">Contact</small>
                            <h6>' .$row['compcontact']. '</h6>
                            <a href="' .$row['facebook']. '" class="btn btn-circle btn-secondary"><i class="fab fa-facebook-f"></i></a>
                            <a href="../upload/documents/' .$row['documents']. '" class="btn btn-circle btn-secondary"><i class="far fa-file"></i></a>
                        </div>
                    </div>
                    ';
                }
                
            } else {
                echo '<div class="alert alert-danger rounded" role="alert"> 0 Results </div>';
            }
        } else {
            echo "Query failed: " . mysqli_error($this->dbConnect);
        }
    }

    public function getSignupList(){
        // Fetch data from database
        $sqlQuery = "SELECT * FROM " . $this->alumniTable . " WHERE is_approve = 0";
        $result = mysqli_query($this->dbConnect, $sqlQuery);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <tr>
                    <td>".$row['id']."</td>
                    <td>
                        <span><img src='../upload/profiles/".$row['image']."' alt='user' class='rounded-circle' width='45' /> ".$row['fullname']."</span>
                    </td>
                    <td class='mt-3'>
                        <button type='button' id='".$row['id']."' class='btn btn-info btn-sm mb-1 view'>
                        <i class='fas fa-eye'></i></button>
                        <button type='button' id='".$row['id']."' class='btn btn-success btn-sm mb-1 approved'>
                        <i class='fas fa-check'></i></button>
                        <button type='button' id='".$row['id']."' class='btn btn-danger btn-sm mb-1 removed'>
                        <i class='fas fa-trash'></i></button>
                    </td>
                    </tr>";
                }
                
            } else {
                echo '
                <tr>
                    <td colspan="4">
                        <div class="alert alert-danger rounded" role="alert"> 0 Results </div>
                    </td>
                </tr>';
            }
        } else {
            echo "Query failed: " . mysqli_error($this->dbConnect);
        }
    }

    public function approvedAccount(){
			$sqlUpdate = "
				UPDATE " . $this->alumniTable . " 
				SET is_approve = '1'
				WHERE id ='" . $_POST['ID'] . "' ";
            //echo $sqlUpdate;
			$result = mysqli_query($this->dbConnect, $sqlUpdate);
			if (!$result) {
				//echo $sqlUpdate;
				die('Error in query: ' . mysqli_error($this->dbConnect));
			} else {
				echo "Alumni's Account Succesfully Approved!";
			}
		
    }

    public function removedAccount(){
			$sqlDelete = "
				DELETE FROM " . $this->alumniTable . " 
				WHERE id ='" . $_POST['ID'] . "' ";
			$result = mysqli_query($this->dbConnect, $sqlUpdate);
			if (!$result) {
				//echo $sqlDelete;
				die('Error in query: ' . mysqli_error($this->dbConnect));
			} else {
				echo "Alumni's Account Succesfully Removed!";
			}
    }
    //Chat Management
    public function getConvo(){
        // Fetch data from database
        $sqlQuery = "SELECT sender, message, DATE_FORMAT(timestamp, '%h:%i %p') AS time FROM messages";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        $odd=$img="1";
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                
                while($row = mysqli_fetch_assoc($result)) {
                    if ($row['sender']==1) {
                        $odd="odd";
                        $img="";
                    }
                    echo '
                    <li class=" '.$odd.' chat-item">';
                    if (!empty($img)) {
                        echo '<div class="chat-img"><img src="assets/images/users/1.jpg" alt="user"></div>';
                    }
                        
                    echo '
                            <div class="chat-content">
                                <h6 class="font-medium">'.$row['sender'].'</h6>
                                    <div class="box bg-light-info">
                                        '.$row['message'].'
                                    </div>
                            </div>
                        <div class="chat-time">'.$row['time'].'</div>
                    </li>
                    ';
                }
                
            } else {
                echo '<div class="alert alert-danger rounded" role="alert"> 0 Results </div>';
            }
        } else {
            echo "Query failed: " . mysqli_error($this->dbConnect);
        }
    }

    public function sendMessage(){
        // Insert data to database
        $sqlInsert = "INSERT INTO messages(sender, message) 
        VALUES ('".$_POST['sender']."', '".$_POST['message']."')";
        $result = mysqli_query($this->dbConnect, $sqlInsert);

        if ($result) {
            
        } else {
            echo "Query failed: " . mysqli_error($this->dbConnect);
        }
    }

    // Posts Management
    public function getAllPost(){
        // Fetch data from database
        $sqlQuery = "SELECT user.fullname, user.image, post.post, post.image AS postimage,post.timestamp
                     FROM post
                     INNER JOIN user
                     WHERE post.user_id = user.id";
        $result = mysqli_query($this->dbConnect, $sqlQuery);
        $odd=$img="1";
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                
                while($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="../upload/profiles/'.$row['image'].'" class="rounded-3 img-fluid" width="50" height="50">
                                    <div class="ms-3">
                                        <h4 class="card-title">'.$row['fullname'].'</h4>
                                        <h6 class="card-subtitle mb-0">'. $this->formatDateTime($row['timestamp']) .'</h6>
                                    </div>
                                </div>
                                <div class="card-actions ms-auto d-flex button-group">
                                    <a href="javascript:void(0)" class="text-danger delete ms-2"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                            <p class="text-muted text-justify fs-4 mt-4">
                                '.$row['post'].'
                            </p>
                            <img src="../upload/profiles/'.$row['image'].'" class="img-fluid rounded-3 mt-4">
                            <div class="ms-auto">
                                <a href="javascript:void(0)" class="text-danger delete ms-2"><span style="font-size: 24px;"><i class="far fa-trash-alt"></span></i></a>
                            </div>
                        </div>
                    </div>
                    ';
                }
                
            } else {
                echo '<div class="alert alert-danger rounded" role="alert"> 0 Results </div>';
            }
        } else {
            echo "Query failed: " . mysqli_error($this->dbConnect);
        }
    }

    public function formatDateTime($timestamp) {
        // Get current date and time
        $currentDate = date('Y-m-d');
        $currentTime = date('H:i:s');
    
        // Get the date part of the timestamp
        $postDate = date('Y-m-d', strtotime($timestamp));
    
        // If the post date is today, display "today at"
        if ($currentDate == $postDate) {
            return "Today at " . date('h:i A', strtotime($timestamp));
        }
    
        // If the post date is yesterday, display "yesterday at"
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        if ($yesterday == $postDate) {
            return "Yesterday at " . date('h:i A', strtotime($timestamp));
        }
    
        // If not today or yesterday, display the full date and time
        return date('M j, Y h:i A', strtotime($timestamp));
    }
}
?>