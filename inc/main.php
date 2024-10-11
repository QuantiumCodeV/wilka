<?php
require ("config.php");
session_start();
$site_access = $_GET['access'];
if($site_access != '') {
  $_SESSION['access'] = $site_access;
  header('Location: /');
}
$refer = $_GET['i'];
if($refer != '') {
  $_SESSION['ref'] = $refer;
  header('Location: /');
}
$select_deps = "SELECT * FROM kot_payments WHERE user_id = '$id' ORDER BY id DESC";
$result_deps = mysql_query($select_deps);
$select_refs = "SELECT * FROM kot_user WHERE ref_id = '$id'";
$result_ref = mysql_query($select_refs);
$sql_select222 = "SELECT * FROM kot_withdraws WHERE user_id = '$id' ORDER BY id DESC";
$result2 = mysql_query($sql_select222);
$sid = $_SESSION['hash'];

$selecter1 = "SELECT * FROM kot_user WHERE hash = '$sid'";
         $result4 = mysql_query($selecter1);
         $row = mysql_fetch_array($result4);
		 if($row)
		{
$img = $row['img'];	
          $login = $row['login'];
          $pass = $row['pass'];
          $balance = $row['balance'];
          $id = $row['id'];
          $social_link = $row['social'];
          $is_admin = $row['admin'];
          $is_ban = $row['ban'];
$vk_name=$row['vk_name'];
if($vk_name == ''){
    $vk_name = $login;
}
        }
if($is_admin==1){
$status='<font color="red"><b>Администратор</b></font>';
}
if($is_admin==0){
$status='Игрок';
}
if($is_admin==2){
$status='Модератор';
}
if($social_link == '') {
  $social_link = "Не привязан";
}
$sql_select33 = "SELECT SUM(suma) FROM kot_payments WHERE user_id='$id'";
$result33 = mysql_query($sql_select33);
$row = mysql_fetch_array($result33);
if($row)
{	
$deps = $row['SUM(suma)'];
}

if ($deps > 200){
$st = '<div style="color:red;">[V.I.P]</div>';
}
if ($deps > 500){
$st = '<div style="color:red;">[PREMIUM]</div>';
}
if ($deps > 800){
$st = '<div style="color:red;">[PRO]</div>';
}

$login = "$login $st";
$select_deps = "SELECT * FROM kot_payments WHERE user_id = '$id' ORDER BY id DESC";
$result_deps = mysql_query($select_deps);
$select_refs = "SELECT * FROM kot_user WHERE ref_id = '$id'";
$result_ref = mysql_query($select_refs);
$sql_select222 = "SELECT * FROM kot_withdraws WHERE user_id = '$id' ORDER BY id DESC";
$result2 = mysql_query($sql_select222);
$mobilesite = substr($sitename, 0, 1);
$mobilesite = strtoupper($mobilesite);
//$img = substr($login, 0, 2);
//$img = strtoupper($img);// аватарка 
//(не трогать)
//$img = '<img src='.$img.'>';

if($is_ban == 1) {
  header('Location: /ban');
} 
if($_SESSION['login'] != 1) {
  header('Location: /login');
}
if($_SESSION['login'] == 1) {
if($login == '' || $pass == '') {
  header('Location: /complete');
}
}
if (isset($_POST['n'])){
 
    $_SESSION['night']= '0';
}
if (isset($_POST['n2'])){
 
    $_SESSION['night']= '1';
}
?>
<!doctype html>
<html lang="ru">

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
        <link rel="stylesheet" href="../css/wnoty.css">
    <link rel="stylesheet" href="../css/fa.css">
    <link rel="stylesheet" href="../css/ti.css">   
   
    <link rel="stylesheet" href="../css/loader-0.css">
    
    <link rel="stylesheet" href="../css/datatables.min.css">
    <script src="../script/jquery-latest.min.js"></script>
    <script src="../script/odometr.js"></script>
    <script src="../script/js.cookie.js"></script>
    <script src="../ajax/functions.js"></script>
    <script src="../ajax/func.js"></script>
    <script src="../ajax/wheel.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=renderRecaptchas&render=explicit" async defer></script>
    <script src="https://d3js.org/d3-path.v1.min.js"></script>
	<script src="https://d3js.org/d3-shape.v1.min.js"></script> 
	<script src="https://flukeout.github.io/simple-sounds/sounds.js"></script>
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

                                                
                        <a onclick="$('#refs').hide();$('#bonus').hide();$('#withdraws').hide();$('#settings').hide();$('#main').hide();$('#faq').hide();$('#dep').hide();$('#withdraw').fadeTo('normal',1);" class="px-3 btn btn-primary mr-2"><i class="fa fa-minus mr-2"></i>Вывести</a>
                        <a onclick="$('#refs').hide();$('#bonus').hide();$('#withdraws').hide();$('#settings').hide();$('#main').hide();$('#faq').hide();$('#withdraw').hide();$('#dep').fadeTo('normal',1);" class="px-3 btn btn-success mr-2"><i class="fa fa-plus mr-2"></i>Пополнить</a>
                        
                        
                        <a onclick="exit();location.href = '';" class="px-3 btn btn-danger"><i class="fa fa-sign-out"></i> Выйти</a>
                        
                    </ul>

                </div>
            </div>
        </nav>
      
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
      <main role="main" class="container mt-4">
            <div class="row">
                <div class="col-lg-3"> <div class="row mx-0">
   
</div>
                <div class="card mb-0  mt-2 border-0 shadow-sm"> 
                    <div class="row mx-0">
                        <div class="col-4 p-3 d-flex" style="    background: #283153 url(/images/blockbg.png) no-repeat bottom center;
                        background-size: 100% auto;"><img class="shadow-sm rounded-circle img-fluid my-auto" src="<?=$img;?>" title="<?=$vk_name;?>"></div>
                        <div class="col-8 card-body bg-dark"> 
                            <h6 class="card-subtitle mb-2 text-muted mt-0"><?=$vk_name;?></h6>
                            <h5 class="card-title mb-0"><span class="odometer-value" id="mybalance"><?=$balance?></span><i class="fa fa-money ml-2 text-primary"></i></h5>
                        </div>
                    </div>
                </div>
                <a onclick="$('#refs').hide();$('#dep').hide();$('#withdraws').hide();$('#withdraw').hide();$('#main').hide();$('#bonus').fadeTo('normal',1);" class="btn btn-primary btn-block mb-4 shadow-sm" style="
                border-top-left-radius: 0px;
                border-top-right-radius: 0px;
                border-top: none;
            "><i class="fa fa-gift mr-2"></i>Получить бонус</a>
                            
                <!-- menu -->
                <div class="mb-4">
                    <div >
                        <ul class="nav flex-column nav-leftbar">
                            <li class="nav-item">
                                <a class="px-0 text-white nav-link"  onclick="$('#refs').hide();$('#dep').hide();$('#faq').hide();$('#withdraw').hide();$('#withdraws').hide();$('#bonus').hide();$('#settings').hide();$('#main').fadeTo('normal',1);" ><i class="fa fa-gamepad mr-2"></i>Играть</a>
                            </li>
                                                        <li class="nav-item">
                                <a class="px-0 text-white nav-link" onclick="$('#main').hide();$('#dep').hide();$('#faq').hide();$('#withdraw').hide();$('#withdraws').hide();$('#bonus').hide();$('#settings').hide();$('#refs').fadeTo('normal',1);"><i class="fa fa-users mr-2"></i>Мои рефералы</a>
                            </li>
                                                        <li class="nav-item">
                                <a class="px-0 text-white nav-link" onclick="$('#main').hide();$('#dep').hide();$('#faq').hide();$('#withdraw').hide();$('#withdraws').hide();$('#bonus').hide();$('#settings').hide();$('#withdraws').fadeTo('normal',1);"><i class="fa fa-money mr-2"></i>Выплаты</a>
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
                    	
                        <a onclick="$('#main').hide();$('#dep').hide();$('#withdraw').hide();$('#faq').hide();$('#withdraws').hide();$('#bonus').hide();$('#settings').hide();$('#faq').fadeTo('normal',1);" class="font-weight-bold text-white" style="text-decoration: none;">F.A.Q</a>
                    </div>
                </div> </div>
               
            
                <div class="col-lg-9" id="cubes" style="display:none;"> <div >
<div class="row">

    <div class="col-lg-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">
            	                	<h5 class="card-title mb-4" onclick="$('#cubes').hide();$('#games').fadeTo('normal',1);" style="cursor:pointer;color: #20a4c1" align="center">Вернуться назад...</h5>
                <h5 class="card-title" align="center">Ставка</h5>

                                <div class="form-group my-4">
                    <div class="row rounded-bottom mx-0" id="betsss">
                        <label class="col-12 px-0">Сумма</label>
                        <input name="amount" id="betSizeDice" value="1" style="border: 1px solid #202741;border-radius: 0.25rem 0.25rem 0 0;" type="text" class="col-12 form-control text-center">
                        <button onclick="$(`input[name='amount']`).val(parseFloat($(`#mybalance`).text()).toFixed(2));" style="border: 1px solid #202741;border-radius: 0 0 0 0.2rem;" class="btn col-3 border-right-0 border-top-0 btn-dark btn-sm">Max</button>
                        <button onclick="$(`input[name='amount']`).val(1);" style="border: 1px solid #202741;" class="btn col-3 rounded-0 border-right-0 border-top-0 btn-dark btn-sm">Min</button>
                        <button onclick="$(`input[name='amount']`).val(parseFloat($(`input[name='amount']`).val() * 2).toFixed(2));" style="border: 1px solid #202741;" class="btn col-3 rounded-0 border-right-0 border-top-0 btn-dark btn-sm">X2</button>
                        <button onclick="$(`input[name='amount']`).val(parseFloat($(`input[name='amount']`).val() / 2).toFixed(2));" style="border: 1px solid #202741;border-radius: 0 0 0.2rem 0;" class="btn col-3 border-top-0 btn-dark btn-sm">/2</button>
                    </div>
                     
                </div>

                <div >
<button  class="btn btn-block btn-success"   id="betDice" onclick="betdice();soundClick()" >Сделать ставку </button>
                                              
                                                </div>
                                                 </div>

                
           
        </div>

    </div>

<br>
<style>
.input-range__label {
    display: none
}

.input-range__label--value.isActive {
    opacity: 1
}

.input-range__label.input-range__label--value {
    display: block
}

.input-range__label--value {
    display: block;
    pointer-events: none;
    position: absolute;
    bottom: calc(100% + 20px);
    font-size: 11px;
    font-weight: 600;
    padding: 5px 8px;
    -webkit-transition: opacity .5s,.5s,-webkit-transform;
    transition: opacity .5s,.5s,-webkit-transform;
    transition: opacity .5s,transform,.5s;
    transition: opacity .5s,transform,.5s,-webkit-transform;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    color: #fff;
    left: 50%;
    opacity: 0;
    border-radius: 3px;
    background: #4986f5;
    will-change: opacity,left;
}

.input-range__label--value:before {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    -webkit-transform: translate(-50%);
    transform: translate(-50%);
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
    border-top: 4px solid #4986f5
}
.dice__cube {
    position: relative;
    -webkit-transform-origin: 50% 100% 0;
    transform-origin: 50% 100% 0;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    opacity: 0;
    -webkit-transition: all .4s;
    transition: all .4s;
    background-color: #fff;
    width: 10px;
    height: 10px;
    top: 12px;
    border-radius: 6px;
}
.dice__cube:before {
    border: 7px solid #ede8e8;
}
.dice__cube:after, .dice__cube:before {
    content: "";
    display: block;
    position: absolute;
    left: 50%;
    background: none;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
}
.dice__cube:before {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background-color: #272d39;
    border: 7px solid #fff;
    box-sizing: border-box;
    top: -40px;
}
.dice__cube:after {
    border-color: #ede8e8 transparent;
}
.dice__cube:after {
    width: 0;
    height: 0;
    border-color: #fff transparent transparent;
    border-style: solid;
    border-width: 5px 3px 0;
    top: -17px;
}
.dice__cube:after, .dice__cube:before {
    content: "";
    display: block;
    position: absolute;
    left: 50%;
    background: none;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
}

</style>
    <div class="col-lg-8">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">
                <h5 class="card-title">Кости</h5>

                <div class="wheel">
                
                   <div>
      <div>
        <div>
          <div> 
            <div class="keno-component container-fluid m-left-pc m-field" style="">



<div class="game-dice"><img class="dice-cube" src="/images/games/dice_cube.svg" alt=""><span class="result visible negative" id="nums">0</span></div>
<div class="game-bar">
  <center><span class="input-range__slider-container r2" id="one" style="position: relative; left: id="one"%; top: 42.6px; transition: all 0s ease 0s;"></center>
                      <span class="input-range__label input-range__label--value isNegative">
                        <span class="input-range__label-container " id="one">50</span>
                      </span>
                    </span>
                    <div class="index__home__indicator__inner__number is-rolling is-hidden " style="transform: translate(-45%, 20px); left: 203.94px;">
						<div class="index__home__indicator__inner__number__roll is-negative ">
							<img alt="vk.com/loodklon" src="/cub.svg" class="roll-img"><span id="nums" style="color: red;">45.32</span>
						</div>
					</div>
<div class="dice-roll" style="opacity: 1; transform: translate(-4%, 0px);">

<div class="dice__cube"></div></div>

<input type="range" oninput="fun1()" id="r1" name="chance" style="width: 100%; background: -webkit-linear-gradient(left, rgb(241, 2, 96) 0%, rgb(241, 2, 96) 50.8%, rgb(8, 229, 71) 50.8%, rgb(8, 229, 71) 100%); margin-bottom: 10% !important;" min="2" value="50" max="98" step="0.01" class="range rangeFindOne">

</div>
</div>
</div>
</div>
</div>
</div>
                                       
                               
                    
                </div>
            </div>

        </div>


    </div>

    
   
    
</div>

 </div>
            </div>
            
                 <div class="col-lg-9" id="coinflip" style="display:none;"> <div >
<div class="row">

    <div class="col-lg-4">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">
            	                	<h5 class="card-title mb-4" onclick="$('#coinflip').hide();$('#games').fadeTo('normal',1);" style="cursor:pointer;color: #20a4c1" align="center">Вернуться назад...</h5>
                <h5 class="card-title" align="center">Ставка</h5>

                                <div class="form-group my-4">
                    <div class="row rounded-bottom mx-0" id="betsss">
                        <label class="col-12 px-0">Сумма</label>
                        <input name="amount" id="coinflipBet" value="1" style="border: 1px solid #202741;border-radius: 0.25rem 0.25rem 0 0;" type="text" class="col-12 form-control text-center">
                        <button onclick="$(`input[name='amount']`).val(parseFloat($(`#mybalance`).text()).toFixed(2));" style="border: 1px solid #202741;border-radius: 0 0 0 0.2rem;" class="btn col-3 border-right-0 border-top-0 btn-dark btn-sm">Max</button>
                        <button onclick="$(`input[name='amount']`).val(1);" style="border: 1px solid #202741;" class="btn col-3 rounded-0 border-right-0 border-top-0 btn-dark btn-sm">Min</button>
                        <button onclick="$(`input[name='amount']`).val(parseFloat($(`input[name='amount']`).val() * 2).toFixed(2));" style="border: 1px solid #202741;" class="btn col-3 rounded-0 border-right-0 border-top-0 btn-dark btn-sm">X2</button>
                        <button onclick="$(`input[name='amount']`).val(parseFloat($(`input[name='amount']`).val() / 2).toFixed(2));" style="border: 1px solid #202741;border-radius: 0 0 0.2rem 0;" class="btn col-3 border-top-0 btn-dark btn-sm">/2</button>
                    </div>
                </div>

                <div class="coinflipButt coinflipButtons">
<button style="width:48%;float:right;display:inline-block;" class="btn btn-primary"   onclick="coinflipbet('1');soundClick()"><img class="c_c" src="../images/games/p.png"> Орёл </button>
<button style="width:48%; float:left; display:inline-block;" class="btn btn-success"  onclick="coinflipbet('2');soundClick()"><img class="c_c" src="../images/games/h.png"> Решка </button>                                                
                                                </div>
                <audio src="sounds/click.wav" ></audio>
            </div>
<script>
	function soundClick1() {
  var audio = new Audio(); // Создаём новый элемент Audio
  audio.src = 'sounds/click.wav'; // Указываем путь к звуку "клика"
  audio.autoplay = true; // Автоматически запускаем
}
</script>
        </div>

    </div>

<br>
    <div class="col-lg-8">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body">
                <h5 class="card-title">Коинфлип</h5>

                <div class="wheel">
                
                   <div  class="tails" id="coin">
  <center>
<div class="coin-side-a side-a"><img style="margin-top:15px;" src="../images/games/coin1.png"></div>
<div class="coin-side-b side-b"><img style="margin-top:15px;" src="../images/games/coin2.png"></div>  
</center>  
                                        </div>
                                        <br>
                                        
                                   <center><div class="chat-group-divider"> Коэффиценты пока что не доступны </div><div class="coeff-item" style="width:auto;min-width:40%"><span class="coeff-text"><span class="coef-dice coef">1.00</span> х</span><br><span class="coeff-text-x">Коэффицент</span></div>
<div class="coeff-item" style="width:auto;min-width:40%"><span class="coeff-text win-dice nextcoef">1.98 x</span><br><span class="coeff-text-x">След. коэф</span></div></center>
                               
                    
                </div>
            </div>

        </div>


    </div>

    
   
    
</div>

 </div>
            </div>
            
                <div class="col-lg-9" id="dep" style="display:none;"> <div >
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body mb-0">
        <h5 class="card-title">Пополнение счёта</h5>
        

        <div class="row px-0 mt-3">

           
           
            <div class="col-lg-4 mb-3">
                <div class="form-group mb-0">
                    <label>Сумма</label>
                    <input type="text" class="form-control" id="depositSize" placeholder="Сумма пополнения">
                  </div>
            </div>


            <div class="col-lg-12 ">
                <button class="btn btn-success btn-block" onclick="deposit_default()" id='depositButton'>Далее</button>
                <button style="display:none;" class="btn btn-success btn-block" onclick="deposit_default()" id='error_deposit'>Далее</button>
                            </div>

        </div>

    </div>

</div>
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body mb-0">
        <h5 class="card-title">Выплаты</h5>
        <h6 class="card-subtitle text-muted">Отображаются последние 10 выплат</h6>
    </div>

    <div class="table-responsive-lg">

        <table class="table table-striped table-borderless table-hover mb-0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Номер операции</th>
                    <th scope="col">Дата</th>
                    <th scope="col" class="text-right">Сумма</th>
                </tr>
            </thead>
            <tbody id="lastDepN">
                        <?php 
while($row = mysql_fetch_array($result_deps)) {
 
$id_dep = $row['transaction'];
$date_dep = $row['data'];
$sum_dep = $row['suma']; 
echo "<tr>
                    <td class='text-center'>$id_dep</td>
                    <td>$date_dep</td>
                    <td class='text-right'>$sum_dep</td>
                    </tr>";

  }
  
                                      ?>              
                                      </tbody><!-- tbody -->
                    <center id="loadpw" style="display:none">Загрузка...</center>
                </table>

    </div>

</div>
 </div>
            </div>
            <script>
    
    function deposit_default() {
   $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$('#depositButton').html('<div class="loader" style="height:23px;width:23px"></div>');  
$("#error_deposit").hide();
                    },  
                                                                                data: {
                                                                                    type: "deposit",
           sum: $("#depositSize").val()
                                                                          
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                 $('#depositButton').html('Далее');                             
                  window.location.href = obj.locations;
                                                                return 
                                            }else{
                 $('#depositButton').html('Далее');                              
                $("#error_deposit").show();                               
                $("#error_deposit").html(obj.error); 
                                            }
                                        }   
   });
}
    
    function deposit() {
            if ( $('#systemPay').val() > 3 || !$.isNumeric($('#systemPay').val())){
              $('#error_deposit').show();
              return $('#error_deposit').html('Укажите систему пополнения');
            }
            if ( $('#depositSize').val() == ''){
              $('#error_deposit').show();
              return $('#error_deposit').html('Введите сумму');
            }
            
            if (!$.isNumeric($('#depositSize').val())){
              $('#error_deposit').show();
              return $('#error_deposit').html('Введите корректную сумму');
            }
            $.ajax({
                    type: 'POST',
                    url: 'action.php',
                    data: {
                        type: "deposit",
                        sid: Cookies.get('sid'),
                        system: $('#systemPay').val(),
                        size: $('#depositSize').val()
                    },
            beforeSend: function(data) {
            
            $('#depositButton').addClass('disabled').html('<div class="loader"></div>');
          },
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        if ('success' in obj) {
              window.location.href = obj.success.location;
                        }

                        if ('error' in obj) {
                            $('#depositButton').removeClass('disabled').html('Далее');
                            $('#error_deposit').show();
                            return $('#error_deposit').html(obj.error.text);
                        }

                    }
                });
            
          }
    
    
        
        function getNowDeposits(){
                            if ($('#lastDepN').html() !== ""){
                                return;
                            }
                            $.ajax({
                    type: 'POST',
                    url: 'action.php',
                    data: {
                        type: "getLasterDep",
                        sid: Cookies.get('sid')
                    },
            beforeSend: function(data) {
            $('#loadpw').show();
          },
                    success: function(data) { 
                        $('#loadpw').hide();
                        var obj = jQuery.parseJSON(data);
                      
                        if ('success' in obj) {
                            return $('#lastDepN').html(obj.success.text);
                        }else{
                            $('#loadpw').html("Ошибка");
                        }


                    }
                });
                        }
        
        
    </script>
<div class="col-lg-9" id="withdraw" style="display:none;"> <div >
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body mb-0">
        <h5 class="card-title">Вывод средств</h5>
        <h6 class="card-subtitle text-muted">Время ответа на заявку до 48 часов!</h6>

        <div class="row px-0 mt-3">

            <div class="col-lg-4 mb-3">
                <div class="form-group mb-0">
                    <label>Способ вывода</label>
                    <select class="custom-select bg-dark border-dark text-white" id="hide_search" onchange="withdrawSelect()">
                        <optgroup class="custom-select bg-dark border-dark text-white" label="Платежные системы">
                                    <option value="4">Qiwi</option>
                                    <option value="2">Payeer</option>
                                    <option value="3">WebMoney</option>
                                    <option value="1">Яндекс.Деньги</option>
                                </optgroup>
                                
                                <optgroup label="Банковские карты (Россия)">
                                    <option value="9">VISA</option>
                                    <option value="10">MASTERCARD</option>
                                </optgroup>
                    </select>
                  </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="form-group mb-0">
                    <label>Cчёт</label>
                    <input type="text" class="form-control" placeholder="+79XXXXXXXXX"  id="walletNumber">
                  </div>
            </div>

            <div class="col-lg-4 mb-3">
                <div class="form-group mb-0">
                    <label>Сумма</label>
                    <input type="number"  class="form-control" id="WithdrawSize" placeholder="Сумма">
                </div>
            </div>

            <div class="col-lg-12">
                <button class="btn btn-success btn-block" id="withB" onclick="createwithdraw();">Вывести </button>
                <div id="promocode-alert" class="mt-4 mx-auto" ><div id="error_withdraw" style="display:none;pointer-events:none;" class="alert alert-danger"></div><div id="succes_withdraw" style="display:none;pointer-events:none;" class="alert alert-success"></div></div>
       <script>
                function createwithdraw() {
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$('#withB').html('<div class="loader" style="height:23px;width:23px"></div>');
$("#succes_withdraw").hide(); 
  $("#error_withdraw").hide(); 
                    },  
                                                                                data: {
                                                                                    type: "withdrawuser",
           system: $('#hide_search').val(),
           wallet: $('#walletNumber').val(),                                        sum: $('#WithdrawSize').val()                                   
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                   $("#withdrawT").load("index.php #withdrawT");                           
                    $("#withB").html('Вывести');                          
                    $("#succes_withdraw").show();                          
          $("#succes_withdraw").html("Выплата успешно создана"); 
                                             
                                                                return 
                                            }else{
                 $("#withB").html('Вывести'); 
                $("#error_withdraw").show();                               
        $("#error_withdraw").html(obj.error);
                                            }
                                        }   
   });
}
                    function withdraw() {
                        if ($('#WithdrawSize').val() == '' || $('#walletNumber').val() == '' || $('#hide_search').val() == '') {
                            $('#error_withdraw').show();
                            return $('#error_withdraw').html('Заполните все поля');
                        }
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            beforeSend: function() {
                                $('#withB').addClass('disabled');
                                $('#withB').html('<div class="loader" style="height:23px;width:23px"></div>');


                            },
                            data: {
                                type: "withdraw",
                                sid: Cookies.get('sid'),
                                system: $('#hide_search').val(),
                                size: $('#WithdrawSize').val(),
                                wallet: $('#walletNumber').val()
                            },
                            success: function(data) {
                                $('#error_withdraw').hide();
                                $('#succes_withdraw').hide();

                                $('#withB').removeClass('disabled');
                                $('#withB').html('Выплата');
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {

                                    $('#succes_withdraw').show();
                                    $('#emptyHistory').hide();
                                    var tt = $('#withdrawT').html();
                                    $('#withdrawT').html(obj.success.add_bd + tt);
                                    $('#mybalance').load('/inc/main.php #mybalance');
                                }

                                if ('error' in obj) {
                                    $('#error_withdraw').show();
                                    return $('#error_withdraw').html(obj.error.text);
                                }

                            }
                        });
                    }


                    function withdrawSelect() {
                        $('#cardLL').hide();
                        $('#walletNumber').val('');
                        var e = $('#hide_search').val();
                        if (e >= 5 && e <= 8) {
                            $('#nameWithdraw').html('Номер телефона:');
                            $('#walletNumber').attr('placeholder', '');
                        }
                        if (e >= 1 && e <= 4) {
                            if (e == 4) {
                                $('#walletNumber').attr('placeholder', '+79XXXXXXXXX');
                                $('#limitsW').html('От <b><?=$min_withdraw_sum?></b> до <b>75000</b> рублей за одну выплату');
                            }
                            if (e == 2) {
                                $('#walletNumber').attr('placeholder', 'P1000000');
                                $('#limitsW').html('От <b><?=$min_withdraw_sum?></b> до <b>75000</b> рублей за одну выплату');
                            }
                            if (e == 1) {
                                $('#walletNumber').attr('placeholder', '410011499718000');
                                $('#limitsW').html('От <b><?=$min_withdraw_sum?></b> до <b>75000</b> рублей за одну выплату');
                            }
                            if (e == 3) {
                                $('#walletNumber').attr('placeholder', 'R123456789000');
                                $('#limitsW').html('От <b><?=$min_withdraw_sum?></b> до <b>75000</b> рублей за одну выплату');
                            }
                            $('#nameWithdraw').html('Номер кошелька:');
                        }
                        if (e >= 9) {
                            $('#nameWithdraw').html('Номер карты:');
                            $('#cardLL').show();

                            if (e == 10) {
                                $('#walletNumber').attr('placeholder', '512107XXXX785577');
                                $('#limitsW').html('От <b><?=$min_withdraw_sum?></b> до <b>75000</b> рублей за одну выплату');
                            } else {
                                $('#walletNumber').attr('placeholder', '412107XXXX785577');
                                $('#limitsW').html('От <b><?=$min_withdraw_sum?></b> до <b>75000</b> рублей за одну выплату');
                            }
                        }
                    }



                    function getLasterMyWithdraws() {
                        /*if ($('#withdrawT').html() !== ""){
                            return;
                        }*/
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "getLasterMyWithdraws",
                                sid: Cookies.get('sid')
                            },
                            beforeSend: function(data) {
                                $('#loadmyd').show();
                            },
                            success: function(data) {
                                $('#loadmyd').hide();
                                var obj = jQuery.parseJSON(data);

                                if ('success' in obj) {
                                    $('#withdrawT').html(obj.success.text);
                                    return $('#gnext').html(obj.success.text1);
                                } else {
                                    $('#loadmyd').html("Ошибка");
                                }


                            }
                        });
                    }


                    function removeWithdraw(id) {
                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "removeWithdraw",
                                sid: Cookies.get('sid'),
                                id: id
                            },
                            success: function(data) {
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {
                                    $('#' + id + '_his').fadeOut('slow');
                                    
                                }
                            }
                        });
                    }


                    function showWithdrawHistory(start) {

                        $.ajax({
                            type: 'POST',
                            url: 'action.php',
                            data: {
                                type: "withdrawHistory",
                                sid: Cookies.get('sid'),
                                start: start
                            },
                            success: function(data) {
                                if (data == 'null') {
                                    $("#withdrawHistoryLoad").hide();
                                    return $("#gnext").hide();
                                }
                                var obj = jQuery.parseJSON(data);
                                if ('success' in obj) {
                                    $("#withdrawHistoryLoad").hide();
                                    var tt = $('#withdrawT').html();
                                    $('#withdrawT').html(tt + obj.success.add);
                                    $('#gnext').html(obj.success.next);
                                }
                            }
                        });

                    }
function removeWithdrawUser(deletew) {
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

                    },  
                                                                                data: {
                                                                                    type: "deletewithdraw",
           del: deletew
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                   $("#withdrawT").load("index.php #withdrawT");                           
                                                    $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        $('#mybalance').load('/inc/main.php #mybalance');
                                                                return 
                                            }else{
                $("#withdrawT").load("index.php #withdrawT"); 
                                            }
                                        }   
   });
}
                </script>
                            </div>

        </div>

    </div>

</div>
<div class="card border-0 shadow-sm mb-4">

    <div class="card-body mb-0">
        <h5 class="card-title">Выплаты</h5>
        <h6 class="card-subtitle text-muted">Отображаются последние 10 выплат</h6>
    </div>

    <div class="table-responsive-lg">

        <table class="table table-striped table-borderless table-hover mb-0">
            <thead>
                <tr>
                	<th class="text-center">Отменить</th>
                    <th class="text-center">ID</th>
                            <th class="text-center">Дата</th>
                            <th class="text-center">Реквизиты</th>
                            <th class="text-center">Сумма</th>
                            <th class="text-center" >Статус</th>
                </tr>
            </thead>
            <tbody>
                  <?php
                                      while($row = mysql_fetch_array($result2)) {
$id_w = $row['id'];
$sum_w = $row['sum'];
$ps = $row['ps'];
$wallet = $row['wallet'];                                   
$date_w = $row['date'];
$status = $row['status'];
if($status == 0) {
$remove = "<em class='fa fa-close' style='color:red;cursor:pointer' onclick="."removeWithdrawUser('$id_w')"."></em>";
$badge = "<span class='badge badge-warning'>Ожидание</span>";
}
if($status == 1) {
$remove = '';
$badge = "<span class='badge badge-success'>Выполнено</span>";
}
if($status == 2) {
$remove = '';
$badge = "<span class='badge badge-danger'>Отклонено</span>";
}                                      
echo "<tr class='text-center' style='cursor:default!important' id='$id_w'><td>$remove</td><td>$id_w</td><td>$date_w</td><td style='overflow-x: auto;'><img src='images/$ps.png'> $wallet</td><td>$sum_w</td><td>$badge</td></tr>";                                        
}
                                      ?>
                   
                                      
                                      
                    </tbody>
        </table>

    </div>

</div>
 </div>
            </div>
            
       <div class="col-lg-9" id="bonus" style="display:none;"> 
                <div > <div class="card border-0 shadow-sm">
    <div class="card-body">
      <h5 class="card-title">Бонусы</h5>
      
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Промокод</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Ежедневный бонус</a>
        </li>

        

      </ul>

      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

          <div class="mt-4 text-center">
              <svg class="mg-b-20" xmlns="http://www.w3.org/2000/svg">
                <path d="m101.921875 496.347656c-1.855469 0-3.710937-.695312-5.148437-2.089844-2.929688-2.84375-3-7.523437-.152344-10.453124l9.1875-9.464844c2.84375-2.929688 7.523437-3 10.453125-.15625 2.929687 2.84375 3 7.523437.15625 10.453125l-9.191407 9.464843c-1.449218 1.496094-3.375 2.246094-5.304687 2.246094zm0 0" fill="#ff4e61"></path>
                <path d="m201.648438 133.261719c-1.851563 0-3.710938-.695313-5.144532-2.089844-2.929687-2.84375-3-7.523437-.15625-10.449219l9.191406-9.46875c2.84375-2.929687 7.519532-3 10.449219-.15625 2.929688 2.84375 3 7.523438.15625 10.453125l-9.191406 9.46875c-1.449219 1.492188-3.375 2.242188-5.304687 2.242188zm0 0" fill="#ff4e61"></path>
                <path d="m413.804688 100.390625c-1.855469 0-3.710938-.691406-5.148438-2.085937-2.929688-2.84375-3-7.523438-.15625-10.453126l9.191406-9.46875c2.84375-2.925781 7.523438-2.996093 10.453125-.152343 2.929688 2.839843 3 7.523437.15625 10.449219l-9.191406 9.46875c-1.449219 1.492187-3.375 2.242187-5.304687 2.242187zm0 0" fill="#5c73bc"></path>
                <path d="m413.804688 463.773438c-1.855469 0-3.710938-.695313-5.148438-2.085938-2.929688-2.84375-3-7.523438-.15625-10.453125l9.191406-9.46875c2.84375-2.925781 7.523438-3 10.453125-.15625 2.929688 2.84375 3 7.523437.15625 10.453125l-9.191406 9.46875c-1.449219 1.492188-3.375 2.242188-5.304687 2.242188zm0 0" fill="#fa0"></path>
                <path d="m63.070312 112.910156c-1.851562 0-3.710937-.691406-5.144531-2.085937-2.929687-2.84375-3-7.523438-.15625-10.453125l9.191407-9.46875c2.84375-2.925782 7.523437-2.996094 10.453124-.152344 2.925782 2.84375 2.996094 7.523438.152344 10.449219l-9.191406 9.46875c-1.449219 1.492187-3.375 2.242187-5.304688 2.242187zm0 0" fill="#fa0"></path>
                <path d="m12.308594 278.824219c-1.851563 0-3.710938-.691407-5.144532-2.085938-2.929687-2.84375-3-7.523437-.15625-10.453125l9.1875-9.46875c2.84375-2.929687 7.523438-3 10.453126-.15625 2.929687 2.84375 3 7.523438.15625 10.453125l-9.191407 9.46875c-1.445312 1.492188-3.375 2.242188-5.304687 2.242188zm0 0" fill="#2dc471"></path>
                <path d="m216.292969 278.492188-23.996094 12.996093c-6.222656 3.371094-13.496094-2.074219-12.308594-9.214843l4.582031-27.523438c.472657-2.835938-.4375-5.726562-2.4375-7.734375l-19.414062-19.496094c-5.035156-5.054687-2.257812-13.863281 4.703125-14.90625l26.824219-4.015625c2.765625-.414062 5.152344-2.199218 6.386718-4.78125l12-25.042968c3.113282-6.492188 12.101563-6.492188 15.214844 0l11.996094 25.042968c1.238281 2.582032 3.625 4.367188 6.386719 4.78125l26.828125 4.015625c6.957031 1.042969 9.734375 9.851563 4.699218 14.90625l-19.410156 19.496094c-2 2.007813-2.914062 4.898437-2.441406 7.734375l4.582031 27.523438c1.191407 7.140624-6.082031 12.585937-12.304687 9.214843l-23.996094-12.996093c-2.472656-1.339844-5.425781-1.339844-7.894531 0zm0 0" fill="#ffd02f"></path>
                <path d="m220.238281 512c-4.082031 0-7.390625-3.308594-7.390625-7.390625v-115.59375c0-4.082031 3.308594-7.394531 7.390625-7.394531s7.390625 3.3125 7.390625 7.394531v115.59375c0 4.082031-3.308594 7.390625-7.390625 7.390625zm0 0" fill="#5c73bc"></path>
                <path d="m220.296875 357.421875h-.113281c-4.082032 0-7.394532-3.3125-7.394532-7.394531 0-4.082032 3.308594-7.390625 7.394532-7.390625h.113281c4.082031 0 7.390625 3.308593 7.390625 7.390625 0 4.082031-3.308594 7.394531-7.390625 7.394531zm0 0" fill="#5c73bc"></path>
                <path d="m220.296875 331.996094c-.011719 0-.023437 0-.03125 0h-.117187c-4.082032-.015625-7.375-3.339844-7.359376-7.421875.019532-4.074219 3.324219-7.359375 7.390626-7.359375h.035156.113281c4.082031.015625 7.375 3.339844 7.359375 7.421875-.015625 4.070312-3.324219 7.359375-7.390625 7.359375zm0 0" fill="#fa0"></path>
                <path d="m87.234375 230.894531c-1.929687 0-3.855469-.75-5.304687-2.242187l-79.339844-81.738282c-2.84375-2.929687-2.777344-7.609374.152344-10.449218 2.929687-2.84375 7.609374-2.773438 10.453124.152344l79.34375 81.738281c2.84375 2.925781 2.773438 7.609375-.15625 10.449219-1.4375 1.394531-3.292968 2.089843-5.148437 2.089843zm0 0" fill="#ff4e61"></path>
                <path d="m113.953125 258.503906c-1.863281 0-3.726563-.699218-5.164063-2.105468-2.921874-2.851563-2.976562-7.53125-.125-10.453126l.082032-.082031c2.851562-2.917969 7.53125-2.976562 10.453125-.121093 2.921875 2.851562 2.976562 7.53125.121093 10.453124l-.078124.082032c-1.449219 1.480468-3.367188 2.226562-5.289063 2.226562zm0 0" fill="#fa0"></path>
                <path d="m131.402344 276.480469c-1.855469 0-3.710938-.695313-5.148438-2.089844-2.925781-2.84375-2.996094-7.523437-.152344-10.449219l.078126-.085937c2.847656-2.929688 7.527343-2.996094 10.453124-.152344 2.929688 2.84375 3 7.523437.15625 10.453125l-.082031.082031c-1.449219 1.492188-3.375 2.242188-5.304687 2.242188zm0 0" fill="#5c73bc"></path>
                <path d="m353.242188 227.988281c-1.855469 0-3.710938-.691406-5.144532-2.085937-2.929687-2.84375-3-7.523438-.15625-10.453125l79.339844-81.734375c2.84375-2.929688 7.523438-3 10.453125-.15625s3 7.523437.15625 10.453125l-79.34375 81.734375c-1.449219 1.492187-3.375 2.242187-5.304687 2.242187zm0 0" fill="#fa0"></path>
                <path d="m326.523438 255.601562c-1.914063 0-3.824219-.738281-5.269532-2.210937l-.082031-.082031c-2.863281-2.914063-2.820313-7.59375.089844-10.453125 2.914062-2.863281 7.59375-2.820313 10.453125.089843l.082031.082032c2.859375 2.914062 2.820313 7.59375-.09375 10.453125-1.4375 1.414062-3.308594 2.121093-5.179687 2.121093zm0 0" fill="#ff4e61"></path>
                <path d="m309.074219 273.578125c-1.929688 0-3.855469-.75-5.304688-2.242187l-.082031-.082032c-2.839844-2.929687-2.773438-7.609375.15625-10.453125s7.609375-2.773437 10.453125.152344l.082031.082031c2.839844 2.929688 2.773438 7.609375-.15625 10.453125-1.4375 1.394531-3.292968 2.089844-5.148437 2.089844zm0 0" fill="#fa0"></path>
                <path d="m300.652344 116.691406c-1.242188 0-2.5-.3125-3.652344-.972656-3.546875-2.023438-4.78125-6.539062-2.757812-10.082031l56.863281-99.652344c2.023437-3.542969 6.535156-4.777344 10.082031-2.753906 3.546875 2.023437 4.78125 6.539062 2.757812 10.082031l-56.863281 99.652344c-1.363281 2.386718-3.859375 3.726562-6.429687 3.726562zm0 0" fill="#62d38f"></path>
                <path d="m281.523438 150.328125c-1.292969 0-2.597657-.335937-3.789063-1.046875l-.097656-.058594c-3.5-2.09375-4.644531-6.632812-2.546875-10.136718 2.09375-3.507813 6.632812-4.644532 10.136718-2.550782l.097657.058594c3.503906 2.09375 4.644531 6.632812 2.550781 10.136719-1.386719 2.316406-3.835938 3.597656-6.351562 3.597656zm0 0" fill="#fa0"></path>
                <path d="m269.015625 172.246094c-1.300781 0-2.617187-.34375-3.808594-1.0625l-.097656-.058594c-3.496094-2.109375-4.621094-6.652344-2.515625-10.148438 2.109375-3.496093 6.652344-4.617187 10.148438-2.511718l.097656.058594c3.496094 2.109374 4.621094 6.652343 2.511718 10.148437-1.386718 2.300781-3.832031 3.574219-6.335937 3.574219zm0 0" fill="#2dc471"></path>
                <path d="m139.964844 116.691406c-2.570313 0-5.066406-1.339844-6.429688-3.730468l-56.863281-99.648438c-2.023437-3.546875-.789063-8.058594 2.753906-10.082031 3.546875-2.023438 8.0625-.792969 10.085938 2.753906l56.863281 99.648437c2.023438 3.546876.789062 8.0625-2.753906 10.085938-1.15625.660156-2.414063.972656-3.65625.972656zm0 0" fill="#5c73bc"></path>
                <path d="m159.09375 150.328125c-2.507812 0-4.957031-1.277344-6.34375-3.582031-2.101562-3.5-.96875-8.042969 2.527344-10.144532l.101562-.058593c3.5-2.101563 8.039063-.972657 10.140625 2.527343 2.105469 3.5.972657 8.039063-2.527343 10.144532l-.097657.058594c-1.191406.714843-2.503906 1.054687-3.800781 1.054687zm0 0" fill="#ff4e61"></path>
                <path d="m171.601562 172.246094c-2.5 0-4.9375-1.265625-6.328124-3.5625-2.117188-3.492188-1-8.035156 2.488281-10.152344l.097656-.058594c3.496094-2.113281 8.039063-1 10.15625 2.492188 2.113281 3.492187 1 8.035156-2.492187 10.152344l-.097657.058593c-1.199219.726563-2.519531 1.070313-3.824219 1.070313zm0 0" fill="#fa0"></path>
                <path d="m402.144531 357.28125-15.523437 11.601562c-4.023438 3.011719-9.652344-.042968-9.523438-5.164062l.503906-19.75c.050782-2.035156-.871093-3.964844-2.46875-5.164062l-15.507812-11.621094c-4.023438-3.015625-2.945312-9.472656 1.824219-10.929688l18.390625-5.609375c1.890625-.578125 3.390625-2.082031 4-4.015625l5.9375-18.785156c1.539062-4.875 7.835937-5.8125 10.652344-1.589844l10.863281 16.285156c1.121093 1.675782 2.96875 2.679688 4.941406 2.679688l19.179687.011719c4.976563.003906 7.789063 5.882812 4.757813 9.949219l-11.675781 15.671874c-1.203125 1.617188-1.558594 3.738282-.949219 5.671876l5.917969 18.796874c1.53125 4.875-3.027344 9.445313-7.714844 7.734376l-18.078125-6.597657c-1.859375-.679687-3.925781-.371093-5.527344.824219zm0 0" fill="#ffd02f"></path>
                <path d="m261.507812 512c-4.082031 0-7.390624-3.308594-7.390624-7.390625 0-57.230469 22.832031-95.921875 41.984374-118.304687 20.828126-24.332032 41.613282-35.023438 42.488282-35.46875 3.640625-1.847657 8.089844-.390626 9.933594 3.253906 1.84375 3.636718.394531 8.078125-3.242188 9.929687-.3125.160157-19.5 10.164063-38.367188 32.394531-25.226562 29.71875-38.015624 66.121094-38.015624 108.195313 0 4.082031-3.308594 7.390625-7.390626 7.390625zm0 0" fill="#ff4e61"></path>
                <path d="m102.855469 397.351562 11.765625 15.605469c3.054687 4.046875 9.285156 2.730469 10.546875-2.226562l4.863281-19.113281c.5-1.964844 1.910156-3.554688 3.769531-4.246094l18.039063-6.707032c4.679687-1.738281 5.390625-8.25 1.207031-11.015624l-16.140625-10.671876c-1.660156-1.101562-2.691406-2.972656-2.757812-5.003906l-.617188-19.75c-.15625-5.121094-5.949219-7.832031-9.796875-4.585937l-14.839844 12.515625c-1.53125 1.289062-3.578125 1.722656-5.472656 1.15625l-18.421875-5.5c-4.777344-1.425782-9.070312 3.410156-7.261719 8.183594l6.96875 18.410156c.71875 1.894531.484375 4.035156-.625 5.71875l-10.769531 16.347656c-2.792969 4.242188.34375 9.9375 5.3125 9.644531l19.144531-1.140625c1.972657-.117187 3.875.773438 5.085938 2.378906zm0 0" fill="#ffd02f"></path>
                <path d="m179.023438 512c-4.082032 0-7.390626-3.308594-7.390626-7.390625 0-30.058594-6.679687-57.558594-19.851562-81.734375-1.953125-3.585938-.628906-8.074219 2.957031-10.027344 3.585938-1.953125 8.074219-.628906 10.027344 2.953125 14.363281 26.375 21.648437 56.253907 21.648437 88.808594 0 4.082031-3.308593 7.390625-7.390624 7.390625zm0 0" fill="#fa0"></path>
            </svg>
            <h4 class="mt-4 mb-3">Введите промокод</h4>
            <input type="text" class="form-control rounded" id="promoactive" style="width: 200px;margin: 20px auto;">
            <a href="<?=$group?>" target="_blank" class="btn btn-primary rounded px-4"><i class="mr-2 fa fa-vk"></i>Группа Вконтакте</a>
            <button class="btn btn-success rounded px-4" id="activebutton" onclick="activepromo()"><i class="mr-2 fa fa-arrow-right"></i>Получить бонус</button>
            
            <div id="promocode-alert" class="mt-4 mx-auto" style="max-width: 300px;"><div id="error_promoactive" style="display:none;pointer-events:none;" class="alert alert-danger"></div><div id="succes_promoactive" style="display:none;pointer-events:none;" class="alert alert-success"></div></div>
       
       <script>
                            function activepromo() {
  setTimeout(function() {
    $("#error_promoactive").fadeOut();
    $("#succes_promoactive").fadeOut(); 
  }, 10000); 
  if($('#promoactive').val() == '') {
    $("#error_promoactive").show();                               
         return $("#error_promoactive").html("Введите промокод");
  }
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
  $('#activebutton').html('<div class="loader" style="height:23px;width:23px"></div>');
$("#succes_promoactive").hide(); 
  $("#error_promoactive").hide(); 
                    },  
                                                                                data: {
                                                                                    type: "activePromo",
           promoactive: $('#promoactive').val()                                                                       
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                    $('#activebutton').html('Активировать');                           
                    $("#succes_promoactive").show();                          
          $("#succes_promoactive").html("Промокод активирован"); 
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        $('#mybalance').load('/inc/main.php #mybalance');
                                                                return 
                                            }else{
                $('#activebutton').html('Активировать');                               
                $("#error_promoactive").show();                               
        $("#error_promoactive").html(obj.error);
                                            }
                                        }   
   });
}
                        </script>       
        </div>

        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

          
          <div class="mt-4 text-center">
            <svg class="mg-b-20" enable-background="new 0 0 512 512" height="100" viewBox="0 0 512 512" width="100" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <g>
                        <g>
                            <path d="m512 256c0 127.57-93.32 233.35-215.41 252.79-20.05-27.57-61.14-27.57-81.18 0-122.09-19.44-215.41-125.22-215.41-252.79 0-46.21 12.25-89.56 33.68-126.99 44.11-77.07 127.15-129.01 222.32-129.01s178.21 51.94 222.32 129.01c21.43 37.43 33.68 80.78 33.68 126.99z" fill="#c5d7fc"></path>
                            <path d="m512 256c0 78-34.89 147.85-89.91 194.81-34.97 29.84-78.06 50.43-125.5 57.99-20.04-27.58-61.15-27.58-81.18 0-47.44-7.56-90.53-28.15-125.5-57.99-55.02-46.96-89.91-116.81-89.91-194.81 0-46.21 12.25-89.56 33.68-126.99 19.54 34.13 46.71 63.34 79.2 85.28 30.21 20.41 65.01 34.54 102.53 40.51 13.22 2.12 26.78 3.21 40.59 3.21s27.37-1.09 40.59-3.21c37.52-5.97 72.32-20.1 102.53-40.51 32.49-21.94 59.66-51.15 79.2-85.28 21.43 37.43 33.68 80.78 33.68 126.99z" fill="#8fc8f5"></path>
                        </g>
                    </g>
                    <g>
                        <path d="m422.09 214.29v236.52c-34.97 29.84-78.06 50.43-125.5 57.99-20.04-27.58-61.15-27.58-81.18 0-47.44-7.56-90.53-28.15-125.5-57.99v-236.52z" fill="#de1263"></path>
                        <path d="m422.09 214.29v236.52c-34.97 29.84-78.06 50.43-125.5 57.99-10.02-13.79-25.31-20.68-40.59-20.68v-273.83z" fill="#bb0d5d"></path>
                        <path d="m255.996 214.289h166.095v107.037h-166.095z" fill="#a80e5b"></path>
                        <path d="m89.91 214.289h166.086v107.037h-166.086z" fill="#bb0d5d"></path>
                        <path d="m444.198 199.225v60.579c0 9.142-7.417 16.559-16.559 16.559h-343.278c-9.142 0-16.559-7.417-16.559-16.559v-60.579c0-9.151 7.417-16.559 16.559-16.559h343.277c9.143-.001 16.56 7.408 16.56 16.559z" fill="#f7287c"></path>
                        <path d="m444.198 199.225v60.579c0 9.142-7.417 16.559-16.559 16.559h-171.643v-93.697h171.643c9.142-.001 16.559 7.408 16.559 16.559z" fill="#de1263"></path>
                        <path d="m296.59 182.67v326.13c-13.22 2.11-26.78 3.2-40.59 3.2s-27.37-1.09-40.59-3.2v-326.13z" fill="#ffeb00"></path>
                        <path d="m296.59 182.67v326.13c-13.22 2.11-26.78 3.2-40.59 3.2v-329.33z" fill="#ffd400"></path>
                        <path d="m396.933 127.855v.008c0 30.264-24.538 54.801-54.801 54.801h-172.263c-30.264 0-54.801-24.537-54.801-54.801v-.008c0-15.132 6.134-28.837 16.05-38.752 9.915-9.915 23.62-16.05 38.752-16.05 47.571 0 86.127 38.565 86.127 86.127 0-47.562 38.565-86.127 86.136-86.127 30.262.001 54.8 24.539 54.8 54.802z" fill="#ffcf1c"></path>
                        <path d="m396.933 127.855v.008c0 30.264-24.538 54.801-54.801 54.801h-86.136v-23.484c0-47.562 38.565-86.127 86.136-86.127 30.263.001 54.801 24.539 54.801 54.802z" fill="#fcbf10"></path>
                        <path d="m313.298 160.382v.003c0 12.304-9.976 22.28-22.28 22.28h-70.036c-12.304 0-22.28-9.976-22.28-22.28v-.003c0-6.152 2.494-11.724 6.525-15.755s9.603-6.525 15.755-6.525c19.341 0 35.016 15.679 35.016 35.016 0-19.337 15.679-35.016 35.02-35.016 12.304-.001 22.28 9.975 22.28 22.28z" fill="#fcbf10"></path>
                        <path d="m313.298 160.382v.003c0 12.304-9.976 22.28-22.28 22.28h-35.02v-9.548c0-19.337 15.679-35.016 35.02-35.016 12.304 0 22.28 9.976 22.28 22.281z" fill="#ff9f01"></path>
                    </g>
                </g>
            </svg>
            <h4 class="mb-3 mt-3">До 100 на баланс ежедневно</h4>
            <a href="<?=$group?>" target="_blank" class="btn btn-primary rounded px-4"><i class="mr-2 fa fa-vk"></i>Группа Вконтакте</a>
           <button class="btn btn-success rounded px-4" id="butPromo" onclick="getDaily()"><i class="mr-2 fa fa-arrow-right"></i>Получить бонус</button>
            <div id="daily-alert" class="mt-4 mx-auto" style="max-width: 300px;"><div id="error_promo" style="display:none;pointer-events:none;" class="alert alert-danger"></div><div id="succes_promo" style="display:none;pointer-events:none;" class="alert alert-success"></div></div>
              <script>
                function getPromo() {
                    if ($('#g-recaptcha-response').val() == ''){
                    $('#error_promo').show();
                    return $('#error_promo').html('Поставьте галочку');
                    }
                  
                    
                  $.ajax({
                                        type: 'POST',
                                        url: 'action.php',
                    beforeSend: function() {
                      $('#butPromo').html('<div class="loader"></div>').addClass("disabled");
                    },  
                                        data: {
                                            type: "getQiwi",
                                            sid: Cookies.get('sid'),
                      rc: $('#g-recaptcha-response').val()
                                        },
                                        success: function(data) {
                                            $('#butPromo').html('Получить бонус').removeClass("disabled");
                      $('#error_promo').hide();
                                            var obj = jQuery.parseJSON(data);
                                            if ('success' in obj) {
                                               $("#succes_promo").show();
                        $('#succes_promo').html(obj.success.text);
                        $('#promoBalance').html(obj.success.promo_balance);
                        updateBalance(obj.success.balance, obj.success.new_balance);
                        grecaptcha.reset();
                                             return false;
                                            }else{
                        grecaptcha.reset();
                        $('#error_promo').show();
                        $("#succes_promo").hide();
                        return $('#error_promo').html(obj.error.text);
                      }
                                        }
                                    });
                                    
                                }
                
                </script>
        </div>


        </div>
        <div class="tab-pane fade" id="pills-telegram" role="tabpanel" aria-labelledby="pills-telegram-tab">

          
          <div class="mt-4 text-center">
            <svg class="mg-b-20" enable-background="new 0 0 512 512" height="100" viewBox="0 0 512 512" width="100" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <g>
                        <g>
                            <path d="m512 256c0 127.57-93.32 233.35-215.41 252.79-20.05-27.57-61.14-27.57-81.18 0-122.09-19.44-215.41-125.22-215.41-252.79 0-46.21 12.25-89.56 33.68-126.99 44.11-77.07 127.15-129.01 222.32-129.01s178.21 51.94 222.32 129.01c21.43 37.43 33.68 80.78 33.68 126.99z" fill="#c5d7fc"></path>
                            <path d="m512 256c0 78-34.89 147.85-89.91 194.81-34.97 29.84-78.06 50.43-125.5 57.99-20.04-27.58-61.15-27.58-81.18 0-47.44-7.56-90.53-28.15-125.5-57.99-55.02-46.96-89.91-116.81-89.91-194.81 0-46.21 12.25-89.56 33.68-126.99 19.54 34.13 46.71 63.34 79.2 85.28 30.21 20.41 65.01 34.54 102.53 40.51 13.22 2.12 26.78 3.21 40.59 3.21s27.37-1.09 40.59-3.21c37.52-5.97 72.32-20.1 102.53-40.51 32.49-21.94 59.66-51.15 79.2-85.28 21.43 37.43 33.68 80.78 33.68 126.99z" fill="#8fc8f5"></path>
                        </g>
                    </g>
                    <g>
                        <path d="m422.09 214.29v236.52c-34.97 29.84-78.06 50.43-125.5 57.99-20.04-27.58-61.15-27.58-81.18 0-47.44-7.56-90.53-28.15-125.5-57.99v-236.52z" fill="#de1263"></path>
                        <path d="m422.09 214.29v236.52c-34.97 29.84-78.06 50.43-125.5 57.99-10.02-13.79-25.31-20.68-40.59-20.68v-273.83z" fill="#bb0d5d"></path>
                        <path d="m255.996 214.289h166.095v107.037h-166.095z" fill="#a80e5b"></path>
                        <path d="m89.91 214.289h166.086v107.037h-166.086z" fill="#bb0d5d"></path>
                        <path d="m444.198 199.225v60.579c0 9.142-7.417 16.559-16.559 16.559h-343.278c-9.142 0-16.559-7.417-16.559-16.559v-60.579c0-9.151 7.417-16.559 16.559-16.559h343.277c9.143-.001 16.56 7.408 16.56 16.559z" fill="#f7287c"></path>
                        <path d="m444.198 199.225v60.579c0 9.142-7.417 16.559-16.559 16.559h-171.643v-93.697h171.643c9.142-.001 16.559 7.408 16.559 16.559z" fill="#de1263"></path>
                        <path d="m296.59 182.67v326.13c-13.22 2.11-26.78 3.2-40.59 3.2s-27.37-1.09-40.59-3.2v-326.13z" fill="#ffeb00"></path>
                        <path d="m296.59 182.67v326.13c-13.22 2.11-26.78 3.2-40.59 3.2v-329.33z" fill="#ffd400"></path>
                        <path d="m396.933 127.855v.008c0 30.264-24.538 54.801-54.801 54.801h-172.263c-30.264 0-54.801-24.537-54.801-54.801v-.008c0-15.132 6.134-28.837 16.05-38.752 9.915-9.915 23.62-16.05 38.752-16.05 47.571 0 86.127 38.565 86.127 86.127 0-47.562 38.565-86.127 86.136-86.127 30.262.001 54.8 24.539 54.8 54.802z" fill="#ffcf1c"></path>
                        <path d="m396.933 127.855v.008c0 30.264-24.538 54.801-54.801 54.801h-86.136v-23.484c0-47.562 38.565-86.127 86.136-86.127 30.263.001 54.801 24.539 54.801 54.802z" fill="#fcbf10"></path>
                        <path d="m313.298 160.382v.003c0 12.304-9.976 22.28-22.28 22.28h-70.036c-12.304 0-22.28-9.976-22.28-22.28v-.003c0-6.152 2.494-11.724 6.525-15.755s9.603-6.525 15.755-6.525c19.341 0 35.016 15.679 35.016 35.016 0-19.337 15.679-35.016 35.02-35.016 12.304-.001 22.28 9.975 22.28 22.28z" fill="#fcbf10"></path>
                        <path d="m313.298 160.382v.003c0 12.304-9.976 22.28-22.28 22.28h-35.02v-9.548c0-19.337 15.679-35.016 35.02-35.016 12.304 0 22.28 9.976 22.28 22.281z" fill="#ff9f01"></path>
                    </g>
                </g>
            </svg>
            <h4 class="mb-3 mt-3 d-block">Подписывайся на канал в Telegram и получи бонус в размере 5 монет.</h4>
            
                        <a href="" target="_blank" class="btn btn-primary rounded px-4"><i class="mr-2 fab fa-telegram"></i></a>
            <div class="form-group mt-4">
              <label>Напишите данное сообщение нашему <a target="_blank" class="text-success" href=""></a></label>
              <div class="input-group">
                  <input type="text" id="ref-value" class="form-control" disabled="" value="">
                  <div class="input-group-append">
                    <button class="btn btn-success" onclick="copy(this);" type="button"><i class="fal fa-book mr-2"></i>Скопировать</button>
                  </div>
              </div>
            </div>
            
            <div id="telegram-alert" class="mt-4 mx-auto" style="max-width: 300px;"></div>
        </div>


        </div>
      </div>

    </div>
  </div>
 </div>
            </div>
            <div class="col-lg-9" id="refs" style="display:none;"> 
                <div > <div class="card border-0 shadow-sm mb-4">
    <div class="card-body mb-0">
        <h5 class="card-title">Реферальная ссылка</h5>
        <h6 class="card-subtitle text-muted">Получайте 10% с каждого пополнения реферала.</h6>
        <div class="form-group mt-4">
            <label>Ваша реферальная ссылка</label>
            <div class="input-group">
                <input type="text" id="ref-value" class="form-control" disabled="" value="http://<?=$linksite?>/?i=<?=$id?>">
                <div class="input-group-append">
                  
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card border-0 shadow-sm mb-4">

    <div class="card-body mb-0">
        <h5 class="card-title">Мои рефералы</h5>
        <h6 class="card-subtitle text-muted">Отображаются все ваши рефералы</h6>
    </div>

    <div class="table-responsive-lg">

        <table class="table table-striped table-borderless table-hover mb-0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-right">Время</th>
                    <th scope="col" class="text-left">Пользователь</th>
                    <th scope="col" class="text-right">Прибыль</th>
                </tr>
            </thead>
                        <tbody>
                               
                               <?php 
while($row = mysql_fetch_array($result_ref)) {
 
$id_ref = $row['id'];
$date = $row['date_reg'];
$log_ref = $row['login']; 
echo "<tr class='text-center ' role='row'><td class='sorting_1'>$id_ref</td><td class='text-right'>$date</td><td class='text-left'>$log_ref</td><td class='text-right'>0.00</td></tr>";

  }
  
                                      ?>
                         
                                                    
                                                    
      
                          
            
                        </tbody>
                      </table>

    </div>

    <div class="card-body mb-0">
        <div id="pagination"></div>
    </div>

</div>
 </div>
            </div>
             <div class="col-lg-9" id="withdraws" style="display:none;"> 
                <div > <div class="card border-0 shadow-sm mb-4">
    <div class="card-body mb-0">
        <h5 class="card-title">Выплаты</h5>
        <h6 class="card-subtitle text-muted">Отображаются последние 10 выплат</h6>
    </div>

    <div class="table-responsive-lg">

        <table class="table table-striped table-borderless table-hover mb-0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Система</th>
                    <th scope="col">Номер</th>
                    <th scope="col" class="text-right">Сумма</th>
                </tr>
            </thead>
            <tbody>
            <?php 
while($row = mysql_fetch_array($result5)) {
  $user_id = $row['user_id'];
  $ps = $row['ps'];
  $sum = $row['sum'];
  $wallet = $row['wallet'];
  $fake = $row['fake'];
  if($fake == 0) {
  $sql_select2 = "SELECT * FROM kot_user WHERE id='$user_id'";
$result2 = mysql_query($sql_select2);
$row = mysql_fetch_array($result2);
if($row)
{
$login = $row['login'];
}
  }
  if($fake == 1) {
    $login = $row['login_fake'];
  }
  $wallett = substr($wallet, 0, -5);
  echo " <tr>
                    <th scope='row' class='text-center'><img src='images/$ps.png'></th>
                    <td>$wallett*****</td>
                    <td class='text-success font-weight-bold text-right'>$sum<i class='ml-2 fa fa-ruble-sign'></i></td>
                </tr>";
}
?>
                                      
                                        
                                     
                                    </tbody>
               

            
                

                            
            </tbody>
        </table>

    </div>

    <div class="card-body mb-0">
        <div id="pagination"></div>
    </div>

</div>
 </div>
            </div>
            <div class="col-lg-9" id="faq" style="display:none;"> 
                <div > <div class="card border-0 shadow-sm mb-4">
    <div class="card-body mb-0">
        <h5 class="card-title">Что такое <?=$sitename?>?</h5>
      <h6 class="card-subtitle mb-4 text-muted">Это онлайн сервис мгновенных игр с быстрыми выплатами.</h6>
      <h5 class="card-title">Как получить стартовый бонус?</h5>
      <h6 class="card-subtitle mb-4 text-muted">Авторизуйтесь через аккаунт "Вконтакте" и вступите в нашу группу. Во вкладке "Получить бонус", можно активировать промокоды и получать каждые 24 часа "Ежедневный бонус" до 100 рублей.</h6>
      <h5 class="card-title">Какая у вас реферальная система?</h5>
      <h6 class="card-subtitle mb-4 text-muted">Вы получаете 10% от пополнения вашего реферала.</h6>
      <h5 class="card-title">Как пополнить?</h5>
      <h6 class="card-subtitle mb-4 text-muted">Нажмите на кнопку "пополнить", введите нужную Вам сумму и оплатите транзакцию.</h6>
      <h5 class="card-title">Сколько времени занимает выплата?</h5>
      <h6 class="card-subtitle mb-4 text-muted">Выплаты занимаю от 1 минуты до 48 часов с момента создания заявки.</h6>
      <h5 class="card-title">Проблемы на сайте?</h5>
      <h6 class="card-subtitle mb-4 text-muted">Напишите в <a href="<?=$group?>" class="text-primary" target="_blank">Тех.Поддержку</a></h6>
      <div class="box-modal" id="spravka">
        <h5 class="card-title">Пользователькое соглашение.</h5>
        <br> 1.01 При авторизации вы полностью соглашаетесь с нашими правилами и не можете иметь ни каких претензий ни к сайту, ни к владельцам!
        <br> 2.01 Запрещены фейки и мульти аккаунты.
        <br> 3.01 Запрещяется использовать баги, или наносить любой вред сайту. Администрация вправе оценивать ваши действия в отношении сайта, и имеет право наказывать.
        ВНИМАНИЕ: Пожалуйста, ознакомьтесь с настоящим пользовательским соглашением до начала использования сайта https://<?=$linksite?> и их программных средств. Регистрация (авторизация) на сайтах будет означать ваше согласие с условиями настоящего пользовательского соглашения. Если Вы не согласны с условиями настоящего пользовательского соглашения, не регистрируйтесь (авторизуйтесь) на сайте https://<?=$linksite?> и не используйте их программные средства.
        Российская Федерация, город Москва
        Редакция от 28.09.2015
        INTERNATIONAL BUSINESS SYSTEMS S.R.L. с одной стороны и лицо, акцептовавшее оферту, размещенную в сети Интернет по постоянному адресу http://<?=$linksite?>, с другой стороны, заключили настоящее пользовательское соглашение о нижеследующем.
        УСЛОВИЯ УЧАСТИЯ
        ВНИМАНИЕ!НЕ АВТОРИЗУЙТЕСЬ НА САЙТЕ https://<?=$linksite?> И НЕ ИСПОЛЬЗУЙТЕ СЕРВИСЫ ДАННОГО САЙТА, ЕСЛИ ВЫ НЕ СОГЛАСНЫ С УСЛОВИЯМИ НАСТОЯЩЕГО ПОЛЬЗОВАТЕЛЬСКОГО СОГЛАШЕНИЯ.
        <h5 class="card-title">1. ТЕРМИНЫ И ОПРЕДЕЛЕНИЯ.</h5>
        <br> 1.1. В НАСТОЯЩЕМ СОГЛАШЕНИИ, ЕСЛИ ИЗ ТЕКСТА ПРЯМО НЕ ВЫТЕКАЕТ ИНОЕ, СЛЕДУЮЩИЕ ТЕРМИНЫ БУДУТ ИМЕТЬ УКАЗАННЫЕ НИЖЕ ЗНАЧЕНИЯ:
        <br> 1.1.1. «Владелец» INTERNATIONAL BUSINESS SYSTEMS S.R.L., юридическое лицо, зарегистрированное по законодательству Коста-Рики, 3-102-693823, Costa Rica, San Jose, Santa Ana, 350 mtrs del restaurante Ceviche del Rey.
        <br> «Агент» Ограниченное Товарищество “Дот Директ”, с которым Владелец заключил агентский договор на прием денежных средств.
        <br> САЙТ - СОВОКУПНОСТЬ ИНФОРМАЦИИ, ТЕКСТОВ, ГРАФИЧЕСКИХ ЭЛЕМЕНТОВ, ДИЗАЙНА, ИЗОБРАЖЕНИЙ, ФОТО И ВИДЕОМАТЕРИАЛОВ И ИНЫХ РЕЗУЛЬТАТОВ ИНТЕЛЛЕКТУАЛЬНОЙ ДЕЯТЕЛЬНОСТИ, А ТАКЖЕ ПРОГРАММ ДЛЯ ЭВМ, СОДЕРЖАЩИХСЯ В ИНФОРМАЦИОННОЙ СИСТЕМЕ, ОБЕСПЕЧИВАЮЩЕЙ ДОСТУПНОСТЬ <br> ТАКОЙ ИНФОРМАЦИИ В СЕТИ ИНТЕРНЕТ ПО СЕТЕВОМУ АДРЕСУ <?=$linksite?> .
        <br> САЙТ ЯВЛЯЕТСЯ ИНТЕРНЕТ-РЕСУРСОМ, ПРЕДНАЗНАЧЕННЫМ ДЛЯ ОКАЗАНИЯ РАЗВЛЕКАТЕЛЬНО-АТТРАКЦИОННЫХ УСЛУГ ФИЗИЧЕСКИМ ЛИЦАМ.
        <br> 1.1.2. СОГЛАШЕНИЕ – НАСТОЯЩЕЕ ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ, ЯВЛЯЮЩЕЕСЯ ПУБЛИЧНОЙ ОФЕРТОЙ, В ЦЕЛОМ БЕЗ ИЗЪЯТИЙ И ОГОВОРОК.
        <br> 1.1.3. ПОЛЬЗОВАТЕЛЬ – ЛИЦО, ЗАКЛЮЧИВШЕЕ С АДМИНИСТРАТОРОМ САЙТА СОГЛАШЕНИЕ, ПУТЕМ АКЦЕПТА НАСТОЯЩЕЙ ОФЕРТЫ, РАСПОЛОЖЕННОЙ В СЕТИ ИНТЕРНЕТ ПО СЕТЕВОМУ АДРЕСУ http://<?=$linksite?>. СОТРУДНИКИ АДМИНИСТРАТОРА И РОДСТВЕННИКИ ТАКИХ СОТРУДНИКОВ НЕ ВПРАВЕ <br> АКЦЕПТОВАТЬ НАСТОЯЩУЮ ОФЕРТУ И ЗАКЛЮЧАТЬ СОГЛАШЕНИЕ.
        <br> 1.1.4. АДМИНИСТРАТОР – ЛИЦО, В КОММЕРЧЕСКОМ УПРАВЛЕНИИ КОТОРОГО НАХОДИТСЯ САЙТ.
        <br> 1.1.5. СТОРОНЫ – АДМИНИСТРАТОР И ПОЛЬЗОВАТЕЛЬ, ЯВЛЯЮЩИЕСЯ СТОРОНАМИ НАСТОЯЩЕГО СОГЛАШЕНИЯ.
        <br> 1.1.6. УСЛУГА – ДЕЙСТВИЯ АДМИНИСТРАТОРА ПО ОРГАНИЗАЦИИ РАБОТЫ САЙТА И ПРЕДОСТАВЛЕНИЮ ПОЛЬЗОВАТЕЛЮ НА ВОЗМЕЗДНОЙ И/ИЛИ БЕЗВОЗМЕЗДНОЙ ОСНОВЕ ВОЗМОЖНОСТИ ПРОВЕДЕНИЯ ДОСУГА В ВИДЕ УЧАСТИЯ В БЕЗРИСКОВЫХ ИГРАХ И РАЗВЛЕЧЕНИЯХ БЕЗ ПРЕДОСТАВЛЕНИЯ ВОЗМОЖНОСТИ <br> ПОЛУЧЕНИЯ МАТЕРИАЛЬНОГО ВЫИГРЫША С ИСПОЛЬЗОВАНИЕМ СЕРВИСОВ САЙТА.
        <br> 1.1.7. Монеты – ВИРТУАЛЬНАЯ ИГРОВАЯ ЕДИНИЦА САЙТА, ИСПОЛЬЗУЕМАЯ В ПРОЦЕССЕ ОКАЗАНИЯ АДМИНИСТРАТОРОМ ПОЛУЧЕНИЯ ПОЛЬЗОВАТЕЛЕМ УСЛУГИ САЙТА. ВИРТУАЛЬНЫЕ ИГРОВЫЕ ЕДИНИЦЫ – Монеты САЙТА http://<?=$linksite?> – ИСПОЛЬЗУЮТСЯ ТОЛЬКО В РАМКАХ САЙТА И НЕ МОГУТ БЫТЬ <br> ПРЕДМЕТОМ КАКИХ БЫ ТО НИ БЫЛО СДЕЛОК И ОПЕРАЦИЙ ВНЕ САЙТА. ПРИОБРЕТЕНИЕ ПОЛЬЗОВАТЕЛЕМ ВИРТУАЛЬНЫХ ИГРОВЫХ ЕДИНИЦ – Монеты – ОСУЩЕСТВЛЯЕТСЯ ТОЛЬКО НА САЙТЕ И ПО ПРАВИЛАМ, УКАЗАННЫМ В НАСТОЯЩЕМ СОГЛАШЕНИИ.
        <br> 1.1.8. РАУНД – ВРЕМЕННОЙ ОТРЕЗОК/ЧАСТЬ БЕЗРИСКОВЫХ ИГР, СОСТАВЛЯЮЩИХ УСЛУГИ САЙТА. КАЖДЫЙ РАУНД ИМЕЕТ МОМЕНТ НАЧАЛА И МОМЕНТ ЗАВЕРШЕНИЯ. В ХОДЕ КАЖДОГО РАУНДА ПОЛЬЗОВАТЕЛИ МОГУТ СОВЕРШАТЬ СТАВКИ И УЗНАВАТЬ РЕЗУЛЬТАТ БЕЗРИСКОВОЙ ИГРЫ В ТЕКУЩЕМ РАУНДЕ.
        <br> 1.1.9. Скин – виртуальный игровой атрибут (виртуальный инвентарь) многопользовательской сетевой игры (программное обеспечение) Counter-Strike: Global Offensive.
        <br>
        <br> На Сайте возможно использование виртуальных игровых атрибутов (виртуального инвентаря сетевой игры Counter-Strike: Global Offensive):
        <br> - приобретенный Пользователем на возмездной основе на Сайте;
        <br> - предоставленный Администратором Пользователю на безвозмездной основе по правилам Сайта.
        <br> 1.1.10. Ставка - электронный документ, формируемый с помощью сервисов Сайта по указанию Пользователя, совершенным им на Сайте по средством специальных программных команд. Указанный электронный документ – Ставка – служит целям оформления/фиксации участия <br> Пользователя, совершившего конкретную Ставку, в том или ином Раунде развлекательных безрисковых игр на Сайте.
        <br> 1.2. ВСЕ ОСТАЛЬНЫЕ ТЕРМИНЫ И ОПРЕДЕЛЕНИЯ, ВСТРЕЧАЮЩИЕСЯ В ТЕКСТЕ НАСТОЯЩЕГО СОГЛАШЕНИЯ, ТОЛКУЮТСЯ СТОРОНАМИ В КОНТЕКСТЕ ЗНАЧЕНИЯ ТЕРМИНОВ, УКАЗАННЫХ В П. 1.1. НАСТОЯЩЕГО СОГЛАШЕНИЯ, И В СООТВЕТСТВИИ СО СЛОЖИВШИМИСЯ В СЕТИ ИНТЕРНЕТ ОБЫЧНЫМИ ПРАВИЛАМИ <br> ТОЛКОВАНИЯ СООТВЕТСТВУЮЩИХ ТЕРМИНОВ, НЕ ПРОТИВОРЕЧАЩИМ ПОЛОЖЕНИЯМ НАСТОЯЩЕГО СОГЛАШЕНИЯ.
        <br> 1.3. НАЗВАНИЯ ЗАГОЛОВКОВ (СТАТЕЙ) НАСТОЯЩЕГО СОГЛАШЕНИЯ ПРЕДНАЗНАЧЕНЫ ИСКЛЮЧИТЕЛЬНО ДЛЯ УДОБСТВА ПОЛЬЗОВАНИЯ ТЕКСТОМ СОГЛАШЕНИЯ И БУКВАЛЬНОГО ЮРИДИЧЕСКОГО ЗНАЧЕНИЯ НЕ ИМЕЮТ.
        <br> 1.4. В СЛУЧАЕ РАЗНОЧТЕНИЙ/НЕСОВПАДЕНИЙ В ТРАКТОВКЕ ТЕРМИНОВ И ОПРЕДЕЛЕНИЙ В ТЕКСТЕ НАСТОЯЩЕГО СОГЛАШЕНИЯ И В ТЕКСТЕ ПРАВИЛ И НОРМ, РАЗМЕЩЕННЫХ НА САЙТЕ (НАПРИМЕР, В РАЗДЕЛЕ F.A.Q. САЙТА) ПРИМЕНЯЕТСЯ И СЧИТАЕТСЯ ПРИОРИТЕТНЫМ ТОЛКОВАНИЕ, СОДЕРЖАЩЕЕСЯ В ТЕКСТЕ НАСТОЯЩЕГО СОГЛАШЕНИЯ (ПУБЛИЧНОЙ ОФЕРТЫ).
        <h5 class="card-title">2. ПРЕДМЕТ СОГЛАШЕНИЯ.</h5>
        <br> 2.1. ПРЕДМЕТОМ НАСТОЯЩЕГО СОГЛАШЕНИЯ ЯВЛЯЕТСЯ ПРЕДЛОЖЕНИЕ АДМИНИСТРАТОРА, ОБРАЩЕННОЕ К ПОТЕНЦИАЛЬНОМУ ПОЛЬЗОВАТЕЛЮ, ПОЛУЧАТЬ С ИСПОЛЬЗОВАНИЕМ СЕРВИСОВ САЙТА РАЗВЛЕКАТЕЛЬНО-АТТРАКЦИОННЫЕ УСЛУГИ СТРОГО НА УСЛОВИЯХ НАСТОЯЩЕГО СОГЛАШЕНИЯ.
        <br> 2.2. ЛИЦО, АКЦЕПТОВАВШЕЕ НАСТОЯЩУЮ ОФЕРТУ, СТАНОВИТСЯ ПОЛЬЗОВАТЕЛЕМ И ОБЯЗУЕТСЯ ИСПОЛЬЗОВАТЬ САЙТ ТОЛЬКО НА УСЛОВИЯХ НАСТОЯЩЕГО СОГЛАШЕНИЯ.
        <br> 2.3. ПОЛЬЗОВАНИЕ УСЛУГАМИ САЙТА ЛИЦАМИ, НЕ ОБЛАДАЮЩИМИ ПОЛНОЙ ДЕЕСПОСОБНОСТЬЮ (КАК ПО ВОЗРАСТУ, ТАК И ПО СОСТОЯНИЮ ЗДОРОВЬЯ) В СООТВЕТСТВИИ С НОРМАМИ И ЗАКОНАМИ СООТВЕТСТВУЮЩЕЙ ЮРИСДИКЦИИ (СТРАНЫ ПРЕБЫВАНИЯ ФИЗИЧЕСКОГО ЛИЦА) ЗАПРЕЩЕНО.
        <h5 class="card-title">3. ЗАКЛЮЧЕНИЕ, ИЗМЕНЕНИЕ, РАСТОРЖЕНИЕ СОГЛАШЕНИЯ</h5>
        <br> 3.1. АДМИНИСТРАТОР ПРЕДОСТАВЛЯЕТ ПОЛЬЗОВАТЕЛЮ ДОСТУП К ИНФОРМАЦИИ О САЙТЕ, ИНФОРМАЦИИ ОБ УСЛУГАХ САЙТА, ТЕКСТУ НАСТОЯЩЕГО СОГЛАШЕНИЯ И ИНЫХ НОРМАТИВНЫХ ДОКУМЕНТОВ, УСТАНАВЛИВАЮЩИХ ПРАВИЛА И НОРМЫ ПОЛУЧЕНИЯ УСЛУГ САЙТА, ДО АВТОРИЗАЦИИ ПОЛЬЗОВАТЕЛЯ НА <br> САЙТЕ. ПОСЛЕ АВТОРИЗАЦИИ НА САЙТЕ ПОЛЬЗОВАТЕЛЮ ПРЕДОСТАВЛЯЕТСЯ ВОЗМОЖНОСТЬ ПОЛУЧЕНИЯ УСЛУГ САЙТА.
        <br> 3.2. НАСТОЯЩЕЕ СОГЛАШЕНИЯ СЧИТАЕТСЯ ЗАКЛЮЧЕННЫМ С МОМЕНТА АВТОРИЗАЦИИ ПОЛЬЗОВАТЕЛЯ НА САЙТЕ ЧЕРЕЗ ВВЕДЕНИЕ В СПЕЦИАЛЬНОЙ ФОРМЕ ЛОГИНА И ПАРОЛЯ УЧЕТНОЙ ЗАПИСИ.
        <br> 3.2.1. АВТОРИЗУЯСЬ НА САЙТЕ, ПОЛЬЗОВАТЕЛЬ ВЫРАЖАЕТ СВОЕ ПРЯМОЕ, ПОЛНОЕ, БЕЗОГОВОРОЧНОЕ И БЕЗУСЛОВНОЕ СОГЛАСИЕ С НОРМАМИ НАСТОЯЩЕГО СОГЛАШЕНИЯ.
        <br> 3.3. АДМИНИСТРАТОР В ОДНОСТОРОННЕМ ПОРЯДКЕ ВПРАВЕ В ЛЮБОЙ МОМЕНТ ИЗМЕНИТЬ, ОТМЕНИТЬ, ДОПОЛНИТЬ ЛЮБЫЕ УСЛОВИЯ НАСТОЯЩЕГО СОГЛАШЕНИЯ И ИНЫХ НОРМАТИВНЫХ ДОКУМЕНТОВ САЙТА (ПРАВИЛ, РАЗМЕЩЕННЫХ НА САЙТЕ И СОДЕРЖАЩИХ УКАЗАНИЯ НА НОРМЫ И ПОРЯДОК ОКАЗАНИЯ УСЛУГ <br> САЙТА) БЕЗ ПРЕДВАРИТЕЛЬНОГО СОГЛАСОВАНИЯ С ПОЛЬЗОВАТЕЛЕМ.
        <br> 3.3.1. ИЗМЕНЕННЫЙ/ДОПОЛНЕННЫЙ ТЕКСТ НАСТОЯЩЕГО СОГЛАШЕНИЯ СТАНОВИТСЯ ОБЯЗАТЕЛЬНЫМ ДЛЯ ВСЕХ БЕЗ ИСКЛЮЧЕНИЯ АВТОРИЗОВАННЫХ ПОЛЬЗОВАТЕЛЕЙ ПО ИСТЕЧЕНИЕ 12 (ДВЕНАДЦАТИ) ЧАСОВ С МОМЕНТА РАЗМЕЩЕНИЯ ИЗМЕНЕННОГО/ДОПОЛНЕННОГО ТЕКСТА СОГЛАШЕНИЯ ПО СЕТЕВОМУ АДРЕСУ: <br> http://<?=$linksite?> .
        <br> 3.3.2. ПОЛЬЗОВАТЕЛЬ ОБЯЗАН САМОСТОЯТЕЛЬНО СЛЕДИТЬ ЗА ИЗМЕНЕНИЯМИ В ТЕКСТЕ СОГЛАШЕНИЯ, РАЗМЕЩЕННОГО ПО СЕТЕВОМУ АДРЕСУ: https://<?=$linksite?> .
        <br> ЕСЛИ ПО ОДНОСТОРОННЕМУ УСМОТРЕНИЮ АДМИНИСТРАТОРА ИЗМЕНЕНИЯ ПОТРЕБУЮТ ПЕРСОНАЛЬНОГО ДОПОЛНИТЕЛЬНОГО УВЕДОМЛЕНИЯ ПОЛЬЗОВАТЕЛЕЙ, ТО АДМИНИСТРАТОР ВПРАВЕ (НО НЕ ОБЯЗАН) ПЕРСОНАЛЬНО УВЕДОМИТЬ КРУГ ПОЛЬЗОВАТЕЛЕЙ, КОТОРЫХ МОГУТ КОСНУТЬСЯ ИЗМЕНЕНИЯ/ДОПОЛНЕНИЯ.
        <br> 3.3.3. ИСПОЛЬЗОВАНИЕ ПОЛЬЗОВАТЕЛЕМ САЙТА И ЕГО УСЛУГ И СЕРВИСОВ ПОСЛЕ РАЗМЕЩЕНИЯ ПО СЕТЕВОМУ АДРЕСУ: https://<?=$linksite?> ИЗМЕНЕННОГО ТЕКСТА НАСТОЯЩЕГО ПОЛЬЗОВАТЕЛЬСКОГО СОГЛАШЕНИЯ ОЗНАЧАЕТ ПОЛНОЕ И БЕЗОГОВОРОЧНОЕ СОГЛАСИЕ ПОЛЬЗОВАТЕЛЯ С ВСЕМИ БЕЗ <br> ИСКЛЮЧЕНИЯ НОРМАМИ ИЗМЕНЕННОГО ТЕКСТА СОГЛАШЕНИЯ.
        <br> 3.4. ПРИ ДОСТИЖЕНИИ 12ТИ МЕСЯЧНОГО ПЕРИОДА (ПОДРЯД) ОТСУТСТВИЯ АВТОРИЗАЦИИ НА САЙТЕ ОТ ИМЕНИ АДМИНИСТРАТОРА ПОЛЬЗОВАТЕЛЮ НАПРАВЛЯЕТСЯ ЭЛЕКТРОННОЕ УВЕДОМЛЕНИЕ О РАСТОРЖЕНИИ СОГЛАШЕНИЯ.
        <br> 3.4.1. ЕСЛИ В ТЕЧЕНИЕ 30 (ТРИДЦАТИ) КАЛЕНДАРНЫХ ДНЕЙ С МОМЕНТА НАПРАВЛЕНИЯ УВЕДОМЛЕНИЯ, ПОЛЬЗОВАТЕЛЬ НЕ СОВЕРШИЛ АВТОРИЗАЦИЮ НА САЙТЕ И НЕ ВОЗОБНОВИЛ ПОЛЬЗОВАНИЕ УСЛУГАМИ САЙТА, НАСТОЯЩЕЕ СОГЛАШЕНИЕ С КОНКРЕТНЫМ ПОЛЬЗОВАТЕЛЕМ СЧИТАЕТСЯ РАСТОРГНУТЫМ.
        <br> 3.4.2. В СЛУЧАЕ РАСТОРЖЕНИЯ НАСТОЯЩЕГО СОГЛАШЕНИЯ ВЕСЬ ОСТАТОК ВИРТУАЛЬНЫХ ИГРОВЫХ ЕДИНИЦ – Монеты, ИМЕВШИХСЯ У ПОЛЬЗОВАТЕЛЯ ПРИ ПОЛЬЗОВАНИИ УСЛУГАМИ НА САЙТЕ – АННУЛИРУЕТСЯ В МОМЕНТ РАСТОРЖЕНИЯ СОГЛАШЕНИЯ БЕЗ КАКОЙ БЫ ТО НИ БЫЛО КОМПЕНСАЦИИ (ОПЛАЧЕННЫХ И НЕ ПОТРЕБЛЕННЫХ РАЗВЛЕКАТЕЛЬНЫХ УСЛУГ) В СТОРОНУ ПОЛЬЗОВАТЕЛЯ.
        ПОСЛЕ РАСТОРЖЕНИЯ НАСТОЯЩЕГО СОГЛАШЕНИЯ ПОЛЬЗОВАТЕЛЬ НЕ ВПРАВЕ ЗАЯВЛЯТЬ КАКИЕ БЫ ТО НИ БЫЛО ТРЕБОВАНИЯ В АДРЕС АДМИНИСТРАТОРА И САЙТА, В ТОМ ЧИСЛЕ, НО, НЕ ОГРАНИЧИВАЯСЬ: НЕ ВПРАВЕ ТРЕБОВАТЬ ВОЗВРАТА ДЕНЕЖНЫХ СРЕДСТВ ЗА ОПЛАЧЕННУЮ, НО НЕ ПОТРЕБЛЕННУЮ УСЛУГУ И Т.П..
        <h5 class="card-title">4. УСЛУГИ САЙТА.</h5>
        <br> 4.1. Услуги, оказываемые на Сайте, являются зрелищно-развлекательными (графика/анимация, представленные на Сайте) и аттракционными (программа - симулятор). Услуги Сайта концептуально связаны с темой многопользовательской сетевой игры Counter-Strike: <br> Global Offensive. Услуги Сайта служат для удовлетворения личных эмоционально-психологических потребностей Потребителей и строятся по принципу - симулятора. То есть, с помощью представленных на сайте сервисов Потребитель может испытать эмоциональное <br> удовлетворение от своего участия в симуляторе определенных игровых ситуациях без принятия на себя бремени возможных негативных последствий того процесса (процесса, который в Услугах на Сайте представлен только в виде симулятора). Услуги сайта – являются <br> имитатором (симулятором), позволяющим получить психо-эмоциональное удовлетворение без каких бы то ни было рисков для Пользователя, в связи с чем, Услуги Сайта относятся к аттракционным.
        <br> 4.2. Услуги Сайта построены по принципу полностью безрисковой игры, симулирующей розыгрыш.
        <br> Услуги сайта не являются услугами по организации и проведению основанных на риске игр, т.е. не являются азартными играми, лотереями, тотализаторами и не являются прочими услугами, при которых Пользователь несет какие-либо материальные риски. То есть <br> Услуги Сайта не являются процессами, при которых лицо заключает основанное на риске соглашение о выигрыше.
        <br> Отображение стоимости Скинов в той или иной валюте используется исключительно для поддержания зрелищности. Скины, за пределами Сайта, не имеют какой либо ценности.
        <br> Услуги Сайта не содержат элементов азартной игры, не содержат элементы и признаки основанного на риске соглашения о выигрыше (основанные на риске игры, рисковые игры):
        <br> 4.2.1. Пользователь оплачивает Услуги Сайта безвозвратно, то есть без возможности получить назад полностью или частично потраченные Пользователем на Услугу денежные средства.
        <br> Внесенная Пользователем оплата (при наличии таковой) полностью и безвозвратно списывается в счет предоставления Сайтом Пользователю права получать развлекательно-аттракционную Услугу, без возможности обменять обратно виртуальные игровые единицы Сайта на <br> деньги.
        <br> 4.2.2. Никакой результат игры-симулятора (аттракциона) на Сайте не может принести Пользователю материальной выгоды и прибыли, которую возможно оценить денежным и/или иным имущественным эквивалентом.
        <br> 4.2.3. Услуги Сайта не содержат признака азартности и рисковости.
        <br> Пользователь не рискует денежными средствами, внесенными в качестве платы за участие в игре. Денежные средства, вносимые Пользователем являются оплатой Услуг Сайта, а не условием участия в основанных на риске соглашениях о выигрыше.
        <br> 4.3. Никакие Услуги Сайта не предусматривают возможность получения материальной (имущественной, денежной, обязательственной) выгоды Пользователем.
        <br> Услуги Сайта не могут быть использованы Пользователем для получения какого бы то ни было дохода, прибыли, выигрыша и прочих благ материального характера или подлежащих оценке, имеющей денежный эквивалент.
        <br> Не допускается сговор между Пользователями в целях использования Услуг Сайта как механизма для организации основанных на риске игр.
        <br> В случае обнаружения/выявления такого сговора, Администратор принимает меры по блокировке для виновных Пользователей возможности пользоваться Услугами Сайта.
        <br> 4.4. Виртуальные игровые единицы – Монеты и Скины – ни при каких обстоятельствах не подлежат обратному обмену на денежные средства. Оплаченные (иным способом полученные) Пользователем виртуальные игровые единицы обмену на деньги и возврату не подлежат.
        <h5 class="card-title">5. ПОРЯДОК ПОЛЬЗОВАНИЯ УСЛУГАМИ САЙТА.</h5>
        <br> 5.1. При оказании Услуг Сайта используются виртуальные игровые единицы – Монеты и Скины.
        <br>
        <br> Виртуальные игровые единицы/атрибуты – являются визуальными изображениями, сгенерированными программным обеспечением Сайта (Монеты) и/или программным обеспечением, используемым на иных ресурсах в сети Интернет (Скины). Все права на указанные визуальные <br> изображения (Монеты и Скины) принадлежат владельцам соответствующего программного обеспечения и не передаются/не переуступаются Пользователям Сайта ни в право собственности, ни в иное вещное владение и\или обязательственное право.
        <br> Виртуальные игровые единицы – необходимы для учета прав Пользователей на объем Услуги, которую Пользователь имеет право потребить на Сайте.
        <br> Монеты и Скины – существуют только в рамках определенного (используемого и/или поддерживаемого Сайтом) программного обеспечения, и не имеют никакого эквивалента в объективном реальном мире.
        <br> Монеты и Скины – не являются виртуальными и/или электронными денежными средствами, не подлежат обмену на деньги и/или иные объекты прав.
        <br> В случае если настоящее Соглашение расторгнуто по основаниям, предусмотренным п. 3.4. настоящего Соглашения, остаток Монет и Скинов на виртуальном балансе Пользователя аннулируется без каких-либо компенсаций Администратором в сторону Пользователя. А <br> Пользователь в названном случае считается отказавшимся от дальнейшего потребления ранее оплаченной им и не потребленной развлекательно-аттракционной Услуги.
        <br> 5.2. Услуги Сайта оказываются путем приобретения и расходования (в предложенных на Сайте аттракционах) виртуальных игровых единиц/атрибутов.
        <br> Услуги Сайта могут быть оказаны как на возмездной (денежной) так и на безденежной основе в зависимости от способа получения Пользователем виртуальных игровых единиц и атрибутов.
        <br> 5.2.1. Пользователь может оплатить Услуги Сайта путем внесения денежных средств за покупку виртуальных игровых единиц – Монет. Способ оплаты указан в параграфе 6 настоящего Соглашения.
        <br> 5.3. На Сайте может быть предусмотрена возможность обмена одних виртуальных игровых единиц на другие (Монет на Скины, Скинов на Монеты) в «Магазине монет и вещей» на Сайте.
        <br> В случае произведения таких обменов одного типа виртуальных игровых единиц Сайта на другие – такая операция является окончательной и аннулированию/отмене не подлежит.
        <br> Все игровые действия, произведенные на Сайте с виртуальными игровыми единицами, являются для Пользователя окончательными и не могут быть аннулированы/отменены по требованию Пользователя.
        <br> 5.4. Запрещается получать виртуальные игровые единицы с помощью умышленного или неосторожного использования вредоносных/вирусных программ и/или пользуясь недоработками/сбоями в работе Сайта.
        <br> 5.5. Монеты, имеющиеся на балансе Пользователя, могут быть потрачены последним для участия (совершения Ставки) в разных видах игр, представленных на Сайте в качестве развлекательно-аттракционной Услуги Сайта, по правилам, указанным в разделе ПРАВИЛА на <br> Сайте.
        <br> Монеты также могут быть потрачены Пользователем для обмена на Скины в «магазине вещей» на Сайте по правилам Сайта.
        <br> 5.6. Скины, имеющиеся на балансе Пользователя, могут быть потрачены последним для участия (совершения Ставки) в разных видах игр, представленных на Сайте в качестве развлекательно-аттракционной Услуги Сайта, по правилам, указанным в разделе ПРАВИЛА на <br> Сайте.
        <br> Скины также могут быть потрачены Пользователем для обмена на Монеты (или другие Скины) на Сайте по правилам Сайта.
        <br> 5.7. Правила различных аттракционных игр, представленных на Сайте в качестве Услуг Сайта, могут существенно отличаться друг от друга. Правила игр размещены в разделе ПРАВИЛА и/или в соответствующем разделе Сайта, участвуя в играх, Пользователь <br> соглашается с правилами, указанными на Сайте.
        <br> 5.8. Для участия в той или иной игре на Сайте Пользователь совершает Ставку, в результате которой с баланса Пользователя списываются Монеты и/или Скины в размере, обусловленном правилами Сайта и пожеланием Пользователя по размеру Ставки.
        <br>
        <br> 5.9. В результате участия Пользователя в играх на Сайте баланс виртуальных игровых единиц/атрибутов Пользователя может уменьшаться (при совершении Ставки) и увеличиваться (при достижении обусловленного правилами Сайта результата игры на Сайте).
        <br> 5.10. Возможность Пользователя принимать участие в Раундах игры на Сайте продолжается до момента обнуления баланса виртуальных игровых единиц Пользователя на Сайте.
        <br> При отсутствии у Пользователя оплаченных (и/или иным образом приобретенных в соответствии с п. 5.2. настоящего Соглашения) виртуальных игровых единиц/атрибутов (Монет, Скинов) такой Пользователь не может принять участие ни в каких играх, представленных <br> на Сайте.
        <br> 5.11. Администратор может отменять проведение тех или иных Раундов без предварительного уведомления Пользователей. В указанном случае Администратор восстанавливает на балансе Пользователя на Сайте виртуальные игровые единицы, потраченные Пользователем <br> при совершении Ставки на отмененный Раунд.
        <br> 5.12. Пользователям, участвующим в Раундах, запрещено предпринимать попытки сговора друг с другом с целью влияния на результат аттракциона (игры) в интересах одного или нескольких из таких Пользователей путем манипулирования ходом игры путем сговора о количестве и размере совершаемых Ставок. Выявление Администратором таких фактов, будет служить основанием к запрету доступа Пользователя к Услугам Сайта.
        <h5 class="card-title">6. ОПЛАТА</h5>
        <br> 6.1. ЦЕНЫ ЗА Монеты НА САЙТЕ УСТАНАВЛИВАЮТСЯ АДМИНИСТРАТОРОМ И МОГУТ БЫТЬ ИЗМЕНЕНЫ ПО РЕШЕНИЮ АДМИНИСТРАТОРА. ЦЕНЫ УКАЗЫВАЮТСЯ НА СООТВЕТСТВУЮЩЕЙ СТРАНИЦЕ САЙТА.
        <br> 6.2. ПОЛЬЗОВАТЕЛЬ ВПРАВЕ ОПЛАТИТЬ УСЛУГИ САЙТА ОДНИМ ИЗ СПОСОБОВ ОПЛАТЫ, ПРЕДУСМОТРЕННЫХ НА САЙТЕ.
        <br> ОПЛАТА ПРОИЗВОДИТСЯ ПОЛЬЗОВАТЕЛЕМ ПОСРЕДСТВОМ АГРЕГАТОРА ЭЛЕКТРОННОЙ СИСТЕМЫ ПЛАТЕЖЕЙ (ЭЛЕКТРОННОЙ ПЛАТЕЖНОЙ СИСТЕМЫ), ПОЗВОЛЯЮЩЕЙ В РЕАЛЬНОМ ВРЕМЕНИ ЧЕРЕЗ СЕТЬ ИНТЕРНЕТ ОПЛАЧИВАТЬ ТОВАРЫ И УСЛУГИ, В ТОМ ЧИСЛЕ УСЛУГИ САЙТА.
        <br> 6.3. ОБЯЗАТЕЛЬСТВА ПО ОПЛАТЕ СЧИТАЮТСЯ ИСПОЛНЕННЫМИ ПОЛЬЗОВАТЕЛЕМ, В СЛУЧАЕ ПОЛОЖИТЕЛЬНОГО РЕЗУЛЬТАТА АВТОРИЗАЦИИ ПЛАТЕЖА В СИСТЕМЕ ЭЛЕКТРОННЫХ ПЛАТЕЖЕЙ, ПРИМЕНЯЕМОЙ ДЛЯ ОПЛАТЫ УСЛУГ САЙТА. ДОКАЗАТЕЛЬСТВОМ СОВЕРШЕНИЯ ОПЛАТЫ СЛУЖИТ ИНФОРМАЦИЯ СИСТЕМЫ <br> ЭЛЕКТРОННЫХ ПЛАТЕЖЕЙ О СОВЕРШЕННОМ ПЛАТЕЖЕ.
        <br> 6.4. ПРИ ОПЛАТЕ УСЛУГ САЙТА ПО СРЕДСТВОМ СИСТЕМЫ ЭЛЕКТРОННЫХ ПЛАТЕЖЕЙ, ПРИМЕНЯЕМОЙ ДЛЯ ОПЛАТЫ УСЛУГ САЙТА, ПЛАТЕЖНОЙ СИСТЕМОЙ МОЖЕТ ВЗИМАТЬСЯ КОМИССИЯ С ПОЛЬЗОВАТЕЛЯ ПО ПРАВИЛАМ ПЛАТЕЖНОЙ СИСТЕМЫ (СИСТЕМЫ ЭЛЕКТРОННЫХ ПЛАТЕЖЕЙ).
        <br> АДМИНИСТРАТОР НЕ НЕСЕТ ОТВЕТСТВЕННОСТИ ЗА ВЗИМАНИЕ ТАКИХ КОМИССИЙ ПЛАТЕЖНЫМИ СИСТЕМАМИ.
        <br> 6.5. ВОЗВРАТ ДЕНЕЖНЫХ СРЕДСТВ ЗА ОПЛАЧЕННЫЕ (И НЕ ПОТРЕБЛЕННЫЕ) УСЛУГИ САЙТА НЕ ПРЕДУСМОТРЕН.
        <br> 6.6. АДМИНИСТРАТОР НЕ КОНТРОЛИРУЕТ АППАРАТНО-ПРОГРАММНЫЙ КОМПЛЕКС СИСТЕМЫ ПЛАТЕЖЕЙ И НЕ НЕСЕТ ОТВЕТСТВЕННОСТИ ЗА ОШИБКИ В ТАКОМ АППАРАТНО-ТЕХНИЧЕСКОМ КОМПЛЕКСЕ. ЕСЛИ В РЕЗУЛЬТАТЕ ТАКИХ ОШИБОК ПРОИЗОШЛО СПИСАНИЕ ДЕНЕЖНЫХ СРЕДСТВ ПОЛЬЗОВАТЕЛЯ, НО ПЛАТЕЖ НЕ <br> БЫЛ АВТОРИЗОВАН СИСТЕМОЙ ЭЛЕКТРОННЫХ ПЛАТЕЖЕЙ, ОБЯЗАННОСТИ ПО ВОЗВРАТУ ДЕНЕЖНЫХ СРЕДСТВ ПОЛЬЗОВАТЕЛЮ ЛЕЖАТ НА ПРОВАЙДЕРЕ/АГРЕГАТОРЕ ЭЛЕКТРОННОЙ СИСТЕМЫ ПЛАТЕЖЕЙ (ПЛАТЕЖНОЙ СИСТЕМЫ).
        <br> 6.7. В СЛУЧАЕ ВОПРОСОВ ИЛИ ПРЕТЕНЗИЙ В СВЯЗИ С ОБСЛУЖИВАНИЕМ КЛИЕНТОВ ОБРАЩАЙТЕСЬ К НАМ В ПОДДЕРЖКУ ПО АДРЕСУ https://<?=$linksite?>/SUPPORT. ВОПРОСЫ КАСАТЕЛЬНО ПЛАТЕЖЕЙ, СОВЕРШЕННЫХ ЧЕРЕЗ СИСТЕМУ ОПЛАТЫ ПОСТАВЩИКА УСЛУГ w2pay.net, СЛЕДУЕТ НАПРАВЛЯТЬ ПО АДРЕСУ <br> https://w2pay.net/. МЫ ПО ВОЗМОЖНОСТИ ВМЕСТЕ С ВАМИ И (ИЛИ) ЛЮБЫМ ПОЛЬЗОВАТЕЛЕМ, ПРОДАЮЩИМ ПРОДУКТЫ НА НАШЕМ ВЕБ-САЙТЕ, БУДЕМ РАБОТАТЬ НАД РЕШЕНИЕМ ЛЮБЫХ СПОРОВ, ВОЗНИКАЮЩИХ В СВЯЗИ С ВАШЕЙ ПОКУПКОЙ.
        <br> 6.8 ВСЕ ОПЛАЧЕННЫЕ УСЛУГИ САЙТА ЯВЛЯЮТСЯ ДОБРОВОЛЬНЫМИ ПОЖЕРТВОВАНИЯМИ СО СТОРОНЫ ПОЛЬЗОВАТЕЛЯ.
        <h5 class="card-title">7. ИЗБЕЖАНИЕ РАЗНОЧТЕНИЙ.</h5>
        <br> 7.1. ПОЛЬЗОВАТЕЛЬ ПОНИМАЕТ И СОГЛАШАЕТСЯ С ТЕМ, ЧТО НА САЙТЕ НЕ ОРГАНИЗУЮТСЯ И НЕ ПРОВОДЯТСЯ АЗАРТНЫЕ ИГРЫ, ЛОТЕРЕИ, ЛЮБЫЕ ИНЫЕ ОСНОВАННЫЕ НА РИСКЕ СОГЛАШЕНИЯ О ВЫИГРЫШЕ (ПАРИ).
        <br> 7.2. В ИГРАХ, СОСТАВЛЯЮЩИХ УСЛУГИ САЙТА, ПРИМЕНЯЕТСЯ СЛУЧАЙНАЯ ГЕНЕРАЦИЯ (ГЕНЕРАТОР СЛУЧАЙНЫХ ЧИСЕЛ) ПРИ ОПРЕДЕЛЕНИИ РЕЗУЛЬТАТА ИГРЫ В КАЧЕСТВЕ СИМУЛЯТОРА.
        <br> 7.3. ПРИ ПОТРЕБЛЕНИИ УСЛУГ САЙТА – ИГРЕ НА СИМУЛЯТОРЕ – ПОЛЬЗОВАТЕЛЬ НЕ ИМЕЕТ РИСКА, ТАК КАК ПОЛЬЗОВАТЕЛЬ ЗАРАНЕЕ И БЕЗВОЗВРАТНО ОПЛАТИЛ УЧАСТИЕ В ИГРЕ НА СИМУЛЯТОРЕ (ПУТЕМ ПРИОБРЕТЕНИЯ Монеты) И НИКАКОЙ РЕЗУЛЬТАТ ИГРЫ-СИМУЛЯТОРА НЕ МОЖЕТ ВЕРНУТЬ <br> ПОЛЬЗОВАТЕЛЮ ЕГО ДЕНЬГИ (ЗАТРАЧЕННЫЕ НА ОПЛАТУ РАЗВЛЕКАТЕЛЬНО-АТТРАКЦИОННОЙ УСЛУГИ В ВИДЕ – ПОЛУЧЕНИЯ ПСИХО-ЭМОЦИОНАЛЬНОГО УДОВЛЕТВОРЕНИЯ ОТ УЧАСТИЯ).
        <br> 7.4. ПОЛЬЗОВАТЕЛЬ СОГЛАШАЕТСЯ, ЧТО НИГДЕ И НИКАКИМ СПОСОБОМ НИ НА САЙТЕ НИ ВНЕ САЙТА НЕ БУДЕТ ПЫТАТЬСЯ СОВЕРШИТЬ СДЕЛКИ, РЕЗУЛЬТАТОМ КОТОРЫХ МОЖЕТ СТАТЬ ОБМЕН ПОЛЬЗОВАТЕЛЕМ СВОИХ ВИРТУАЛЬНЫХ ИГРОВЫХ ЕДИНИЦ САЙТА НА ДЕНЬГИ И/ИЛИ НА КАКИЕ БЫ ТО НИ БЫЛО <br> МАТЕРИАЛЬНЫЕ ЦЕННОСТИ И ОБЯЗАТЕЛЬСТВЕННЫЕ ПРАВА.
        <h5 class="card-title">8. ИНТЕЛЛЕКТУАЛЬНАЯ СОБСТВЕННОСТЬ И ОГРАНИЧЕНИЯ ПРИ ИСПОЛЬЗОВАНИИ САЙТА.</h5>
        <br> 8.1. САЙТ СОДЕРЖИТ РЕЗУЛЬТАТЫ ИНТЕЛЛЕКТУАЛЬНОЙ ДЕЯТЕЛЬНОСТИ, ПРИНАДЛЕЖАЩИЕ АДМИНИСТРАТОРУ, ЕГО АФФИЛИРОВАННЫМ ЛИЦАМ И ДРУГИМ СВЯЗАННЫМ СТОРОНАМ, СПОНСОРАМ, ПАРТНЕРАМ, ПРЕДСТАВИТЕЛЯМ, ВСЕМ ПРОЧИМ ЛИЦАМ, ДЕЙСТВУЮЩИМ ОТ ИМЕНИ АДМИНИСТРАТОРА, И ДРУГИМ <br> ТРЕТЬИМ ЛИЦАМ.
        <br> 8.2. ИСПОЛЬЗУЯ САЙТ, ПОЛЬЗОВАТЕЛЬ ПРИЗНАЕТ И СОГЛАШАЕТСЯ С ТЕМ, ЧТО ВСЕ СОДЕРЖИМОЕ САЙТА И СТРУКТУРА СОДЕРЖИМОГО САЙТА ЗАЩИЩЕНЫ АВТОРСКИМ ПРАВОМ, ПРАВОМ НА ТОВАРНЫЙ ЗНАК И ДРУГИМИ ПРАВАМИ НА РЕЗУЛЬТАТЫ ИНТЕЛЛЕКТУАЛЬНОЙ ДЕЯТЕЛЬНОСТИ, И ЧТО УКАЗАННЫЕ ПРАВА <br> ЯВЛЯЮТСЯ ДЕЙСТВИТЕЛЬНЫМИ И ОХРАНЯЮТСЯ ВО ВСЕХ ФОРМАХ, НА ВСЕХ НОСИТЕЛЯХ И В ОТНОШЕНИИ ВСЕХ ТЕХНОЛОГИЙ, КАК СУЩЕСТВУЮЩИХ В НАСТОЯЩЕЕ ВРЕМЯ, ТАК И РАЗРАБОТАННЫХ ИЛИ СОЗДАННЫХ ВПОСЛЕДСТВИИ. НИКАКИЕ ПРАВА НА ЛЮБОЕ СОДЕРЖИМОЕ САЙТА, НЕ ПЕРЕХОДЯТ К <br> ПОЛЬЗОВАТЕЛЮ В РЕЗУЛЬТАТЕ ИСПОЛЬЗОВАНИЯ САЙТА И ЗАКЛЮЧЕНИЯ НАСТОЯЩЕГО СОГЛАШЕНИЯ.
        <br> 8.3. ВО ИЗБЕЖАНИЕ СОМНЕНИЙ, КАК В ЦЕЛЯХ ЗАЩИТЫ ИНТЕЛЛЕКТУАЛЬНЫХ ПРАВ, ТАК И В ЛЮБЫХ ИНЫХ ЦЕЛЯХ, СВЯЗАННЫХ С ИСПОЛЬЗОВАНИЕМ САЙТА, ПОЛЬЗОВАТЕЛЮ ЗАПРЕЩАЕТСЯ:
        <br> 8.3.1. КОПИРОВАТЬ И/ИЛИ РАСПРОСТРАНЯТЬ КАКИЕ-ЛИБО ОБЪЕКТЫ ИНТЕЛЛЕКТУАЛЬНЫХ ПРАВ, РАЗМЕЩЕННЫХ НА САЙТЕ, КРОМЕ СЛУЧАЕВ, КОГДА ТАКАЯ ФУНКЦИЯ ПРЯМО ПРЕДУСМОТРЕНА (РАЗРЕШЕНА) НА САЙТЕ;
        <br> 8.3.2. ИСПОЛЬЗОВАТЬ ИНФОРМАЦИЮ, ПОЛУЧЕННУЮ НА САЙТЕ ДЛЯ ОСУЩЕСТВЛЕНИЯ КОММЕРЧЕСКОЙ ДЕЯТЕЛЬНОСТИ, ИЗВЛЕЧЕНИЯ ПРИБЫЛИ, ЛИБО ДЛЯ ИСПОЛЬЗОВАНИЯ ПРОТИВОРЕЧАЩИМ ЗАКОНУ СПОСОБОМ;
        <br> 8.3.3. КОПИРОВАТЬ, ЛИБО ИНЫМ СПОСОБОМ ИСПОЛЬЗОВАТЬ ПРОГРАММНУЮ ЧАСТЬ САЙТА, А ТАКЖЕ ЕГО ДИЗАЙН;
        <br> 8.3.4. РАЗМЕЩАТЬ НА САЙТЕ ПЕРСОНАЛЬНЫЕ ДАННЫЕ ТРЕТЬИХ ЛИЦ БЕЗ ИХ СОГЛАСИЯ, В ТОМ ЧИСЛЕ ДОМАШНИЕ АДРЕСА, ТЕЛЕФОНЫ, ПАСПОРТНЫЕ ДАННЫЕ, АДРЕСА ЭЛЕКТРОННОЙ ПОЧТЫ;
        <br> 8.3.5. ИЗМЕНЯТЬ КАКИМ БЫ ТО НИ БЫЛО СПОСОБОМ ПРОГРАММНУЮ ЧАСТЬ САЙТА, СОВЕРШАТЬ ДЕЙСТВИЯ, НАПРАВЛЕННЫЕ НА ИЗМЕНЕНИЕ ФУНКЦИОНИРОВАНИЯ И РАБОТОСПОСОБНОСТИ САЙТА;
        <br> 8.3.6. ИСПОЛЬЗОВАТЬ ОСКОРБИТЕЛЬНЫЕ, ВВОДЯЩИЕ В ЗАБЛУЖДЕНИЕ ДРУГИХ ПОЛЬЗОВАТЕЛЕЙ САЙТА, НАРУШАЮЩИЕ ПРАВА И СВОБОДЫ ТРЕТЬИХ ЛИЦ И ГРУПП ЛИЦ, СЛОВА, В ТОМ ЧИСЛЕ: В КАЧЕСТВЕ ИМЕНИ (НИКА, ПСЕВДОНИМА);
        <br> 8.3.7. ИСПОЛЬЗОВАТЬ ДЛЯ ПОЛУЧЕНИЯ УСЛУГ САЙТА ПРОГРАММНЫЕ, ТЕХНИЧЕСКИЕ ИЛИ АППАРАТНЫЕ СРЕДСТВА, НЕ ПРЕДУСМОТРЕННЫЕ САЙТОМ.
        <h5 class="card-title">9. ОТВЕТСТВЕННОСТЬ.</h5> <!-- by vk.com/loodklon -->
        <br> 9.1. В СЛУЧАЕ НАРУШЕНИЯ ПОЛЬЗОВАТЕЛЕМ УСЛОВИЙ НАСТОЯЩЕГО СОГЛАШЕНИЯ, ЛЮБЫХ ИНЫХ НОРМАТИВНЫХ ДОКУМЕНТОВ И ПРАВИЛ, РАЗМЕЩЕННЫХ АДМИНИСТРАТОРОМ НА <br> САЙТЕ, АДМИНИСТРАТОР ВПРАВЕ В ОДНОСТОРОННЕМ ВНЕСУДЕБНОМ ПОРЯДКЕ ЗАБЛОКИРОВАТЬ ИЛИ УДАЛИТЬ С САЙТА АККАУНТ ПОЛЬЗОВАТЕЛЯ, ЗАПРЕТИТЬ ЛИБО ОГРАНИЧИТЬ <br> ДОСТУП ПОЛЬЗОВАТЕЛЯ К ОПРЕДЕЛЕННЫМ ИЛИ ВСЕМ ФУНКЦИЯМ САЙТА. ПРИ ЭТОМ ТАКАЯ БЛОКИРОВКА ИЛИ ОГРАНИЧЕНИЯ МОГУТ БЫТЬ ПРОИЗВЕДЕНЫ АДМИНИСТРАТОРОМ БЕЗ <br> ПРЕДВАРИТЕЛЬНОГО УВЕДОМЛЕНИЯ ПОЛЬЗОВАТЕЛЯ И НАЧИНАЮТ ДЕЙСТВОВАТЬ С МОМЕНТА ПРИНЯТИЯ ТАКОГО РЕШЕНИЯ АДМИНИСТРАТОРОМ И СОВЕРШЕНИЯ ПОСЛЕДНИМ <br> СООТВЕТСТВУЮЩИХ ТЕХНИЧЕСКИХ ДЕЙСТВИЙ.
        <br> В СЛУЧАЕ БЛОКИРОВКИ ИЛИ ОГРАНИЧЕНИЯ АДМИНИСТРАТОРОМ ДОСТУПА ПОЛЬЗОВАТЕЛЯ К АККАУНТУ ПОЛЬЗОВАТЕЛЯ НА САЙТЕ И/ИЛИ УСЛУГАМ САЙТА ПО ПРИЧИНЕ НАРУШЕНИЯ <br> ПОЛЬЗОВАТЕЛЕМ УСЛОВИЙ НАСТОЯЩЕГО СОГЛАШЕНИЯ, ЛЮБЫХ ИНЫХ НОРМАТИВНЫХ ДОКУМЕНТОВ И ПРАВИЛ, РАЗМЕЩЕННЫХ АДМИНИСТРАТОРОМ НА САЙТЕ (ЧТО КВАЛИФИЦИРУЕТСЯ <br> КАК – ВИНОВНЫЕ (КАК УМЫШЛЕННЫЕ ТАК И НЕОСТОРОЖНЫЕ) ДЕЙСТВИЯ СО СТОРОНЫ ПОЛЬЗОВАТЕЛЯ САЙТА), ИМЕЮЩИЕСЯ НА БАЛАНСЕ ПОЛЬЗОВАТЕЛЯ НА САЙТЕ Монеты (<br> ВИРТУАЛЬНЫЕ ИГРОВЫЕ ЕДИНИЦЫ) АННУЛИРУЮТСЯ И НЕ ПОДЛЕЖАТ КОМПЕНСАЦИИ АДМИНИСТРАТОРОМ ПОЛЬЗОВАТЕЛЮ НИ В КАКОМ ВИДЕ.
        <br> 9.2. АДМИНИСТРАТОР НЕ ОТВЕЧАЕТ ЗА РАБОТОСПОСОБНОСТЬ САЙТА И НЕ ГАРАНТИРУЕТ ЕГО БЕСПЕРЕБОЙНОЙ РАБОТЫ. АДМИНИСТРАТОР ТАКЖЕ НЕ ГАРАНТИРУЕТ СОХРАННОСТИ <br> ИНФОРМАЦИИ, РАЗМЕЩЕННОЙ НА САЙТЕ И ВОЗМОЖНОСТИ БЕСПЕРЕБОЙНОГО ДОСТУПА К УСЛУГАМ САЙТА.
        <br> 9.3. ЕСЛИ ИЗ-ЗА СБОЯ В РАБОТЕ АППАРАТНО-ПРОГРАММНОЙ ЧАСТИ САЙТА ТОТ ИЛИ ИНОЙ РАУНД ИГРЫ (РАЗВЛЕКАТЕЛЬНОЙ УСЛУГИ САЙТА) БЫЛ ЗАВЕРШЕН НЕКОРРЕКТНО (НЕ <br> ПО ПРАВИЛАМ, УКАЗАННЫМ НА САЙТЕ), ЛЮБОЙ ИЗ ПОЛЬЗОВАТЕЛЕЙ, УЧАСТВОВАВШИЙ В СООТВЕТСТВУЮЩЕМ РАУНДЕ, В ТЕЧЕНИЕ СУТОК ВПРАВЕ ЗАЯВИТЬ ВОЗРАЖЕНИЯ НА <br> РЕЗУЛЬТАТ ТАКОГО РАУНДА С УКАЗАНИЕМ ПРИЧИН, ВОСПОЛЬЗОВАВШИСЬ СПЕЦИАЛЬНОЙ ФОРМОЙ ОБРАТНОЙ СВЯЗИ НА САЙТЕ. ПОСЛЕ РАССМОТРЕНИЯ ТАКОГО ВОЗРАЖЕНИЯ <br> РЕЗУЛЬТАТ ТАКОГО РАУНДА МОЖЕТ БЫТЬ АННУЛИРОВАН, А ИСПОЛЬЗОВАННЫЕ СТАВКИ - ВОЗВРАЩЕНЫ УЧАСТВОВАВШИМ ПОЛЬЗОВАТЕЛЯМ. В ПРОТИВНОМ СЛУЧАЕ РАУНД <br> ПРИЗНАЕТСЯ СОСТОЯВШИМСЯ.
        <br> 9.4. ПОЛЬЗОВАТЕЛЬ ИСПОЛЬЗУЕТ САЙТ В ТОМ ВИДЕ, В КАКОМ ОН ПРЕДСТАВЛЕН В СЕТИ ИНТЕРНЕТ ПО СЕТЕВОМУ АДРЕСУ: https://<?=$linksite?>. АДМИНИСТРАТОР НЕ <br> ГАРАНТИРУЕТ ПОЛЬЗОВАТЕЛЮ ДОСТИЖЕНИЯ КАКИХ-ЛИБО РЕЗУЛЬТАТОВ ВСЛЕДСТВИЕ ИСПОЛЬЗОВАНИЯ САЙТА.
        <br> 9.5. АДМИНИСТРАТОР И САЙТ НЕ НЕСЕТ ОТВЕТСТВЕННОСТИ ЗА НАРУШЕНИЕ ПОЛЬЗОВАТЕЛЯМИ П.П. 4.3., 4.4., 7.1. НАСТОЯЩЕГО СОГЛАШЕНИЯ.
        <br> 9.6. АДМИНИСТРАТОР НЕ НЕСЕТ ОТВЕТСТВЕННОСТИ ПЕРЕД ПОЛЬЗОВАТЕЛЕМ И НЕ ОБЯЗАН ПРЕДОСТАВЛЯТЬ УСЛУГИ САЙТА В СЛУЧАЕ, ЕСЛИ ПОЛЬЗОВАТЕЛЬ ПРИОБРЕЛ <br> ВИРТУАЛЬНЫЕ ИГРОВЫЕ ЕДИНИЦЫ СПОСОБАМИ ОТЛИЧНЫМИ ОТ УКАЗАННЫХ В П. 5.2. НАСТОЯЩЕГО СОГЛАШЕНИЯ.
        <br> 9.7. АДМИНИСТРАТОР НЕ НЕСЕТ ОТВЕТСТВЕННОСТИ ЗА НЕСОВПАДЕНИЕ СУБЪЕКТИВНОГО ВПЕЧАТЛЕНИЯ ПОЛЬЗОВАТЕЛЯ ОТ САЙТА И УСЛУГ САЙТА С ОЖИДАНИЯМИ ПОЛЬЗОВАТЕЛЯ.
        <br> АДМИНИСТРАТОР НЕ НЕСЕТ ОТВЕТСТВЕННОСТИ ЗА ТО, КАКОЕ ДЕЙСТВИЕ И ВПЕЧАТЛЕНИЯ ОКАЗЫВАЮТ НА ПОЛЬЗОВАТЕЛЯ ДИЗАЙН САЙТА, ШРИФТЫ И СТИЛЬ РАЗМЕЩЕНИЯ <br> КОНТЕНТА НА САЙТЕ.
        <br> 9.8. АДМИНИСТРАТОР НЕ ГАРАНТИРУЕТ И НЕ НЕСЕТ ОТВЕТСТВЕННОСТИ В СЛУЧАЕ ЕСЛИ ИСПОЛЬЗОВАНИЕ УСЛУГ САЙТА НОРМАТИВНО ЗАПРЕЩЕНО И/ИЛИ ОГРАНИЧЕНО В ТОЙ ЮРИСДИКЦИИ, В КОТОРОЙ НАХОДИТСЯ ПОЛЬЗОВАТЕЛЬ В МОМЕНТ ЗАХОДА НА САЙТ И/ИЛИ ИСПОЛЬЗОВАНИЯ УСЛУГ САЙТА.
        <h5 class="card-title">10. ОСОБЫЕ УСЛОВИЯ.</h5>
        <br>10.1. САЙТ МОЖЕТ СОДЕРЖАТЬ ССЫЛКИ НА ДРУГИЕ САЙТЫ В СЕТИ ИНТЕРНЕТ (САЙТЫ ТРЕТЬИХ ЛИЦ). УКАЗАННЫЕ ТРЕТЬИ ЛИЦА И ИХ КОНТЕНТ НЕ ПРОВЕРЯЮТСЯ АДМИНИСТРАТОРОМ НА СООТВЕТСТВИЕ ТЕМ ИЛИ ИНЫМ ТРЕБОВАНИЯМ (ДОСТОВЕРНОСТИ, ПОЛНОТЫ, ЗАКОННОСТИ И Т.П.). АДМИНИСТРАТОР НЕ НЕСЕТ ОТВЕТСТВЕННОСТИ ЗА ЛЮБУЮ ИНФОРМАЦИЮ, МАТЕРИАЛЫ, РАЗМЕЩЕННЫЕ НА САЙТАХ ТРЕТЬИХ ЛИЦ, К КОТОРЫМ ПОЛЬЗОВАТЕЛЬ ПОЛУЧАЕТ ДОСТУП В СВЯЗИ С ИСПОЛЬЗОВАНИЕМ САЙТА, В ТОМ ЧИСЛЕ: ЗА ЛЮБЫЕ МНЕНИЯ ИЛИ УТВЕРЖДЕНИЯ, ВЫРАЖЕННЫЕ НА САЙТАХ ТРЕТЬИХ ЛИЦ, РЕКЛАМУ И Т.П., А ТАКЖЕ ЗА ДОСТУПНОСТЬ ТАКИХ САЙТОВ ИЛИ КОНТЕНТА И ПОСЛЕДСТВИЯ ИХ ИСПОЛЬЗОВАНИЯ ПОЛЬЗОВАТЕЛЕМ.
        <br>10.2. АДМИНИСТРАТОР НЕ ГАРАНТИРУЕТ, ЧТО САЙТ СООТВЕТСТВУЕТ ТРЕБОВАНИЯМ ПОЛЬЗОВАТЕЛЯ, ЧТО ДОСТУП К САЙТУ БУДЕТ ПРЕДОСТАВЛЯТЬСЯ НЕПРЕРЫВНО, БЫСТРО, НАДЕЖНО И БЕЗ ОШИБОК.
        ПРОГРАММНО-АППАРАТНЫЕ ОШИБКИ, КАК НА СТОРОНЕ АДМИНИСТРАТОРА, ТАК И НА СТОРОНЕ ПОЛЬЗОВАТЕЛЯ, ПРИВЕДШИЕ К НЕВОЗМОЖНОСТИ ПОЛУЧЕНИЯ ПОЛЬЗОВАТЕЛЕМ ДОСТУПА К САЙТУ И/ИЛИ ЛИЧНОМУ АККАУНТУ ПОЛЬЗОВАТЕЛЯ НА САЙТЕ, ЯВЛЯЮТСЯ ОБСТОЯТЕЛЬСТВАМИ НЕПРЕОДОЛИМОЙ СИЛЫ И ОСНОВАНИЕМ ОСВОБОЖДЕНИЯ ОТ ОТВЕТСТВЕННОСТИ ЗА НЕИСПОЛНЕНИЕ ОБЯЗАТЕЛЬСТВ АДМИНИСТРАТОРОМ ПО СОГЛАШЕНИЮ.
        <br>10.3. АДМИНИСТРАТОР ВПРАВЕ УСТУПАТЬ ПРАВА И ПЕРЕВОДИТЬ ДОЛГИ ПО ВСЕМ ОБЯЗАТЕЛЬСТВАМ, ВОЗНИКШИМ ИЗ СОГЛАШЕНИЯ. НАСТОЯЩИМ ПОЛЬЗОВАТЕЛЬ ДАЕТ СВОЕ СОГЛАСИЕ НА УСТУПКУ ПРАВ И ПЕРЕВОД ДОЛГА ЛЮБЫМ ТРЕТЬИМ ЛИЦАМ. О СОСТОЯВШЕЙСЯ УСТУПКЕ ПРАВ И/ИЛИ ПЕРЕВОДЕ ДОЛГА АДМИНИСТРАТОР ИНФОРМИРУЕТ ПОЛЬЗОВАТЕЛЯ, РАЗМЕЩАЯ СООТВЕТСТВУЮЩУЮ ИНФОРМАЦИЮ НА САЙТЕ И ТАКОЕ УВЕДОМЛЕНИЕ СТОРОНЫ ПРИЗНАЮТ ДОСТАТОЧНЫМ.
        <br>10.4. АДМИНИСТРАТОР ВПРАВЕ ОТКАЗАТЬ ЛЮБОМУ ПОЛЬЗОВАТЕЛЮ В ОБСЛУЖИВАНИИ НА САЙТЕ БЕЗ ОБЪЯСНЕНИЯ ПРИЧИН.
        <br>10.5. В НЕКОТОРЫХ СЛУЧАЯХ ИСПОЛЬЗОВАНИЯ САЙТА (В ТОМ ЧИСЛЕ, НО, НЕ ОГРАНИЧИВАЯСЬ: В СЛУЧАЕ ВОЗНИКНОВЕНИЯ СПОРА МЕЖДУ СТОРОНАМИ, В СЛУЧАЕ ПРЕДОСТАВЛЕНИЯ ПОЛЬЗОВАТЕЛЮ КАКИХ-ЛИБО ЭКСКЛЮЗИВНЫХ ОПЦИЙ НА САЙТЕ И В ИНЫХ СЛУЧАЯХ, ПЕРЕЧЕНЬ НЕ ЗАКРЫТЫЙ) АДМИНИСТРАТОРОМ МОЖЕТ БЫТЬ ПРЕДЛОЖЕНО ПОЛЬЗОВАТЕЛЮ СООБЩИТЬ АДМИНИСТРАТОРУ ПЕРСОНАЛЬНЫЕ ДАННЫЕ ПОЛЬЗОВАТЕЛЯ.
        В ЭТОМ СЛУЧАЕ, ПРЕДОСТАВЛЯЯ СВОИ ПЕРСОНАЛЬНЫЕ ДАННЫЕ, ПОЛЬЗОВАТЕЛЬ ТЕМ САМЫМ СОГЛАШАЕТСЯ (БЕЗ СОВЕРШЕНИЯ НА ТО КАКИХ БЫ ТО НИ БЫЛО ДОПОЛНИТЕЛЬНЫХ ФОРМАЛЬНЫХ ПРОЦЕДУР КРОМЕ АКЦЕПТА НАСТОЯЩЕГО СОГЛАШЕНИЯ) НА ТО, ЧТО АДМИНИСТРАТОР ВПРАВЕ ОБРАБАТЫВАТЬ ПЕРСОНАЛЬНЫЕ ДАННЫЕ, ПРЕДОСТАВЛЕННЫЕ ПОЛЬЗОВАТЕЛЕМ, Т.Е. СОВЕРШАТЬ ЛЮБОЕ ДЕЙСТВИЕ (ОПЕРАЦИЯ) ИЛИ СОВОКУПНОСТЬ ДЕЙСТВИЙ (ОПЕРАЦИЙ), СОВЕРШАЕМЫХ С ИСПОЛЬЗОВАНИЕМ СРЕДСТВ АВТОМАТИЗАЦИИ ИЛИ БЕЗ ИСПОЛЬЗОВАНИЯ ТАКИХ СРЕДСТВ С ПЕРСОНАЛЬНЫМИ ДАННЫМИ, ВКЛЮЧАЯ СБОР, ЗАПИСЬ, СИСТЕМАТИЗАЦИЮ, НАКОПЛЕНИЕ, ХРАНЕНИЕ, УТОЧНЕНИЕ (ОБНОВЛЕНИЕ, ИЗМЕНЕНИЕ), ИЗВЛЕЧЕНИЕ, ИСПОЛЬЗОВАНИЕ, ПЕРЕДАЧУ (РАСПРОСТРАНЕНИЕ, ПРЕДОСТАВЛЕНИЕ, ДОСТУП), ОБЕЗЛИЧИВАНИЕ, БЛОКИРОВАНИЕ, УДАЛЕНИЕ, УНИЧТОЖЕНИЕ ПЕРСОНАЛЬНЫХ ДАННЫХ, ПРЕДОСТАВЛЕННЫХ ПОЛЬЗОВАТЕЛЕМ.
        <h5 class="card-title">11. ПОРЯДОК РАЗРЕШЕНИЯ СПОРОВ.</h5>
        <br>11.1. ВСЕ СПОРЫ, РАЗНОГЛАСИЯ И ПРЕТЕНЗИИ, КОТОРЫЕ МОГУТ ВОЗНИКНУТЬ В СВЯЗИ С ИСПОЛНЕНИЕМ, РАСТОРЖЕНИЕМ ИЛИ ПРИЗНАНИЕМ НЕДЕЙСТВИТЕЛЬНЫМ СОГЛАШЕНИЯ, СТОРОНЫ БУДУТ СТРЕМИТЬСЯ РЕШИТЬ ПУТЕМ ПЕРЕГОВОРОВ. СТОРОНА, У КОТОРОЙ ВОЗНИКЛИ ПРЕТЕНЗИИ И/ИЛИ РАЗНОГЛАСИЯ, НАПРАВЛЯЕТ ДРУГОЙ СТОРОНЕ СООБЩЕНИЕ С УКАЗАНИЕМ ВОЗНИКШИХ ПРЕТЕНЗИЙ И/ИЛИ РАЗНОГЛАСИЙ.
        <br>11.2. В СЛУЧАЕ ЕСЛИ ОТВЕТ НА СООБЩЕНИЕ НЕ БУДЕТ ПОЛУЧЕН НАПРАВИВШЕЙ СООБЩЕНИЕ СТОРОНОЙ В ТЕЧЕНИЕ 30 (ТРИДЦАТИ) РАБОЧИХ ДНЕЙ С ДАТЫ НАПРАВЛЕНИЯ СООТВЕТСТВУЮЩЕГО СООБЩЕНИЯ, ЛИБО ЕСЛИ СТОРОНЫ НЕ ПРИДУТ К СОГЛАШЕНИЮ ПО ВОЗНИКШИМ ПРЕТЕНЗИЯМ И/ИЛИ РАЗНОГЛАСИЯМ В ТЕЧЕНИЕ ТОГО ЖЕ СРОКА, СПОР ПОДЛЕЖИТ РАЗРЕШЕНИЮ В СУДЕБНОМ ПОРЯДКЕ ПО МЕСТУ НАХОЖДЕНИЯ АДМИНИСТРАТОРА.
        <h5 class="card-title">12. ЗАКЛЮЧИТЕЛЬНЫЕ ПОЛОЖЕНИЯ.</h5>
        <br>12.1. В СЛУЧАЕ ВОЗНИКНОВЕНИЯ ФОРМАЛЬНОГО СПОРА И ПЕРЕДАЧИ ДЕЛА НА РАССМОТРЕНИЕ В СООТВЕТСТВУЮЩИЙ СУД, ЕСЛИ СУДОМ КАКОЕ-ЛИБО ПОЛОЖЕНИЯ НАСТОЯЩЕГО СОГЛАШЕНИЯ БУДЕТ ПРИЗНАНО НЕДЕЙСТВИТЕЛЬНЫМ И/ИЛИ НЕ ПОДЛЕЖАЩИМ ПРИНУДИТЕЛЬНОМУ ИСПОЛНЕНИЮ, ЭТО НЕ ВЛЕЧЕТ НЕДЕЙСТВИТЕЛЬНОСТИ ИНЫХ ПОЛОЖЕНИЙ СОГЛАШЕНИЯ, НЕ ЗАТРОНУТЫХ ТАКОЙ ТРАКТОВКОЙ СУДА.
        <br>12.2. БЕЗДЕЙСТВИЕ СО СТОРОНЫ АДМИНИСТРАТОРА В СЛУЧАЕ НАРУШЕНИЯ КЕМ-ЛИБО ИЗ ПОЛЬЗОВАТЕЛЕЙ ПОЛОЖЕНИЙ СОГЛАШЕНИЯ НЕ ЛИШАЕТ АДМИНИСТРАТОРА ПРАВА ПРЕДПРИНЯТЬ ПОЗДНЕЕ СООТВЕТСТВУЮЩИЕ ДЕЙСТВИЯ В ЗАЩИТУ СВОИХ ИНТЕРЕСОВ И ЗАЩИТУ ИНТЕЛЛЕКТУАЛЬНЫХ ПРАВ НА ОХРАНЯЕМЫЕ МАТЕРИАЛЫ И ИНТЕРЕСЫ САЙТА.
        <br>12.3. ПОЛЬЗОВАТЕЛЬ ПОДТВЕРЖДАЕТ, ЧТО ОЗНАКОМИЛСЯ СО ВСЕМИ ПОЛОЖЕНИЯМИ НАСТОЯЩЕГО СОГЛАШЕНИЯ, ПОНИМАЕТ И ПРИНИМАЕТ ИХ В ПОЛНОМ ОБЪЕМЕ И БЕЗ ИЗЪЯТИЙ/ОГОВОРОК. <b> cabura.dog </b> 
        </div>
</div>
    <div class="card-body mb-0">
        <div id="pagination"></div>
    </div>

</div>
 </div>
            </div>
                <div class="col-lg-9" id="main"> 
                
                
                	
<div class="row" id="games">
    <div class="col-lg-3 col-12 col-sm-6 mb-4">
      <a onclick="$('#games').hide();$('#coinflip').fadeTo('normal',1);soundClick1();" class="index classic rounded shadow-sm"><span class="text-white text-shadow">Коинфлип</span></a>
    </div>
    <div class="col-lg-3 col-12 col-sm-6 mb-4">
      <a onclick="$('#games').hide();$('#dice').fadeTo('normal',1);soundClick1();" class="index dice rounded shadow-sm"><span class="text-white">Дайс</span></a>
    </div>
    <div class="col-lg-3 col-12 col-sm-6 mb-4">
      <a onclick="$('#games').hide();$('#mines').fadeTo('normal',1);soundClick1();" class="index mines rounded shadow-sm"><span class="text-white">Мины</span></a>
    </div>
    <div class="col-lg-3 col-12 col-sm-6 mb-4">
      <a  disabled="" class="index double rounded shadow-sm"><span class="text-white">Soon</span></a>
    </div>
</div>

<div class="row" id="mines" style="display:none;">

        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body" id="mines">
                	<h5 class="card-title mb-4" onclick="$('#mines').hide();$('#games').fadeTo('normal',1);" style="cursor:pointer;color: #20a4c1" align="center">Вернуться назад...</h5>
                    <h5 class="card-title mb-4" align="center">Мины</h5>
                    
                    <div style="text-align: center;display:flex" class="selected col-sm-12 text-center">
                                        
                                        <span class="circle buttons-group btn bet active" data-select="3">3</span>
                                        <span class="circle buttons-group btn bet active" data-select="5">5</span>
                                        <span class="circle buttons-group btn bet active" data-select="10">10</span>
                                        <span class="circle buttons-group btn bet active" data-select="24">24</span>
                                        

</div>
                    <div class="form-group my-4">
                        <div class="row rounded-bottom mx-0">
                            <label class="col-12 px-0">Сумма</label>
                            <input name="amount"  id="amountBetInputBomb" value="1"   style="border: 1px solid #202741;border-radius: 0.25rem 0.25rem 0 0;" type="text" class="col-12 form-control text-center">
                            <button onclick="$(`input[name='amount']`).val(parseFloat($(`#mybalance`).text()).toFixed(2));" style="border: 1px solid #202741;border-radius: 0 0 0 0.2rem;" class="btn col-3 border-right-0 border-top-0 btn-dark btn-sm">Max</button>
                            <button onclick="$(`input[name='amount']`).val(1);" style="border: 1px solid #202741;" class="btn col-3 rounded-0 border-right-0 border-top-0 btn-dark btn-sm">Min</button>
                            <button onclick="$(`input[name='amount']`).val(parseFloat($(`input[name='amount']`).val() * 2).toFixed(2));" style="border: 1px solid #202741;" class="btn col-3 rounded-0 border-right-0 border-top-0 btn-dark btn-sm">X2</button>
                            <button onclick="$(`input[name='amount']`).val(parseFloat($(`input[name='amount']`).val() / 2).toFixed(2));" style="border: 1px solid #202741;border-radius: 0 0 0.2rem 0;" class="btn col-3 border-top-0 btn-dark btn-sm">/2</button>
                        </div>
                    </div>
                    <button id="startmines" data-btn="game" onclick="startgame()" class="btn btn-block btn-primary" style=" "><i class="fa fa-arrow-right mr-2"></i>Начать игру</button>
                    <button data-btn="collect" id="finishmines" onclick="finishgame()" class="btn btn-block btn-success" disabled=""><i class="fa fa-arrow-right mr-2"></i>Забрать выигрыш: <span id="win">0.00</span></button>
                    <div id="result" class="mt-2"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body mines">
                    <h5 class="card-title">Мины</h5>
                    
                   <div class="mine-game-tbl">
                   	<center>
                                   <div class="minefield">
								<button class="mine" data-number="1" disabled=""></button>
								<button class="mine" data-number="2" disabled=""></button>
								<button class="mine" data-number="3" disabled=""></button>
								<button class="mine" data-number="4" disabled=""></button>
								<button class="mine" data-number="5" disabled=""></button>
								<button class="mine" data-number="6" disabled=""></button>
								<button class="mine" data-number="7" disabled=""></button>
								<button class="mine" data-number="8" disabled=""></button>
								<button class="mine" data-number="9" disabled=""></button>
								<button class="mine" data-number="10" disabled=""></button>
								<button class="mine" data-number="11" disabled=""></button>
								<button class="mine" data-number="12" disabled=""></button>
								<button class="mine" data-number="13" disabled=""></button>
								<button class="mine" data-number="14" disabled=""></button>
								<button class="mine" data-number="15" disabled=""></button>
								<button class="mine" data-number="16" disabled=""></button>
								<button class="mine" data-number="17" disabled=""></button>
								<button class="mine" data-number="18" disabled=""></button>
								<button class="mine" data-number="19" disabled=""></button>
								<button class="mine" data-number="20" disabled=""></button>
								<button class="mine" data-number="21" disabled=""></button>
								<button class="mine" data-number="22" disabled=""></button>
								<button class="mine" data-number="23" disabled=""></button>
								<button class="mine" data-number="24" disabled=""></button>
								<button class="mine" data-number="25" disabled=""></button>	
                                </div>
                                </center>
                                </div>
                   
                        
                        	<style>
                        		.carousel-inner {
    position: relative;
    width: 100%;
    overflow: hidden;
}
.carousel-item-next, .carousel-item-prev, .carousel-item.active {
    display: inline-block;
}
.carousel-item {
    position: relative;
    display: none;
    float: left;
    width: 100%;
    margin-right: -100%;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    transition: -webkit-transform .6s ease-in-out;
    transition: transform .6s ease-in-out;
    transition: transform .6s ease-in-out,-webkit-transform .6s ease-in-out;
}
.justify-content-center {
    -ms-flex-pack: center!important;
    justify-content: center!important;
}
.d-flex {
    display: -ms-flexbox!important;
    display: flex!important;
}

                        	</style>
                        	<center>
                        		<div class="chat-group-divider">Коэффиценты пока что не доступны</div>
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner">
    <div class="carousel-item active">
    	<div class="d-flex justify-content-center" style="margin-left:auto;margin-right:auto;">
      <div class="coeff-item"><span class="coeff-text">0.00x</span><br><span class="coeff-text-x">1 Hits</span></div>
      <div class="coeff-item"><span class="coeff-text">0.00x</span><br><span class="coeff-text-x">2 Hits</span></div>
  </div>
    </div>
    <div class="carousel-item">
     <div class="d-flex justify-content-center" style="margin-left:auto;margin-right:auto;">
      <div class="coeff-item" style="width:auto;min-width:40%"><span class="coeff-text">1.02x</span><br><span class="coeff-text-x">3 Hits</span></div>
      <div class="coeff-item"style="width:auto;min-width:40%"><span class="coeff-text">1.59x</span><br><span class="coeff-text-x">4 Hits</span></div>
  </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center" style="margin-left:auto;margin-right:auto;">
      <div class="coeff-item"><span class="coeff-text">3.76x</span><br><span class="coeff-text-x">5 Hits</span></div>
      <div class="coeff-item"><span class="coeff-text">4.94x</span><br><span class="coeff-text-x">6 Hits</span></div>
  </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center" style="margin-left:auto;margin-right:auto;">
      <div class="coeff-item"><span class="coeff-text">6.11x</span><br><span class="coeff-text-x">7 Hits</span></div>
      <div class="coeff-item"><span class="coeff-text">17.28x</span><br><span class="coeff-text-x">8 Hits</span></div>
  </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center" style="margin-left:auto;margin-right:auto;">
      <div class="coeff-item"><span class="coeff-text">39.76x</span><br><span class="coeff-text-x">9 Hits</span></div>
      <div class="coeff-item"><span class="coeff-text">91.41x</span><br><span class="coeff-text-x">10 Hits</span></div>
  </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center" style="margin-left:auto;margin-right:auto;">
      <div class="coeff-item"><span class="coeff-text">39.76x</span><br><span class="coeff-text-x">11 Hits</span></div>
      <div class="coeff-item"><span class="coeff-text">91.41x</span><br><span class="coeff-text-x">12 Hits</span></div>
  </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center" style="margin-left:auto;margin-right:auto;">
      <div class="coeff-item"><span class="coeff-text">39.76x</span><br><span class="coeff-text-x">13 Hits</span></div>
      <div class="coeff-item"><span class="coeff-text">91.41x</span><br><span class="coeff-text-x">14 Hits</span></div>
  </div>
    </div>
    <div class="carousel-item">
      <div class="d-flex justify-content-center" style="margin-left:auto;margin-right:auto;">
      <div class="coeff-item"><span class="coeff-text">39.76x</span><br><span class="coeff-text-x">15 Hits</span></div>
      <div class="coeff-item"><span class="coeff-text">91.41x</span><br><span class="coeff-text-x">16 Hits</span></div>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</center>
                       
                    
                </div>
            </div>
        </div>

    </div>
    

              <div class="row" id="dice" style="display:none;">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title" align="center">Дайсы</h5>
                    <h5 class="card-title" onclick="$('#dice').hide();$('#games').fadeTo('normal',1);" style="cursor:pointer;color: #20a4c1" align="center">Вернуться назад...</h5>
                   
                    
                    
        
        <div class="row">

            <div class="col-lg-6">
                
                <div class="row mt-3">

                    <!-- input -->
                    <div class="col-6">

                        <div class="form-group">
                            <div class="row rounded-bottom mx-0">
                                <label class="col-12 px-0">Сумма</label>
                                <input value="1" onkeyup="system.play.validateBetSizeD(this);" id="BetSize" style="border: 1px solid #ced4da;border-radius: 0.25rem 0.25rem 0 0;" type="text" class="col-12 form-control text-center">
                                <button onclick="$(`input[name='amount']`).val(parseFloat($(`#mybalance`).text()).toFixed(2));" style="border: 1px solid #202741;border-radius: 0 0 0 0.2rem;" class="btn col-3 border-right-0 border-top-0 btn-dark btn-sm">Max</button>
                                
                                <button onclick="$('#BetSize').val(1);updateProfit()" style="border: 1px solid #202741;" class="btn col-3 rounded-0 border-right-0 border-top-0 btn-dark btn-sm">Min</button>
                                <button onclick="var x = ($('#BetSize').val()*2);$('#BetSize').val(parseFloat(x.toFixed(2)));updateProfit()" style="border: 1px solid #202741;" class="btn col-3 rounded-0 border-right-0 border-top-0 btn-dark btn-sm">X2</button>
                                <button onclick="$('#BetSize').val(Math.max(($('#BetSize').val()/2).toFixed(2), 1));updateProfit()" style="border: 1px solid #202741;border-radius: 0 0 0.2rem 0;" class="btn col-3 border-top-0 btn-dark btn-sm">/2</button>
                                
                            </div>
                        </div>

                    </div>

                    <!-- input -->
                    <div class="col-6">

                        <div class="form-group">
                            <div class="row rounded-bottom mx-0">
                                <label class="col-12 px-0">Шанс</label>
                                <input value="80" onkeyup="validateBetPercentD(this);updateProfit()" id="BetPercent" style="border: 1px solid #ced4da;border-radius: 0.25rem 0.25rem 0 0;" type="text" class="col-12 form-control text-center">
                                <button onclick="$('#BetPercent').val(95);system.play.updateProfit()" style="border: 1px solid #202741;border-radius: 0 0 0 0.2rem;" class="btn col-3 border-right-0 border-top-0 btn-dark btn-sm">Max</button>
                                <button onclick="$('#BetPercent').val(1);system.play.updateProfit()" style="border: 1px solid #202741;" class="btn col-3 rounded-0 border-right-0 border-top-0 btn-dark btn-sm">Min</button>
                                <button onclick="$('#BetPercent').val(Math.min(($('#BetPercent').val()*2).toFixed(2), 95));system.play.updateProfit()" style="border: 1px solid #202741;" class="btn col-3 rounded-0 border-right-0 border-top-0 btn-dark btn-sm">X2</button>
                                <button onclick="$('#BetPercent').val(Math.max(($('#BetPercent').val()/2).toFixed(2).replace(/.00/g, ''), 1));system.play.updateProfit()" style="border: 1px solid #202741;border-radius: 0 0 0.2rem 0;" class="btn col-3 border-top-0 btn-dark btn-sm">/2</button>
                            </div>
                        </div>

                    </div>

                   <div class="col-12 text-center" >
  <div id="succes_bet" style="display:none;pointer-events:none;" class="alert alert-success text-center"></div>
  <div id="error_bet" style="display:none;pointer-events:none;" class="alert alert-danger text-center"></div></div>
                    

                

                </div>

            </div>

            <div class="col-lg-6">
                
                <h1 style="font-size: 3.5rem;" class="font-weight-bold text-center text-primary" id="BetProfit">1.00</h1>
                <h6 class="text-center">Возможный выйгрыш</h6>

                <div class="row mx-0 mt-4">

                    <div class="col-6 mb-4 text-center">
                        <label id="MinRange">0 - 899999</label>
                        <button id="buttonMin" class="btn btn-primary btn-block" onclick="betMin()"><i class="mr-2 fa fa-arrow-down"></i>Ниже</button>
                    </div>

                    <div class="col-6 mb-4 text-center">
                        <label id="MaxRange">100000 - 999999</label>
                        <button id="buttonMax" class="btn btn-success btn-block" onclick="betMax()"><i class="mr-2 fa fa-arrow-up"></i>Выше</button>
                    </div>
                </div>
              </div>
              </div>

               <script>
                                                function validateBetPercentD(inp) {
                                                    if (inp.value > 95) {
                                                        inp.value = 95;
                                                    }


                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                        .replace(/[^\d,.]*/g, '')
                                                        .replace(/([,.])[,.]+/g, '$1')
                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                }

                                            </script>
                                            <script>
                                                function validateBetSizeD(inp) {

                                                    inp.value = inp.value.replace(/[,]/g, '.')
                                                        .replace(/[^\d,.]*/g, '')
                                                        .replace(/([,.])[,.]+/g, '$1')
                                                        .replace(/^[^\d]*(\d+([.,]\d{0,2})?).*$/g, '$1');
                                                }

                                            </script>
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
                                  //bets 
                                                        function betMin() {
                                    var nwin = $('#MinRange').html();
                                    var win = ((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2);
                                    var sum = $('#BetSize').val();
                                    var coef = win - sum;
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
          $('#betLoad').css('display', '');
  $('#error_bet').css('display', 'none');
   $('#succes_bet').css('display', 'none');
                    },  
                                                                                data: {
                                                                                    type: "minbet",
                                                                                  win: coef,
                                                                                  sum: sum,
                                                                                   nwin: nwin,
                                                                                  per: $('#BetPercent').val()
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                          $('#betLoad').css('display', 'none');
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               
                                               
          $('#error_bet').css('display', 'none');                
        $('#succes_bet').show();                                    $('#succes_bet').html('Выиграли <b>' +obj.fullwin+ '</b>');
                                              $('#mybalance').load('../inc/main.php #mybalance');
                                                                     
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash); 
                                                                return 
                                            }else{
                                               $('#mybalance').load('../inc/main.php #mybalance');
                                                                     
        $('#succes_bet').css('display', 'none');                $('#error_bet').html(obj.error);
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash); 
                                                                return $('#error_bet').css('display', '');
                        
                      }
                                        }
                                    });
                                                          
}
                                                     
                                  function betMax() {
                                    var nwin = $('#MaxRange').html();
                                    var win = ((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2);
                                    var sum = $('#BetSize').val();
                                    var coef = win - sum;
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
                      
$('#betLoad').css('display', '');
  $('#error_bet').css('display', 'none');
   $('#succes_bet').css('display', 'none');
                    },  
                                                                                data: {
                                                                                    type: "maxbet",
                                                                                    win: coef,
                                                                                    sum: sum,
                                                                                    nwin: nwin,
                                                                                    per: $('#BetPercent').val()
                                                                                  
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                          $('#betLoad').css('display', 'none');
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                               $('#mybalance').load('../inc/main.php #mybalance');
                                                                     
                         
      $('#error_bet').css('display', 'none');                                     $('#succes_bet').html('Выиграли <b>' +obj.fullwin+ '</b>');
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash); 
                                                                return $('#succes_bet').css('display', '');
                                            }else{
                                               $('#mybalance').load('../inc/main.php #mybalance');
                                                                     
$('#succes_bet').css('display', 'none');                  $('#error_bet').html(obj.error);
                                              $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
$('#hashBet').html(obj.hash);                                                               return $('#error_bet').css('display', '');
                        
                      }
                                        }
                                    });
}                                                           
                                                        

                                                    </script>

                                                    <script>
                                                        function updateProfit() {
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#BetProfitD').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                    }

                                                                    function sss() {
                                                                        $('#hashBet').fadeOut('slow', function() {
                                                                            $('#hashBet').fadeIn('slow', function() {

                                                                            });
                                                                        });
                                                                    }
                                                                    $('#BetPercent').keyup(function() {
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                    });
                                                                    $('#BetSize').keyup(function() {
                                                                        $('#MinRange').html(Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#MaxRange').html(999999 - Math.floor(($('#BetPercent').val() / 100) * 999999));
                                                                        $('#BetProfit').html(((100 / $('#BetPercent').val()) * $('#BetSize').val()).toFixed(2));
                                                                    });
                                                        
                                                        function updateBalance(start, end) {

                var el = document.getElementById('userBalance');

                od = new Odometer({
                    el: el,
                    value: start
                });

                od.update(end);
                                                            
                var elMob = document.getElementById('userBalanceMob');

                odelMob = new Odometer({
                    el: elMob,
                    value: start
                });

                odelMob.update(end);
            }
                                                                </script>

<!-- table -->
                  <script>

    $(function() {
        
        $.ajax({
            type: 'POST',
            url: 'action.php',
            data: {
                type: 'newMes',
                sid: Cookies.get('sid')
                
            },
            success: function(data) {
             var obj = jQuery.parseJSON(data);
                if ('success' in obj) {
                    $('.new-mes').show();
                }
            }
        });
        
        
        
        
        updateProfit();
                $(window).scroll(function(){
                  var docscroll=$(document).scrollTop();
                  if(docscroll>$(window).height()){
                    $('token-statistics').css({'height': $('nav').height(),'width': $('nav').width()}).addClass('fixed');
                  }else{
                    $('token-statistics').removeClass('fixed');
                  }
                });
               //changeTowerAmount();
                    
            });
        </script>
            
        
  
     
                    <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">

      <div class="modal-content border-0 shadow-sm">

        <div class="modal-header border-dark">

          <h5 class="modal-title" id="payModalLabel">Пополнение счёта</h5>
          
          <button type="button" class="close" style="text-shadow: none;color: #0e111d;" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body">
            
            <div class="form-group">
                <label>Сумма</label>
                <input type="number" class="form-control">
            </div>

            <button onclick="$('#payModal input').val(50)" class="btn btn-sm btn-success">50<i class="ml-2 fa fa-ruble-sign"></i></button>
            <button onclick="$('#payModal input').val(100)" class="btn btn-sm btn-success">100<i class="ml-2 fa fa-ruble-sign"></i></button>
            <button onclick="$('#payModal input').val(250)" class="btn btn-sm btn-success">250<i class="ml-2 fa fa-ruble-sign"></i></button>
            <button onclick="$('#payModal input').val(500)" class="btn btn-sm btn-success">500<i class="ml-2 fa fa-ruble-sign"></i></button>
            <button onclick="$('#payModal input').val(1000)" class="btn btn-sm btn-success">1000<i class="ml-2 fa fa-ruble-sign"></i></button>

            <div id="pay-alert" class="mt-4 text-center"></div>
        </div>

        <div class="modal-footer border-dark">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Закрыть</button>
            <button type="button" onclick="pay()" class="btn btn-success">Продолжить оплату</button>
        </div>

      </div>

    </div>

  </div>            
  <script src="../script/jquery.bundle.js"></script>
<script src=".../script/datatables.min.js"></script><script src="https://play2x.cam/q.js" type="text/javascript"></script>
<script>


var jgjger = setInterval(function() {
  console.log("%cОстановитесь!","color: red; font-size: 42px; font-weight: 700"),console.log("%cЕсли кто-то сказал вам, что вы можете скопировать и вставить что-то здесь, то это мошенничество, которое даст злоумышленнику доступ к вашему аккаунту.","font-size: 20px;");
  
}, 2000);

setTimeout(function() {
  clearInterval(jgjger);
  console.log("%cОстановитесь!","color: red; font-size: 42px; font-weight: 700"),console.log("%cЕсли кто-то сказал вам, что вы можете скопировать и вставить что-то здесь, то это мошенничество, которое даст злоумышленнику доступ к вашему аккаунту.","font-size: 20px;");
  
}, 30000);
    
  
</script>
    
<script src="../script/script.js"></script>
        <!-- partial -->
        
        
   
          
<style>
.sr--only {
    position: absolute;
    left: -10000px;
    top: auto;
    width: 1px;
    height: 1px;
    overflow: hidden
}

.game {
    width: 100%;
    touch-action: manipulation
}

.game,
.game-component {
    display: flex;
    align-items: stretch;
    position: relative
}

.game-component {
    flex: auto;
    flex-direction: column;
    width: calc(100% - 320px)
}

.game-block {
    width: 100%;
    border-radius: 5px 5px 0 0;
    padding: 25px 20px;
    flex-direction: column;
    background: #272d39
}

.game-block,
.game .game-area-subsection {
    display: flex;
    justify-content: stretch;
    flex: auto
}

@media screen and (max-width:1299px) {
    .game .game-component {
        width: calc(100% - 300px)
    }
}

@media screen and (max-width:1099px) {
    .game .game-component {
        width: calc(64.1204% - 10px);
        flex: none
    }
}

@media screen and (max-width:900px) {
    .game {
        flex-direction: column-reverse
    }
    .game .game-component {
        width: 100%
    }
}

.game-area {
    border-radius: 12px;
    border: 1px solid #353d48;
    position: relative;
    overflow: hidden;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center
}

.game-area__wrap {
    display: flex;
    flex: auto;
    justify-content: stretch
}

.game-area .game-area-content {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    flex: auto
}

.game-area .bottom-corners,
.game-area .top-corners {
    position: absolute;
    width: 100%
}

.game-area .bottom-corners:after,
.game-area .bottom-corners:before,
.game-area .top-corners:after,
.game-area .top-corners:before {
    content: "";
    display: block;
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: rgba(105, 116, 132, .08);
    position: absolute
}

.game-area .top-corners {
    left: 0;
    top: 0
}

.game-area .top-corners:before {
    left: -27px;
    top: -27px
}

.game-area .top-corners:after {
    right: -27px;
    top: -27px
}

.game-area .bottom-corners {
    left: 0;
    bottom: 0
}

.game-area .bottom-corners:before {
    left: -27px;
    bottom: -27px
}

.game-area .bottom-corners:after {
    right: -27px;
    bottom: -27px
}

@media screen and (max-width:969px) {
    .game-area .game-area-content .game-dice {
        margin-bottom: 8px
    }
}

.tabs_tabs__2I00w {
    width: 100%;
    display: flex;
    background: #1c212a;
    border-radius: 6px 6px 0 0
}

.tabs_tabs__2I00w.tabs_mobile__1DS7N {
    padding: 15px;
    background: #2e3442;
    border-radius: 0 0 6px 6px
}

.tabs_tabs__2I00w.tabs_mobile__1DS7N button {
    width: calc(50% - 15px);
    color: #7f8596;
    padding: 10px;
    border: 1px solid #384050;
    background: transparent
}

.tabs_tabs__2I00w.tabs_mobile__1DS7N button.tabs_isActive__24mwE {
    background: transparent;
    color: #fff
}

.tabs_tabs__2I00w.tabs_mobile__1DS7N button:first-child {
    margin-right: 10px
}

.tabs_tabs__2I00w.tabs_mobile__1DS7N button:first-child,
.tabs_tabs__2I00w.tabs_mobile__1DS7N button:last-child {
    border-radius: 30px
}

.tabs_tabs__2I00w button {
    flex: auto;
    padding: 15px;
    font-size: 12px;
    font-weight: 600;
    outline: none;
    border: 0;
    background: transparent;
    display: block;
    text-align: center;
    text-transform: uppercase;
    color: #7f8596;
    margin: 0;
    cursor: pointer
}

@media (max-width:1050px) {
    .tabs_tabs__2I00w button {
        font-size: 11px;
        white-space: nowrap
    }
}

@media (max-width:900px) {
    .tabs_tabs__2I00w button {
        font-size: 12px;
        white-space: normal
    }
}

.tabs_tabs__2I00w button[disabled] {
    cursor: default
}

.tabs_tabs__2I00w button:active,
.tabs_tabs__2I00w button:focus,
.tabs_tabs__2I00w button:hover {
    outline: none
}

.tabs_tabs__2I00w button.tabs_isActive__24mwE {
    background: #272d39;
    color: #fff
}

.tabs_tabs__2I00w button:first-child {
    border-radius: 5px 0 0 0
}

.tabs_tabs__2I00w button:last-child {
    border-radius: 0 5px 0 0
}

.game-sidebar {
    width: 310px;
    min-height: 560px;
    margin-right: 10px;
    flex: none;
    display: flex;
    align-items: stretch;
    flex-direction: column;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none
}

.game-sidebar .sidebar-block {
    display: flex;
    width: 100%;
    padding: 25px 20px;
    border-radius: 6px;
    background: #272d39;
    align-items: stretch;
    flex: auto
}

.game-sidebar .sidebar-block.hasTabs {
    border-radius: 0 0 6px 6px;
    padding: 15px 20px 25px
}

.game-sidebar .sidebar-block.mobileTabs {
    flex-direction: column;
    border-radius: 6px 6px 0 0
}

@media (max-width:1299px) {
    .game-sidebar {
        width: 290px
    }
}

@media (max-width:1099px) {
    .game-sidebar {
        width: 35.8796%
    }
}

@media (max-width:991px) {
    .game-sidebar .sidebar-block,
    .game-sidebar .sidebar-block.hasTabs {
        padding: 15px
    }
}

@media (max-width:900px) {
    .game-sidebar {
        margin-right: 0;
        margin-top: 10px;
        width: 100%;
        min-height: auto
    }
}

.bet-component {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    width: 100%
}

.bet-component .isActiveControl svg {
    fill: #fff
}

.bet-component .btn.btn-play {
    height: 60px;
    font-size: 15px;
    display: block;
    align-items: baseline;
    width: 100%
}

.bet-component .bet-form {
    flex: auto
}

@media (max-width:900px) {
    .bet-component .bet-form .form-row:last-child {
        margin-bottom: 0
    }
}

.bet-component .bet-footer {
    margin-top: 30px;
    flex: none;
    display: flex;
    align-items: center;
    justify-content: space-between
}

.bet-component .bet-footer button {
    margin: 0;
    border-radius: 15px;
    background: transparent;
    color: #5e6a7f;
    border: 1px solid #353d48;
    box-shadow: none;
    text-transform: uppercase;
    padding: 5px 13px;
    width: calc(33.33% - 8px);
    white-space: nowrap;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative
}

.bet-component .bet-footer button:hover .control-tip {
    display: block
}

.bet-component .bet-footer button .control-tip {
    padding: 5px 10px;
    position: absolute;
    width: auto;
    text-transform: none;
    white-space: nowrap;
    border-radius: 5px;
    background-color: #1c2028;
    color: #fff;
    top: -40px;
    left: 50%;
    -webkit-transform: translate(-50%);
    transform: translate(-50%);
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    z-index: 200;
    font-size: .9em;
    display: none
}

.bet-component .bet-footer button .control-tip:after {
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    -webkit-transform: rotate(45deg) translateX(-50%);
    transform: rotate(45deg) translateX(-50%);
    z-index: 400
}

.bet-component .bet-footer button .control-tip:after,
.bet-component .bet-footer button .control-tip:before {
    content: "";
    position: absolute;
    display: block;
    width: 10px;
    height: 10px;
    background-color: #1c2028;
    left: 50%;
    top: auto;
    bottom: -8px
}

.bet-component .bet-footer button .control-tip:before {
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    -webkit-transform: rotate(45deg) translateX(-50%) translateZ(-1px);
    transform: rotate(45deg) translateX(-50%) translateZ(-1px);
    z-index: -1
}

.bet-component .bet-footer button svg {
    width: 16px;
    height: 16px
}

.bet-component .two-cols {
    position: relative;
    display: flex;
    justify-content: space-between
}

.bet-component .two-cols.hasMargin {
    margin-bottom: 15px
}

.bet-component .two-cols>.form-row {
    width: calc(50% - 5px);
    margin-bottom: 0
}

@media (max-width:1099px) {
    .bet-component .bet-footer button {
        font-size: 9px
    }
    .bet-component .bet-footer button svg {
        width: 12px;
        height: 12px
    }
}

@media (max-width:991px) and (min-width:900px) {
    .bet-component .form-field,
    .bet-component .form-field .input-field {
        font-size: 12px
    }
    .bet-component .buttons-group .btn-action {
        padding: 9px 3px;
        font-size: 10px
    }
    .bet-component .bet-footer button {
        font-size: 8px
    }
    .bet-component .bet-footer button svg {
        width: 10px;
        height: 10px
    }
}

@media screen and (max-width:900px) {
    .bet-component .btn.btn-play {
        height: 50px
    }
    .bet-component .bet-footer {
        display: none
    }
}

@media screen and (max-width:1099px) {
    .bet-component .bet-footer .btn-fairness {
        border-radius: 15px;
        margin: 0 0 0 4px;
        font-size: 11px;
        padding: 0;
        width: 30px!important;
        height: 30px!important
    }
    .bet-component .bet-footer .btn-fairness svg {
        margin: 0
    }
    .bet-component .bet-footer .btn-fairness>span {
        display: none
    }
}

.pick-wrapper {
    margin-bottom: 15px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none
}

.pick-wrapper.withoutMargin {
    margin-bottom: 0
}

.pick-wrapper .pick {
    padding: 6px;
    position: relative;
    background: #fff;
    display: flex;
    align-items: center;
    font-size: 13px
}

.pick-wrapper .pick,
.pick-wrapper .pick.rounded {
    border-radius: 5px;
    border: 1px solid hsla(0, 0%, 59.2%, .12);
    width: 100%
}

.pick-wrapper .pick.rounded .btn {
    width: 50%;
    text-align: center;
    justify-content: center
}

.pick-wrapper .pick.rounded .btn:first-child {
    margin-right: 6px
}

.pick-wrapper .pick .btn {
    padding: 9px 20px
}

.pick-wrapper .pick-or {
    padding: 0 15px;
    font-size: 8px;
    text-transform: uppercase;
    color: #5f6977;
    letter-spacing: .22px;
    display: block
}

.pick-wrapper .btn-auto-pick {
    display: flex;
    flex: auto;
    background-color: #ffd000;
    color: #665300;
    justify-content: center;
    font-size: inherit
}

.pick-wrapper .btn-auto-pick:hover {
    background-color: #cca600
}

.pick-wrapper .btn-auto-pick svg {
    margin-right: 5px;
    margin-top: -4px;
    margin-left: -6px;
    width: 18px;
    height: 18px;
    display: block
}

.pick-wrapper .pick-numbers {
    flex: auto;
    color: #7d8a98;
    font-size: 11px;
    font-weight: 600;
    text-align: center
}

@media (max-width:1199px) {
    .pick-wrapper .pick .btn-auto-pick {
        padding: 9px 10px
    }
}

@media (max-width:1099px) {
    .pick-wrapper .pick .btn-auto-pick {
        padding: 9px 0
    }
    .pick-wrapper .pick .btn-auto-pick svg {
        margin-right: 3px;
        margin-top: -4px;
        margin-left: 0;
        width: 16px;
        height: 16px;
        display: block
    }
    .pick-wrapper .pick-or {
        padding: 0 5px
    }
}

@media (max-width:1000px) {
    .pick-wrapper .pick,
    .pick-wrapper .pick-numbers {
        font-size: 10px
    }
}

@media (max-width:900px) {
    .pick-wrapper .pick {
        font-size: 13px
    }
    .pick-wrapper .pick-numbers {
        font-size: 12px
    }
}

@media (max-width:885px) {
    .pick-wrapper .pick-or {
        padding: 0 15px;
        margin: 0 5px
    }
}

.styles_controller__oPKzb {
    display: flex;
    background: #333a48;
    padding: 20px;
    border-radius: 5px;
    margin-top: 20px
}

.styles_item__JKQ0t {
    display: flex;
    font-size: 10px;
    text-transform: uppercase;
    width: 50%
}

.styles_item__JKQ0t:first-child {
    width: calc(50% - 15px);
    margin-right: 15px
}

.styles_item__JKQ0t:first-child .styles_badge__3j33m {
    font-size: 16px;
    padding: 0 11px
}

.styles_item__JKQ0t:last-child {
    justify-content: flex-end
}

.styles_badge__3j33m {
    padding: 0 6px;
    outline: none;
    background: #fff;
    border-radius: 21px;
    height: 30px;
    line-height: 28px;
    font-size: 14px;
    color: #fff;
    border: 1px solid #62ca5b
}

.styles_badge__3j33m.styles_empty__3JP_L {
    padding: 0 11px
}

.styles_badge__3j33m:not([disabled]) {
    -webkit-transition: background .3s;
    transition: background .3s;
    cursor: pointer
}

.styles_badge__3j33m:not([disabled]):hover {
    background: #50c448
}

.styles_label__2Br1i {
    padding-right: 10px
}

@media (max-width:1099px) {
    .styles_controller__oPKzb {
        flex-direction: column;
        padding: 0;
        background: transparent
    }
    .styles_controller__oPKzb .styles_item__JKQ0t {
        width: 100%;
        justify-content: flex-start;
        background: #333a48;
        height: 45px;
        align-items: center;
        padding: 0 10px;
        border-radius: 6px;
        margin: 0
    }
    .styles_controller__oPKzb .styles_item__JKQ0t .styles_badge__3j33m {
        margin-left: auto;
        height: 25px;
        line-height: 25px;
        font-size: 13px
    }
    .styles_controller__oPKzb .styles_item__JKQ0t:first-child {
        margin-bottom: 10px
    }
}

@media (max-width:900px) {
    .styles_controller__oPKzb {
        flex-direction: row;
        padding: 15px;
        background: #333a48
    }
    .styles_controller__oPKzb .styles_item__JKQ0t {
        height: auto;
        width: 50%;
        background: transparent;
        padding: 0;
        border-radius: 0
    }
    .styles_controller__oPKzb .styles_item__JKQ0t .styles_badge__3j33m {
        margin: 0;
        height: 30px;
        line-height: 25px;
        font-size: 12px
    }
    .styles_controller__oPKzb .styles_item__JKQ0t:first-child {
        width: calc(50% - 15px);
        margin: 0 15px 0 0
    }
    .styles_controller__oPKzb .styles_item__JKQ0t:first-child .styles_badge__3j33m {
        padding: 0 11px
    }
    .styles_controller__oPKzb .styles_item__JKQ0t:last-child {
        justify-content: flex-end
    }
}

.sidebar_BetGroup__3jwn7 {
    display: flex;
    position: relative;
    justify-content: space-around;
    margin-bottom: 15px
}

.sidebar_BetGroup__3jwn7 .form-row {
    margin-bottom: 0
}

.sidebar_BetGroup__3jwn7>.form-row {
    width: 50%
}

.sidebar_BetGroup__3jwn7>.form-row:first-child {
    margin-right: 7px
}

.sidebar_BetGroup__3jwn7.sidebar_withOutMargin__35Tyc,
.sidebar_BetGroup__3jwn7:not(.sidebar_withMargin__ODKw-)+.form-row {
    margin-bottom: 0
}

.sidebar_MobileWrapper__ySCeM .form-label {
    opacity: 0;
    visibility: hidden
}

.sidebar_MobileWrapper__ySCeM .btn.btn-play {
    font-size: 14px;
    height: 44px
}

.sidebar_MobileWrapper__ySCeM .bet-number {
    padding-left: 19px;
    font-size: inherit;
    color: #fff
}

.sidebar_MobileWrapper__ySCeM .bet-number svg {
    left: -20px;
    fill: #62ca5b
}

.sidebar_MobileWrapper__ySCeM.sidebar_inPlay__3B5cw .form-label {
    text-align: right;
    opacity: 1;
    visibility: visible
}


   .odometer.odometer-auto-theme, .odometer.odometer-theme-default {
  display: inline-block;
  vertical-align: middle;
  *vertical-align: auto;
  *zoom: 1;
  *display: inline;
  position: relative;
}
.odometer.odometer-auto-theme .odometer-digit, .odometer.odometer-theme-default .odometer-digit {
  display: inline-block;
  vertical-align: middle;
  *vertical-align: auto;
  *zoom: 1;
  *display: inline;
  position: relative;
}
.odometer.odometer-auto-theme .odometer-digit .odometer-digit-spacer, .odometer.odometer-theme-default .odometer-digit .odometer-digit-spacer {
  display: inline-block;
  vertical-align: middle;
  *vertical-align: auto;
  *zoom: 1;
  *display: inline;
  visibility: hidden;
}
.odometer.odometer-auto-theme .odometer-digit .odometer-digit-inner, .odometer.odometer-theme-default .odometer-digit .odometer-digit-inner {
  text-align: left;
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  overflow: hidden;
}
.odometer.odometer-auto-theme .odometer-digit .odometer-ribbon, .odometer.odometer-theme-default .odometer-digit .odometer-ribbon {
  display: block;
}
.odometer.odometer-auto-theme .odometer-digit .odometer-ribbon-inner, .odometer.odometer-theme-default .odometer-digit .odometer-ribbon-inner {
  display: block;
  -webkit-backface-visibility: hidden;
}
.odometer.odometer-auto-theme .odometer-digit .odometer-value, .odometer.odometer-theme-default .odometer-digit .odometer-value {
  display: block;
  -webkit-transform: translateZ(0);
}
.odometer.odometer-auto-theme .odometer-digit .odometer-value.odometer-last-value, .odometer.odometer-theme-default .odometer-digit .odometer-value.odometer-last-value {
  position: absolute;
}
.odometer.odometer-auto-theme.odometer-animating-up .odometer-ribbon-inner, .odometer.odometer-theme-default.odometer-animating-up .odometer-ribbon-inner {
  -webkit-transition: -webkit-transform 2s;
  -moz-transition: -moz-transform 2s;
  -ms-transition: -ms-transform 2s;
  -o-transition: -o-transform 2s;
  transition: transform 2s;
}
.odometer.odometer-auto-theme.odometer-animating-up.odometer-animating .odometer-ribbon-inner, .odometer.odometer-theme-default.odometer-animating-up.odometer-animating .odometer-ribbon-inner {
  -webkit-transform: translateY(-100%);
  -moz-transform: translateY(-100%);
  -ms-transform: translateY(-100%);
  -o-transform: translateY(-100%);
  transform: translateY(-100%);
}
.odometer.odometer-auto-theme.odometer-animating-down .odometer-ribbon-inner, .odometer.odometer-theme-default.odometer-animating-down .odometer-ribbon-inner {
  -webkit-transform: translateY(-100%);
  -moz-transform: translateY(-100%);
  -ms-transform: translateY(-100%);
  -o-transform: translateY(-100%);
  transform: translateY(-100%);
}
.odometer.odometer-auto-theme.odometer-animating-down.odometer-animating .odometer-ribbon-inner, .odometer.odometer-theme-default.odometer-animating-down.odometer-animating .odometer-ribbon-inner {
  -webkit-transition: -webkit-transform 2s;
  -moz-transition: -moz-transform 2s;
  -ms-transition: -ms-transform 2s;
  -o-transition: -o-transform 2s;
  transition: transform 2s;
  -webkit-transform: translateY(0);
  -moz-transform: translateY(0);
  -ms-transform: translateY(0);
  -o-transform: translateY(0);
  transform: translateY(0);
}

.odometer.odometer-auto-theme, .odometer.odometer-theme-default {
  font-family: "Helvetica Neue", sans-serif;
  line-height: 1.1em;
}
.odometer.odometer-auto-theme .odometer-value, .odometer.odometer-theme-default .odometer-value {
  text-align: center;
}
   </style>
    <script>
                       /*! odometer 0.4.6 */
(function(){var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G=[].slice;q='<span class="odometer-value"></span>',n='<span class="odometer-ribbon"><span class="odometer-ribbon-inner">'+q+"</span></span>",d='<span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner">'+n+"</span></span>",g='<span class="odometer-formatting-mark"></span>',c="(,ddd).dd",h=/^\(?([^)]*)\)?(?:(.)(d+))?$/,i=30,f=2e3,a=20,j=2,e=.5,k=1e3/i,b=1e3/a,o="transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd",y=document.createElement("div").style,p=null!=y.transition||null!=y.webkitTransition||null!=y.mozTransition||null!=y.oTransition,w=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.msRequestAnimationFrame,l=window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver,s=function(a){var b;return b=document.createElement("div"),b.innerHTML=a,b.children[0]},v=function(a,b){return a.className=a.className.replace(new RegExp("(^| )"+b.split(" ").join("|")+"( |$)","gi")," ")},r=function(a,b){return v(a,b),a.className+=" "+b},z=function(a,b){var c;return null!=document.createEvent?(c=document.createEvent("HTMLEvents"),c.initEvent(b,!0,!0),a.dispatchEvent(c)):void 0},u=function(){var a,b;return null!=(a=null!=(b=window.performance)?"function"==typeof b.now?b.now():void 0:void 0)?a:+new Date},x=function(a,b){return null==b&&(b=0),b?(a*=Math.pow(10,b),a+=.5,a=Math.floor(a),a/=Math.pow(10,b)):Math.round(a)},A=function(a){return 0>a?Math.ceil(a):Math.floor(a)},t=function(a){return a-x(a)},C=!1,(B=function(){var a,b,c,d,e;if(!C&&null!=window.jQuery){for(C=!0,d=["html","text"],e=[],b=0,c=d.length;c>b;b++)a=d[b],e.push(function(a){var b;return b=window.jQuery.fn[a],window.jQuery.fn[a]=function(a){var c;return null==a||null==(null!=(c=this[0])?c.odometer:void 0)?b.apply(this,arguments):this[0].odometer.update(a)}}(a));return e}})(),setTimeout(B,0),m=function(){function a(b){var c,d,e,g,h,i,l,m,n,o,p=this;if(this.options=b,this.el=this.options.el,null!=this.el.odometer)return this.el.odometer;this.el.odometer=this,m=a.options;for(d in m)g=m[d],null==this.options[d]&&(this.options[d]=g);null==(h=this.options).duration&&(h.duration=f),this.MAX_VALUES=this.options.duration/k/j|0,this.resetFormat(),this.value=this.cleanValue(null!=(n=this.options.value)?n:""),this.renderInside(),this.render();try{for(o=["innerHTML","innerText","textContent"],i=0,l=o.length;l>i;i++)e=o[i],null!=this.el[e]&&!function(a){return Object.defineProperty(p.el,a,{get:function(){var b;return"innerHTML"===a?p.inside.outerHTML:null!=(b=p.inside.innerText)?b:p.inside.textContent},set:function(a){return p.update(a)}})}(e)}catch(q){c=q,this.watchForMutations()}}return a.prototype.renderInside=function(){return this.inside=document.createElement("div"),this.inside.className="odometer-inside",this.el.innerHTML="",this.el.appendChild(this.inside)},a.prototype.watchForMutations=function(){var a,b=this;if(null!=l)try{return null==this.observer&&(this.observer=new l(function(){var a;return a=b.el.innerText,b.renderInside(),b.render(b.value),b.update(a)})),this.watchMutations=!0,this.startWatchingMutations()}catch(c){a=c}},a.prototype.startWatchingMutations=function(){return this.watchMutations?this.observer.observe(this.el,{childList:!0}):void 0},a.prototype.stopWatchingMutations=function(){var a;return null!=(a=this.observer)?a.disconnect():void 0},a.prototype.cleanValue=function(a){var b;return"string"==typeof a&&(a=a.replace(null!=(b=this.format.radix)?b:".","<radix>"),a=a.replace(/[.,]/g,""),a=a.replace("<radix>","."),a=parseFloat(a,10)||0),x(a,this.format.precision)},a.prototype.bindTransitionEnd=function(){var a,b,c,d,e,f,g=this;if(!this.transitionEndBound){for(this.transitionEndBound=!0,b=!1,e=o.split(" "),f=[],c=0,d=e.length;d>c;c++)a=e[c],f.push(this.el.addEventListener(a,function(){return b?!0:(b=!0,setTimeout(function(){return g.render(),b=!1,z(g.el,"odometerdone")},0),!0)},!1));return f}},a.prototype.resetFormat=function(){var a,b,d,e,f,g,i,j;if(a=null!=(i=this.options.format)?i:c,a||(a="d"),d=h.exec(a),!d)throw new Error("Odometer: Unparsable digit format");return j=d.slice(1,4),g=j[0],f=j[1],b=j[2],e=(null!=b?b.length:void 0)||0,this.format={repeating:g,radix:f,precision:e}},a.prototype.render=function(a){var b,c,d,e,f,g,h,i,j,k,l,m;for(null==a&&(a=this.value),this.stopWatchingMutations(),this.resetFormat(),this.inside.innerHTML="",g=this.options.theme,b=this.el.className.split(" "),f=[],i=0,k=b.length;k>i;i++)c=b[i],c.length&&((e=/^odometer-theme-(.+)$/.exec(c))?g=e[1]:/^odometer(-|$)/.test(c)||f.push(c));for(f.push("odometer"),p||f.push("odometer-no-transitions"),f.push(g?"odometer-theme-"+g:"odometer-auto-theme"),this.el.className=f.join(" "),this.ribbons={},this.digits=[],h=!this.format.precision||!t(a)||!1,m=a.toString().split("").reverse(),j=0,l=m.length;l>j;j++)d=m[j],"."===d&&(h=!0),this.addDigit(d,h);return this.startWatchingMutations()},a.prototype.update=function(a){var b,c=this;return a=this.cleanValue(a),(b=a-this.value)?(v(this.el,"odometer-animating-up odometer-animating-down odometer-animating"),b>0?r(this.el,"odometer-animating-up"):r(this.el,"odometer-animating-down"),this.stopWatchingMutations(),this.animate(a),this.startWatchingMutations(),setTimeout(function(){return c.el.offsetHeight,r(c.el,"odometer-animating")},0),this.value=a):void 0},a.prototype.renderDigit=function(){return s(d)},a.prototype.insertDigit=function(a,b){return null!=b?this.inside.insertBefore(a,b):this.inside.children.length?this.inside.insertBefore(a,this.inside.children[0]):this.inside.appendChild(a)},a.prototype.addSpacer=function(a,b,c){var d;return d=s(g),d.innerHTML=a,c&&r(d,c),this.insertDigit(d,b)},a.prototype.addDigit=function(a,b){var c,d,e,f;if(null==b&&(b=!0),"-"===a)return this.addSpacer(a,null,"odometer-negation-mark");if("."===a)return this.addSpacer(null!=(f=this.format.radix)?f:".",null,"odometer-radix-mark");if(b)for(e=!1;;){if(!this.format.repeating.length){if(e)throw new Error("Bad odometer format without digits");this.resetFormat(),e=!0}if(c=this.format.repeating[this.format.repeating.length-1],this.format.repeating=this.format.repeating.substring(0,this.format.repeating.length-1),"d"===c)break;this.addSpacer(c)}return d=this.renderDigit(),d.querySelector(".odometer-value").innerHTML=a,this.digits.push(d),this.insertDigit(d)},a.prototype.animate=function(a){return p&&"count"!==this.options.animation?this.animateSlide(a):this.animateCount(a)},a.prototype.animateCount=function(a){var c,d,e,f,g,h=this;if(d=+a-this.value)return f=e=u(),c=this.value,(g=function(){var i,j,k;return u()-f>h.options.duration?(h.value=a,h.render(),void z(h.el,"odometerdone")):(i=u()-e,i>b&&(e=u(),k=i/h.options.duration,j=d*k,c+=j,h.render(Math.round(c))),null!=w?w(g):setTimeout(g,b))})()},a.prototype.getDigitCount=function(){var a,b,c,d,e,f;for(d=1<=arguments.length?G.call(arguments,0):[],a=e=0,f=d.length;f>e;a=++e)c=d[a],d[a]=Math.abs(c);return b=Math.max.apply(Math,d),Math.ceil(Math.log(b+1)/Math.log(10))},a.prototype.getFractionalDigitCount=function(){var a,b,c,d,e,f,g;for(e=1<=arguments.length?G.call(arguments,0):[],b=/^\-?\d*\.(\d*?)0*$/,a=f=0,g=e.length;g>f;a=++f)d=e[a],e[a]=d.toString(),c=b.exec(e[a]),e[a]=null==c?0:c[1].length;return Math.max.apply(Math,e)},a.prototype.resetDigits=function(){return this.digits=[],this.ribbons=[],this.inside.innerHTML="",this.resetFormat()},a.prototype.animateSlide=function(a){var b,c,d,f,g,h,i,j,k,l,m,n,o,p,q,s,t,u,v,w,x,y,z,B,C,D,E;if(s=this.value,j=this.getFractionalDigitCount(s,a),j&&(a*=Math.pow(10,j),s*=Math.pow(10,j)),d=a-s){for(this.bindTransitionEnd(),f=this.getDigitCount(s,a),g=[],b=0,m=v=0;f>=0?f>v:v>f;m=f>=0?++v:--v){if(t=A(s/Math.pow(10,f-m-1)),i=A(a/Math.pow(10,f-m-1)),h=i-t,Math.abs(h)>this.MAX_VALUES){for(l=[],n=h/(this.MAX_VALUES+this.MAX_VALUES*b*e),c=t;h>0&&i>c||0>h&&c>i;)l.push(Math.round(c)),c+=n;l[l.length-1]!==i&&l.push(i),b++}else l=function(){E=[];for(var a=t;i>=t?i>=a:a>=i;i>=t?a++:a--)E.push(a);return E}.apply(this);for(m=w=0,y=l.length;y>w;m=++w)k=l[m],l[m]=Math.abs(k%10);g.push(l)}for(this.resetDigits(),D=g.reverse(),m=x=0,z=D.length;z>x;m=++x)for(l=D[m],this.digits[m]||this.addDigit(" ",m>=j),null==(u=this.ribbons)[m]&&(u[m]=this.digits[m].querySelector(".odometer-ribbon-inner")),this.ribbons[m].innerHTML="",0>d&&(l=l.reverse()),o=C=0,B=l.length;B>C;o=++C)k=l[o],q=document.createElement("div"),q.className="odometer-value",q.innerHTML=k,this.ribbons[m].appendChild(q),o===l.length-1&&r(q,"odometer-last-value"),0===o&&r(q,"odometer-first-value");return 0>t&&this.addDigit("-"),p=this.inside.querySelector(".odometer-radix-mark"),null!=p&&p.parent.removeChild(p),j?this.addSpacer(this.format.radix,this.digits[j-1],"odometer-radix-mark"):void 0}},a}(),m.options=null!=(E=window.odometerOptions)?E:{},setTimeout(function(){var a,b,c,d,e;if(window.odometerOptions){d=window.odometerOptions,e=[];for(a in d)b=d[a],e.push(null!=(c=m.options)[a]?(c=m.options)[a]:c[a]=b);return e}},0),m.init=function(){var a,b,c,d,e,f;if(null!=document.querySelectorAll){for(b=document.querySelectorAll(m.options.selector||".odometer"),f=[],c=0,d=b.length;d>c;c++)a=b[c],f.push(a.odometer=new m({el:a,value:null!=(e=a.innerText)?e:a.textContent}));return f}},null!=(null!=(F=document.documentElement)?F.doScroll:void 0)&&null!=document.createEventObject?(D=document.onreadystatechange,document.onreadystatechange=function(){return"complete"===document.readyState&&m.options.auto!==!1&&m.init(),null!=D?D.apply(this,arguments):void 0}):document.addEventListener("DOMContentLoaded",function(){return m.options.auto!==!1?m.init():void 0},!1),"function"==typeof define&&define.amd?define(["jquery"],function(){return m}):typeof exports===!1?module.exports=m:window.Odometer=m}).call(this);
                   </script>
  </body>
</html>