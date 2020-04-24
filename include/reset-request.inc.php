<?

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/vendor/autoload.php';

    if (isset($_POST['back'])){
    header("Location:  ../index.php");
    exit();
    }


    $mail = new PHPMailer(true);

if (isset($_POST["reset-request-submit"])){

    //selector token, convert it into hexa
    $selector = bin2hex(random_bytes(8));
    //authenticate user
    $token = random_bytes(32);
    //website link eg. www.sakiladatabase.com
    $url = "localhost/db_cw2/page/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;
    //database info
    require '../include/config.php';

    $userEmail = $_POST['email'];
    //to make sure there is no existing token in the database
    $sql =  "DELETE FROM pwdReset WHERE pwdResetEmail = ?";
    //prepare statement
    $stmt = mysqli_stmt_init($conn);
    // prepare the "prepare statement"
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "There was an error";
        exit();
    }
    else{
        //what the ? is gonna be replaced with
        mysqli_stmt_bind_param($stmt,"s",$userEmail);
        mysqli_stmt_execute($stmt);
        header("Location: ../page/forgotpassword.php?newpwd=passwordupdated");
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) 
            VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "There was an error";
        exit();
    }
    else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss",$userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'sakilaloginsystem@gmail.com';                     // SMTP username
        $mail->Password   = 'sakila159753000';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = '587';                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('account@sakiladatabase.com');
        $mail->addAddress($to);     // Add a recipient
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Sakila Password Reset';
        $mail->Body    = "<p>We've received a password reset request </br> but if you didn't request for it then please ignore this message</p>";
        $mail->Body    .= 'Here is your password reset link: </br> <a href="' . $url . '">' . $url . '</a></p>';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // $to = $userEmail;    

    // $subject = 'Sakila Password Reset';

    // $message = "<p>We've received a password reset request 
    //             </br>but if you didn't request for it then please ignore this message</p>
    //             Here is your password reset link: </br>";
    // $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    // $headers = "From: Admin <sakilaloginsystem@gmail.com>\r\n";
    // $headers .= "Reply-To: sakilaloginsystem@gmail.com";
    // $headers .= "Content-type: text/html\r\n";

    // mail($to, $subject, $message, $headers);

    header("Location: ../page/forgotpassword.php?reset=success");
                
}
else{
    header("Location: ../index.php");
}