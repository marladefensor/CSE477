<?php
require 'format.inc.php';
require 'lib/game.inc.php';
$view = new Wumpus\WumpusView($wumpus);
?>

<link href="step2.css" type="text/css" rel="stylesheet" />
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stalking the Wumpus</title>
</head>
<body>

<?php echo present_header("Stalking the Wumpus"); ?>

<article>
    <div class="picture">
        <p><img src="cave.jpg" width="600" height="325" alt="image of a cave"/></p>
    </div>
    <?php
    echo '<p>' . date("g:ia l, F j, Y") . '</p>';
    echo $view->presentStatus();
    ?>
    <div class="rooms">
        <?php
        echo $view->presentRoom(0);
        echo $view->presentRoom(1);
        echo $view->presentRoom(2);
        ?>
    </div>

    <?php
    echo $view->presentArrows();
    ?>

</article>


</body>
</html>