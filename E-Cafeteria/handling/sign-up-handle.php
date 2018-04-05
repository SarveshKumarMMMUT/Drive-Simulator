
<?php
$page_title = 'reservation handle';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>
            <?php echo $page_title;?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1 " />
        <link rel="stylesheet" type="text/css" href="reservation-handle.css" />
        <link rel="stylesheet" type="text/css" href="./../css/footer.css" />
        <link rel="stylesheet" type="text/css" href="./../css/customer-header.css" />
    </head>

    <body>
        <?php
        include('./../includes/customer-header.php');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $errors = array(); 
            if(empty($_POST['first_name'])){
                $errors[] = 'You forgot to enter your username'; 
            }
            else{
                $fn = trim($_POST['first_name']); 
            }
            if(empty($_POST['middle_name'])){
                $mn = NULL;
            }
            else{
                $mn = trim($_POST['middle_name']);

            }
            if(empty($_POST['last_name'])){
                $ln = NULL;
            }
            else{
                $ln = trim($_POST['last_name']);
            }
            if(isset($_POST['gender'])){
                $gender = $_POST['gender'];
            }
            else{
                $errors[] = 'Plese choose your gender';
            }
            if(empty($_POST['email'])){
                $errors[] = 'Please enter your email';
            }
            else{
                $email = trim($_POST['email']);
            }
            if(!empty($_POST['password'])){
                if($_POST['password'] != $_POST['confirm-password']){
                    $errors[] = 'Your password does not match';
                }
                else{
                    $pass = trim($_POST['password']);    
                }
            }
            else{
                $error[] = 'Please Enter Your Password';
            }
            if(empty($_POST['contact-number'])){
                $errors[] = 'Please enter your contact number';
            }
            else{
                $contact_number = trim($_POST['contact-number']);
            }
            if(empty($_POST['address'])){
                $errors[] = 'Please enter your address';
            }
            else{
                $address = trim($_POST['address']);
            }
                
            if(empty($errors)){
                require('./../../mysqli_connect.php');
                $q = "insert into users(first_name, middle_name, last_name, gender_id, email, pass, mobile, address, date_entered) VALUES('$fn', 
                '$mn', '$ln', $gender, '$email', '$pass', '$contact_number', '$address', NOW())";
                $res = @mysqli_query($dbc, $q);
                $display = '';
                if($res){
                    $display = 'Thank You For booking a table';
                }
                else{
                    if(strcmp("Duplicate entry", substr(mysqli_error($dbc), 0, 15))==0){
//                      echo 'You have already sbmitted your feedback';
                        $display = 'YOU ARE ALREADY REGISTERED';
                    }
                    else{
//                      echo '<p>Your feedback can\'t be submit sorry of any inconvinience</p>'.mysqli_error($dbc);
                        $display = 'Your feedback can\'t be submit sorry of any inconvinience</p>'.mysqli_error($dbc);
                    }
                }
                mysqli_close($dbc);
            } 
            else{ 
                echo '<h1>The Following errors has occurred</h1>';
                foreach($errors as $key){ 
                echo "$key<br />"; 
                } 
              
            }
        } ?>
            <div class="parent">
                <div class="child">
                    <p class="card-main-heading">
                        <?php echo $display ;?>
                    </p>
                    <p class="card-info">PLEASE GIVE US ANOTHER TIME TO SERVE YOU</p>
                    <a></a>
                </div>
            </div>
            <?php include('./../includes/footer.php')?>
    </body>

    </html>
