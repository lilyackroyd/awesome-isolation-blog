<?php


session_unset();
session_destroy();
header('Location: ?controller=blog&action=home');
exit;
