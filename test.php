<?php
require_once("autoload.php");
$IRC = new IRCFunctions();
$IRC->connect("localhost",5051,"PlazPHP","PlazPHP","PlazPHP");
$socket = $IRC->getSocket();
$IRC->JoinChannel("#ru");
$IRC->loopRead($socket);
?>
