<?php
//TODO check branch, source

// read POST Json WebHook GitHub
$data = json_decode(file_get_contents('php://input'), true);
$repo = './'.$data['repository']['name'];

// variable $repo for bash
putenv("repo=$repo");

//execute update.sh
exec("bash ./update.sh");
 ?>
