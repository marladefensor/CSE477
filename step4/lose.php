<?php
require 'format.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<link href="step2.css" type="text/css" rel="stylesheet" />
<head>
    <meta charset="UTF-8">
    <title>The Wumpus Killed You</title>
</head>
<body>

<?php echo present_header("Stalking the Wumpus"); ?>

<article>
    <div class="cat">
        <p><img src="wumpus-wins.jpg" width="600" height="325" alt="image of a evil cat eating your brain"/></p>
    </div>
    <h2>You died and the Wumpus ate your brain!</h2>

    <div class="links">
        <p><a href="welcome.php" class="class2">New Game</a></p>
    </div>

</article>

</body>
</html>