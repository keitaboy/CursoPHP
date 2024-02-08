<?php

$pass = password_hash('User', PASSWORD_DEFAULT,['cost'=>12]);
echo $pass;

?>