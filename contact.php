<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $mail = new PHPMailer(true);
  try {
    // إعدادات SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'younessmerzoughi93@gmail.com';       // ✅ بريدك Gmail
    $mail->Password = 'dyud rlva nccn swkn';    // ✅ كلمة مرور التطبيقات
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // المرسل والمستلم
    $mail->setFrom($email, $name);
    $mail->addAddress('your@gmail.com');  // ✅ بريدك لتستقبل الرسائل

    // المحتوى
    $mail->isHTML(true);
    $mail->Subject = "رسالة جديدة من الموقع";
    $mail->Body    = nl2br("من: $name\n\n$message");

    $mail->send();
    echo "✅ تم إرسال الرسالة بنجاح!";
  } catch (Exception $e) {
    echo "❌ خطأ: " . $mail->ErrorInfo;
  }
}
?>
