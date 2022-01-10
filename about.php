<?php
session_start();
require_once('config.php');
$sql = mysqli_query($conn, "SELECT * FROM `cart`");
$jumlah_barang = mysqli_num_rows($sql);
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}
$sql = mysqli_query($conn, "SELECT * FROM `cart` WHERE id='$id' AND cart='No'");
$jumlah_barang = mysqli_num_rows($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManShop</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">


    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="index.php"><img src="images/logo1.png" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">All Products</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="account.php">Account</a></li>
                </ul>
            </nav>
            <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"><?php echo $jumlah_barang; ?></a></a>
            <img src="img/menu.png" onclick="menutoggle()" class="menu-icon">
        </div>
    </div>
    <!--Foto Azka-->
    <section id="about" class="about-area pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h2 class="title">About Us</h2>
                        <p>Kami merupakan kelompok manut dari telkom university disini merupakan list list member manut</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- isi -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50">
                        <h5 class="about-title">Hello my name is Azka Dzulfikar</h5>
                        <p>Saya mahasiswa Telkom University angkatan 2019. Saya tipe orang yang suka sesuatu yang menantang, saya suka sekali jika mendapatkan kesempatan untuk mempelajari hal hal yang sebelumnya belum pernah saya pelajari, terkadang ketika saya sedang tertarik dengan sesuatu saya bisa mempelajari hal tersebut berhari hari, saya juga sangat suka bermain game dan bertemu orang orang baru yang memiliki ketertarikan yang sama. </p>
                        <ul class="clearfix">
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-envelope"></i>
                                    </div>
                                    <div class="info-text">
                                        <p>Email: azkasdz@gmail.com</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-phone-handset"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Phone:</span>6283173022168</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                        </ul>
                    </div> <!-- about content -->
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="about-skills pt-25">
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <img src="images/azka.jpg" height="250px" width="250px" style="float: left; margin-left: 30px;">
                            </div>
                        </div> <!-- about skills -->
                    </div>
                </div> <!-- end -->
            </div> <!-- container -->
            <!--Foto kedua-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50">
                        <h5 class="about-title">Hello my name is Muhammad Fitrah Ramdah</h5>
                        <p>saya adalah mahasiswa telkom university angkatan 2019 , saya adalah orang yang suka jalan dan menikmati alam serta penikmat coffe</p>
                        <ul class="clearfix">
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-envelope"></i>
                                    </div>
                                    <div class="info-text">
                                        <p>Email: fitrahramdah@gmail.com</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-phone-handset"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Phone:</span>6270150022168</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                        </ul>
                    </div> <!-- about content -->
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="about-skills pt-25">
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <img src="images/fitrah.png" height="250px" width="250px" style="float: left; margin-left: 30px;">
                            </div>
                        </div> <!-- about skills -->
                    </div>
                </div> <!-- end -->
            </div> <!-- container -->

            <!--Foto ketiga-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50">
                        <h5 class="about-title">Hello my name is Uray Herdian</h5>
                        <p>Saya mahasiswa Telkom University angkatan 2019. Saya tipe orang yang suka mendesain dan membuat model di dalam aplikasi blender</p>
                        <ul class="clearfix">
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-envelope"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Email:</span> urayherdianr@gmail.com</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-phone-handset"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Phone:</span> 622445630138</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                        </ul>
                    </div> <!-- about content -->
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="about-skills pt-25">
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <img src="images/uray.jpg" height="auto" width="250px" style="float: left; margin-left: 30px;">
                            </div>
                        </div> <!-- about skills -->
                    </div>
                </div> <!-- end -->
            </div> <!-- container -->
            <!--Foto keempat-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50">
                        <h5 class="about-title">Hello my name is Wisnu Wardana</h5>
                        <p>Saya adalah Mahasiswa Telkom-university yang tinggal di bekasi lahir pada tahun 2001 Saya juga merupakan orang yang mengerjakan satu tugas terlebih dahulu sebelum melakukan tugas selanjutnya sehingga tidak ada beban , hobi saya biasanya membaca literasi komik untuk memperluas pengetahuan , untuk hobby lain biasanya saya bermain dengan teman teman saya.</p>
                        <ul class="clearfix">
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-envelope"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Email:</span> wisnuwardana@gmail.com</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-phone-handset"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Phone:</span> 622445450658</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                        </ul>
                    </div> <!-- about content -->
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="about-skills pt-25">
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <img src="images/Wisnu.jpg" height="auto" width="250px" style="float: left; margin-left: 30px;">
                            </div>
                        </div> <!-- about skills -->
                    </div>
                </div> <!-- end -->
            </div> <!-- container -->
            <!--Foto kelima-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50">
                        <h5 class="about-title">Hello my name is Michael Fernandito Sanfia</h5>
                        <p>Saya mahasiswa Telkom University angkatan 2019. Saya tipe orang lebih sering membaca dan memperhatikan apabila dosen menjelaskan sehingga saya dapat mengerti materi yang dijelaskan dan mendapatkan nilai yang bagus</p>
                        <ul class="clearfix">
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-envelope"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Email:</span> Michael@gmail.com</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-phone-handset"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Phone:</span> 622355650658</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                        </ul>
                    </div> <!-- about content -->
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="about-skills pt-25">
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <img src="images/michael.jpg" height="auto" width="250px" style="float: left; margin-left: 30px;">
                            </div>
                        </div> <!-- about skills -->
                    </div>
                </div> <!-- end -->
            </div> <!-- container -->
            <!--Foto keEnam-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50">
                        <h5 class="about-title">Hello my name is Rafli Maisyadiva</h5>
                        <p>Saya mahasiswa Teknologi Informasi dari Telkom University yang senang dalam mengulik dan berlatih dalam dunia backend. Selain itu, saya juga terkadang mendalami sisi frontend demi menggapai tujuan saya menjadi full-stacker karbitan heheh.</p>
                        <ul class="clearfix">
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-envelope"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Email:</span> braflibizink@gmail.com</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="info-icon">
                                        <i class="lni-phone-handset"></i>
                                    </div>
                                    <div class="info-text">
                                        <p><span>Phone:</span> 082251532525</p>
                                    </div>
                                </div> <!-- single info -->
                            </li>
                        </ul>
                    </div> <!-- about content -->
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6">
                    <div class="about-skills pt-25">
                        <div class="skill-item mt-25">
                            <div class="skill-header">
                                <img src="images/rafli.jpeg" height="auto" width="250px" style="float: left; margin-left: 30px;">
                            </div>
                        </div> <!-- about skills -->
                    </div>
                </div> <!-- end -->
            </div> <!-- container -->
    </section>


    <!--====== SERVICES PART ENDS ======-->

    <!--====== CALL TO ACTION PART START ======-->

    <section id="call-to-action" class="call-to-action pt-125 pb-130 bg_cover" style="background-image: url(assets/images/call-to-action.jpg)">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9">
                    <div class="call-action-content text-center">
                        <h2 class="action-title">Have any project on mind?</h2>
                        <p>Contact US for more information </p>
                        <ul>
                            <li><a class="main-btn custom" href="#contact">Here</a></li>
                        </ul>
                    </div> <!-- call action content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CALL TO ACTION PART ENDS ======-->

    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-25">
                        <h2 class="title">Get In Touch With our Team</h2>
                        <p>untuk mengkontakin kami secara keseluruhan bisa menkontakin nomer telephone dibawah serta bisa dateng ke lokasi disini</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-map-marker"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Address</h6>
                            <p>Bojongsoang,Sukapura,Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40257</p>
                        </div>
                    </div> <!-- contact box -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-phone"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Phone</h6>
                            <p>6283453022168</p>
                            <p>6282213752216</p>
                        </div>
                    </div> <!-- contact box -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-envelope"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Email</h6>
                            <p>manut@gmail.com</p>
                            <p>info_manut@gmail.com</p>
                        </div>
                    </div> <!-- contact box -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

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

</html>

<!--====== BACK TOP TOP PART START ======-->

<a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

<!--====== BACK TOP TOP PART ENDS ======-->







<!--====== jquery js ======-->
<script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>

<!--====== Bootstrap js ======-->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>

<!--====== Magnific Popup js ======-->
<script src="assets/js/jquery.magnific-popup.min.js"></script>

<!--====== Parallax js ======-->
<script src="assets/js/parallax.min.js"></script>

<!--====== Counter Up js ======-->
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>


<!--====== Appear js ======-->
<script src="assets/js/jquery.appear.min.js"></script>

<!--====== Scrolling js ======-->
<script src="assets/js/scrolling-nav.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>


<!--====== Main js ======-->
<script src="assets/js/main.js"></script>

</body>

</html>