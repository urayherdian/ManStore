<?php

//start session
session_start();


require_once('./php/creatDb.php');
require_once('./php/component.php');
$database = new createDb("manshop", "product");

include "config.php";

$sql = mysqli_query($conn, "SELECT * FROM `product` WHERE `product`.`item_id` = '$_GET[id]' ");
$data = mysqli_fetch_array($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Update</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i>Manshop</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user me-2"></i>User</a>
                <a href="Product.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i class="fas fa-shopping-cart me-2"></i>Products</a>
                <a href="checkout.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-shopping-basket"></i> Check Out</a>
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

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Products</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <form action="update_proses.php?id=<?php echo $data['item_id']; ?>" method="post" enctype="multipart/form-data">
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Item Type" name="id" value="<?php echo $data['item_id']; ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Item Type" name="type" value="<?php echo $data['item_brand']; ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Item Name" name="name" value="<?php echo $data['item_name']; ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Item Price" name="price" value="<?php echo $data['item_price']; ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <textarea class="form-control" name="description" placeholder="Description" rows="3"><?php echo $data['description']; ?></textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="formGroupExampleInput">Image Product</label> <br>
                                                    <img src="images/product/<?php echo $data['item_image']; ?>" width="auto" height="300">
                                                    <div class="form-group">
                                                        <input id="input-b1" name="my_image1" type="file" class="file" data-browse-on-zone-click="true">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="formGroupExampleInput">Image Cart</label><br>
                                                    <img src="images/cart/<?php echo $data['item_cart']; ?>" width="auto" height="300">
                                                    <div class="form-group">
                                                        <input id="input-b1" name="my_image2" type="file" class="file" data-browse-on-zone-click="true">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div>
                                                <button type="submit" class="btn btn-primary" name="submit">Update</button>
                                                <a href="Product.php" class="btn btn-success">Back</a>
                                            </div>
                                        </form>
                                    </th>
                                </tr>
                            </thead>
                        </table>
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