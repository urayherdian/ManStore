<?php
session_start();

// if (!isset($_SESSION['username'])) {
//     echo "1";
//     require_once('./template/header.php');
// } else {
//     require_once('./template/headerLG.php');
// }

require_once('./template/header.php');
include "config.php";

//account fetch
$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE id='$id'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_array($res);

$name = $row['name'];
$birthdate = $row['birthdate'];
$gender = $row['gender'];
$email = $row['email'];

//address fetch
$query = "SELECT * FROM address WHERE id='$id'";
$res2 = mysqli_query($conn, $query);

$nama = "";
$hp = "";
$provinsi = "";
$kota = "";
$kecamatan = "";
$alamat = "";
$catatan = "";

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
} else { ?>

<head>
    <link rel="stylesheet" href="style/style-acc.css">
    <title>Account Manager | Manshop</title>
</head>

<div class="container" id="acc">
    <div class="head">
        <div class="head-title">
            <a href="accountLG.php">Biodata Diri</a>
        </div>

        <div class="head-title active">
            <a href="">Alamat</a>
        </div>
    </div>

    <div class="body" >
        <?php if(isset($_GET['add']) && $_GET['add']==1) { ?>
            <div class="biodata" style="grid-column: 1 / 3;">
                <?php if(isset($_GET['error'])) { ?>
                    <div class="error"><?php echo $_GET['error']; ?></div>
                <?php } ?>
                <button class="button-icon top-right danger" onclick="window.location.href='address.php';"><ion-icon name="close"></ion-icon></button>
                <form action="php/account-conn.php" method="POST">
                    <?php if(isset($_GET['edit'])) {
                        $address_id = $_GET['edit'];
                        $query_edit = "SELECT * FROM address
                        WHERE address_id = '$address_id'";
                        $res3 = mysqli_query($conn, $query_edit);
                        $row3 = mysqli_fetch_array($res3);

                        $nama = $row3['nama'];
                        $hp = $row3['hp'];
                        $provinsi = $row3['provinsi'];
                        $kota = $row3['kota'];
                        $kecamatan = $row3['kecamatan'];
                        $alamat = $row3['alamat'];
                        $catatan = $row3['catatan'];
                    } ?>
                    <input type="hidden" name="address-id" value='<?php echo $address_id; ?>'>

                    <label for="">Nama Penerima</label>
                    <input type="text" class="input-text" name="nama" placeholder='<?php echo $nama ;?>' required><br>

                    <label for="">Nomor HP</label>
                    <input type="text" class="input-text" name="hp" placeholder='<?php echo $hp ;?>' required><br>

                    <label for="">Provinsi</label>
                    <input type="text" class="input-text" name="provinsi" placeholder='<?php echo $provinsi ;?>' required><br>

                    <label for="">Kota</label>
                    <input type="text" class="input-text" name="kota" placeholder='<?php echo $kota ;?>' required><br>

                    <label for="">Kecamatan</label>
                    <input type="text" class="input-text" name="kecamatan" placeholder='<?php echo $kecamatan ;?>' required><br>

                    <?php if(isset($_GET['edit'])) { ?>
                        <label for="">Alamat</label>
                        <input type="text" class="input-text" name="alamat" placeholder='<?php echo $alamat ;?>' required><br>
                    <?php } else { ?>
                        <label for="">Alamat Baris 1</label>
                        <input type="text" class="input-text" name="alamat1" required><br>

                        <label for="">Alamat Baris 2</label>
                        <input type="text" class="input-text" name="alamat2"><br>
                    <?php } ?>
                    

                    <label for="">Catatan (Opsional)</label>
                    <input type="text" class="input-text" name="catatan" placeholder='<?php echo $catatan ;?>'><br>

                    <center>
                        <?php if(isset($_GET['edit'])) { ?>
                            <input type="submit" value="E D I T" name="edit-address">
                        <?php } else { ?>
                            <input type="submit" value="SUBMIT" name="submit-address">
                        <?php } ?>
                    </center>
                </form>
            </div>
        <?php } else { ?>
            <div class="biodata" style="grid-column: 1 / 3;">
                <center>
                    <button class="button" onclick="window.location.href='?add=1'">Tambah Alamat Baru</button>
                </center><br>
                <?php if($res2->num_rows < 1) { ?>
                    <center>
                        Anda belum menambahkan Alamat. <br>
                        Silahkan menambahkan Alamat terlebih dahulu! <br>
                    </center>
                <?php } else { ?>
                    <?php if(isset($_GET['success'])) { ?>
                        <center><div class="success"><?php echo $_GET['success']; ?></div></center><br>
                    <?php } ?>
                    <?php if(isset($_GET['warning'])) { ?>
                        <center><div class="warning"><?php echo $_GET['warning']; ?></div></center><br>
                    <?php } ?>
                    <?php if(isset($_GET['error'])) { ?>
                        <center><div class="error"><?php echo $_GET['error']; ?></div></center><br>
                    <?php } ?>
                        <center>
                            <?php while($row2 = mysqli_fetch_array($res2)) { ?>
                                <div class="address">
                                    <button class="button-icon top-right" onclick="window.location.href='?add=1&edit=<?php echo $row2['address_id']; ?>'"><ion-icon name="pencil-outline"></ion-icon></button>
                                    <button class="button-icon bottom-right danger" onclick="confirm('Yakin Ingin Mengahpus Alamat?'); window.location.href='php/account-conn.php?removeaddress=<?php echo $row2['address_id']; ?>'"><ion-icon name="trash"></ion-icon></button>
                                    <span class="nama-penerima"><?php echo $row2['nama'];?></span><br>
                                    <span><?php echo $row2['hp'];?></span><br>
                                    <span><?php echo $row2['alamat'];?></span><br>
                                </div>
                            <?php } ?>
                        </center>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>

<?php } ?>

<!----------Footer--------------->

<?php
require_once('./template/footer.php');
?>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>