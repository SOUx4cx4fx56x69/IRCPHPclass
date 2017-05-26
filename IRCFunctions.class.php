<?php

class IRCFunctions extends IRC
{

public function JoinChannel($channel,$socket=NULL)
{
 if($socket == NULL) $socket = $this->socket;
 $this->sendCommand("JOIN",$channel);
}

public function WriteToChannel($channel,$msg)
{
$this->sendCommand("PRIVMSG",$channel,$msg);
}

public function LeaveFromChannel($channel)
{
$this->sendCommand("PART",$channel);
}

public function QUIT($msg="leave")
{
$this->sendCommand("QUIT",$channel);
}

public function SetTopic($channel,$topic)
{
$this->sendCommand("TOPIC",$channel,$topic);
}

public function List($channel=NULL)
{
if(!$channel)
 $this->sendCommand("LIST");
else
 $this->sendCommand("LIST",$channel);
}

public function Mode($who,$flags)
{
 $this->sendCommand("MODE",$who,$flags);
}
public function motd()
{
 $this->sendCommand("MOTD");
}

public function kick($channel,$nick,$msg=NULL)
{
 $this->sendCommand("KICK",$channel,$nick,$msg);
}

public function GetAdmin()
{
 $this->sendCommand("ADMIN");
}

public function Oper($u,$p)
{
 $this->sendCommand("OPER",$u,$p);
}

public function Kill($nick,$msg=NULL)
{
 $this->sendCommand("KILL",$nick,$msg);
}

public function Invite($nick,$channel)
{
 $this->sendCommand("INVITE",$nick,$channel);
}
public function DieServer()
{
 $this->sendCommand("DIE");
}

public function SetAway($msg="busy")
{
  $this->sendCommand("AWAY",$msg);
}

}

?>
