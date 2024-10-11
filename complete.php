<?php
require("inc/site_config.php");
require("inc/bd.php");
session_start();
$sid = $_SESSION['hash'];
$selecter1 = "SELECT * FROM kot_user WHERE hash = '$sid'";
         $result4 = mysql_query($selecter1);
         $row = mysql_fetch_array($result4);
		 if($row)
		{	
          $vk_name = $row['vk_name'];
          $login = $row['login'];
          $pass = $row['pass'];
        }
if($login != '' && $pass != '') {
  header('Location: /');
}
if($_SESSION['login'] != 1 || $_SESSION['hash'] == '') {
  header('Location: /');
}
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
 
           <script>
           
           
             function offliner() {
 $('#table_pvp').load('/inc/main.php #table_pvp');
 $('#w_p').load('/inc/main.php #w_p');
 
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

                         
                        
                       <a onclick="exit()" class="px-3 btn btn-danger"><i class="fa fa-sign-out"></i> Выйти</a>
                        
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

                 

                <!-- <a href="//showstreams.tv/"><img src="//www.free-kassa.ru/img/fk_btn/21.png" title="Бесплатный видеохостинг"></a> -->

                <div class="text-center text-muted mb-4 pt-4 d-none d-sm-none d-md-block">
                    2020 &copy; <?=$sitename?>
                    <div class="mt-1">
                        
                    </div>
                </div> </div>
                <div class="col-lg-9"> <div class="card border-0 shadow-sm">
    <div class="complete-block left">
    	<br>
    
                                                    <div  style=''class=" input-item input-with-label">
                                                        <label for="full-name" style="margin-bottom:5px" class="col-12 px-0 text-center">Логин</label>
                                                        <center><p><input autocomplete="off" id="updatelog" style="border: 1px solid #ced4da;border-radius: 0.25rem 0.25rem;" class="col-9 form-control text-center" maxlength="15" value="" required></p></center>
                                                    
                                                          
                                                        <label for="full-name" style="margin-bottom:5px" class="col-12 px-0 text-center">Пароль</label>
                                                        <center><p><input id="updatepass" style="border: 1px solid #ced4da;border-radius: 0.25rem 0.25rem;" type="password" class="col-9 form-control text-center" maxlength="12" value="" required></p></center>
                                                          <p></p>
     <center><div class="col-6 alert alert-danger text-center" id="error_registerc" style="margin-top:10px;display:none;pointer-events:none"></div></center>
                                                     
   <center> <button id="contbutton" class="col-4 btn btn-primary btn-block"  onclick="continue_reg()">Продолжить</button> </center> cabura.dog
      <br><br></div>
              
                                              
      
    </div>
  </div>
 </div>
            </div>
        </main>

            <script>
       function exit() {
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
					
										},	
                                                                                data: {
                                                                                    type: "exit"
                                                                                  
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               
					location.reload(true);
                                                                return 
                                            }else{
                                               
				alert('Что-то пошло не так, обратитесь в поддержку...');
                                            }
                                        }   
   });
                              
}                                                   
                                                          
</script>                                                          
        <script src="../script/jquery.bundle.js"></script>
        <script src="../script/script.js"></script>
        <script src="/js/app.js?id=206dd5ca3ff470b97278"></script>
        <script>
    centrifuge.subscribe("livefeed", function(message) {
        $('#livefeed-response').prepend(message.data);
        if($('#livefeed-response tr')[20]) $('#livefeed-response tr')[20].remove();
    });
</script>
    </body>
</html>