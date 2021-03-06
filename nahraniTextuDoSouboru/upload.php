<?php

$myfile = fopen("uploads/zaznamy.txt", "a") or die("Unable to open file!");

$txt = "Hello world\n";
fwrite($myfile, $txt);

$txt = "Blablabla\n";
fwrite($myfile, $txt);

fclose($myfile);

?>