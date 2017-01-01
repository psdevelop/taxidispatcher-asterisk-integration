#!/usr/bin/php -q
<?php

	require_once "phpagi.php";
	//require_once "phpagi-asmanager.php";
	//$AGI = new AGI();

	set_time_limit(30);
	ob_implicit_flush(false);
	error_reporting(0);

	$agi = new AGI();
	$agi->answer(); 
	//$agi->text2wav('Goodbye');d
	//$agi->busy();
	//$agi->exec('Festival','"Добрый день служба такси     К Вам отправлен авто Лада Калина регистрационный номер 458 "');
	$agi->text2wav("Добрый день служба такси     К Вам отправлен авто Лада Калина регистрационный номер 458 ");
	$agi->hangup();
