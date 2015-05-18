<?php
	//Main page configuration
	require_once "config.php";
    $url = $_SERVER['HTTP_HOST'];

	//UTM
	if($_GET['utm_source'] === "yandex"){
		$utm_source = $_GET['utm_source'];
		$type       = $_GET['type'];
		$source     = $_GET['source'];
		$keyword    = $_GET['keyword'];
	}elseif($_GET['utm_source'] === "google"){
		$utm_source = $_GET['utm_source'];
		$type       = $_GET['network'];
		$source     = $_GET['placement'];
		$keyword    = $_GET['utm_term'];
	}else{
		$utm_source = $_GET['utm_source'];
		$type       = $_GET['utm_medium'];
		$source     = $_GET['utm_campaign'];
		$keyword    = "";
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=1100">


	<!-- Prioritize above the fold content (Critical path CSS) -->
		<style>
            * { box-sizing: border-box; }
            html { line-height: 1; }
            a, body, header, section { margin: 0; padding: 0; border: 0; font-family: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: inherit; font-size: 100%; vertical-align: baseline; }
            article, figcaption, figure, footer, header, main, menu, nav, section { display: block; }
            .container { max-width: 960px; margin-left: auto; margin-right: auto; position: relative; height: 100%; }
            a { text-decoration: none; color: inherit; }
            a img { border: none; }
            .scroll-up,
            .mfp-hide { display: none; }
            button { border: none; background-color: transparent; }
		</style>


	<!-- SEO Info -->
		<title><?=$title; ?></title>
		<meta name="description" content="<?=$description; ?>">
		<meta name="keywords" content="">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


	<!-- Include Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>

	<!-- Open Graph data for social media share -->
		<meta property="og:title" content="<?=$title; ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?=$url; ?>" />
		<meta property="og:image" content="img/logo.png" />
		<meta property="og:description" content="<?=$description; ?>" />


	<!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', <?=$ga_id; ?>, 'auto');
        ga('require', 'displayfeatures');
        ga('send', 'pageview');
    </script>
</head>
<body>

<!-- Above the fold content (Critical path) -->

<!--================================================
                    #header
=================================================-->
    <header class="header">
        <div class="container">
            <a class="header__logo" href=""><img src="img/logo.png" width="165" height="70" alt=""/></a>
            <div class="header__phones">
                <a class="header__phones-link" href="tel:+7 (727) 777 77 77">+7 (727) 777 77 77</a>
                <a class="btn header__phones-btn jsModalTrigger"
                   href="#jsModalForm"
                   data-title="ОСТАВЬТЕ СВОИ КОНТАКТЫ"
                   data-subtitle="НАШИ МЕНЕДЖЕРЫ ПЕРЕЗВОНЯТ ВАМ И ОТВЕТЯТ НА ВАШИ ВОПРОСЫ"
                   data-text="Текст 3"
                   data-subject="Текст 4"
                   data-from="Текст 5"
                   data-btn="Заказать звонок"
                        >Заказать звонок</a>
            </div>
        </div>
    </header><!-- /.header -->


<!--================================================
                    #main
=================================================-->
    <main class="main">
        <div class="container">
            <h1 class="title main__title">LPDevplate</h1>
            <h2 class="main__subtitle">Lorem ipsum dolor sit amet</h2>
            <form class="form main__form" id="jsForm_1" action="admin/bootstrap.php" method="post">
                <h2 class="form__title">Заполните заявку <br/> и получите скидку!</h2>
                <div class="form__container">
                    <div class="form__errorbox">
                        <input type="text" class="form__input" name="Name" placeholder="Имя *" onfocus="if (this.placeholder=='Имя *') this.placeholder='' " onblur="if (this.placeholder==''){this.placeholder='Имя *'}">
                    </div>
                    <div class="form__errorbox">
                        <input class="form__input phone" name="Phone" placeholder="Телефон *" type="text">
                    </div>
                    <div class="form__errorbox">
                        <input type="text" class="form__input" name="Email" placeholder="Email" onfocus="if (this.placeholder=='Email') this.placeholder='' " onblur="if (this.placeholder==''){this.placeholder='Email'}">
                    </div>
                        <input type="hidden" name="subject" value="Заявка на заказ">
                        <input type="hidden" name="from" value="ОТПРАВИТЬ ЗАЯВКУ в первом скроле ">
                        <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>">
                        <input type="hidden" name="type"       value="<?php echo $type; ?>">
                        <input type="hidden" name="source"     value="<?php echo $source; ?>">
                        <input type="hidden" name="keyword"    value="<?php echo $keyword; ?>">
                    <button class="btn main__form-btn">ОТПРАВИТЬ ЗАЯВКУ</button>
                </div>
            </form>
        </div><!-- /.container -->
    </main><!-- /.main -->

<!-- End above the fold content (Critical path) -->

<!--*****************************************************************************************************************-->

<!-- Other page markup -->

    <link rel="stylesheet" href="css/styles.min.css"/>

<!--================================================
					#footer
=================================================-->
	<footer class="footer">
		<div class="container">
			<div class="footer__left">&copy; 2015. CompanyName</div>
			<div class="footer__center">
				<h3>Contacts:</h3>
				<p>Almaty city, Yablonevyi sad st. 11a</p>
				<p><a href="tel:+7 777 777 77 77">+7 777 777 77 77</a></p>
			</div>
			<div class="footer__right">Another info</div>
		</div><!-- /.container -->
		<a class="footer__created-by" href="http://cpc.kz/landing"><img class="lazyload" data-src="img/created.png" width="200" height="89" alt=""/></a>
	</footer><!-- /.footer -->

<!--================================================
					#Hidden part of page
================================================-->
<!-- #Scroll Up Button -->
	<div id="jsScrollTop" class="scroll-up"></div>

<!-- #Callback modal form -->
    <div id="jsModalForm" class="zoom-anim-dialog mfp-hide modal">
        <form class="form form--modal" id="jsForm_modal" action="admin/sendmail.php" method="post">
            <h2 class="form__title" id="jsModalTitle">ОСТАВЬТЕ СВОИ КОНТАКТЫ</h2>
            <p class="form__text" id="jsModalSubtitle">НАШИ МЕНЕДЖЕРЫ ПЕРЕЗВОНЯТ ВАМ<br> И ОТВЕТЯТ НА ВАШИ ВОПРОСЫ</p>
            <div class="form__container">
                <div class="form__errorbox">
                    <input type="text" class="form__input" name="Name" placeholder="Имя *" onfocus="if (this.placeholder=='Имя *') this.placeholder='' " onblur="if (this.placeholder==''){this.placeholder='Имя *'}">
                </div>
                <div class="form__errorbox">
                    <input class="form__input phone" name="Phone" placeholder="Телефон *" type="text">
                </div>
                <div class="form__errorbox">
                    <input type="text" class="form__input" name="Email" placeholder="Email" onfocus="if (this.placeholder=='Email') this.placeholder='' " onblur="if (this.placeholder==''){this.placeholder='Email'}">
                </div>

                <input type="hidden" id="jsModalSubject" name="subject" value="Заявка на обратный звонок ">
                <input type="hidden" id="jsModalFrom"    name="from" value="ПОДАТЬ ЗАЯВКУ в шапке сайта ">
                <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>">
                <input type="hidden" name="type"       value="<?php echo $type; ?>">
                <input type="hidden" name="source"     value="<?php echo $source; ?>">
                <input type="hidden" name="keyword"    value="<?php echo $keyword; ?>">

                <button class="btn form--modal__btn" id="jsModalBtn">ОТПРАВИТЬ ЗАЯВКУ</button>
            </div>
        </form>
    </div>

<!-- #Modal window -->
    <div id="jsModalWindow" class="zoom-anim-dialog mfp-hide modal">
        <div class="modal-window__overlay jsModalOverlay"></div>
        <div id="jsModalWindowContainer" class="modal-window__container">

            <button class="modal-window__close jsModalClose">&#10005;</button>
        </div>
    </div>

<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script>

<!-- Custom JavaScript -->
	<script src="js/scripts.min.js"></script>

<!-- Load a custom fonts CSS file -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&amp;subset=latin,cyrillic-ext,cyrillic"/>

<!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter28959100 = new Ya.Metrika({id:<?=$ya_id; ?>,
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
