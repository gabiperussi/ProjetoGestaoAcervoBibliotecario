<?php

//configurações de error
error_reporting(E_ALL)
ini_set('display_erros', 1);

//cabeçalho para o Json
header('Content-Type: Application/json; charsert=utf-8');

//recuperar URL, configuração de rota
$ path = parse_url($_SERVER['Request_URL'], PHP_URL);



?>