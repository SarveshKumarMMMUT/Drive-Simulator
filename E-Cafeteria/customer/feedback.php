<?php $page_title='Feedback'?>
<html>

<head>
    <title>
        <?php echo $page_title?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1 " />
    <link rel="stylesheet" type="text/css" href="./../css/feedback.css" />
    <link rel="stylesheet" type="text/css" href="./../css/footer.css" />
    <link rel="stylesheet" type="text/css" href="./../css/customer-header.css" />
</head>

<body>
    <?php include('./../includes/customer-header.php')?>
    <div class="main-container">
        <div class="parent">
            <div class="child">
                <p class="card-main-heading">FEEDBACK</p>
                <div style="border-bottom:1px solid firebrick; margin:auto;width:10%; margin-top:15px"></div>

                <div class="table-main-container">
                    <div class="sign-up-form-container">
                        <form id="form" action="./../handling/feedback-handle.php" method="post">
                            <p style="color:white; font-size:2vw; text-align:center">Your feedback is important to us. Tell us what you think.

                            </p>

                            <label class="inputLbl">Email</label>
                            <br />
                            <input name="email" type="email" maxlength="100" placeholder="you@gamil.com" required="" />
                            <br />
                            <label class="inputLbl">Feedback</label>
                            <br />
                            <textarea name="feedback" placeholder="Write Your Feedback" required="" style="height:200px;"></textarea>
                            <br />
                            <input class="signup-btn" name="submitBtn" type="submit" value="SUBMIT" />
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include('./../includes/footer.php')?>
</body>

</html>
