<?php
include 'libs/init.php';
$session->delete('activeUser');
$session->destroy();
$helpers->redirectPage('index');
