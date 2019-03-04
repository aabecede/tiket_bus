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
<!-- <div style="overflow:hidden;">
<header class="header" id="header">header-start
    <div class="">
        <div id="myCaro" class="carousel slide" data-ride="carousel">
            indikator
            <ol class="carousel-indicators">
                <li data-target="#myCaro" data-slide-to="0" class="active"></li>
                <li data-target="#myCaro" data-slide-to="1"></li>
                <li data-target="#myCaro" data-slide-to="2"></li>
            </ol>
            end indikator
            wrapper
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
            end wrapper
            caro control
            <a class="carousel-control left" href="#myCaro" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#myCaro" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
            end caro control
        </div>
        <a class="link animated fadeInUp delay-1s" href="#home">Get Started</a>
            
    </div>
</div> -->
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
           <!--  <li><a href="<?=base_url();?>#home">Home</a></li>
           <li class="dropdown"><a href="#">Program Kerja</a>
               <ul class="dropdown-menu">
                   <li><a href="<?=base_url();?>#bandara">Angkutan Bandara</a></li>
                   <li><a href="<?=base_url();?>#perintis">Angkutan Perintis</a></li>
                   <li><a href="<?=base_url();?>#pariwisata">Angkutan Pariwisata</a></li>
                   <li><a href="<?=base_url();?>#mudik">Angkutan Mudik</a></li>
               </ul>
           </li>
           <li class="dropdown"><a href="#">Informasi</a>
               <ul class="dropdown-menu">
                   <li><a href="<?=base_url('jadwalberangkat');?>">Jadwal Berangkat</a></li>
                   <li><a href="<?=base_url('caritiket');?>">Cari Tiket</a></li>
                   <li><a href="#">Bus Pariwisata</a></li>
               </ul>
           </li>
           <li class="small-logo"><a href="#header"><img src="img/small-logo.png" alt=""></a></li>
           <li class="dropdown"><a href="#">Pemesanan</a>
               <ul class="dropdown-menu">
                   <li><a href="#">Tiket</a></li>
                   <li><a href="<?=base_url('pariwisata')?>">Bus Pariwisata</a></li>
               </ul>
           </li>
           <li><a href="#contact">Kontak</a></li> -->
            <?php
            if(@$stat == 'login'){
                ?>
                <li><a href="<?=base_url('m/index');?>">Home</a></li>
            <li class="dropdown"><a href="#">Program Kerja</a>
                <ul class="dropdown-menu">
                    <li><a href="<?=base_url('m/index');?>#bandara">Angkutan Bandara</a></li>
                    <li><a href="<?=base_url('m/index');?>#perintis">Angkutan Perintis</a></li>
                    <li><a href="<?=base_url('m/index');?>#pariwisata">Angkutan Pariwisata</a></li>
                    <li><a href="<?=base_url('m/index');?>#mudik">Angkutan Mudik</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#">Informasi</a>
                <ul class="dropdown-menu">
                    <li><a href="<?=base_url('member/jadwal');?>">Jadwal Berangkat</a></li>
                    <!-- <li><a href="<?=base_url('caritiket');?>">Cari Tiket</a></li> -->
                    <li><a href="<?php echo base_url('member/pariwisata');?>">Bus Pariwisata</a></li>
                </ul>
            </li>
            <!-- <li class="small-logo"><a href="#header"><img src="img/small-logo.png" alt=""></a></li> -->
            <li class="dropdown"><a href="#">Pemesanan</a>
                <?php
                $id = $this->session->userdata('id');
                $query = $this->db->get_where('login','id ="'.$id.'"')->row();
                $badgepariwisata = $this->db->query('select * from npemesanan_pariwisata where iduser = ?',array($id))->num_rows();
                #var_dump($query);
                $badgetiket = $this->db->query('select * from pemesanan_tiket where iduser = ?',array($id))->num_rows();
                ?>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('member/pemesanan_tiket');?>">Tiket<span class="badge"><?php echo $badgetiket;?></span></a></li>
                    <li><a href="<?php echo base_url('member/pemesanan_pariwisata');?>">Bus Pariwisata<span class="badge"><?php echo $badgepariwisata;?></span></a></li>

                </ul>
            </li>
            <li><a href="#contact">Kontak</a></li>
            <li class="dropdown"><a href="#"><?=$log->nama?></a>
                <ul class="dropdown-menu">
                    <!-- <li><a href="#">Profile(Berisi data pemesanan,etc)</a></li> -->
                   <!--  <li><a href="<?php echo base_url('m/reservasi');?>">Pemesanan Bus Pariwisata<span class="badge"><?php echo $badge->badge;?></span></a></li>
                   <li><a href="<?php echo base_url('m/reservasiag');?>">Pemesanan Bus Pariwisata diterima<span class="badge"><?php echo $caccbadge->badge;?></span></a></li> -->
                    <li><a href="<?=base_url('logout')?>">Logout</a></li>
                  <!--   <li><a href="<?php echo base_url('m/konfirmasi');?>">Pemesanan Non-paket<span class="badge"><?php echo $badgen->badgen;?></span></a></li>
                  <li><a href="<?php echo base_url('m/konfirmasip');?>">Pemesanan Paket<span class="badge"><?php echo $badgep->badgep;?></span></a></li> -->

                </ul>
            </li>

                <?php
            }else{
                ?>
                <li><a href="<?=base_url();?>">Home</a></li>
            <li class="dropdown"><a href="#">Program Kerja</a>
                <ul class="dropdown-menu">
                    <li><a href="<?=base_url();?>#bandara">Angkutan Bandara</a></li>
                    <li><a href="<?=base_url();?>#perintis">Angkutan Perintis</a></li>
                    <li><a href="<?=base_url();?>#pariwisata">Angkutan Pariwisata</a></li>
                    <li><a href="<?=base_url();?>#mudik">Angkutan Mudik</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#">Informasi</a>
                <ul class="dropdown-menu">
                    <li><a href="<?=base_url('jadwalberangkat');?>">Jadwal Berangkat</a></li>
                    <!-- <li><a href="<?=base_url('caritiket');?>">Cari Tiket</a></li> -->
                    <li><a href="<?php echo base_url('welcome/buspariwisata');?>">Bus Pariwisata</a></li>
                </ul>
            </li>
            <!-- <li class="small-logo"><a href="#header"><img src="img/small-logo.png" alt=""></a></li> -->
           <!--  <li class="dropdown"><a href="#">Pemesanan</a>
               <ul class="dropdown-menu">
                   <li><a href="#">Tiket</a></li>
                   <li><a href="<?php #base_url('pariwisata')?>">Bus Pariwisata</a></li>
               </ul>
           </li> -->
            <li><a href="#contact">Kontak</a></li>
                <li><a href="<?=base_url('login');?>">Signup</a></li>
                <?php
            }
            ?>
            
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
    </div>
</nav><!--main-nav-end-->