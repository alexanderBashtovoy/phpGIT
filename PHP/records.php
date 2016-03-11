<?php
require_once 'host.php';
require_once 'HostConnection.php';

$host = Host::getLocal();

$state = new HostConnection();
$params = json_decode(file_get_contents('php://input'));
$command = $params->command;
$login = $params->login;

switch($command){
    case "getRecords":
        $result = $state->getRecords($host);
        break;
    case "LogOut":
        $result = $state->LogOut($host, $login);
        break;
    default:
        $result = "no such option.";
}

echo json_encode($result);