<?php

if($_POST) {
  $to = "kannasivamps@gmail.com"; // your mail here
  $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
  $mobile = filter_var($_POST["mobile"], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
  $gram = filter_var($_POST["gram"], FILTER_SANITIZE_STRING);

  $subject = 'Aura Goldloan submit form';
  $cc = 'thiyagiinc@gmail.com';
  $bcc = 'thiyagiinc@gmail.com';
  $body = "Name:$name\nMobile:$mobile\nEmail:$email\nGram:$gram\n";
  
   //mail headers are mandatory for sending email
   $headers = 'From: ' .$email . "\r\n". 
   $cc = 'Cc: ' .$cc . "\r\n". 
   $bcc = 'Bcc: ' .$bcc . "\r\n".
   'Reply-To: ' . $email. "\r\n" . 
   'X-Mailer: PHP/' . phpversion();
 
   if(@mail($to, $subject, $body, $headers)) {
     $output = json_encode(array('success' => true));
     echo "<script>window.location= 'thank-you.php'</script>";
   } else {
     $output = json_encode(array('success' => false));
     die($output);
   }
 }