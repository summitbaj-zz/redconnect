 <?
    //change this to your email.
    $to = $_POST['email'];
    $from = "info@reddonor.com";
    $subject = "Hello! This is HTML email";

    //begin of HTML message
    $message = <<<EOF
<html>
  <body bgcolor="#DCEEFC">
    <center>
        <b>Dear Sir/Madam</b> <br>
        <font color="red">You are now eligible to donate</font> <br>
        <a href="http://www.maaking.com/">Cleck to update your latest donation</a>
    </center>
      <br><br>You have recieved this mail because you've subscribed to redconnect.com
  </body>
</html>
EOF;
   //end of message
    $headers  = "From: $from\r\n";
    $headers .= "Content-type: text/html\r\n";

    
    // now lets send the email.
    mail($to, $subject, $message, $headers);

    echo "Message has been sent....!";
?> 