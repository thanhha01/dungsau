<?php
exec("git pull", $output);
echo "<pre>";
print_r($output);
exit(1);