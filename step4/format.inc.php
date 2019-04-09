<?php
/**
 * Create the HTML for the header block
 * @param $title The page title
 * @return string HTML for the header block
 */

function present_header($title) {
    $html = <<<HTML
<header>
<nav><p><a href="welcome.php" class="class1">New Game</a>
<a href="game.php" class="class1">Game</a>
<a href="instructions.php" class="class1">Instructions</a></p></nav>
<h1>$title</h1>
</header>
HTML;

    return $html;
}

