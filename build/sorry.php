<?php
    //Main page configuration
    require_once "config.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="http://capitalbank-kredit.kz/favicon2.ico)">
	<title>Спасибо за отправленную заявку!</title>
	<meta name="description" content="">

	<!-- Include fonts -->
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
	<!-- Include main styles -->
		<link href="css/styles.css" rel="stylesheet">
	
	<style>
		        html, body {
            height: 100%;
        }

        body {
            min-width: 100%;
            background: url(images/bg_1_scroll.png) center top no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            padding-top: 50px;
        }

        .title {
            color: #fff;
            margin-bottom: 30px;
        }

        .thanks {
            width: 960px;
            margin: 0 auto;
            padding: 30px;
            text-align: center;
            /*background: rgba(0, 0, 0, 0.5);
            filter:alpha(opacity=82);*/
        }

        .thanks > h3 {
            font-size: 30px;
            color: #fff;
        }

        @media screen and (max-width: 980px) {
            .thanks {
                width: 100%;
            }
        }

	</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<main class="thanks">
		<h1 class="title">ИЗВИНИТЕ! ЗАЯВКА НА ДАННЫЙ НОМЕР <? echo htmlspecialchars($_GET['n'])?> УЖЕ СУЩЕСТВУЕТ.</h1>
		<h3>Заявку можно подавать не чаще, чем раз в сутки<br></h3>
		<br><a href="/" class="button">&#9664; ВЕРНУТЬСЯ НА ГЛАВНУЮ</a>
	</main><!-- End main -->

    
    <!--GA-->
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-70146947-1', 'auto');
	  ga('send', 'pageview');
	</script>
    <!--/GA-->
    
    <!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter33602379 = new Ya.Metrika({ id:33602379, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="https://mc.yandex.ru/watch/33602379" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->

</body>
</html>
