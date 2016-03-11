<?php
require_once 'host.php';
require_once 'HostConnection.php';

$host = Host::getLocal();

$state = new HostConnection();
$params = json_decode(file_get_contents('php://input'));
$command = $params->command;
$login = $params->login;
$password = $params->password;


switch($command){
    case "getRecords":
        $result = $state->getRecords($host);
        break;
    case "Login":
        $result = $state->LogIn($host, $login, $password);
        break;
    case "LogOut":
        $result = $state->LogOut($host, $login);
        break;
    case "registration":
        $result = $state->Registration($host, $login, $password);
        break;
    default:
        $result = "no such option.";
}

echo json_encode($result);