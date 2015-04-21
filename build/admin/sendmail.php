<?php
//Database class include
	include_once 'initialize.php';
//Mail sender class include
	include_once 'libs/phpmailer/class.phpmailer.php';

//Add form data to variables
	if(isset($_REQUEST["subject"])){
		$subject = $_REQUEST["subject"];
	}
	if(isset($_REQUEST["from"])){
		$from = $_REQUEST["from"];
	}
	if(isset($_REQUEST["Name"])){
		$name = $_REQUEST["Name"];
	}
	if(isset($_REQUEST["Phone"])){
		$phone = $_REQUEST["Phone"];
	}
	if(isset($_REQUEST["Email"])){
		$email = $_REQUEST["Email"];
	}

	$utm_source = $_REQUEST['utm_source'];
	$type       = $_REQUEST['type'];
	$source     = $_REQUEST['source'];
	$keyword    = $_REQUEST['keyword'];
	$time = date('Y-m-d H:i:s');

//New leads data array
	$new_lead = array(
        'name'       => $name,
        'email'      => $email,
        'phone'      => $phone,
        'utm_source' => $utm_source,
        'type'       => $type,
        'source'     => $source,
        'keyword'    => $keyword,
        'addDate'    => $time
    );

if($name && $phone) {

    //***********************************************************
    //Check data is it already added and add or update
    //***********************************************************
        Database::Add($new_lead);

    //***********************************************************
    //Email body
    //***********************************************************

    $message = '

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <!-- If you delete this meta tag, Half Life 3 will never be released. -->
        <meta name="viewport" content="width=device-width" />

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Заявка</title>

        <style>
            /* -------------------------------------
                    GLOBAL
            ------------------------------------- */
            * {
                margin:0;
                padding:0;
            }
            * { font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; }


            .collapse {
                margin:0;
                padding:0;
            }
            body {
                -webkit-font-smoothing:antialiased;
                -webkit-text-size-adjust:none;
                width: 100%!important;
                height: 100%;
            }


            /* -------------------------------------
                    ELEMENTS
            ------------------------------------- */
            a { color: #2BA6CB;}

            .btn {
                text-decoration:none;
                color: #FFF;
                background-color: #666;
                padding:10px 16px;
                font-weight:bold;
                margin-right:10px;
                text-align:center;
                cursor:pointer;
                display: inline-block;
            }

            p.callout {
                padding:15px;
                background-color:#ECF8FF;
                margin-bottom: 15px;
            }
            .callout a {
                font-weight:bold;
                color: #2BA6CB;
            }

            .sidebar .soc-btn {
                display:block;
                width:100%;
            }

            /* -------------------------------------
                    HEADER
            ------------------------------------- */
            table.head-wrap { width: 100%;}

            .header.container table td.logo { padding: 15px; }
            .header.container table td.label { padding: 15px; padding-left:0px;}


            /* -------------------------------------
                    BODY
            ------------------------------------- */
            table.body-wrap { width: 100%;}
            table.table-hover > tbody > tr:hover > td, table.table-hover > tbody > tr:hover > th {background-color: #f5f5f5; }

            /* -------------------------------------
                    FOOTER
            ------------------------------------- */
            table.footer-wrap { width: 100%;	clear:both!important;
            }
            .footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
            .footer-wrap .container td.content p {
                font-size:10px;
                font-weight: bold;

            }


            /* -------------------------------------
                    TYPOGRAPHY
            ------------------------------------- */
            h1,h2,h3,h4,h5,h6 {
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
            }
            h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

            h1 { font-weight:200; font-size: 44px;}
            h2 { font-weight:200; font-size: 37px;}
            h3 { font-weight:500; font-size: 27px;}
            h4 { font-weight:500; font-size: 23px;}
            h5 { font-weight:900; font-size: 17px;}
            h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

            .collapse { margin:0!important;}

            p, ul {
                margin-bottom: 10px;
                font-weight: normal;
                font-size:14px;
                line-height:1.6;
            }
            p.lead { font-size:17px; }
            p.last { margin-bottom:0px;}

            ul li {
                margin-left:5px;
                list-style-position: inside;
            }



            /* ---------------------------------------------------
                    RESPONSIVENESS
                    Nuke it from orbit. Its the only way to be sure
            ------------------------------------------------------ */

            /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
            .container {
                display:block!important;
                max-width:600px!important;
                margin:0 auto!important; /* makes it centered */
                clear:both!important;
            }

            /* This should also be a block element, so that it will fill 100% of the .container */
            .content {
                padding:15px;
                max-width:600px;
                margin:0 auto;
                display:block;
            }

            /* Lets make sure tables in the content area are 100% wide */
            .content table { width: 100%; }


            /* Odds and ends */
            .column {
                width: 300px;
                float:left;
            }
            .column tr td { padding: 15px; }
            .column-wrap {
                padding:0!important;
                margin:0 auto;
                max-width:600px!important;
            }
            .column table { width:100%;}
            .social .column {
                width: 280px;
                min-width: 279px;
                float:left;
            }

            /* Be sure to place a .clear element after each set of columns, just to be safe */
            .clear { display: block; clear: both; }


            /* -------------------------------------------
                    PHONE
                    For clients that support media queries.
                    Nothing fancy.
            -------------------------------------------- */
            @media only screen and (max-width: 600px) {

                a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

                div[class="column"] { width: auto!important; float:none!important;}

                table.social div[class="column"] {
                    width:auto!important;
                }

            }
        </style>
    </head>

    <body bgcolor="#FFFFFF">

    <!-- HEADER -->
    <table class="head-wrap" style="background: url('.$site.'/admin/img/top_bg.png) left bottom repeat-x, #E1EDF5;width: 100%;">
        <tr>
            <td></td>
            <td class="header container" >

                    <div class="content">
                    <table style="width:100%;">
                        <tr>
                            <td><img src="'.$site.'/admin/img/logo.png" height="81" width="246" alt=""></td>
                            <td align="right"><i style="font-size: 16px;">Звоните нам в любое удобное время<br><b style="font-size: 30px;">8 (727) 391 10 77</b></i></td>
                        </tr>
                    </table>
                    </div>

            </td>
            <td></td>
        </tr>
    </table><!-- /HEADER -->

    <!-- BODY -->
    <table class="body-wrap">
        <tr>
            <td></td>
            <td class="container" bgcolor="#FFFFFF">

                <div class="content">
                <table>
                    <tr>
                        <td colspan="2">
                            <h3 style="text-align: center; padding-top: 20px;">Доброго времени суток!</h3>
                            <p class="lead">Вам поступила заявка с сайта '.$site.' '.$from.'</p>
                            <p class="lead">Информация о лиде:</p>

                            <!-- Email data -->
                            <table  class="table-hover" style="border-collapse: collapse;width:100%; "><tbody>
                            <tr style="border-bottom: 1px solid #dddddd;"><td style="padding:5px;">Имя: </td><td style="padding:5px;">'.$name.'</td></tr>
                            <tr style="border-bottom: 1px solid #dddddd;"><td style="padding:5px;">Телефон: </td><td style="padding:5px;">'.$phone.'</td></tr>
                            ';


        if($email){
            $message .= '<tr style="border-bottom: 1px solid #dddddd;"><td style="padding:5px;">Email: </td><td style="padding:5px;"> '.$email .'</td></tr>';
        }


        if($utm_source){
            $message .= '<tr style="border-bottom: 1px solid #dddddd;"><td style="padding:5px;">Источник лида:  </td><td style="padding:5px;"> '.$utm_source.' </td></tr>
                                <tr style="border-bottom: 1px solid #dddddd;"><td style="padding:5px;">Тип источника:  </td><td style="padding:5px;"> '.$type.'       </td></tr>
                                <tr style="border-bottom: 1px solid #dddddd;"><td style="padding:5px;">Площадка:       </td><td style="padding:5px;"> '.$source.'     </td></tr>
                                <tr style="border-bottom: 1px solid #dddddd;"><td style="padding:5px;">Ключевое слово: </td><td style="padding:5px;"> '.$keyword.'    </td></tr>';
        }


        $message .= '
                            </tbody></table>
                            <br />
                            <h4>Ответ  на заявку в течение 30 минут повышает вероятность закрытия сделки на 30%</h4>

                            <!-- social & contact -->
                            <table class="social" width="100%" style="background-color: #ebebeb;">
                                <tr>
                                    <td align="left" style="padding: 15px;">
                                        <!-- column 1 -->
                                            <h5 class="">Следите за нами в соц. сетях:</h5>
                                            <p class="">
                                                <a href="https://www.facebook.com/clikobilie" style="padding: 3px 7px; font-size:12px; margin-bottom:10px; text-decoration:none; color: #FFF;font-weight:bold; display:block; text-align:center;background-color: #3B5998!important;">Facebook</a>
                                                <a href="https://twitter.com/clickobility" style="padding: 3px 7px; font-size:12px; margin-bottom:10px; text-decoration:none; color: #FFF;font-weight:bold; display:block; text-align:center;background-color: #1daced!important;">Twitter</a>
                                                <a href="http://vk.com/clickability" style="padding: 3px 7px; font-size:12px; margin-bottom:10px; text-decoration:none; color: #FFF;font-weight:bold; display:block; text-align:center;background-color: #6383a8!important;">Вконтакте</a>
                                            </p>
                                    </td>
                                    <td style="padding-top: 15px;vertical-align:top;">

                                        <h5 class="">Наши контакты:</h5>
                                        <p>
                                            Телефон: <strong>8 (727) 391 10 77</strong><br/>
                                            Email:   <strong><a href="emailto:salem@cpc.kz">salem@cpc.kz</a></strong><br/>
                                            Адрес:   <strong>г.Алматы, мкр Баганашыл, Яблоневый сад 11А, 050023</strong>
                                        </p>

                                    </td>
                                </tr>
                            </table><!-- /social & contact -->

                        </td>
                    </tr>

                </table>
                </div><!-- /content -->

            </td>
            <td></td>
        </tr>
    </table><!-- /BODY -->

    <!-- FOOTER -->
    <table class="footer-wrap" style="width:100%;">
        <tr>
            <td align="center">
                <p>
                    <a href="cpc.kz">&copy;'.date(Y).' cpc.kz</a>
                </p>
            </td>
        </tr>
    </table><!-- /FOOTER -->

    </body>
    </html>
    ';

    //***********************************************************
    //PHPMailer
    //***********************************************************
        $mail            = new PHPMailer();
        $mail->CharSet = 'UTF-8';

        if($is_smtp){
            $mail->IsSMTP();
            $mail->SMTPAuth  = true;
            $mail->Host      = $from_server;
            $mail->Port      = 25;
            $mail->Username  = $mailfrom;
            $mail->Password  = $mailpassword;
        }

        // $mail->SMTPDebug  = 2; // enables SMTP debug information (for testing)

        $mail->SetFrom($mailfrom, $mailfrom);
        $mail->Subject = $subject;
        $mail->AltBody = "Чтобы увидеть письмо, пожалуйста, используйте HTML-совместимый почтовый сервис!";
        $mail->MsgHTML($message);

        //Set recipients addresses
        if($address1){
            $mail->AddAddress($address1, $address1);
        }
        if($address2){
            $mail->AddAddress($address2, $address2);
        }
        if($address3){
            $mail->AddAddress($address3, $address3);
        }
        if($address4){
            $mail->AddAddress($address4, $address4);
        }
        if($address5){
            $mail->AddAddress($address5, $address5);
        }

        //File attachment
        if (!empty($_FILES['Files']['name'])) {
            $mail->AddAttachment($_FILES['Files']['tmp_name'], $_FILES['Files']['name']);
        }

        //***********************************************************
        //Check to send an email
        //***********************************************************
        if(!$mail->Send()) {
            echo "Ошибка в передаче данных! Пожалуйста вернитесь назад и попробуйте заново.";
        } else {
            header('Location: '.$success_url);
            exit;
        }

}
    
?>
