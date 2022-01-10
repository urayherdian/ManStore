<?php

//start session
session_start();
include "config.php";

require_once('./php/creatDb.php');
require_once('./php/component.php');
$database = new createDb("urayherd_admin", "product");
$result = $database->getData();

$sql = mysqli_query($conn, "SELECT * FROM `product` WHERE `product`.`item_id` = '$_GET[id]' ");
$data = mysqli_fetch_array($sql);

?>
<?php
if (!isset($_SESSION['username'])) {
    require_once('./template/header.php');
} else {
    require_once('./template/headerLG.php');
}
?>

<!--------------single-product--------------->
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="images/product/<?php echo $data['item_image']; ?>" width="100%" id="ProductImg">
        </div>
        <div class="col-2">
            <p><?php echo $data['item_brand']; ?></p>
            <h1><?php echo $data['item_name']; ?></h1>
            <h4>Rp. <?php echo $data['item_price']; ?></h4>
            <?php if (isset($_SESSION['id'])) { ?>
                <form action="addprosess.php?id=<?php echo $data['item_id']; ?>" method="POST" enctype="multipart/form-data">
                    <input type="number" name="jumlah" value="1">
                    <button class="btn" name="add">Add To Cart</button>
                </form>
            <?php } else { ?>
                <form action="php/account-conn.php?checkout=no id" method="POST" enctype="multipart/form-data">
                    <input type="number" name="jumlah" value="1">
                    <button class="btn" name="add">Add To Cart</button>
                </form>
            <?php } ?>
            <h3>PRODUCT DETAILS <i class="fa fa-indent"></i></h3>
            <br>
            <p><?php echo $data['description']; ?></p>
        </div>
    </div>
</div>
<!----------------- title -------------->
<div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
        <p>View More</p>
    </div>

</div>

<!-------------- Our Products -------------->
<div class="small-container">

    <div class="row">
        <?php
        $result = $database->getData();
        for ($x = 0; $x <= 11; $x++) {
            $row[$x] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        shuffle($row);
        for ($x = 0; $x <= 3; $x++) {
            component($row[$x]['item_id'], $row[$x]['item_name'], $row[$x]['item_price'], $row[$x]['item_image']);
        }
        ?>
    </div>

</div>



<!----------Footer--------------->

<?php
require_once('./template/footer.php');
?>




<!-------------js for toggle menu-------------->

<script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px"
        }
    }

    //-------------Produc Gallery------------

    var ProductImg = document.getElementById("ProductImg");

    var SmallImg = document.getElementsByClassName("small-img");


    SmallImg[0].onclick = function() {
        ProductImg.src = SmallImg[0].src;
    }
    SmallImg[1].onclick = function() {
        ProductImg.src = SmallImg[1].src;

    }
    SmallImg[2].onclick = function() {
        ProductImg.src = SmallImg[2].src;

    }
    SmallImg[3].onclick = function() {
        ProductImg.src = SmallImg[3].src;

    }

    //-------------End Produc Gallery------------  
</script>



</body>

</html>