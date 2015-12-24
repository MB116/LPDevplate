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
                <a class="header__phones-link" href="tel:+7%20(727)%20777%2077%2077">+7 (727) 777 77 77</a>
                <a class="btn header__phones-btn jsModalTrigger"
                   href="#jsModalForm"
                   data-title="ОСТАВЬТЕ СВОИ КОНТАКТЫ"
                   data-subtitle="НАШИ МЕНЕДЖЕРЫ ПЕРЕЗВОНЯТ ВАМ И ОТВЕТЯТ НА ВАШИ ВОПРОСЫ"
                   data-text="Текст 3"
                   data-subject="Заявка на заказ звонка"
                   data-from="с кнопки 'Заказать звонок' в шапке сайта"
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
            <h2 class="subtitle main__subtitle">Lorem ipsum dolor sit amet</h2>
            <form class="form main__form" id="jsForm_1" action="admin/sendmail.php" method="post">
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

    <link rel="stylesheet" property="stylesheet" href="css/styles.min.css"/>


<!--================================================
					#footer
=================================================-->
	<footer class="footer">
		<div class="container">
			<div class="footer__col footer__address">
                <h3><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" fill="#fff" viewBox="0 0 430.114 430.114" style="enable-background:new 0 0 430.114 430.114;" xml:space="preserve"> <g> <path id="Facebook_Places" d="M356.208,107.051c-1.531-5.738-4.64-11.852-6.94-17.205C321.746,23.704,261.611,0,213.055,0 C148.054,0,76.463,43.586,66.905,133.427v18.355c0,0.766,0.264,7.647,0.639,11.089c5.358,42.816,39.143,88.32,64.375,131.136 c27.146,45.873,55.314,90.999,83.221,136.106c17.208-29.436,34.354-59.259,51.17-87.933c4.583-8.415,9.903-16.825,14.491-24.857 c3.058-5.348,8.9-10.696,11.569-15.672c27.145-49.699,70.838-99.782,70.838-149.104v-20.262 C363.209,126.938,356.581,108.204,356.208,107.051z M214.245,199.193c-19.107,0-40.021-9.554-50.344-35.939 c-1.538-4.2-1.414-12.617-1.414-13.388v-11.852c0-33.636,28.56-48.932,53.406-48.932c30.588,0,54.245,24.472,54.245,55.06 C270.138,174.729,244.833,199.193,214.245,199.193z"/> </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                    <span>Адрес:</span></h3>
                <p>Almaty city, Yablonevyi sad st. 11a</p>
            </div>
			<div class="footer__col footer__phones">
				<h3><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" fill="#fff" viewBox="0 0 27.442 27.442" style="enable-background:new 0 0 27.442 27.442;" xml:space="preserve"> <g> <path d="M19.494,0H7.948C6.843,0,5.951,0.896,5.951,1.999v23.446c0,1.102,0.892,1.997,1.997,1.997h11.546 c1.103,0,1.997-0.895,1.997-1.997V1.999C21.491,0.896,20.597,0,19.494,0z M10.872,1.214h5.7c0.144,0,0.261,0.215,0.261,0.481 s-0.117,0.482-0.261,0.482h-5.7c-0.145,0-0.26-0.216-0.26-0.482C10.612,1.429,10.727,1.214,10.872,1.214z M13.722,25.469 c-0.703,0-1.275-0.572-1.275-1.276s0.572-1.274,1.275-1.274c0.701,0,1.273,0.57,1.273,1.274S14.423,25.469,13.722,25.469z M19.995,21.1H7.448V3.373h12.547V21.1z"/> <g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                    <span>Телефон:</span></h3>
				<p><a href="tel:+7%20777%20777%2077%2077">+7 777 777 77 77</a></p>
			</div>
			<div class="footer__col footer__email">
				<h3><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 14 14" style="enable-background:new 0 0 14 14;" xml:space="preserve"> <g> <g> <path style="fill:#fff;" d="M7,9L5.268,7.484l-4.952,4.245C0.496,11.896,0.739,12,1.007,12h11.986 c0.267,0,0.509-0.104,0.688-0.271L8.732,7.484L7,9z"/> <path style="fill:#fff;" d="M13.684,2.271C13.504,2.103,13.262,2,12.993,2H1.007C0.74,2,0.498,2.104,0.318,2.273L7,8 L13.684,2.271z"/> <polygon style="fill:#fff;" points="0,2.878 0,11.186 4.833,7.079"/> <polygon style="fill:#fff;" points="9.167,7.079 14,11.186 14,2.875"/> </g> </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                    <span>Email:</span></h3>
				<p><a href="mailto: email@email.com">+7 777 777 77 77</a></p>
			</div>
		</div><!-- /.container -->
		<a class="footer__created-by" href="http://cpc.kz/landing">
            <span>Разработано в </span>
            <img class="lazyload" data-src="img/created.png" width="200" height="32" alt=""/>
        </a>
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
	<script defer src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script>

<!-- Custom JavaScript -->
	<script defer src="js/scripts.min.js"></script>

<!-- Load a custom fonts CSS file -->
	<link rel="stylesheet" property="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&amp;subset=latin,cyrillic-ext,cyrillic"/>

    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?=$ga_id; ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?=$gtm_id; ?>');</script>
    <!-- End Google Tag Manager -->
</body>
</html>
