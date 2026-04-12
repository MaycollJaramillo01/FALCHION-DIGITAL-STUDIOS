<?php
echo '<pre>';
echo 'PHP: '.PHP_VERSION."\n";
echo 'GD loaded: '.(extension_loaded('gd') ? 'YES' : 'NO')."\n";
echo 'random_int exists: '.(function_exists('random_int') ? 'YES' : 'NO')."\n";
echo 'captcha session key: '; session_start(); echo isset($_SESSION['captcha']) ? 'SET' : 'NOT SET';
echo "</pre>";
