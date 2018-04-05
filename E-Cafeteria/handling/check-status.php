<?php $page_title='Check Your Status';?>
<html>
<head>
    <title>
        <?php echo $page_title?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1 " />
    <link rel="stylesheet" type="text/css" href="./check-status.css" />
    <link rel="stylesheet" type="text/css" href="./../css/footer.css" />
    <link rel="stylesheet" type="text/css" href="./../css/customer-header.css" />
</head>

<body>
    <?php include('./../includes/customer-header.php')?>
    <div class="parent">
        <div class="child">
            <p class="card-main-heading">RESERVATION STATUS </p>
            <div style="border-bottom:1px solid firebrick; margin:auto;width:10%; margin-top:15px"></div>
            <div class="container">
                <form id="form" action="./booked.php" method="post">
                    <label class="inputLbl">No. of People</label>
                    <br />
                    <input name="people" type="text" maxlength="100" placeholder="How Many People" required="" />
                    <br />
                    <label class="inputLbl">Email</label>
                    <br />
                    <input name="email" type="email" placeholder="********" required="" />
                    <br />
					<input type="hidden" name="check" value="check_status">
                    <input class="signup-btn" name="submitBtn" type="submit" value="CHECK STATUS" />
                </form>
            </div>
        </div>
    </div>
    <?php include('./../includes/footer.php')?>
</body>

</html>
