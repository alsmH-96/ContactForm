<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $user    = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone   = filter_var($_POST['pnumber'], FILTER_SANITIZE_NUMBER_INT);
    $msg     = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $validmsg     = filter_var($_POST['message'], FILTER_SANITIZE_STRING) . "\r\n" . ' The phone is : ' . $phone . "\r\n" . 'the name : ' . $user;
    
    
//    echo $user . '<br>';
//    echo $email . '<br>';
//    echo $phone . '<br>';
//    echo $msg . '<br>';

    
    $errorArray = array();
    
    if (strlen($user) > 0) {
        if (strlen($user) <= 3) {
            $errorArray[] = '<strong>Sorry</strong> the user name must be more tha 3 characters !!!';
        }
    } else {
        $errorArray[] = '<strong> Sorry </strong> this feilds can\'t be empty !!';
    }
    
    if(strlen($msg) <= 10) {
        $errorArray[] = '<strong>SORRY</strong> Message Is Not Enogh !!';
    }
    
    // if no errors send the contact
    
    $headers = "From: " . $email . "\r\n";
    
    if(empty($errorArray)) {
        $myEmail = 'mohamedfekyelfeky@gmail.com';
        $subject = 'contact';
        $mailMsg = $msg . '<br>' . ' The phone is : ' . $phone . '<br>' . 'the name : ' . $user; 
        
        mail("mohamedfekyelfeky@gmail.com","an order",$validmsg,$headers);
        
        echo ' ';
        
        $user    = '';
        $email   = '';
        $phone   = '';
        $msg     = '';
        $validmsg = '';
        
        $success = '<div class="alert alert-success alert-dismissible">'
                .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>' . 
                
                'we have reveaved your message and we will reply you</div>';
        
    }
    
}


    


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>contact</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:700,900,900i">
        <link rel="stylesheet" href="css/contact.css"/>
    </head>
    <body>
        
        <!-- START FORM -->
        
        <div class="container">
            <h1 class="text-center font upper">Contact Form</h1>
            <form class="form" action="<?= $_SERVER['PHP_SELF']?>" method="post">
                
                    <?php 
                        if(isset($success)) {echo $success;} else {echo '';};
                        if(!empty($errorArray)) {        
             
                            foreach($errorArray as $error) {
                                
                        ?>
                            <div class="alert alert-danger alert-dismissable" role="start">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        <?php
                                echo $error . '<br>';
                        ?>
                            </div>
                        <?php 
                        
                            }
                        
                        }
                        ?>
                <div class="form-group">
                    <input class="form-control username" type="text" name="username" placeholder="type your name" value="<?php if(isset($user)) {echo $user;} ?>"/>
                    <i class="fa fa-user fa-fw"></i>
                    <span class="star">*</span>
                    <div class="client-warning alert alert-danger" role="start">
                        <strong>Sorry</strong> the user name must be more tha 3 characters !!!
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control email" type="email" name="email" placeholder="type a valid e-mail"  value="<?php if(isset($email)) {echo $email;} ?>"/>
                    <i class="fa fa-envelope fa-fw"></i>
                    <span class="star">*</span>
                    <div class="client-warning alert alert-danger" role="start">
                        <strong>Sorry</strong> this feild mustn't be empty !!!
                    </div>
                </div>
                <input class="form-control" type="text" name="pnumber" placeholder="type ypur phone number"  value="<?php if(isset($phone)) {echo $phone;} ?>"/>
                <i class="fa fa-phone fa-fw"></i>
                <div class="form-group">
                    <textarea class="form-control msg" name="message" placeholder="type your message !!!"><?php if(isset($msg)) {echo $msg;} ?></textarea>
                    <span class="star">*</span>
                    <div class="client-warning alert alert-danger" role="start">
                        <strong>Sorry</strong> your message is not enough !!!
                    </div>
                </div>
                <input class="btn btn-success pointer submit-btn" type="submit" value="send mail">
                <i class="fa fa-send send-btn"></i>
            </form>
        </div>
        
        <!-- END FORM -->
        
        <script src="js/jquery.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
