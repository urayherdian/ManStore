<?php

//start session
session_start();

require_once('./php/creatDb.php');
require_once('./php/component.php');
require_once('config.php');
$database = new createDb("manshop", "product");


?>
<?php
if (!isset($_SESSION['username'])) {
    require_once('./template/header.php');
} else {
    require_once('./template/headerLG.php');
}
?>

<!----------------- title -------------->
<div class="small-container">
    <div class="col">
                    <h2>All Products</h2>
    </div>
    <div class="col">
        <form action="products.php" method="get">

            <input type="text" name="cari" placeholder="Cari">
            <input type="submit" class="btn" width="25px" value="Cari">
        </form>
    </div>
    <?php
    $batas = 12;
    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

    $previous = $halaman - 1;
    $next = $halaman + 1;
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        if($cari != ""){
            $sql = "SELECT * FROM product WHERE item_name like '% . $cari . %'";
        }else{
            $sql = "SELECT * FROM product";
        }
        $result = mysqli_query($conn, $sql);
        $data = $result;
    } else {
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);
        $data = $result;
    }
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);
    if (isset($_GET['cari'])) {
        $data_product = mysqli_query($conn, "SELECT * FROM product WHERE item_name like '%" . $cari . "%' LIMIT $halaman_awal, $batas");
    } else {
        $data_product = mysqli_query($conn, "SELECT * FROM product LIMIT $halaman_awal, $batas");
    }
    echo '<div class="row">';
    for ($x = 0; $x <= 1; $x++) {
        while ($d = mysqli_fetch_array($data_product)) {
            product($d['item_id'], $d['item_name'], $d['item_price'], $d['item_image']);
        }
    }
    echo '</div>';
    ?>

    <div class="page-btn">
        <span>

            <a class="page-link" <?php if ($halaman > 1) {
                                        echo "href='?halaman=$previous'";
                                    } ?>>&#8592;</a>

        </span>

        <?php
        for ($x = 1; $x <= $total_halaman; $x++) {
        ?>
            <span>
                <a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
            </span>
        <?php
        }
        ?>

        <span>
            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='?halaman=$next'";
                                    } ?>>&#8594;</a>
        </span>
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