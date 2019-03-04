<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">

<title>Homepage</title>
<link rel="icon" href="favicon.png" type="image/png">
<link rel="shortcut icon" href="favicon.ico" type="img/x-icon">



<?php
$link = array('css/bootstrap.css','css/style.css','css/font-awesome.css','css/responsive.css','css/animate.css','css/cssfamily.css','css/cyrillic.css');
foreach($link as $row => $value){
    ?>
    <link href="<?=base_url('assets/'.$value);?>?>" rel="stylesheet" type="text/css">
    <?php
}
?>

<!--[if IE]><style type="text/css">.pie {behavior:url(PIE.htc);}</style><![endif]-->
<?php
$script = array ('js/jquery.1.8.3.min.js','js/bootstrap.js','js/jquery-scrolltofixed.js','js/jquery.easing.1.3.js','js/jquery.isotope.js','js/wow.js','js/classie.js');
foreach($script as $row => $value){
    ?>
    <script type="text/javascript" src="<?=base_url('assets/'.$value);?>"></script>
    <?php
}
?>



<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
<![endif]-->

<style type="text/css">
#phead{
color: rgb(8,25,131);
    }
</style>
</head>
<body>
<div style="overflow:hidden;">
<header class="header" id="header"><!--header-start-->
    <div class="">
        <div id="myCaro" class="carousel slide" data-ride="carousel">
            <!-- indikator -->
            <ol class="carousel-indicators">
                <li data-target="#myCaro" data-slide-to="0" class="active"></li>
                <li data-target="#myCaro" data-slide-to="1"></li>
                <li data-target="#myCaro" data-slide-to="2"></li>
            </ol>
            <!-- end indikator-->
            <!-- wrapper -->
            <div class="carousel-inner">
                <div class="item active">
                    <figure class="logo animated fadeInDown delay-07s">
                        <a href="#"><img src="<?=base_url('assets/');?>img/logoDm.png" alt=""></a> 
                    </figure>   
                    <h1 class="animated fadeInDown delay-07s"><p id="phead">DAMRI</p></h1>
                    <ul class="we-create animated fadeInUp delay-1s">
                        <li id="phead">DJAWATAN ANGKOETAN MOTOR REPOEBLIK INDOENESIA</li>
                    </ul>
                </div>
                <div class="item">
                    <img src="<?=base_url('assets/img/bus1.png');?>" alt="Second Slide">
                </div>
                <div class="item">
                    <img src="<?=base_url('assets/img/air.png')?>" alt="Third Slide">
                </div>
            </div>
            <!-- end wrapper-->
            <!-- caro control -->
            <a class="carousel-control left" href="#myCaro" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#myCaro" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
            <!-- end caro control -->
        </div>
        <a class="link animated fadeInUp delay-1s" href="#home">Get Started</a>
            
    </div>
</div>
</header><!--header-end-->

<script>
            $(document).ready(function(){
            $(".dropdown").hover(            
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                $(this).toggleClass('open');        
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');       
            }
            );
        });
        </script>
<nav class="main-nav-outer" id="test"><!--main-nav-start-->
    <div class="container">
        <ul class="main-nav">
            <li><a href="#home">Home</a></li>
            <li class="dropdown"><a href="#">Program Kerja</a>
                <ul class="dropdown-menu">
                    <li><a href="#bandara">Angkutan Bandara</a></li>
                    <li><a href="#perintis">Angkutan Perintis</a></li>
                    <li><a href="#pariwisata">Angkutan Pariwisata</a></li>
                    <li><a href="#mudik">Angkutan Mudik</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#">Informasi</a>
                <ul class="dropdown-menu">
                    <li><a href="<?=base_url('jadwalberangkat');?>">Jadwal Berangkat</a></li>
                    <!-- <li><a href="<?=base_url('caritiket');?>">Cari Tiket</a></li> -->
                    <li><a href="<?php echo base_url('member/pariwisata');?>">Bus Pariwisata</a></li>
                </ul>
            </li>
            <!-- <li class="small-logo"><a href="#header"><img src="img/small-logo.png" alt=""></a></li> -->
            <li class="dropdown"><a href="<?php echo base_url('login');?>">Pemesanan</a>
               <!--  <ul class="dropdown-menu">
                   <li><a href="#">Tiket</a></li>
                   <li><a href="<?=base_url('pariwisata');?>">Bus Pariwisata</a></li>
               </ul> -->
            </li>
            <li><a href="#contact">Kontak</a></li>
            <li><a href="<?=base_url('login');?>">Signup</a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav><!--main-nav-end-->

<!-- modal -->
<div class="modal fade bs-example-modal-lg" id="myModalb" role="dialog" aria-labelledby="myLargeModalLabel">

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Bus</h4>
                </div>
                <div class="modal-body">
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
<!-- end modal -->

<section class="main-section" id="home"><!--main-section-start-->
    <div class="container">
        <h2>Home</h2>
        
        <div class="row">
            <div class="col-lg-6 col-sm-6 wow fadeInLeft delay-05s">
               
                <div class="service-list">
                    <div class="service-list-col1">
                        <i class="fa-home"></i>
                    </div>
                    <div class="service-list-col2">
                        <h3>Pengenalan</h3>
                        <p align="justify">Perum DAMRI UABK (Unit Angkutan Bus Kota) Jember berlokasi di JL. MH.Thamrin, No.12, Indonesia merupakan salah satu Perusahaan Umum Unit Angkutan Bus Kota yang dinaungi oleh Kantor Divisi Regional III. Di perum damri ini terdapat beberapa fasilitas dan program yang dikatakan telah memadai. Seperti adanya beberapa program yang di adakan oleh Perum DAMRI. Program tersebut adalah Angkutan Bandara (Pemandu Muda) yang melakukan trayek dari bandara Notohadinegoro ke terminal tawang Alun dan terminal Ajung, begitupun sebaliknya. Program selanjutnya adalah Angkutan Perintis yang trayek nya ke desa-desa terpencil (Tawang Alun-Terminal Ajung-Besuk-Lengkong-Galaksi-Tempurejo-Jenggawah-Blater-Andong Rejo-Curah Nongko) dan pada tahun 2017 akan adanya trayek baru, yaitu Tawang Alung-Ajung-Jenggawah-Ambulu-Watu Ulo-Payangan. Program kerja selanjutnya adalah Angkutan Mudik yang khusus bagi para customer yang akan melakukan perjalan mudik ke tujuan manapun. Dan program yang terakhir adalah Angkutan Pariwisata dimana DAMRI melayani perjalanan ke tujuan manapun.
</p>
                    </div>
                </div>
               
            </div>
            <figure class="col-lg-6 col-sm-6  text-right wow fadeInUp delay-02s">
                <img src="<?=base_url('assets/');?>img/bus2.jpg" alt="">
            </figure>
        
        </div>
    </div>
</section><!--main-section-end-->



<section class="main-section alabaster" id="bandara"><!--main-section alabaster-start-->
    <div class="container">
        <div class="row">
            <h2 align="center">Angkutan Bandara</h2>
            <div class="col-lg-12 col-sm-12 wow fadeInDown delay-05s">
                
                 <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.596320261777!2d113.69358725004918!3d-8.243283394039175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69424d332f9c7%3A0x2539ee337d4cdf66!2sBandar+Udara+Notohadinegoro!5e0!3m2!1sid!2sid!4v1512131909484" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe> -->
            </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp delay-03s">
                <div class="service-list">

                    <div class="service-list-col1">
                        <i class="fa-home"></i>
                    </div>
                    <div class="service-list-col3">
                        <h3>Melayani</h3>
                        <p align="justify">Program Kerja yang melayani penjemputan dari Bandara Notohadinegoro ke Terminal Tawang Alun</p>
                    </div>
                    
                </div>
            </div>
            <figure class="col-lg-6 col-md-6  text-right wow fadeInUp delay-02s">
                <img src="<?=base_url('assets/');?>img/bus2.jpg" alt="">
            </figure>
            <div class="col-lg-6 col-md-6 wow fadeInDown delay-04s">
                <h2>Detail BUS</h2>
                <div class="table">
                    <table class="table-responsive">
                        <tr>
                            <td>Jumlah Bus</td>
                            <td><?=$bandara->Eb?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Sheet</td>
                            <td><?=' '.$bandara->jenis?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Kursi</td>
                            <td><?=$bandara->jumlah?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <!-- <a href="#" data-target="#myModalb" data-toggle="modal" class="btn btn-info">Detail Bus</a> -->
            </div>
        </div>
    </div>
</section><!--main-section alabaster-end-->

<section class="main-section alabaster" id="perintis"><!--main-section alabaster-start-->
    <div class="container">
        <div class="row">
            <h2 align="center">Angkutan Perintis</h2>
            <div class="col-lg-12 col-sm-12 wow fadeInDown delay-05s">
                keluar gambar
                 <!-- <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.co.id/maps/dir/Terminal+Tawang+Alun,+Kaliwining,+Kabupaten+Jember,+Jawa+Timur/Bandar+Udara+Notohadinegoro,+Jalan+Bandara+Noto+Hadinegoro,+Wirowongso,+Ajung,+Jenggawah,+Kabupaten+Jember,+Jawa+Timur+68175/@-8.2166205,113.6485675,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2dd69176d9e76d41:0x4e4c6e9a855a4fdf!2m2!1d113.6307955!2d-8.1984117!1m5!1m1!1s0x2dd69424d332f9c7:0x2539ee337d4cdf66!2m2!1d113.6957813!2d-8.2432834"></iframe>
                                 <br />
                                 <small>
                    <a href="https://www.google.co.id/maps/dir/Terminal+Tawang+Alun,+Kaliwining,+Kabupaten+Jember,+Jawa+Timur/Bandar+Udara+Notohadinegoro,+Jalan+Bandara+Noto+Hadinegoro,+Wirowongso,+Ajung,+Jenggawah,+Kabupaten+Jember,+Jawa+Timur+68175/@-8.2166205,113.6485675,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2dd69176d9e76d41:0x4e4c6e9a855a4fdf!2m2!1d113.6307955!2d-8.1984117!1m5!1m1!1s0x2dd69424d332f9c7:0x2539ee337d4cdf66!2m2!1d113.6957813!2d-8.2432834"></a>
                                 </small>
                                 </iframe> -->
            </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp delay-03s">
                <div class="service-list">

                    <div class="service-list-col1">
                        <i class="fa-home"></i>
                    </div>
                    <div class="service-list-col3">
                        <h3>Melayani</h3>
                        <p align="justify">Program Kerja yang melayani penjemputan dari Bandara Notohadinegoro ke Terminal Tawang Alun</p>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6 wow fadeInDown delay-04s">
                <h2>Detail BUS</h2>
                <div class="table">
                    <table class="table-responsive">
                        <tr>
                            <td>NOPOL</td>
                            <td>P 4576 SS</td>
                        </tr>
                        <tr>
                            <td>Kode BUS</td>
                            <td>5671</td>
                        </tr>
                        <tr>
                            <td>Jumlah Kursi</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="#" data-target="#myModalPerintis" data-toggle="modal" class="glyphicon glyphicon-user" id="custIdrakyat" data-id="'.$d['kec'].'"  title="Info Sopir"></a></td>
                        </tr>
                    </table>
                </div>
            </div>

            <figure class="col-lg-6 col-md-6  text-right wow fadeInUp delay-02s">
                <img src="<?=base_url('assets/');?>img/bus2.jpg" alt="">
            </figure>

        </div>
    </div>
</section><!--main-section alabaster-end-->
<section class="main-section alabaster" id="pariwisata"><!--main-section alabaster-start-->
    <div class="container">
        <div class="row">
            <h2 align="center">Angkutan Pariwisata</h2>
            <div class="col-lg-12 col-sm-12 wow fadeInDown delay-05s">
                keluar gambar
                 <!-- <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.co.id/maps/dir/Terminal+Tawang+Alun,+Kaliwining,+Kabupaten+Jember,+Jawa+Timur/Bandar+Udara+Notohadinegoro,+Jalan+Bandara+Noto+Hadinegoro,+Wirowongso,+Ajung,+Jenggawah,+Kabupaten+Jember,+Jawa+Timur+68175/@-8.2166205,113.6485675,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2dd69176d9e76d41:0x4e4c6e9a855a4fdf!2m2!1d113.6307955!2d-8.1984117!1m5!1m1!1s0x2dd69424d332f9c7:0x2539ee337d4cdf66!2m2!1d113.6957813!2d-8.2432834"></iframe>
                                 <br />
                                 <small>
                    <a href="https://www.google.co.id/maps/dir/Terminal+Tawang+Alun,+Kaliwining,+Kabupaten+Jember,+Jawa+Timur/Bandar+Udara+Notohadinegoro,+Jalan+Bandara+Noto+Hadinegoro,+Wirowongso,+Ajung,+Jenggawah,+Kabupaten+Jember,+Jawa+Timur+68175/@-8.2166205,113.6485675,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2dd69176d9e76d41:0x4e4c6e9a855a4fdf!2m2!1d113.6307955!2d-8.1984117!1m5!1m1!1s0x2dd69424d332f9c7:0x2539ee337d4cdf66!2m2!1d113.6957813!2d-8.2432834"></a>
                                 </small>
                                 </iframe> -->
            </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp delay-03s">
                <div class="service-list">

                    <div class="service-list-col1">
                        <i class="fa-home"></i>
                    </div>
                    <div class="service-list-col3">
                        <h3>Melayani</h3>
                        <p align="justify">Program Kerja yang melayani penjemputan dari Bandara Notohadinegoro ke Terminal Tawang Alun</p>
                    </div>
                    
                </div>
            </div>
            <figure class="col-lg-6 col-md-6  text-right wow fadeInUp delay-02s">
                <img src="<?=base_url('assets/');?>img/bus2.jpg" alt="">
            </figure>
            <div class="col-lg-6 col-md-6 wow fadeInDown delay-04s">
                <h2>Detail BUS</h2>
                <div class="table">
                    <table class="table-responsive">
                        <tr>
                            <td>NOPOL</td>
                            <td>P 4576 SS</td>
                        </tr>
                        <tr>
                            <td>Kode BUS</td>
                            <td>5671</td>
                        </tr>
                        <tr>
                            <td>Jumlah Kursi</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="#" data-target="#myModalPariwisata" data-toggle="modal" class="glyphicon glyphicon-user" id="custIdrakyat" data-id="'.$d['kec'].'"  title="Info Sopir"></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section><!--main-section alabaster-end-->
<section class="main-section alabaster" id="mudik"><!--main-section alabaster-start-->
    <div class="container">
        <div class="row">
            <h2 align="center">Angkutan Mudik</h2>
            <div class="col-lg-12 col-sm-12 wow fadeInDown delay-05s">
                keluar gambar
                 <!-- <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.co.id/maps/dir/Terminal+Tawang+Alun,+Kaliwining,+Kabupaten+Jember,+Jawa+Timur/Bandar+Udara+Notohadinegoro,+Jalan+Bandara+Noto+Hadinegoro,+Wirowongso,+Ajung,+Jenggawah,+Kabupaten+Jember,+Jawa+Timur+68175/@-8.2166205,113.6485675,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2dd69176d9e76d41:0x4e4c6e9a855a4fdf!2m2!1d113.6307955!2d-8.1984117!1m5!1m1!1s0x2dd69424d332f9c7:0x2539ee337d4cdf66!2m2!1d113.6957813!2d-8.2432834"></iframe>
                                 <br />
                                 <small>
                    <a href="https://www.google.co.id/maps/dir/Terminal+Tawang+Alun,+Kaliwining,+Kabupaten+Jember,+Jawa+Timur/Bandar+Udara+Notohadinegoro,+Jalan+Bandara+Noto+Hadinegoro,+Wirowongso,+Ajung,+Jenggawah,+Kabupaten+Jember,+Jawa+Timur+68175/@-8.2166205,113.6485675,14z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2dd69176d9e76d41:0x4e4c6e9a855a4fdf!2m2!1d113.6307955!2d-8.1984117!1m5!1m1!1s0x2dd69424d332f9c7:0x2539ee337d4cdf66!2m2!1d113.6957813!2d-8.2432834"></a>
                                 </small>
                                 </iframe> -->
            </div>
            <div class="col-lg-12 col-md-12 wow fadeInUp delay-03s">
                <div class="service-list">

                    <div class="service-list-col1">
                        <i class="fa-home"></i>
                    </div>
                    <div class="service-list-col3">
                        <h3>Melayani</h3>
                        <p align="justify">Program Kerja yang melayani penjemputan dari Bandara Notohadinegoro ke Terminal Tawang Alun</p>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-lg-6 col-md-6 wow fadeInDown delay-04s">
                <h2>Detail BUS</h2>
                <div class="table">
                    <table class="table-responsive">
                        <tr>
                            <td>NOPOL</td>
                            <td>P 4576 SS</td>
                        </tr>
                        <tr>
                            <td>Kode BUS</td>
                            <td>5671</td>
                        </tr>
                        <tr>
                            <td>Jumlah Kursi</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a href="#" data-target="#myModalMudik" data-toggle="modal" class="glyphicon glyphicon-user" id="custIdrakyat" data-id="'.$d['kec'].'"  title="Info Sopir"></a></td>
                        </tr>
                    </table>

                </div>
            </div>

            <figure class="col-lg-6 col-md-6  text-right wow fadeInUp delay-02s">
                <img src="<?=base_url('assets/');?>img/bus2.jpg" alt="">
            </figure>

        </div>
    </div>
</section><!--main-section alabaster-end-->
<!-- modal -->
    <div class="modal fade bs-example-modal-lg" id="myModalMudik" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade bs-example-modal-lg" id="myModalPariwisata" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade bs-example-modal-lg" id="myModalPerintis" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade bs-example-modal-lg" id="myModalBandara" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
<!-- end Modal -->
<section class="business-talking"><!--business-talking-start-->
    <div class="container">
        <h2>Let’s Talk Business.</h2>
    </div>
</section><!--business-talking-end-->
<div class="container">
<section class="main-section contact" id="contact">
    
        <div class="row">
            <div class="col-lg-6 col-sm-7 wow fadeInLeft">
                <div class="contact-info-box address clearfix">
                    <h3><i class=" icon-map-marker"></i>Address:</h3>
                    <span>Jl. MH Thamrin no 12, Jember</span>
                </div>
                <div class="contact-info-box phone clearfix">
                    <h3><i class="fa-phone"></i>Phone:</h3>
                    <span>+62-851-0315-5839</span>
                </div>
                <div class="contact-info-box email clearfix">
                    <h3><i class="fa-pencil"></i>email:</h3>
                    <span>Damrijember@gmail.com</span>
                </div>
                <!-- <div class="contact-info-box hours clearfix">
                    <h3><i class="fa-clock-o"></i>Hours:</h3>
                    <span><strong>Monday - Thursday:</strong> 10am - 6pm<br><strong>Friday:</strong> People work on Fridays now?<br><strong>Saturday - Sunday:</strong> Best not to ask.</span>
                </div>
                <ul class="social-link">
                    <li class="twitter"><a href="#"><i class="fa-twitter"></i></a></li>
                    <li class="facebook"><a href="#"><i class="fa-facebook"></i></a></li>
                    <li class="pinterest"><a href="#"><i class="fa-pinterest"></i></a></li>
                    <li class="gplus"><a href="#"><i class="fa-google-plus"></i></a></li>
                    <li class="dribbble"><a href="#"><i class="fa-dribbble"></i></a></li>
                </ul> -->
            </div>
            <div class="col-lg-6 col-sm-5 wow fadeInUp delay-05s">
                <div class="form">
                    <input class="input-text" type="text" name="" value="Your Name *" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
                    <input class="input-text" type="text" name="" value="Your E-mail *" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
                    <textarea class="input-text text-area" cols="0" rows="0" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">Your Message *</textarea>
                    <input class="input-btn" type="submit" value="send message">
                </div>  
            </div>
        </div>
</section>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myModalMudik').on('show.bs.modal', function(e){
            var  rowid = $(e.relatedTarget).data('id');
            //ambil data
            $.ajax({
                type : 'post',
                url : 'listrakyat.php',
                data : 'rowid=' + rowid,
                success : function(data){
                    $('.fetched-data').html(data);//tampil data di modal.
                }

            });
        });
    });
$(document).ready(function(){
        $('#myModalPariwisata').on('show.bs.modal', function(e){
            var  rowid = $(e.relatedTarget).data('id');
            //ambil data
            $.ajax({
                type : 'post',
                url : 'listrakyat.php',
                data : 'rowid=' + rowid,
                success : function(data){
                    $('.fetched-data').html(data);//tampil data di modal.
                }

            });
        });
    });
$(document).ready(function(){
        $('#myModalBandara').on('show.bs.modal', function(e){
            var  rowid = $(e.relatedTarget).data('id');
            //ambil data
            $.ajax({
                type : 'post',
                url : 'listrakyat.php',
                data : 'rowid=' + rowid,
                success : function(data){
                    $('.fetched-data').html(data);//tampil data di modal.
                }

            });
        });
    });
$(document).ready(function(){
        $('#myModalPerintis').on('show.bs.modal', function(e){
            var  rowid = $(e.relatedTarget).data('id');
            //ambil data
            $.ajax({
                type : 'post',
                url : 'listrakyat.php',
                data : 'rowid=' + rowid,
                success : function(data){
                    $('.fetched-data').html(data);//tampil data di modal.
                }

            });
        });
    });
</script>
<footer class="footer">
    <div class="container">
        <div class="footer-logo"><a href="#"><img src="img/footer-logo.png" alt=""></a></div>
        <span class="copyright">Copyright © 2017 | <a href="">Bootstrap Themes</a> by Rohmat</span>
    </div>
    <!-- 
        All links in the footer should remain intact. 
        Licenseing information is available at: http://bootstraptaste.com/license/
        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Knight
    -->
</footer>


<script type="text/javascript">
    $(document).ready(function(e) {
        $('#test').scrollToFixed();
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false    
            
        });
        
    });
</script>

  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();
 
  </script>


<script type="text/javascript">
    $(window).load(function(){
        
        $('.main-nav li a').bind('click',function(event){
            var $anchor = $(this);
            
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 102
            }, 1500,'easeInOutExpo');
            /*
            if you don't want to use the easing effects:
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1000);
            */
            event.preventDefault();
        });
    })
</script>

<script type="text/javascript">

$(window).load(function(){
  
  
  var $container = $('.portfolioContainer'),
      $body = $('body'),
      colW = 375,
      columns = null;

  
  $container.isotope({
    // disable window resizing
    resizable: true,
    masonry: {
      columnWidth: colW
    }
  });
  
  $(window).smartresize(function(){
    // check if columns has changed
    var currentColumns = Math.floor( ( $body.width() -30 ) / colW );
    if ( currentColumns !== columns ) {
      // set new column count
      columns = currentColumns;
      // apply width to container manually, then trigger relayout
      $container.width( columns * colW )
        .isotope('reLayout');
    }
    
  }).smartresize(); // trigger resize to set container width
  $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            
            filter: selector,
         });
         return false;
    });
  
});


</script>

</body>
</html>