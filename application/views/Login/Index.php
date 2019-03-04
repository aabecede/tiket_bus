<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/login.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css')?>">
<script type="text/javascript" src="<?=base_url('assets/js/jquery.1.8.3.min.js');?>"></script>
<br><br><br><br>
    <div class="container">
<div class="row">
        <div class="com-md-12">
<div class="notification login-alert">
  Masukkan Email dan password
</div>
<div class="notification notification-success logged-out">
  You logged out successfully!
</div>
          <div class="well welcome-text">
                Selamat datang, silahkan masuk <button class="btn btn-default btn-login">Log in</button> or <button class="btn btn-default btn-register">Register</button> | <a href="<?=base_url();?>" class="btn btn-default btn-register">Home</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well login-box">
                <form action="<?=base_url('login/proses')?>" method="post" enctype="multipart/form-data">
                    <legend>Login</legend>
                    <div class="form-group">
                        <label for="username-email">E-mail</label>
                        <input name="email" id="username-email" required="" placeholder="E-mail or Username" type="email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input required="" id="password" value='' placeholder="Password" type="password" name="password" class="form-control" />
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-danger btn-cancel-action">Cancel</button>
                        <input type="submit" class="btn btn-success" value="Login" />
                    </div>
                </form>
            </div>
          <div class="logged-in well">
            <h1>You are loged in! <div class="pull-right"><button class="btn-logout btn btn-danger"><span class="glyphicon glyphicon-off"></span> Logout</button></div></h1>
          </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well register-box">
                <form action="<?=base_url('Login/register')?>" method="post" enctype="multipart/form-data">
                    <legend>Register</legend>
                    <div class="form-group">
                        <label for="username-email">E-mail</label>
                        <input id="username-email" placeholder="E-mail or Username" name="email" type="email" required="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" placeholder="Password" type="password" name="password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" placeholder="Abdul Jabbar" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" placeholder="Kediri, Bandar Lor gang III no 19 C"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-danger btn-cancel-action">Cancel</button>
                        <input type="submit" class="btn btn-success" value="Login" />
                    </div>
                </form>
            </div>
          <div class="logged-in well">
            <h1>You are loged in! <div class="pull-right"><button class="btn-logout btn btn-danger"><span class="glyphicon glyphicon-off"></span> Logout</button></div></h1>
          </div>
        </div>
    </div>
</div>

<script type="text/javascript">
 function varticalCenterStuff() {
    var windowHeight = $(window).height();
    var loginBoxHeight = $('.login-box').innerHeight();
    var welcomeTextHeight = $('.welcome-text').innerHeight();
    var loggedIn = $('.logged-in').innerHeight();
  
    var mathLogin = (windowHeight / 2) - (loginBoxHeight / 2);
    var mathWelcomeText = (windowHeight / 2) - (welcomeTextHeight / 2);
    var mathLoggedIn = (windowHeight / 2) - (loggedIn / 2);
    $('.login-box').css('margin-top', mathLogin);
    $('.welcome-text').css('margin-top', mathWelcomeText);
    /*$('.logged-in').css('margin-top', mathLoggedIn);*/
}
$(window).resize(function () {
    varticalCenterStuff();
});
varticalCenterStuff();

// awesomeness
$('.btn-login').click(function(){
    $(this).parent().fadeOut(function(){
        $('.login-box').fadeIn();
    })
});
$('.btn-register').click(function(){
  $(this).parent().fadeOut(function(){
    $('.register-box').fadeIn();
  })
});
$('.btn-cancel-action').click(function(e){
    e.preventDefault();
    $(this).parent().parent().parent().fadeOut(function(){
        $('.welcome-text').fadeIn();
    })
});

/*$('.btn-login-submit').click(function(e){
  e.preventDefault();
 
  var element = $(this).parent().parent().parent();
  
  var usernameEmail = $('#username-email').val();
  var password = $('#password').val();
  
  if(usernameEmail == '' || password == ''){
    
    // wigle and show notification
    // Wigle
    var element = $(this).parent().parent().parent();
    $(element).addClass('animated rubberBand');  
    $(element).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      $(element).removeClass('animated rubberBand');
    });
    
    // Notification
    // reset
    $('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
    // show notification
    $('.notification.login-alert').addClass('notification-show animated bounceInRight');
    
    $('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        setTimeout(function(){
            $('.notification.login-alert').addClass('animated bounceOutRight');
        }, 2000);
    });
  }else{
    $(element).fadeOut(function(){
      $('.logged-in').fadeIn();
    });
  }//endif
});*/


/*$('.btn-logout').click(function(){
   $('.logged-in').fadeOut(function(){
     $('.welcome-text').fadeIn();
     // Notification
     $('.notification.logged-out').removeClass('bounceOutRight notification-show animated bounceInRight');
    // show notification
    $('.notification.logged-out').addClass('notification-show animated bounceInRight');
    
    $('.notification.logged-out').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        setTimeout(function(){
            $('.notification.logged-out').addClass('animated bounceOutRight');
        }, 2000);
    });
     
   });
});*/
</script>