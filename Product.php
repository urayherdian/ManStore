<?php

//start session
session_start();

include "config.php";
require_once('./php/creatDb.php');
require_once('./php/component.php');
$database = new createDb("urayherd_admin", "product");


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
    <title>Product</title>
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
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php $sql = "SELECT * FROM product";
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
                    <h3 class="fs-4 mb-3">Products <a href="upload.php" class="btn btn-success">Upload</a></h3>
                    <div class="fs-10 mb-3">
                            <form action="Product.php" method="get">
                                <input type="text" name="cari" placeholder="Cari">
                                <input type="submit" class="btn btn-primary" width="25px" value="Cari">
                            </form>
                    </div>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">id</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                if (!$data_product) {
                                    echo "NULL";
                                } else {
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($data_product)) {
                                        products($no, $row['item_id'], $row['item_cart'], $row['item_name'], $row['item_price'], $row['description']);
                                        $no++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <nav aria-label="...">
                          <ul class="pagination">
                            <li class="page-item">
                              <a class="page-link" <?php if ($halaman > 1) {
                                        echo "href='?halaman=$previous'";
                                    } ?>>Previous</a>
                            </li>
                            <?php
                                for ($x = 1; $x <= $total_halaman; $x++) {
                            ?>
                                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                                }
                            ?>
                            <li class="page-item">
                              <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='?halaman=$next'";
                                    } ?>>Next</a>
                            </li>
                          </ul>
                        </nav>
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