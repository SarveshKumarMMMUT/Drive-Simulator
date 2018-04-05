
<?php
ob_start();
$page_title = 'Reservation';
require('./../../mysqli_connect.php');
$bool=0;
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
        <link rel="stylesheet" type="text/css" href="./../c.css">
        <script type="text/javascript" src="./../c.js"></script>
    </head>

    <body>
        <?php
		$bool=1;
        include('./../includes/customer-header.php');
				if(($_SERVER['REQUEST_METHOD']=='POST')&&($_POST['check']=='check_status')){
					$email = $_POST['email'];
					$people = $_POST['people'];
							$q = 'SELECT people, email from reservations';
							$res = @mysqli_query($dbc, $q); 
							echo mysqli_error($dbc);
							while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
								 if((strcmp($row['email'],$email)==0)&&(strcmp($row['people'],$people)==0)){
									 $bool = 2;
								 }else{
									 $bool =3;
								 }
							}
				}
				
				
                   if(($_SERVER['REQUEST_METHOD'] == 'POST')&&(!strcmp($_POST['check'], 'reservation'))){
                $errors = array();
                if(!empty($_POST['people'])){
                    $people = intval(trim($_POST['people']));
                }
                else{
                    $errors = 'Please enter the number of People for Reservation';
                }
                if(!empty($_POST['email'])){
                    $email = trim($_POST['email']);
                }
                else{
                    $errors = 'Please Enter the your Email';
                }
                if(empty($errors)){
					$bool = TRUE;
                    if($bool){
                        echo "Inserting";
                        $q = "INSERT INTO reservations (email, people, date_entered) values ('$email','$people',  now())";
                        $res = @mysqli_query($dbc,$q);
                        echo mysqli_error($dbc);
                        if($res){
							$bool=1;
                            echo $display = 'Successfulllll table booked';
                        }
                        else{
                            if(strcmp("Duplicate entry", substr(mysqli_error($dbc), 0, 15))==0){
							}
                        }
                        mysqli_close($dbc);
                    }
                    else{
                         echo 'You are not registered you will be redirect to another page';
                            header("Location:./../customer/sign-up.php");
                    }
                } 
                else{ 
                    echo '<h1>Error!</h1>
                    <h1>Table booking error</h1>
                    <p class="error">The following error(s) occurred:<br />';
                    print_r($errors);
                }
            }
        
        //already registered end
        
        ?>
            <div class="parent">
                <div class="child">
                    <p class="card-main-heading">
                        <?php 
							if($bool===1){
								echo $display ;
							}
							if($bool===2){
								echo 'Reservations Processed and table has been booked come on date ';
							}
							if($bool===3){
								echo 'Your table has not been booked';
							}
						?>
                    </p>
                    <p class="card-info">PLEASE GIVE US ANOTHER TIME TO SERVE YOU</p>
                    <a></a>
                </div>
            </div>
            <?php include('./../includes/footer.php')?>
    </body>

    </html>
