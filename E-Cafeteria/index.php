<?php $page_title='Home'?>
<html>

<head>
    <title>
        <?php echo $page_title?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1 " />
    <link rel="stylesheet" type="text/css" href="./css/home.css" />
    <link rel="stylesheet" type="text/css" href="./../css/footer.css" />
    <link rel="stylesheet" type="text/css" href="./../css/customer-header.css" />
</head>

<body>
    <?php include('./includes/customer-header.php')?>
    <div class="container">
        <div class="container-main">
            <div class="main-heading">
                <?php $heading = 'WELCOME TO CAFETARIA';?>
                <p class="title">
                    <?php echo $heading;?>
                </p>
            </div>
            <div class="parent">
                <div class="child">
                    <p class="card-main-heading">Family Fun Meal</p>
                    <p class="menu-card-info">RICE-BASED APPETIZERS gluten free</p>
                    <div style="border-bottom:1px solid firebrick; margin:auto;width:10%; margin-top:15px"></div>
                    <p class="card-last-info"></p>
                    <div class="text-container-div">
                        <div class="image-col"><img src="./../images/burger.jpeg" alt="first" height="240" width="100%" />
                            <p class="card-last-info">Burger</p>
                        </div>
                        <div class="image-col"><img src="./../images/maggi.jpg" alt="first" height="240px" width="100%" />
                            <p class="card-last-info">Maggi</p>
                        </div>
                        <div class="image-col"><img src="./../images/roll.jpeg" alt="first" height="240px" width="100%" />
                            <p class="card-last-info">Egg-Roll</p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="./../images/2.jpg" alt="item" width="70% " height="500px" align="center" style=" margin-left:12%; padding:0px" />

            <div class="parent">
                <div class="child">
                    <p class="card-main-heading">Spanish Tomato Veg Pasta</p>
                    <div style="border-bottom:1px solid firebrick; margin:auto;width:10%; margin-top:15px"></div>
                    <p class="card-last-info"> Classic Tomato Sauce Given The Flavor Twist Of Sun Dried Tomatoes With Chicken & Cheese</p>
                    <div class="third-text-container-div">
                        <div class="third-image-col">
                            <div class="image-hover-div">
                                <p class="home-menu-title">Pizza</p>
                                <img src="./../images/pizza.jpeg" . alt="first" height="350px" width="100%" />
                                <p class="some-info">Pizza is a traditional Italian dish consisting of a yeasted flatbread typically topped with tomato sauce and cheese and baked in an oven. </p>
                            </div>
                        </div>
                        <div class="third-image-col">
                            <div class="image-hover-div">
                                <p class="home-menu-title">Pasta</p>
                                <img src="./../images/menu2.jpeg" alt="first" height="350px" width="100%" />
                                <p class="some-info">Pasta is a staple food of traditional Italian cuisine, with the first reference dating to 1154 in Sicily.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('./includes/footer.php')?>
</body>

</html>
