<?php

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$repo = $data['repository']['name'];

putenv("repo=$repo");

exec("bash /home/hosting_dbasalaev/projects/app-bitrix24/htdocs/update.sh", $output);

$log .= '$data'."\n";
$log .= print_r($data, 1) . "\n";
$log .= '$repo'."\n";
$log .= print_r($repo, 1) . "\n";
$log .= '$output'."\n";
$log .= print_r($output, 1) . "\n";
$log .= "\n------------------------\n";
file_put_contents(getcwd() . '/log.log', $log, FILE_APPEND);
