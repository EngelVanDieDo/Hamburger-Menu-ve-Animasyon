<?php
$id = $_GET["goster"];

header('Content-type: image/*');
readfile("resimler/$id");
?>