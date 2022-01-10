<?php
function component($itemId, $productname, $productprice, $productimg)
{
    $element = "
    <div class=\"col-4\">
        <a href=\"product_detail.php?id=$itemId\"><img src=\"images/product/$productimg\"></a>
        <h4><a href=\"product_detail.php?id=$itemId\">$productname</a></h4>
        <p>Rp $productprice</p>
    </div>
    ";
    echo $element;
}
function cartElement($productimg, $productname, $productprice, $productid)
{
    $element = "

        <tr>
            <td>
                <div class=\"cart-info\">
                    <img src=\"images/product/$productimg\">
                    <div>
                        <p>$productname</p>
                        <small>Price: Rp $productprice</small><br>
                        <a href=\"deleteCart.php?id=$productid\" class=\"btn btn-danger\">Delete</a>
                    </div>
                </div>
            </td>

    ";
    echo $element;
}
function product($itemId, $productname, $productprice, $productimg)
{
    $element = "

    <div class=\"col-4\">
        <a href=\"product_detail.php?id=$itemId\"><img src=\"images/product/$productimg\"></a>
        <h4><a href=\"product_detail.php?id=$itemId\">$productname</a></h4>
        <div class=\"rating\">
        </div>
        <p>Rp $productprice</p>
    </div>

    ";
    echo $element;
}
function user($id, $email, $username, $password)
{
    $element = "
        <tr>
            <th scope=\"row\">$id</th>
            <td>$email</td>
            <td>$username</td>
            <td>$password</td>
            <td><a href=\"delete.php?id=$id\" 
            class=\"btn btn-danger\">Delete</a></td>
        </tr>

    ";
    echo $element;
}
function products($no, $id, $productimg, $productname, $productprice, $description)
{
    $element = "
        <tr>
            <th scope=\"row\">$no</th>
            <td>$id</td>
            <td><img src=\"images/product/$productimg\" width=\"auto\" height=\"50\"></td>
            <td>$productname</td>
            <td>Rp $productprice</td>
            <td>$description</td>
            <td><a href=\"deletepro.php?id=$id\" 
            class=\"btn btn-danger\">Delete</a></td>
            <td><a href=\"update.php?id=$id\" 
            class=\"btn btn-success\">update</a></td>
        </tr>

    ";
    echo $element;
}

function checkout($no, $id, $total)
{
    $element = "
        <tr>
            <th scope=\"row\">$no</th>
            <td>$id</td>
            <td>$total</td>
            <td><a href=\"deleteCheckout.php?id=$id\" 
            class=\"btn btn-danger\">Delete</a></td>
            <td><a href=\"processCheckout.php?id=$id\" 
            class=\"btn btn-success\">Process</a></td>
        </tr>

    ";
    echo $element;
}
function detailCheckOut($no, $id, $productimg, $productname, $productprice, $value)
{
    $jumlah = $value * $productprice;
    $element = "
        <tr>
            <th scope=\"row\">$no</th>
            <td>$id</td>
            <td><img src=\"images/product/$productimg\" width=\"auto\" height=\"50\"></td>
            <td>$productname</td>
            <td>Rp. $productprice</td>
            <td>$value</td>
            <td>Rp. $jumlah</td>
        </tr>

    ";
    echo $element;
}
