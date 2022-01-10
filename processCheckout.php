<?php

//start session
session_start();

include "config.php";
require_once('./php/creatDb.php');
require_once('./php/component.php');
$database = new createDb("manshop", "product");


?>
<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === "Yes") { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Proses</title>
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="style/style.css">
    </head>

    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i>Manshop</div>
                <div class="list-group list-group-flush my-3">
                    <a href="admin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user me-2"></i>User</a>
                    <a href="Product.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-shopping-cart me-2"></i>Products</a>
                    <a href="checkout.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class="fas fa-shopping-basket"></i> Check Out</a>
                    <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Dashboard</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <a class="nav-link second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>User
                            </a>
                        </ul>
                    </div>
                </nav>

                <div class="container-fluid px-4">
                    <div class="row g-3 my-2">
                        <div class="col-md-3">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2"><?php
                                                        $id_member = $_GET['id'];
                                                        $sql = "SELECT * FROM cart WHERE cart = 'Yes' AND id = '$id_member';";
                                                        $result = mysqli_query($conn, $sql);
                                                        $count = 1;
                                                        if (!$result) {
                                                            $count = 0;
                                                        } else {
                                                            $row = mysqli_fetch_assoc($result);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $count++;
                                                            }
                                                        }
                                                        echo $count;
                                                        ?></h3>
                                    <p class="fs-5">Products</p>
                                </div>
                                <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row my-5">
                        <h3 class="fs-4 mb-3">Detail</h3>
                        <div class="col">
                            <table class="table bg-white rounded shadow-sm  table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col" width="50">#</th>
                                        <th scope="col">id</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql1 = "SELECT product_id, value ,id FROM cart WHERE cart = 'Yes';";
                                    $result1 = mysqli_query($conn, $sql1);
                                    $subTotal = 0;
                                    if (!$result1) {
                                        echo "NULL";
                                    } else {
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result1)) {
                                            $productID = $row['product_id'];
                                            $sql2 = "SELECT item_cart, item_name ,item_price FROM product WHERE item_id = '$productID';";
                                            $result2 = mysqli_query($conn, $sql2);
                                            $row2 = mysqli_fetch_assoc($result2);
                                            detailCheckOut($no, $row['product_id'], $row2['item_cart'], $row2['item_name'], $row2['item_price'], $row['value']);
                                            $no++;
                                            $subTotal = $subTotal + ($row2['item_price'] * $row['value']);
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td>Sub Total</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Rp. <?php echo $subTotal; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="checkout.php" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            var el = document.getElementById("wrapper");
            var toggleButton = document.getElementById("menu-toggle");

            toggleButton.onclick = function() {
                el.classList.toggle("toggled");
            };
        </script>
    </body>

    </html>
<?php } else {
    header("Location: index.php");
} ?>