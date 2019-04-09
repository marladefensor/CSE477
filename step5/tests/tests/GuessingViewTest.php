<?php
/**
 * Created by PhpStorm.
 * User: marlamaedefensor
 * Date: 2019-02-12
 * Time: 12:48
 */

class GuessingViewTest extends \PHPUnit\Framework\TestCase
{
    const SEED = 1234;

    public function test_construct() {
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);

        $this->assertInstanceOf('Guessing\GuessingView', $view);
    }

    public function test_game(){
        // No guess inputted
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);

        $html = '<form method="post" action="guessing-post.php">' .
            '<h1>Guessing Game</h1>';


        $html .= <<<HTML
<p class="message">Try to guess the number.</p>
<p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
<p><input type="submit"></p>
HTML;
        $this->assertContains($html,$view->present());

        // Guess is correct
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);

        $html = '<form method="post" action="guessing-post.php">' .
            '<h1>Guessing Game</h1>';
        $guessing->guess(23);
        $num = $guessing->getNumGuesses();
        $html .= <<<HTML
<p class="message">After $num guesses you are correct!</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
HTML;
        $html .= '<p><input type="submit" name="clear" value="New Game"></p></form>';
        $this->assertContains($html,$view->present());

        // Guess is too low
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);

        $html = '<form method="post" action="guessing-post.php">' .
            '<h1>Guessing Game</h1>';
        $guessing->guess(13);
        $num = $guessing->getNumGuesses();
        $msg = "too low";
        $html .= <<<HTML
    <p class="message">After $num guesses you are $msg!</p>
    <p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
    <p><input type="submit"></p>
HTML;
        $html .= '<p><input type="submit" name="clear" value="New Game"></p></form>';
        $this->assertContains($html,$view->present());

        // Guess is too high
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);

        $html = '<form method="post" action="guessing-post.php">' .
            '<h1>Guessing Game</h1>';
        $guessing->guess(100);
        $num = $guessing->getNumGuesses();
        $msg = "too high";
        $html .= <<<HTML
    <p class="message">After $num guesses you are $msg!</p>
    <p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
    <p><input type="submit"></p>
HTML;
        $html .= '<p><input type="submit" name="clear" value="New Game"></p></form>';
        $this->assertContains($html,$view->present());
    }

    public function test_invalids(){
        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);
        $html = '<form method="post" action="guessing-post.php">' .
            '<h1>Guessing Game</h1>';
        $guessing->guess(0);
        $guess = $guessing->getGuess();
        $html .= <<<HTML
<p class="message">Your guess of $guess is invalid!</p>
<p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
<p><input type="submit"></p>
HTML;
        $html .= '<p><input type="submit" name="clear" value="New Game"></p></form>';
        $this->assertContains($html, $view->present());

        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);
        $html = '<form method="post" action="guessing-post.php">' .
            '<h1>Guessing Game</h1>';
        $guessing->guess(101);
        $guess = $guessing->getGuess();
        $html .= <<<HTML
<p class="message">Your guess of $guess is invalid!</p>
<p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
<p><input type="submit"></p>
HTML;
        $html .= '<p><input type="submit" name="clear" value="New Game"></p></form>';
        $this->assertContains($html, $view->present());

        $guessing = new Guessing\Guessing(self::SEED);
        $view = new Guessing\GuessingView($guessing);
        $html = '<form method="post" action="guessing-post.php">' .
            '<h1>Guessing Game</h1>';
        $guessing->guess("garbage");
        $guess = $guessing->getGuess();
        $html .= <<<HTML
<p class="message">Your guess of $guess is invalid!</p>
<p><label for="value">Guess:</label> <input type="text" name="value" id="value"></p>
<p><input type="submit"></p>
HTML;
        $html .= '<p><input type="submit" name="clear" value="New Game"></p></form>';
        $this->assertContains($html, $view->present());
    }

}