<?php
session_start();
include ("../config.php");

// echo $_SESSION['id'];
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}

if($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
} else {
    //change profile picture
    if(isset($_FILES['photo'])) {
        $username = $_SESSION['username'];
        $directory = "../account/$username/";
        $dir = "account/$username/";
        $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $filename = $username.".".$ext;
        $filter = array('jpeg', 'jpg', 'png');

        if (in_array($ext, $filter)) {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $directory.$filename)) {
                $sql = "UPDATE users SET photo='$dir$filename'
                WHERE id='$id'";
                mysqli_query($conn, $sql);
                header("Location: ../accountLG.php?success=Gambar Berhasil Diubah.");
                exit();
            } else {
                header("Location: ../accountLG.php?error=Gambar Tidak Berhasil Diubah!");
                exit();
            }
        } else {
            header("Location: ../accountLG.php?error=File harus berupa Gambar!");
            exit();
        }
    }

    //change biodata
    if(isset($_GET['submit-profile'])) {
        $name = $_GET['name'];
        $date = $_GET['date'];
        $month = $_GET['month'];
        $year = $_GET['year'];
        $gender = $_GET['gender'];
        $email = $_GET['email'];
        $birthdate = $date." ".$month." ".$year;

        $sql = "UPDATE users
        SET email='$email', name='$name', birthdate='$birthdate', gender='$gender'
        WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../accountLG.php?success=Biodata Berhasil Diubah.");
        } else {
            header("Location: ../accountLG.php?error=Biodata Tidak Berhasil Diubah.");
        }
    }

    //change password
    if(isset($_POST['submit-new-password'])) {
        $oldpw = md5($_POST['old-password']);
        $newpw = md5($_POST['new-password']);
        $cnewpw = md5($_POST['cnew-password']);

        $sql = "SELECT * FROM users
        WHERE id='$id' AND password='$oldpw'";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows == 1) {
            echo $newpw;
            echo $cnewpw;
            if($newpw == $cnewpw) {
                $sql = "UPDATE users
                SET password='$newpw'
                WHERE id='$id'";
                if ($conn->query($sql) === TRUE) {
                    header("Location: ../accountLG.php?success=Password Berhasil Diubah.");
                } else {
                    header("Location: ../accountLG.php?pwc=1&error=Password Tidak Berubah!");
                }
            } else {
                header("Location: ../accountLG.php?pwc=1&error=Password Tidak Sesuai!");
            }
        } else {
            header("Location: ../accountLG.php?pwc=1&error=Password Salah!");
        }
    }

    //add address
    if(isset($_POST['submit-address'])) {
        $nama = $_POST['nama'];
        $hp = $_POST['hp'];
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $kecamatan = $_POST['kecamatan'];
        $alamat1 = $_POST['alamat1'];
        $alamat2 = $_POST['alamat2'];
        $alamat = $alamat1."\n".$alamat2;
        $catatan = $_POST['catatan'];

        $sql = "INSERT INTO address(nama, hp, provinsi, kota, kecamatan, alamat, catatan, id)
        VALUES('$nama', '$hp', '$provinsi', '$kota', '$kecamatan', '$alamat', '$catatan', '$id')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../address.php?success=Alamat Berhasil Ditambah.");
        } else {
            header("Location: ../address.php?add=1&error=Alamat Tidak Berhasil Ditambah!");
        }
    }

    //edit address
    if(isset($_POST['edit-address'])) {
        $addres_id = $_POST['address-id'];
        $nama = $_POST['nama'];
        $hp = $_POST['hp'];
        $provinsi = $_POST['provinsi'];
        $kota = $_POST['kota'];
        $kecamatan = $_POST['kecamatan'];
        $alamat = $_POST['alamat'];
        $catatan = $_POST['catatan'];

        $sql = "UPDATE address
        SET nama='$nama', hp='$hp', provinsi='$provinsi', kota='$kota',
        kecamatan='$kecamatan', alamat='$alamat', catatan='$catatan'
        WHERE address_id='$addres_id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../address.php?success=Alamat Berhasil Diubah.");
        } else {
            header("Location: ../address.php?add=1&edit=$addres_id&error=Alamat Tidak Berhasil Diubah!");
        }
    }

    //delete address
    if(isset($_GET['removeaddress'])) {
        $addres_id = $_GET['removeaddress'];

        $sql = "DELETE FROM address WHERE address_id='$addres_id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../address.php?error=Alamat Berhasil Dihapus!");
        } else {
            header("Location: ../address.php?warning=Alamat Belum Terhapus.");
        }
    }

    //checkout no id
    if(isset($_GET['checkout']) && $_GET['checkout'] == "no id") {
        echo "<SCRIPT>
        alert('Silahkan Login terlebih dahulu');
        window.location.replace('../account.php');
    </SCRIPT>";
    }

    //checkout success
    if(isset($_GET['checkout']) && $_GET['checkout'] == "success") {
        $sql = "UPDATE cart
        SET cart='Yes'
        WHERE id='$id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "<SCRIPT>
                alert('Barang sudah dicheckout');
                window.location.replace('../products.php');
            </SCRIPT>";
        } else {
            header("Location: ../address.php?warning=Alamat Belum Terhapus.");
        }
    }
}
?>