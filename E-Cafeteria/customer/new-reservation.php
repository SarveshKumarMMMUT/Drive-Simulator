<?php $page_title='reservation'?>
<html>

<head>
    <title>
        <?php echo $page_title?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1 " />
    <link rel="stylesheet" type="text/css" href="./../css/new-reservation.css" />
    <link rel="stylesheet" type="text/css" href="./../css/footer.css" />
    <link rel="stylesheet" type="text/css" href="./../css/customer-header.css" />
</head>

<body>
    <?php include('./../includes/customer-header.php')?>
    <div class="container">
        <div class="container-main-reservation">
            <!--
<div class="menu-main-heading">
    <?php $heading = 'Reservation';?>
    <p class="menu-title">
        <?php echo $heading;?>
    </p>
</div>    
-->
            <div class="parent">
                <div class="child">
                    <p class="card-main-heading">RESERVATION</p>
                    <div style="border-bottom:1px solid firebrick; margin:auto;width:10%; margin-top:15px"></div>
                    <div class="text-container-div">
                        <p class="text">
                            Book online or give us a call on +91 9935171630 between 9.30am-10pm, or send us an email on
                            <b><i>gptsrvsh@gmail.com</i></b>
                        </p>
                        <p class="text">
                            Your feedback is important to us. Tell us what you think.
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
                    <div class="form-container">
                        <p class="table-booking-heading">MAKING A BOOKING</p>
                        <hr style="color: white" />
                        <form class="form" action="./../handling/booked.php" method="post">
                            <div class="input-div">
                                <div class="image-div"><span style="color:white; font-size:2vw;">Date</span></div>
                                <input class="email_input" name="date" type="date" value="" required="" />
                            </div>
                            <hr style="color: white" />
                            <div class="input-div">
                                <div class="image-div"><span style="color:white; font-size:2vw;">Count</span></div>
                                <?php
                                echo '<select name="people" class="people-count">';
                                for($people=1;$people<=25;$people++){
                                    echo "<option value=\"$people\">$people&nbsp<span>PEOPLE</span></option>";
                                }
                                echo '</select>';
                                ?>
                            </div>
							<div class="input-div">
                                <div class="image-div"><span style="color:white; font-size:2vw;">Email</span></div>
                                <input class="email_input" name="email" type="email" value="" placeholder="@your-email" required="" />
                            </div>
                            <input type="hidden" value="reservation" name="check">
                            <div class="input-div">
                                <!--                                <hr style="color: #32496f; width:100% ; margin-top:20px;" />-->
                                <input type="submit" value="FIND YOUR TABLE" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include('./../includes/footer.php')?>
</body>

</html>
