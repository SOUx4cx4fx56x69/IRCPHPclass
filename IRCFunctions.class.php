<?php

class IRCFunctions extends IRC
{

public function JoinChannel($channel,$socket=NULL)
{
 if($socket == NULL) $socket = $this->socket;
 $this->sendCommand("JOIN","#ru");
}

public function WriteToChannel($channel,$msg)
{
$this->sendCommand("PRIVMSG",$channel,$msg);
}

public function LeaveFromChannel($channel)
{
$this->sendCommand("LEAVE",$channel);
}

public function QUIT($msg="")
{
$this->sendCommand("QUIT",$channel);
}

}

?>
