
<?php 
    require 'includes/PHPMailer.php';
    require 'includes/Exception.php';
    require 'includes/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    $mail = new PHPMailer();
?>
<?php 



 

if(isset($_POST['submit'])){
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = "true";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;

$mail->Username = "siddhimule05@gmail.com";
$mail->Password = "deftcage2908";   //include password
$mail->isHTML(TRUE);
$subject=$_POST['subject'];
$mail->Subject ='Contact Us';

$mail->setFrom("siddhimule05@gmail.com");

$message = $_POST['message'];
if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != "") {
    $file = "images/" . basename($_FILES['attachment']['name']);
    move_uploaded_file($_FILES['attachment']['tmp_name'], $file);
} else
    $file = "";

$mail->Body ='<h1>Thank you for contacting us</h1>
<p>Your message has been received. We will get back to you as soon as possible.</p>
<p><h2>Your Message: '.$message.'</p>';

$mail->addAttachment($file);

$mail->addAddress("$_POST[email]");

if( $mail-> send()){
    echo ("<script LANGUAGE='JavaScript'>
window. alert('Thank you for reaching out to us. we appreciate it!');
</script>");
}
else{
    echo ("<script LANGUAGE='JavaScript'>
window. alert('Email not sent');
</script>");
}
unlink($file);
$mail->smtpClose();
}

?>

<head><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" href="style/style.css">
<title>Result Wizard</title></head>

<div class='container'>
<a href='student.php' class='back' ><i class='fas fa-arrow-circle-left'></i></a>
<header>Contact Us </header>
</div>


<form id="form" class="topBefore" method="post" enctype="multipart/form-data">
		
		  <input id="name" type="text" placeholder="NAME" name='name' required>
          <br/>
          <br/>
		  <input id="email" type="text" placeholder="E-MAIL" name='email' required>
            <br/>
            <br/>
            <input id="subject" type="text" placeholder="SUBJECT" name='subject' required>
            <br/>
            <br/>
		  <textarea id="message" type="text" placeholder="MESSAGE" name='message' required></textarea>
            <br/>
            <br/>
            <input class="form-control" type="file" name="attachment" ><br><br>
            <button class='btn' type="submit" name="submit">SUBMIT</button>
  
</form>
  
  
