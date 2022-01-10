<?php

session_start();
$id = $_SESSION['id'];

require_once('config.php');
require_once('./php/component.php');
$sqlPro = mysqli_query($conn, "SELECT * FROM `product`");
$sql2 = mysqli_query($conn, "SELECT * FROM `cart` WHERE id='$id' AND cart='No'");

?>

<?php
if (!isset($_SESSION['username'])) {
    require_once('./template/header.php');
} else {
    require_once('./template/headerLG.php');
}
?>


<!--------------Cart Items details--------------->
<div class="small-container cart-page">

    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <?php
        $total = 0;
        if (mysqli_num_rows($sql2) == 0) {
            echo "<tr>
            <th></th>
            <th>Product Kosong</th>
            <th></th>
        </tr>";
        } else {
            $dataPro = mysqli_fetch_all($sqlPro, MYSQLI_ASSOC);
            $dataCart = mysqli_fetch_all($sql2, MYSQLI_ASSOC);

            for ($x = 0; $x < count($dataCart); $x++) {
                $j = 0;
                while ($dataPro[$j]['item_id'] != $dataCart[$x]['product_id']) {
                    $j++;
                }
                if ($dataPro[$j]['item_id'] == $dataCart[$x]['product_id']) {
                    cartElement($dataPro[$j]['item_cart'], $dataPro[$j]['item_name'], $dataPro[$j]['item_price'], $dataPro[$j]['item_id']);
                    $subtotal = $dataPro[$j]['item_price'] * $dataCart[$x]['value'];
                    $value = $dataCart[$x]['value'];
                    echo "  
                                <td>$value</td>
                                <td>Rp $subtotal</td>
                    </tr>";
                    $total = $total + (int)$subtotal;
                }
            }
        }
        ?>
    </table>

    <div class="total-price">
        <table>
            <tr>
                <td>Subtotal</td>
                <td><?php
                    echo "Rp. $total";
                    ?></td>
            </tr>
            <tr>
                <td>Tax</td>
                <td><?php
                    $tax = $total * 0.1;
                    echo "Rp. $tax";
                    ?></td>
                </td>
            </tr>
            <tr>
                <td>Total</td>
                <td><?php
                    $hasil = $total + $tax;
                    echo "Rp. $hasil";
                    ?></td>
                </td>
            </tr>

        </table>
    </div>
    <div class="total-price">
        <?php if(isset($_SESSION['id'])) { ?>
            <a href="php/account-conn.php?checkout=success" class="btn">Proceed to checkout &#8594;</a>
        <?php } else { ?>
            <a href="php/account-conn.php?checkout=no id" class="btn">Proceed to checkout &#8594;</a>
        <?php } ?>
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