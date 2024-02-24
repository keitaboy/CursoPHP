<?php
// See the password_hash() example to see where this came from.
$hash = '$2a$12$IyX3PkLY465sH.S1KFrti.NE3Xt/yNv1NPB/4u39QG6VKufvM2lyq';

if (password_verify('User', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}