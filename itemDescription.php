<?php

$name = $_GET['name'];
require_once "home/homeDb.php";

$sql1 = "SELECT * FROM productb WHERE product_name='$name'";
$result = $con->query($sql1);
$row = $result;

while ($rows = $result->fetch_assoc()) {
    $price = $rows['product_price'];
    $image = $rows['product_image'];
    $name = $rows['product_name'];
    $second = $rows['second_price'];
    $dis = $rows['product_description'];
    $author=$rows['product_author'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Item Description</title>
    <link rel="stylesheet" href="./styles/footer.css">
    <link rel="stylesheet" href="./styles/navbar.css" />
    <link rel="stylesheet" href="./styles/description.css" />
    <link rel="stylesheet" href="./styles/home_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <?php require_once "head.php" ?>
</head>

<body>

    <?php require_once "nav.php" ?>
    <div class="row">

        <div class="col-sm-2 col-md-3"></div>
        <div class="col-sm-8 col-md-6">

            <div class="container" id="itemCard">
                <div class="row">
                    <div class="col-md-6 col-sm-6" id="product-img" style=" width:100%; height:100%">

                        <img src="<?= htmlentities($image) ?>" alt="product">
                    </div>


                    <div class="col-md-6 col-sm-6" id="desc">
                        <div id="itemName"> <?= htmlentities($name) ?></div>
                        <div id="authorName"><b><?= htmlentities($author) ?></b></div>
                        <div id="catogary">Electronic items</div>
                        <div id="itemPrice">$ <?= htmlentities($price) ?> <s class="text-secondary">   $<?= htmlentities($second) ?></s></div>
                        <div id="itemDescription"><?= htmlentities($dis) ?></div>
                        
                        <div class="row" id="Buttons">
                            <!-- <div class="col-md-2"></div> -->
                            <div class="col">
                                <button class="btn btn-outline-info my-3" id="buyButton">Buy Now</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-info my-3" id="cartButton">Add To Cart</button>
                            </div>
                            <!-- <div class="col-md-2"></div> -->
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-2 col-md-3"></div>
    <!--header2-->

    <div class="container">
        <h4>Top selling by <?= htmlentities($author) ?></h4>
    </div>

    <div class="container-fluid">
        <hr>
    </div>


    <!--other books-->
    <?php
    require_once("./home/homeDb.php");
    require_once("./home/item-component.php");

    //Create instance of createdb class
    // $database=new CreateDb("Productdb", "productb");

    ?>

    <div class="container">
        <div class="row text-center py-5">
            <?php
            $sql = "SELECT * FROM productb WHERE product_author='$author' LIMIT 2,4";
            $result = mysqli_query($con, $sql);
            // $result = $database->getData();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['product_name'], $row['product_price'], $row['second_price'], $row['product_image'], $row['id']);
                }
            }
            ?>
        </div>
    </div>
    <br>
    <br>

    <!--header1-->
    <div class="container-fluid">
        <div class="header" id="header1">
            <h5>Top selling</h5>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
    </div>


    <!--top selling item-->
    <?php
    require_once("./home/homeDb.php");
    require_once("./home/item-component.php");

    //Create instance of createdb class
    // $database=new CreateDb("Productdb", "productb");

    ?>



    <div class="container">
        <div class="row text-center py-5">
            <?php
            $sql = "SELECT * FROM productb LIMIT 3,8";
            $result = mysqli_query($con, $sql);
            // $result = $database->getData();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['product_name'], $row['product_price'], $row['second_price'], $row['product_image'], $row['id']);
                }
            }

            ?>
        </div>
    </div>


    </div>

    <?php require_once "script.php" ?>
    <!--<footer id="footer1">-->
        <?php require_once "footer.php" ?>
    <!--</footer>-->
    

</body>

</html>