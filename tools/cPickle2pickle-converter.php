<?php


$file = fopen('word_data.pkl', 'r');
$dest = fopen('word_new.pkl', 'w+');

fwrite($dest, "(lp0\n");

$c = 1;

while(($line = fgets($file)) !== false) {
  if(!preg_match('/^a?S\'(.*)\'$/', trim($line), $matches))
    continue;

  echo $c . '.';

  $str = $matches[1];
  fwrite($dest, "V{$str}\np" . $c++ . "\na");

  if($c === 1)
    break;
}


fwrite($dest, '.');
fclose($dest);
fclose($file);


