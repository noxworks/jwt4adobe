<?php
include('../vendor/autoload.php');
include('../src/Jwt4Adobe.php');

$obj = new Jwt4Adobe();
echo $obj->getJwtToken();
