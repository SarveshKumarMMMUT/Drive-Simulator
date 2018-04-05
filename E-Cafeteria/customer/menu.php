<?php $page_title = 'Menu';
include('./../../mysqli_connect.php');
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="./../css/footer.css" />
    <link rel="stylesheet" type="text/css" href="./../css/customer-header.css" />
    <link rel="stylesheet" type="text/css" href="./../css/menu.css" />
</head>

<body>
    <?php
        include('./../includes/customer-header.php');
    ?>
        <div class="menu-container">
            <div class="menu-main-heading">
                <?php $heading = 'MENUS';?>
                <p class="menu-title">
                    <?php echo $heading;?>
                </p>
            </div>

            <div class="menu-card-container">
                <div class="menu-card">
                    <p class="menu-card-main-heading">LUNCH</p>

                    <p class="menu-card-info">RICE-BASED APPETIZERS gluten free</p>
                    <div class="menu-card-image">
                        <img src="./../images/lunch2.jpeg" alt="image" width="100%" height="100%" />
                    </div>
                    <div class="menu-table-div">

                        <div class="just-menu">
                            <div class="just-menu-info-div">
                                <p class="menu-name">Special Veg Thali </p>
                                <p class="price">&#8377;&nbsp;90</p>
                                <p class="menu-info">
                                    Vegetarian thalis are very typical and <br>commonplace in Tamil Nadu canteens (and South India in general),<br /> and are a popular lunch choice.
                                </p>


                            </div>
                        </div>
                        <div class="just-menu">
                            <div class="just-menu-info-div">
                                <p class="menu-name">Vegetable pinwheel</p>
                                <p class="price">&#8377;&nbsp;100</p>
                                <p class="menu-info">
                                    Fried or Baked dish with a Savoury Filling,
                                    <br />with spiced potatoes, onions, peas.

                                </p>

                            </div>
                        </div>
                        <div class="just-menu">
                            <div class="just-menu-info-div">
                                <p class="menu-name"> Grape tomatoes & shredded carrots</p>
                                <p class="price">&#8377;&nbsp;125</p>
                                <p class="menu-info">
                                    Time for something orange! Here's a delicately
                                    <br> crunchy and flavorful carrot, avocado & grape tomato <br>salad, using shredded carrot as the base and complemented <br>with fresh, chopped chives.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-card-container" style="margin-bottom:200px">
                <div class="menu-card">
                    <p class="menu-card-main-heading">DINNER</p>


                    <div class="menu-card-image">
                        <img src="./../images/dinner.jpeg" alt="image" width="100%" height="100%" />
                    </div>
                    <div class="menu-table-div">

                        <div class="just-menu">
                            <div class="just-menu-info-div">
                                <p class="menu-name">Shahi Panner</p>
                                <p class="price">&#8377;&nbsp;85</p>
                                <p class="menu-info">
                                    Shahi paneer is a preparation of paneer cottage cheese in><br /> a thick gravy made up of cream, tomatoes and spices from the Indian subcontinen.
                                </p>


                            </div>
                        </div>
                        <div class="just-menu">
                            <div class="just-menu-info-div">
                                <p class="menu-name">Manchurian</p>
                                <p class="price">&#8377;&nbsp;75</p>
                                <p class="menu-info">
                                    Gobi Manchurian is an Indian Chinese fried cauliflower<br> food item popular in India. Gobi Manchurian is the result of the adaptation of Chinese cooking<br /> and seasoning techniques to suit Indian tastes
                                </p>

                            </div>
                        </div>
                        <div class="just-menu">
                            <div class="just-menu-info-div">
                                <p class="menu-name">Chicken Fried Rice</p>
                                <p class="price">&#8377;&nbsp;105</p>
                                <p class="menu-info">
                                    Chicken Fried rice is a dish of cooked rice that<br /> has been stir-fried in a wok or a frying pan and is usually mixed <br />with other ingredients such as eggs, vegetables,<br /> seafood, or meat
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<?php require_once('./../includes/footer.php'); ?>

</html>
