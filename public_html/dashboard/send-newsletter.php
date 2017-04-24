<?php
session_start();

if ($_SESSION["loggedIn"] !== true) {
  header('Location: ./login.php');
  exit;
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/../inc/Database.class.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../vendor/autoload.php';

$db = new Database;
$mailingList;
$newsletterSent;
$mailingList = $db->query("SELECT * FROM mailing_list;");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $title = $_POST["title"];
  $msg = $_POST["msg"];
  $mailingList = $db->query("SELECT * FROM mailing_list;");

  try {
    // Send email
    foreach ($mailingList as $subscriber) {
      echo $subscriber["email"];
    }

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'user@example.com';                 // SMTP username
    $mail->Password = 'secret';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Here is the subject';
    $mail->Body    = '<h2>' . $title . '</h2><p>' . $msg . '</p>';
    $mail->AltBody = $msg;

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

    $newsletterSent = true;

  } catch (Exception $e) {
    $newsletterSent = false;
  }


}

include_once $_SERVER["DOCUMENT_ROOT"] . '/../inc/dashboard-header.php';
?>

<div class="container">

  <p>
    <?php
      if (isset($newsletterSent)) {
        $newsletterSent ? "Newseltters hav been sent out" : "Error sending Newseltters";
      }
    ?>
  </p>

  <div class="white padding margin-vertical">
    <h2>Send Newsletter</h2>
    <form class="form"
          method="POST">
      <div class="form__field">
        <input required class="form__input" type="text" name="title" value="" placeholder="Title">
      </div>
      <div class="form__field">
        <textarea required class="form__textarea"  placeholder="Enter newsletter here" name="msg" rows="8" cols="80"></textarea>
      </div>
      <div class="form__field">
        <input required class="btn-primary" type="submit" value="Send Newsletter">
      </div>
    </form>
  </div>
  <div class="white padding margin-vertical">
    <h2>Mailing List</h2>
    <ul>
      <?php
      foreach ($mailingList as $mail) {
        ?>

        <li class="lightgray padding margin-vertical">
          <?php echo $mail["email"] ?>
        </li>
        <?php } ?>

      </ul>
  </div>
</div>
