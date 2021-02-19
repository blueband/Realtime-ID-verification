<?php
$userfromurl = 'username=16d/47cs/0987&privID=7';
function userdata_parse($userfromurl){
$data = split('&', $userfromurl);
$urlchkey = split('=',$data[0])[0];
$username = split('=',$data[0])[1];
    return array($urlchkey, $username);
}

?>
