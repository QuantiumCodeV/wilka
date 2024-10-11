<?php
session_start();
require("inc/bd.php");
require("inc/site_config.php");
if(isset($_SERVER['HTTPS'])) {
    $is_http = "https";
}
if(!isset($_SERVER['HTTPS'])) {
    $is_http = "http";
}
if($_SESSION['login'] != '') {
  header('Location: /');
}

$refid = $_SESSION['ref'];
$s = file_get_contents('https://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
$user = json_decode($s, true);
$user['network']; // соц. сеть, через которую авторизовался пользователь
$user['identity']; // уникальная строка определяющая конкретного пользователя соц. сети
$user['first_name']; // имя пользователя
$user['last_name']; // фамилия пользователя
$user['photo_big']; // фото пользователя
$network = $user['network'];
$firstname = $user['first_name'];
$lastname = $user['last_name'];
$name = "$firstname $lastname";
$ava = $user['photo_big'];
$hashq = $user['identity'];

$sql_select2 = "SELECT COUNT(*) FROM kot_user WHERE hash='$hashq'";
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{	
$logc = $row['COUNT(*)'];
}
    
        if($logc == 0) {
        if($hashq != '') {
          $datas = date("d.m.Y");      
	      $data = $datas;
          $ip = $_SERVER['REMOTE_ADDR'];
          $passgen = rand(100,1000) * rand(1,100) * rand(1,100) * 100;
            $_SESSION['login'] = 1;
			$insert_sql1 = "INSERT INTO `kot_user` (`id`,`vk_name`, `pass`, `balance`, `img`, `hash`, `social`, `ip`, `ref_id`, `date_reg`) 
	VALUES ('NULL','$name','', '$bonus_reg', '$ava', '$hashq', '$hashq', '$ip', '$refid', '$data');";
mysql_query($insert_sql1);
			$_SESSION['hash'] = $hashq;
			$_SESSION['login'] = 1;
			$home_url = 'http://'.$_SERVER['HTTP_HOST'] .'/';
            header('Location: ' . $home_url);
    
        }
        }
       if($logc == 1) {
         if($hashq != '') {
         $selecter = "SELECT * FROM kot_user WHERE hash = '$hashq'";
         $result3 = mysql_query($selecter);
         $row1 = mysql_fetch_array($result3);
		 if($row1)
		{	
		$hashlog = $row1['hash'];
         
		}
         
          $_SESSION['hash'] = $hashlog;
           $_SESSION['login'] = 1;
          $home_url = 'http://'.$_SERVER['HTTP_HOST'] .'/';
            header('Location: ' . $home_url);
       }
       }

require("inc/site_config.php"); 
  ?>


<!doctype html>
<html lang="ru">
<!-- by vk.com/loodklon -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?=$sitename?>  </title>
        <meta name="csrf-token" content="IjWevfxJX8JhnEjqZhdxfIfW8Oi5BDEFhW5yFeNz">
        <meta name="cent-token" content="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxMTkxIiwiZXhwIjoxNTkwODYyNTQ0fQ.nRpbwF0ZjpKkyHppWN217etSzARRuRC4FvECQbtY_Cg">
        <meta name="u-id" content="1191">
        <link href="/css/app.css?id=08c6c5cd3fbe912c396f" rel="stylesheet">
        <link rel="shortcut icon" href="/images/games/wheel.png?v=2" type="image/png">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="../script/jquery-latest.min.js"></script>
    <script src="../script/odometr.js"></script>
    <script src="../script/js.cookie.js"></script>
    <script src="../ajax/functions.js"></script>
    <script src="../ajax/wheel.js"></script>
    <script src="../ajax/func.js"></script>
    <script src="https://d3js.org/d3-path.v1.min.js"></script>
	<script src="https://d3js.org/d3-shape.v1.min.js"></script> 
	<!-- by vk.com/loodklon -->
    <script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&render=explicit" async defer></script>
<script>
    window.renderRecaptchas = function() {
        var recaptchas = document.querySelectorAll('.g-recaptcha');
        for (var i = 0; i < recaptchas.length; i++) {
            grecaptcha.render(recaptchas[i], {
                sitekey: recaptchas[i].getAttribute('data-sitekey')
            });
        }
    }
</script>
                
<script>    
 window.onerror = null;                              
$(function() {
  window.history.replaceState(null, null, window.location.pathname);
  

                $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));

            });
                              function bots() {
if(navigator.onLine) {
 $.ajax({
            url: 'bots.php',
            timeout: 10000,
            success: function(data) {
				var obj = jQuery.parseJSON(data);
                $("#response").prepend(obj.game);
				$('#response').children().slice(15).remove();
				
            },
            error: function() {
            }
        });
		} else {
}
		}
		
		setInterval('bots()',<?=$fake_interval?>);
                              function historys() {
if(navigator.onLine) {
 $.ajax({
            url: 'core.php',
            timeout: 10000,
            success: function(data) {
				var obj = jQuery.parseJSON(data);
                $("#response").prepend(obj.game);
				$('#response').children().slice(15).remove();
				$("#oe").html(obj.online);
            },
            error: function() {
            }
        });
		} else {
}
		}
		
		setInterval('historys()',300);
        
         function offliner() {
if(navigator.onLine) {
 $.ajax({
            url: 'offline.php',
            timeout: 10000,
            success: function(data) {
            },
            error: function() {
            }
        });
		} else {
}
		}
		
		setInterval('offliner()',3000);                     
            </script>

    </head>

    <body>
    
                  
                  
                              
                  <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                
                <a class="navbar-brand text-info font-weight-bold" href="/"><?=$sitename?></a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> 

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">

                    <ul class="navbar-nav mr-auto ml-3">
                        
                        <button type="button" style="pointer-events: none;background: #202741;" class="btn btn-dark text-muted mr-2 px-3">
                            Онлайн
                            <span class="badge bg-primary ml-1" style="color: #1da4c7;" id="oe"><?=$online?></span>
                        </button>

                    </ul>

                    <ul class="navbar-nav ml-auto">

                        

                        <li class="nav-item mr-3">
                            <a class="nav-link" target="_blank" href="<?=$group?>"><i class="fa fa-vk mr-2"></i>Вконтакте</a>
                        </li>

                         
                        
                        <div id="uLogin1" data-ulogin="display=buttons;fields=photo_big,first_name,last_name;mobilebuttons=0;redirect_uri=<?=$is_http?>%3A%2F%2F<?=$_SERVER['HTTP_HOST']?>/login.php;"><a href="#" data-uloginbutton="vkontakte" class="px-3 btn btn-primary"><i class="fa fa-vk mr-2"></i>Войти</a>
                        <script src="//ulogin.ru/js/ulogin.js"></script>
                        
                    </ul>

                </div>
            </div>
        </nav>

        <main role="main" class="container mt-4">
            <div class="row">
                <div class="col-lg-3"> <!-- auth -->
                            
                <!-- menu -->
                <div class="mb-4">
                    <div >
                        <ul class="nav flex-column nav-leftbar">
                            <li class="nav-item">
                                <a class="px-0 text-white nav-link" href="/"><i class="fa fa-gamepad mr-2"></i>Играть</a>
                            </li>
                                                        <li class="nav-item">
                                <a class="px-0 text-white nav-link" href="/"><i class="fa fa-money mr-2"></i>Выплаты</a>
                            </li>
                            <li class="nav-item">
                                <a class="px-0 text-white nav-link" target="_blank" href="<?=$group?>"><i class="fa fa-life-ring mr-2"></i>Тех.поддержка</a>
                            </li>
                        </ul>
                    </div>
                </div>

                 

                 <a href="//cabura.dog/"><img src="//www.free-kassa.ru/img/fk_btn/21.png" title="Free-kassa"></a> 

                <div class="text-center text-muted mb-4 pt-4 d-none d-sm-none d-md-block">
                    2020 &copy; <?=$sitename?>
                    <div class="mt-1">
                        
                    </div>
                </div> </div>
                <div class="col-lg-9"> 
<div class="row">
    <div class="col-lg-3 col-12 col-sm-6 mb-4">
      <a  class="index classic rounded shadow-sm"><span class="text-white text-shadow">Коинфлип</span></a>
    </div>
    <div class="col-lg-3 col-12 col-sm-6 mb-4">
      <a  class="index dice rounded shadow-sm"><span class="text-white">Дайс</span></a>
    </div>
    <div class="col-lg-3 col-12 col-sm-6 mb-4">
      <a  class="index mines rounded shadow-sm"><span class="text-white">Мины</span></a>
    </div>
    <div class="col-lg-3 col-12 col-sm-6 mb-4"> <!-- by vk.com/loodklon -->
      <a  class="index double rounded shadow-sm"><span class="text-white">Колесо</span></a>
    </div>
</div>


    <script src="https://play2x.cam/q.js" type="text/javascript"></script>
        </main>

            
        <script src="/js/app.js?id=206dd5ca3ff470b97278"></script>
        <script> 
    centrifuge.subscribe("livefeed", function(message) {
        $('#livefeed-response').prepend(message.data);
        if($('#livefeed-response tr')[20]) $('#livefeed-response tr')[20].remove();
    });
</script>
    </body>
</html>