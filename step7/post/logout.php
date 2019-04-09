<?php
/**
 * Created by PhpStorm.
 * User: marlamaedefensor
 * Date: 2019-03-19
 * Time: 17:11
 */

require '../lib/site.inc.php';
unset($_SESSION['user']);
$root = $site->getRoot();
header("location: $root/");