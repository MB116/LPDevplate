<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/landing/admin/libs/expertsender/SimpleXmlExpertsender.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/landing/admin/libs/expertsender/ExQuery.php';


function expertSender($listId, $userName, $userEmail) {
	$apiKey ='bzcO0Y5S5MaTlAfm7Djy';
	
	header('Access-Control-Allow-Origin: *');
	#формируем объект xml
	$xml = new SimpleXmlExpertsender("<?xml version=\"1.0\" encoding=\"UTF-8\"?><ApiRequest xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xs=\"http://www.w3.org/2001/XMLSchema\"/>");
	$xml->addChild('ApiKey',$apiKey);

	$Data = $xml->addChild('Data');
	$Data->addAttr('xsi:type','Subscriber');
	$Data->addChild('Mode','AddAndUpdate');
	$Data->addChild('Force','false');
	$Data->addChild('Firstname', $userName);
	$Data->addChild('ListId', $listId);
	$Data->addChild('Email', $userEmail);
	$req = $xml->asXML();

	#отсылаем все это серверу и получаем ответ
	$response = ExQuery::postQuery('https://api.esv2.com/Api/Subscribers/', $req);
	if(!$response){
	    return false;
	}
	return true;
}
