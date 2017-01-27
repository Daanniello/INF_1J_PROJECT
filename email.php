<?php include "includes/topinclude.php"; ?>
<div class="inhoud">
    <?php
    include "connection_database.php";
    if(isset($_SESSION['login_docent'])){
        $SQLEmail = "SELECT Email FROM docent WHERE GebruikerID = {$_SESSION['id']}";
        $qeuryEmail = mysqli_query($DBConnect, $SQLEmail);
        $resultsEmail = mysqli_fetch_assoc($qeuryEmail);
        $email = $resultsEmail['Email'];
    } elseif($_SESSION['login_slber']){
        $SQLEmail = "SELECT Email FROM slber WHERE GebruikerID = {$_SESSION['id']}";
        $qeuryEmail = mysqli_query($DBConnect, $SQLEmail);
        $resultsEmail = mysqli_fetch_assoc($qeuryEmail);
        $email = $resultsEmail['Email'];
    }
    $id = $_GET['student'];
    $SQLEmailStudent = "SELECT Email FROM student WHERE GebruikerID = $id";
    $queryStudent = mysqli_query($DBConnect, $SQLEmailStudent);
    $resultStudent = mysqli_fetch_assoc($queryStudent);
    $student = $resultStudent['Email'];
    $subject = $_POST['onderwerp'];
    $message = $_POST['message'];

    require 'includes/PHPMailer-master/PHPMailerAutoload.php';

    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                                  // Enable verbose debug output

    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host = 'smtp.live.com';                          // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                 // Enable SMTP authentication
    $mail->Username = 'stendenportfolio@outlook.com';       // SMTP username
    $mail->Password = 'daansmit?';                          // SMTP password
    $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                      // TCP port to connect to

    $mail->setFrom('stendenportfolio@outlook.com', 'Mailer');
    $mail->addAddress($email);                              // Add a recipient
    $mail->addAddress($student);

    $mail->isHTML(true);                                    // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = $message;

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
    ?>
</div>
<?php include "includes/botinclude.php"; ?>
