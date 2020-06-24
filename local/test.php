<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
$lead = new B24_lead();
$param = array('TITLE'=>'Тестовый лид с сайта',
    'NAME'=>'Тест',
    'LAST_NAME'=>'Тесть',
    'COMMENTS'=>'Игнорировать',
    'SOURCE_DESCRIPTION'=>'https://raduga-okon.ru/');
var_dump($lead->createLead($param));
?>