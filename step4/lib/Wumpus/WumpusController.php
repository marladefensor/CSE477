<?php
/**
 * Created by PhpStorm.
 * User: marlamaedefensor
 * Date: 2019-02-05
 * Time: 13:06
 */

namespace Wumpus;


class WumpusController
{
    /**
     * Constructor
     * @param Wumpus $wumpus The Wumpus object
     * @param array $get The $_GET array
     */
    public function __construct(Wumpus $wumpus, $get) {
        $this->wumpus = $wumpus;
        if(isset($get['m'])) {
            $this->move($get['m']);
        } else if(isset($get['s'])) {
            $this->shoot($get['s']);
        } else if(isset($get['n'])) {
            // New game!
            $this->reset = true;
        } else if(isset($get['c'])){
            $this->cheat = true;
        }
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return bool
     */
    public function isReset()
    {
        return $this->reset;
    }

    /**
     * @return bool
     */
    public function cheat()
    {
        return $this->cheat;
    }

    /**
     * Move request
     * @param int $ndx Index for room to move to
     */
    private function move($ndx) {
        // Simple error check
        if(!is_numeric($ndx) || $ndx < 1 || $ndx > Wumpus::NUM_ROOMS) {
            return;
        }

        switch($this->wumpus->move($ndx)) {
            case Wumpus::HAPPY:
                break;

            case Wumpus::EATEN:
            case Wumpus::FELL:
                $this->reset = true;
                $this->page = 'lose.php';
                break;
        }
    }

    /**
     * Shoot request
     * @param int $ndx Index for room to shoot into
     */
    private function shoot($ndx) {
        // Simple error check
        if(!is_numeric($ndx) || $ndx < 1 || $ndx > Wumpus::NUM_ROOMS) {
            return;
        }

        switch($this->wumpus->shoot($ndx)){
            case true:
                $this->reset = true;
                $this->page = 'win.php';
                break;

            case false:
                break;
        }

    }


    private $cheat = false;
    private $wumpus;                // The Wumpus object we are controlling
    private $page = 'game.php';     // The next page we will go to
    private $reset = false;         // True if we need to reset the game
}