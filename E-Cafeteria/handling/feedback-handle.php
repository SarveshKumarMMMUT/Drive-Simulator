<!--written by Anurag Yadav 1/26/2018-->
<?php $page_title='Feedback'?>
<html>

<head>
    <title>
        <?php echo $page_title?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1 " />
    <link rel="stylesheet" type="text/css" href="feedback-handle.css" />
    <link rel="stylesheet" type="text/css" href="./../css/footer.css" />
    <link rel="stylesheet" type="text/css" href="./../css/customer-header.css" />
</head>

<body>
    <?php include('./../includes/customer-header.php')?>
    <?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $errors = array();
        if(!empty($_POST['email'])){
            $e = trim($_POST['email']);
        }
        else{
            $errors = 'Pleae Enter Your email';
        }
        if(!empty($_POST['feedback'])){
            $fb = trim($_POST['feedback']);
        }
        else{
            $errors = 'Please Write Something';
        }
    
        if(empty($error)){
            require('./../../mysqli_connect.php');
            $q = "INSERT INTO feedbacks(email, body, date_entered)values('$e', '$fb', NOW())";
            $res = mysqli_query($dbc, $q);
            if($res){
//                echo '<p>Thank you for Your valuable feedback</p>';
                $display  = 'Thank you for Your valuable feedback';
            }
            else{
                if(strcmp("Duplicate entry", substr(mysqli_error($dbc), 0, 15))==0){
//                    echo 'You have already sbmitted your feedback';
                    $display = 'YOU HAVE ALREADY SUBMITTED YOUR FEEDBACK';
                }
                else{
//                    echo '<p>Your feedback can\'t be submit sorry of any inconvinience</p>'.mysqli_error($dbc);
                    $display = 'Your feedback can\'t be submit sorry of any inconvinience</p>'.mysqli_error($dbc);
                }
            }
            mysqli_close($dbc);
        }
        else{
            echo 'The following error has been occurred';
            foreach($error as $key){
                echo '<h1>'.$key.'</h1><br />';
            }
        }
    }
?>
    <div class="parent">
        <div class="child">
            <p class="card-main-heading">
                <?php echo $display;?>
            </p>

            <p class="card-info">PLEASE GIVE US ANOTHER TIME TO SERVE YOU</p>
        </div>
    </div>
    <?php include('./../includes/footer.php')?>
</body>

</html>
