<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
//Database class include
	//include_once 'initialize.php';
	include_once 'database.php';
//Mail sender class include
	
function send($name, $email, $recipient, $subject, $mail_body)
{##отправка почты
    $header = "MIME-Version: 1.0\n";
    $header .= "Content-type: text/html; charset=\"UTF-8\"\n";
    $header .= "Content-Transfer-Encoding: 8bit\n";
    $header .= "From: " . $name . " <" . $email . ">\n";
    $header .= "Reply-To: " . $name . " <" . $email . ">\n";
    $header .= "Return-Path: " . $name . " <" . $email . ">\n";

    $m = mail($recipient, $subject, $mail_body, $header);
    if ($recipient != '' AND $m OR $recipient == '') {
        return true;
    } else {
        return false;
    }
}##отправка почты end

//Add form data to variables
    $site = str_replace('www.', '', $_SERVER['HTTP_HOST']);
    $success_url = "../thanks.php";
    $error_url = "../sorry.php";

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

	if(isset($_REQUEST["City"])){
		$city = $_REQUEST["City"];
	}

	$utm_source = "";// $_REQUEST['utm_source'];
	$type       = "";// $_REQUEST['type'];
	$source     = "";// $_REQUEST['source'];
	$keyword    = "";// $_REQUEST['keyword'];
	$time = date('Y-m-d H:i:s');

//New leads data array
	$new_lead = array(
        'name'       => $name,
        'email'      => $city,
        'phone'      => $phone,
        'utm_source' => $utm_source,
        'type'       => $type,
        'source'     => $source,
        'keyword'    => $keyword,
        'addDate'    => $time
    );

if($name && $phone && $city) {
    
    //***********************************************************
    //Check data is it already added and add or update
    //***********************************************************


    Database::load("database.sqlite");
    //Database::Add($new_lead);

    //DatabaseMQ::connect();
    //DatabaseMQ::Add($new_lead);
    if (Database::Add($new_lead)){
       //$text_message = implode(" , ", $new_lead);
       $text_message = "Имя клиента - {$name} <br /> Телефон: {$phone}<br /> Город: {$city}<br /> Дата: {$time}";
       send("noreply@prodengi.kz", "noreply@prodengi.kz", "dev@prodengi.kz", "Заявка на CapitalBank-kredit.kz, отзвониться клиенту в течение 30 минут", $text_message);
       send("noreply@prodengi.kz", "noreply@prodengi.kz", "cat@prodengi.kz", "Заявка на CapitalBank-kredit.kz, отзвониться клиенту в течение 30 минут", $text_message);
       send("noreply@prodengi.kz", "noreply@prodengi.kz", "vopros@prodengi.kz", "Заявка на CapitalBank-kredit.kz, отзвониться клиенту в течение 30 минут", $text_message);
       send("noreply@prodengi.kz", "noreply@prodengi.kz", "AMoldabergenova@capitalbank.kz", "Заявка на CapitalBank-kredit.kz, отзвониться клиенту в течение 30 минут", $text_message);
       send("noreply@prodengi.kz", "noreply@prodengi.kz", "A.Akhmetova@capitalbank.kz", "Заявка на CapitalBank-kredit.kz, отзвониться клиенту в течение 30 минут", $text_message);
       send("noreply@prodengi.kz", "noreply@prodengi.kz", "AKalkabayeva@capitalbank.kz", "Заявка на CapitalBank-kredit.kz, отзвониться клиенту в течение 30 минут", $text_message);
       send("noreply@prodengi.kz", "noreply@prodengi.kz", "KBaiterekova@capitalbank.kz", "Заявка на CapitalBank-kredit.kz, отзвониться клиенту в течение 30 минут", $text_message);
       send("noreply@prodengi.kz", "noreply@prodengi.kz", "ASarsenbayev@capitalbank.kz", "Заявка на CapitalBank-kredit.kz, отзвониться клиенту в течение 30 минут", $text_message);
       send("noreply@prodengi.kz", "noreply@prodengi.kz", "NRodionova@capitalbank.kz ", "Заявка на CapitalBank-kredit.kz, отзвониться клиенту в течение 30 минут", $text_message);
       //send("noreply@prodengi.kz", "noreply@prodengi.kz", "dev7@prodengi.kz ", "Заявка на CapitalBank-kredit.kz, отзвониться клиенту в течение 30 минут", $text_message);

       header('Location: ' . $success_url);
    }
    else{
        header('Location: ' . $error_url . '?n='.$phone);
    }
    exit;
    
}
    
?>
<form action="" method="post">
    <input name="City" type="text">
    <input name="Phone" type="text">
    <input name="Name" type="text">
    <input type="submit" value="Ololo">
</form>