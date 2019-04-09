<?php
/**
 * Created by PhpStorm.
 * User: marlamaedefensor
 * Date: 2019-02-12
 * Time: 09:51
 */
?>
<?php
require __DIR__ . '/lib/guessing.inc.php';
$view = new Guessing\GuessingView($guessing);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Guessing Game</title>
    <link href="step5.css" type="text/css" rel="stylesheet" />

</head>
<body>
<?php echo $view->present(); ?>
</body>
</html>
