<?php $page_title='Sign Up'?>
<html>

<head>
    <title>
        <?php echo $page_title?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1 " />
    <link rel="stylesheet" type="text/css" href="./../css/sign-up.css" />
    <link rel="stylesheet" type="text/css" href="./../css/footer.css" />
    <link rel="stylesheet" type="text/css" href="./../css/customer-header.css" />
</head>

<body>
    <?php include('./../includes/customer-header.php');
        require('./../../mysqli_connect.php');
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $errors[] = array();
            if(!empty($_POST['date'])){
                $d = trim($_POST['date']);
            }
            else{
                $errors[] = 'Please enter Date for Reservation';
            }
            if(!empty($_POST['people'])){
                $p = intval(trim($_POST['people']));
            }
            else{
                $errors[] = 'Please enter the number of People for Reservation';
            }
            if(!empty($_POST['time'])){
                echo $t = time($_POST['time']);
            }
            else{
                $errors[] = 'Plesae Choose the time ';
            }
            
            if(empty($errors)){
                require('./../../mysqli_connect.php');
                $q = "INSERT INTO temptbl(tdate, tpeople, ttime)values('$d', $p, '$t')";
                $display = '';
                if($res){
                    $display = 'Successfulllll';
                }
                else{
//                      echo '<p>Your feedback can\'t be submit sorry of any inconvinience</p>'.mysqli_error($dbc);
                        $display = 'Your feedback can\'t be submit sorry of any inconvinience</p>'.mysqli_error($dbc);
                }
                mysqli_close($dbc);
            } 
            else{ 
                echo '<h1>Error!</h1>
                <p class="error">The following error(s) occurred:<br />';
                print_r($errors);
//                foreach ($errors as $msg) { // Print each error.
//                echo " - $msg<br />\n";
//                }
            }
        }
    ?>
    <div class="container">
        <div class="main-container">
            <div class="parent">
                <div class="child">
                    <p class="card-main-heading">REGISTER</p>

                    <!--
<div class="text-container-div">
    <p class="text">
        Book online or give us a call on +91 8354820950 between 9.30am-10pm, <br />or send us an email on
        <br />
        <i><a href="#" class="table-email">cafe-reservation@gmail.com</a></i>
    </p>
    <p class="text">
        Your feedback is important to us. Tell us what you think at
        <br />
        <i><a href="#" class="table-email">cafe-feedback@gmail.com</a></i>
    </p>
    <h2 class="text-heading">
        Lunch
    </h2>
    <p class="text">
        Monday to Saturday 12pm-3pm
        <br /> Sunday 12pm-3pm
    </p>
    <h2 class="text-heading">
        Dinner
    </h2>
    <p class="text">
        Monday to Thursday 6pm-10.30pm
        <br /> Friday & Saturday 5.30pm-10.30pm
        <br /> Sunday 6pm-9.30pm
    </p>
</div>
-->
                    <div class="table-main-container">
                        <div class="sign-up-form-container">
                            <form id="form" action="./../handling/sign-up-handle.php" method="post">
                                <label class="inputLbl">First Name</label>
                                <br />
                                <input id="username-input" name="first_name" type="text" maxlength="100" placeholder="First Name" required="" />

                                <label class="inputLbl">Middle Name</label>
                                <br />
                                <input id="username-input" name="middle_name" type="text" maxlength="100" placeholder="Middle Name" />

                                <label class="inputLbl" na>Last Name</label>
                                <br />
                                <input id="username-input" me="last_name" type="text" maxlength="100" placeholder="Last Name" />
                                <br />
                                <label class="inputLbl">Your Gender</label>
                                <br />
                                <input type="radio" name="gender" value="1" /><span class="gender-heading">Male</span>
                                <input type="radio" name="gender" value="2" /><span class="gender-heading">Female</span>
                                <input type="radio" name="gender" value="3" /><span class="gender-heading">Other</span>
                                <br />
                                <label class="inputLbl">Email</label>
                                <br />
                                <input name="email" type="email" maxlength="100" placeholder="you@gamil.com" required="" />
                                <br />
                                <label class="inputLbl">Password</label>
                                <br />
                                <input name="password" type="password" placeholder="********" required="" />
                                <br />
                                <label class="inputLbl">Confirm Password</label>
                                <br />
                                <input name="confirm-password" type="password" placeholder="********" required="" />
                                <br />
                                <label class="inputLbl">Contact Number</label>
                                <br />
                                <input name="contact-number" type="text" placeholder="Contact Number" required="" />
                                <br />
                                <label class="inputLbl">Address</label>
                                <br />
                                <textarea id="address-input" name="address" placeholder="Your Address" required="" style="height:200px;"></textarea>
                                <br />
                                <input class="signup-btn" name="submitBtn" type="submit" value="REGISTER" />

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include('./../includes/footer.php')?>
</body>

</html>
