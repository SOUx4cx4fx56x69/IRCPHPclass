<?php
require_once("autoload.php");
$questions = array(
"привет"=>"дратуй",
"+"=>"я тебе не плаин плаз чтобы считать такое",
"-"=>"Щас я тебе ебало снижу, понял?",
"*"=>"Тебе пиздюлины то приумножить?",
"/"=>"Деление это когда я минисую пока не будет ноль, а я щас буду тебе вечно давать пиздюлины за такое, понял?",
"пока"=>"пиздуй",
"жиза"=>"ЖИЗНЬ БОЛЬ БЛЯТЬ",
"?"=>"Хуеватый вопрос",
"блять"=>"КУРВА",
"курва"=>"дупа",
"хуй"=>"залупу себе в анус засунь",
"мандавошка"=>"съела кошка",
"!синий_кит"=>"я тебе не буду парашу рисовать, но могу тебе срок устроить",
"дом"=>"щас я тебе дурку то вызову то...",
"quit"=>"exit(1)"
);
$IRC = new IRCFunctions($questions);
$IRC->connect("localhost",5050,"PlazPHP_","PlazPHP_","PlazPHP_");
$socket = $IRC->getSocket();
$IRC->JoinChannel("#ru");
$IRC->JoinChannel("#rus");
$IRC->WriteToChannel("#ru","Ну чо псы, привет всем йопт, чо как сами, а?");
$IRC->JoinChannel("#Transhumanism");
$IRC->LeaveFromChannel("#ru");
$IRC->WriteToChannel("#Transhumanism","iamrobot");
sleep(3);
$IRC->JoinChannel("#ru");
$IRC->WriteToChannel("#ru","Наебал");
$IRC->loopRead($socket);

?>
