<?php
class IRC /*extends Thread*/
{
protected $socket;
private $host;
private $port;
private $pt;//pingtime
private $tmpt;
protected function timer($seconds,$function)
{
/*

*/
}
public function __construct()
{
 $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die("Not can create a socket<br>");
 socket_set_nonblock($this->socket) or die("not can set nonblock on socket<br>");
 $this->tmpt = time();
}
private function pingPong($maxtry=5)
{
$buffer="";
while( $buffer = $this->recv() )
{
 if(!$maxtry) return 1;
 $tmp = explode(" ",$buffer);
 if($tmp[0] == "PING")
 {
  $this->write("PONG ".$tmp[1]);
  $tmp = NULL;
  $buffer = $this->recv();
  return $buffer;
 }

// print $buffer;
 $maxtry--;
}

return -1;
}

public function connect($host,$port,$nick,$username,$realname,$maxGetPing=5)
{
 if(socket_connect($this->socket, $host, $port) != 0)
  return die("Not can connect to server<br>");
 $this->write("NICK ".$nick);
 $this->write("USER ".$username." * * ".$realname);
 if($this->pingPong() != 1) print ("Ping-pong succesfully\n");
 return 1;
}

protected function write( $msg )
{
print("Write to server ".$msg."\n");
$msg.="\r\n";
$result = socket_write( $this->socket,$msg,strlen($msg) );
if($result != strlen($msg))
 return die( socket_strerror(socket_last_error()) );
}

//...
public function getSocket()
{
return $this->socket;
}

public function loopRead($socket,$pingsec=30,$sleeptime=2)
{
 $buffer = "";
 $this->pt = time()+$pingsec;
 while( $buffer = $this->recv($socket) )
 {
  if($this->tmpt >= $this->pt)
  {
   $this->tmpt=time();
   $this->write("PING");
   $this->pt = $this->tmpt+$pingsec;
  }
  print $buffer;
  sleep($sleeptime); 
 } 

}
//...


protected function recv()
{
$string = socket_read($this->socket,4096,PHP_NORMAL_READ);
if(!$string)die("Not can read from socket<br>");
return $string;
}

public function __destruct()
{
socket_close($this->socket);
}

protected function sendCommand($command,...$argument)
{
$buffer=$command;
$size = sizeof($argument);
 for ( $i =0 ;$i<$size; $i++)
  $buffer.=" ".$argument[$i];
$this->write($buffer);
}

}
?>
