<?php
/**
 * Created by PhpStorm.
 * User: marlamaedefensor
 * Date: 2019-03-15
 * Time: 13:50
 */

class SiteTest extends \PHPUnit\Framework\TestCase
{
    public function test_gettersAndSetters()
    {
        $site = new \Felis\Site();
        $site->dbConfigure("host","defenso2","1234","prefixes");
        $site->setRoot(10);
        $site->setEmail('defenso2@msu.edu');

        $this->assertContains("prefixes", $site->getTablePrefix());
        $this->assertEquals(10, $site->getRoot());
        $this->assertContains('defenso2@msu.edu', $site->getEmail());
    }

    public function test_localize() {
        $site = new Felis\Site();
        $localize = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize($site);
        }
        $this->assertEquals('test_', $site->getTablePrefix());
    }
}