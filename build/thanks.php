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
	<title>Спасибо за отправленную заявку!</title>
	<meta name="description" content="">

	<!-- Include Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>

	<!-- Include fonts -->
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&amp;subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
	<!-- Include main styles -->
		<link href="css/styles.min.css" rel="stylesheet">
	
	<style>
		html, body{
			height: 100%;
		}
		body{
            min-width: 100%;
			background: url(img/main.jpg) center center no-repeat;
			-webkit-background-size: cover;
			   -moz-background-size: cover;
				    background-size: cover;
			padding-top: 50px;
		}
		.title{
			color: #fff;
			margin-bottom: 30px;}
		.thanks{
			width: 960px;
			margin: 0 auto;
			padding: 30px;
			text-align: center;
			background: rgba(0,0,0,0.5);
		}
		.thanks>h3{
			font-size: 30px;
			color: #fff;
		}

        @media screen and (max-width: 980px) {
            .thanks{
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

    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?=$ga_id; ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?=$gtm_id; ?>');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
	<main class="thanks">
		<h1 class="title">СПАСИБО ВАША ЗАЯВКА УСПЕШНО ПРИНЯТА!</h1>
		<h3>Наши операторы обязательно<br> перезвонят вам в ближайшее время<br> и ответят на все вопросы.<br><br> Благодарим за заявку!</h3>
		<br><a href="/" class="btn">&#9664; ВЕРНУТЬСЯ НА ГЛАВНУЮ</a>
	</main><!-- End main -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter28959100 = new Ya.Metrika({id: <?=$ya_id; ?>,
                        webvisor:true,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true});
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="//mc.yandex.ru/watch/<?=$ya_id; ?>" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

</body>
</html>