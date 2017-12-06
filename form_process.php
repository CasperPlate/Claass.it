<?php 

// define variables and set to empty values
$name_error = $email_error = $phone_error = "";
$naam = $email = $telefoon = $bericht = $success = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["naam"])) {
    $name_error = "Naam is benodigd";
  } else {
    $naam = test_input($_POST["naam"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$naam)) {
      $name_error = "Alleen letters en spaties toegestaan"; 
    }
  }

  if (empty($_POST["email"])) {
    $email_error = "Email is benodigd";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Ongeldig email formaat"; 
    }
  }
  
  if (empty($_POST["telefoon"])) {
    $phone_error = "Telefoon is benodigd";
  } else {
    $telefoon = test_input($_POST["telefoon"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$telefoon)) {
      $phone_error = "Ongeldig telefoonnummer"; 
    }
  }

  if (empty($_POST["bericht"])) {
    $message = "";
  } else {
    $message = test_input($_POST["bericht"]);
  }
  
  if ($name_error == '' and $email_error == '' and $phone_error == ''){
      $message_body = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $message_body .=  "$key: $value\n";
      }
      
      $to = 'casper.plate@hotmail.com';
      $subject = 'Contactformulier claass';
      $headers = "From: noreply@cloudbeheerder.it" . "\r\n";
      if (mail($to, $subject, $bericht, $headers)){
          $success = "Bericht verstuurd, bedankt voor het contacteren!";
          $naam = $email = $telefoon = $bericht = '';
      }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}