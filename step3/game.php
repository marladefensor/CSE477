<?php
require 'format.inc.php';
require 'wumpus.inc.php';
$room = 1; // The room we are in.
$birds = 7;  // Room with the birds
$arrows = 5;
$pits = array(3, 10, 13);    // Rooms with a bottomless pit

$cave = cave_array(); // Get the cave

if(isset($_GET['r'] )&& isset($cave[$_GET['r']])) {
    // We have been passed a room number
    $room = $_GET['r'];
}

if(isset($_GET['a'] )&& isset($cave[$_GET['a']])) {
    // We have been passed a room number
    $arrows = $_GET['a'];
}

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
    ?>

    <?php
    if ($room != $birds){
        echo "<p id='area'>You are in room $room</p>";
    }
    else{
        $room = 10;
        echo "<p id='area'>You are in room $room</p>";
    }

    if($room == $cave[$birds][0] || $room == $cave[$birds][1] || $room == $cave[$birds][2]){
    echo '<p id="senses">You hear birds!</p>';
    }

    if($room == $cave[$pits[0]][0] || $room == $cave[$pits[0]][1] || $room == $cave[$pits[0]][2]
        || $room == $cave[$pits[1]][0] || $room == $cave[$pits[1]][1] || $room == $cave[$pits[1]][2]
        || $room == $cave[$pits[2]][0] || $room == $cave[$pits[2]][1] || $room == $cave[$pits[2]][2]){
        echo '<p id="senses">You feel a draft!</p>';
    }

    if($room == $pits[0] || $room == $pits[1] || $room == $pits[2] || $room == 16){
        header("Location: lose.php");
        exit;
    }

    for($i = 0; $i <= 2; $i++){
        $val = $cave[16][$i];
        $new_cave = $cave[$val];
        for($j = 0; $j <= 2;$j++){
            $final = $new_cave[$j];
            if($room == $final){
                echo '<p id="senses">You smell a wumpus!</p>';
            }
        }
        if($room == $val){
            echo '<p id="senses">You smell a wumpus!</p>';
        }
    }

    if(($room == 20 && $arrows == 16) || ($room == 17 && $arrows == 16)){
        header("Location: win.php");
        exit;
    }

    ?>


    <div class="rooms">
        <div class="room">
            <p><img src="cave2.jpg"/></p>
            <p><a href="game.php?r=<?php echo $cave[$room][0]; ?>" class="class2"><?php echo $cave[$room][0]; ?></a></p>
            <p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][0]; ?>" class="class2">Shoot Arrow</a></p>
        </div>
        <div class="room">
            <p><img src="cave2.jpg"/></p>
            <p><a href="game.php?r=<?php echo $cave[$room][1]; ?>" class="class2"><?php echo $cave[$room][1]; ?></a></p>
            <p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][1]; ?>" class="class2">Shoot Arrow</a></p>
        </div>
        <div class="room">
            <p><img src="cave2.jpg"/></p>
            <p><a href="game.php?r=<?php echo $cave[$room][2]; ?>" class="class2"><?php echo $cave[$room][2]; ?></a></p>
            <p><a href="game.php?r=<?php echo $room; ?>&a=<?php echo $cave[$room][2]; ?>" class="class2">Shoot Arrow</a></p>
        </div>
    </div>

    <p id="remaining">You have 3 arrows remaining.</p>

</article>


</body>
</html>