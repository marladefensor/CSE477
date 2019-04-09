<?php
/**
 * Created by PhpStorm.
 * User: marlamaedefensor
 * Date: 2019-03-15
 * Time: 13:38
 */

namespace Felis;


class StaffView extends View {
    /**
     * Constructor
     * Sets the page title and any other settings.
     */
    public function __construct() {
        $this->setTitle("Felis Investigations Staff");
        $this->addLink("index.php", "Log Out");
    }
}