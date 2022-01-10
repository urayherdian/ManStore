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
$photo = $row['photo'];

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
} else { ?>

    <head>
        <link rel="stylesheet" href="style/style-acc.css">
        <title>Account Manager | Manshop</title>
    </head>

    <div class="container" id="acc">
        <div class="head">
            <div class="head-title active">
                <a href="">Biodata Diri</a>
            </div>

            <div class="head-title">
                <a href="address.php">Alamat</a>
            </div>
        </div>

        <div class="body">
            <div class="photo">
                <img src="<?php echo $photo; ?>" alt="Profile Picture" class="photo-img"><br>
                <form action="php/account-conn.php" method="POST" enctype="multipart/form-data">
                    <input id="button-file" name="photo" class="button" type="file" accept="image/*" onchange="this.form.submit()" hidden>
                </form>
                <label for="button-file" class="button-file" name="photo">Pilih Foto</label><br>
                <p>Maksimal Ukuran File: 10MB</p>
                <p>Ekstensi yang diterima: JPG, PNG, JPEG</p>
                <button class="button" id="buttonPassword" onclick="window.location.href='?pwc=1'">Ubah Kata Sandi</button>
            </div>

            <?php if (isset($_GET['edit']) && $_GET['edit'] == 1) { ?>
                <form class="biodata" action="php/account-conn.php" metod="POST">
                    <span style="font-weight: bolder;">Ubah Biodata Diri</span>
                    <button class="button-icon top-right danger" onclick="window.location.href='accountLG.php'">
                        <ion-icon name="close"></ion-icon>
                    </button>
                    <br>
                    <label for="">Nama</label>
                    <input type="text" class="input-text" name="name" placeholder="<?php echo $name; ?>" required><br>

                    <label for="">Tanggal Lahir</label>
                    <select name="date" id="">
                        <?php for ($i = 1; $i <= 31; $i++) {
                            echo "<option value='$i'>$i</option>";
                        } ?>
                    </select>
                    <select name="month" id="">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="Mei">Mei</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Okt">Okt</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                    </select>
                    <select name="year" id="">
                        <?php for ($i = 1970; $i <= 2010; $i++) {
                            echo "<option value='$i'>$i</option>";
                        } ?>
                    </select><br>

                    <label for="">Jenis Kelamin</label>
                    <select name="gender" id="">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select><br>

                    <p class="subtitle" style="font-weight: bolder;">Ubah Kontak</p>
                    <label for="">Email</label>
                    <input type="text" class="input-text" name="email" placeholder="<?php echo $email; ?>" required><br>

                    <center>
                        <input type="submit" value="SUBMIT" name="submit-profile">
                    </center>
                </form>
            <?php } else if (isset($_GET['pwc']) && $_GET['pwc'] == 1) { ?>
                <div class="biodata">
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="error"><?php echo $_GET['error']; ?></div>
                    <?php } ?>
                    <span style="font-weight: bolder;">Ubah Password</span>
                    <button class="button-icon top-right danger" onclick="window.location.href='accountLG.php'">
                        <ion-icon name="close"></ion-icon>
                    </button>
                    <br>
                    <form action="php/account-conn.php" method="POST">
                        <label for="">Password Lama</label>
                        <input type="password" class="input-text" name="old-password" required><br>

                        <label for="">Password Baru</label>
                        <input type="password" class="input-text" name="new-password" required><br>

                        <label for="">Konfirmasi Password Baru</label>
                        <input type="password" class="input-text" name="cnew-password" required><br>

                        <center>
                            <input type="submit" value="SUBMIT" name="submit-new-password">
                        </center>
                    </form>
                </div>
            <?php } else { ?>
                <div class="biodata">
                    <?php if (isset($_GET['success'])) { ?>
                        <div class="success"><?php echo $_GET['success']; ?></div><br>
                    <?php } ?>
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="error"><?php echo $_GET['error']; ?></div><br>
                    <?php } ?>
                    <span style="font-weight: bolder;">Biodata Diri</span>
                    <button class="button-icon top-right" onclick="window.location.href='?edit=1'">
                        <ion-icon name="pencil-outline"></ion-icon>
                    </button>
                    <br>
                    <label for="">Nama</label>
                    <span><?php echo $name; ?></span><br>

                    <label for="">Tanggal Lahir</label>
                    <span><?php echo $birthdate; ?></span><br>

                    <label for="">Jenis Kelamin</label>
                    <span><?php echo $gender ?></span>
                    <br>

                    <p class="subtitle" style="font-weight: bolder;">Kontak</p>
                    <label for="">Email</label>
                    <span><?php echo $email; ?></span><br>
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

<!-- <script>
    var modalPW = document.getElementById("modalPassword");
    var btnPW = document.getElementById("buttonPassword");
    var closeModalPW = document.getElementById("closeModalPassword");

    btnPW.onclick = function() {
        modalPW.style.display = "block";
    }

    closeModalPW.onclick = function() {
        modalPW.style.display = "none";
    }
</script> -->