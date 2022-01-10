<?php

//start session
session_start();

require_once('./php/component.php');


?>
<?php
// if (!isset($_SESSION['username'])) {
//     require_once('./template/headerIndex.php');
// } else {
//     require_once('./template/headerIndexLG.php');
// }

require_once('./template/headerIndex.php');

?>
<!------------------ featured categories --------------->
<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-4">
                <img src="./images/category1.jpg">
            </div>
            <div class="col-4">
                <img src="./images/category2.jpg">
            </div>
            <div class="col-4">
                <img src="./images/category3.jpg">
            </div>
            <div class="col-4">
                <img src="./images/category4.jpg">
            </div>
        </div>
    </div>
</div>

<!-------------- Our Featured Products -------------->

<div class="small-container">
    <h2 class="title">Latest Products</h2>
    <div class="row">
        <?php
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);
        for ($x = 0; $x <= 8; $x++) {
            $row[$x] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        shuffle($row);
        for ($x = 0; $x <= 3; $x++) {
            component($row[$x]['item_id'], $row[$x]['item_name'], $row[$x]['item_price'], $row[$x]['item_image']);
        }
        ?>
    </div>
    <div class="row">
        <?php
        $result = mysqli_query($conn, $sql);
        for ($x = 0; $x <= 8; $x++) {
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
</script>
</body>

</html>