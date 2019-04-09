<?php
/**
 * Created by PhpStorm.
 * User: marlamaedefensor
 * Date: 2019-03-19
 * Time: 18:46
 */

namespace Felis;


class LoginView extends View
{
    /**
     * Constructor
     * Sets the page title and any other settings.
     */
    public function __construct(&$session, array $get) {
        $this->setTitle("Felis Investigations");
        if (isset($get['e'])){
            $this->error = $session["error"];
        }
    }

    public function presentForm() {
        $html = <<<HTML
<form method="post" action="post/login.php">
    <fieldset>
        <legend>Login</legend>
        <p>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" placeholder="Email">
        </p>
        <p>
            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="Password">
        </p>
        <p>
            <input type="submit" value="Log in"> <a href="">Lost Password</a>
        </p>
        <p><a href="./">Felis Agency Home</a></p>

    </fieldset>
</form>
HTML;

        return $html;
    }

    public function displayError(){
        if ($this->error !== null){
            return "<p class='error'>$this->error</p>";
        }
        else{
            return "";
        }
    }

    private $error = "";
}