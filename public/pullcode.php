<?php
exec("git pull git@github.com:thanhha01/dungsau.git master", $output);
echo "<pre>";
print_r($output);
exit(1);