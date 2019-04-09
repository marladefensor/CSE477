<?php
/**
 * Created by PhpStorm.
 * User: marlamaedefensor
 * Date: 2019-03-18
 * Time: 15:10
 */

class UsersTest extends \PHPUnit\Framework\TestCase {

    private static $site;

    public static function setUpBeforeClass() {
        self::$site = new Felis\Site();
        $localize  = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize(self::$site);
        }
    }

    public function test_pdo() {
        $users = new Felis\Users(self::$site);
        $this->assertInstanceOf('\PDO', $users->pdo());
    }

    protected function setUp() {
        $users = new Felis\Users(self::$site);
        $tableName = $users->getTableName();

        $sql = <<<SQL
delete from $tableName;
insert into $tableName(id, email, name, phone, address, 
                      notes, password, joined, role)
values (7, "dudess@dude.com", "Dudess, The", "111-222-3333", 
        "Dudess Address", "Dudess Notes", "87654321", 
        "2015-01-22 23:50:26", "S"),
        (8, "cbowen@cse.msu.edu", "Owen, Charles", "999-999-9999", 
        "Owen Address", "Owen Notes", "super477", 
        "2015-01-01 23:50:26", "A"),
        (9, "bart@bartman.com", "Simpson, Bart", "999-999-9999", 
        "", "", "bart477", "2015-02-01 01:50:26", "C"),
        (10, "marge@bartman.com", "Simpson, Marge", "", "",
        "", "marge", "2015-02-01 01:50:26", "C")
SQL;

        self::$site->pdo()->query($sql);
    }

    public function test_login() {
        $users = new Felis\Users(self::$site);

        // Test a valid login based on email address
        $user = $users->login("dudess@dude.com", "87654321");
        $this->assertInstanceOf('Felis\User', $user);

        // Test a valid login based on email address
        $user = $users->login("cbowen@cse.msu.edu", "super477");
        $this->assertInstanceOf('Felis\User', $user);
        $this->assertEquals(8, $user->getId());
        $this->assertEquals('cbowen@cse.msu.edu', $user->getEmail());
        $this->assertEquals('Owen, Charles', $user->getName());
        $this->assertEquals('999-999-9999', $user->getPhone());
        $this->assertEquals('Owen Address', $user->getAddress());
        $this->assertEquals('Owen Notes', $user->getNotes());
        $this->assertEquals(strtotime('2015-01-01 23:50:26'), $user->getJoined());
        $this->assertEquals('A', $user->getRole());

        // Test a failed login
        $user = $users->login("dudess@dude.com", "wrongpw");
        $this->assertNull($user);
    }

    public function test_get() {
        $users = new \Felis\Users(self::$site);

        // Test a valid get based on id
        $user = $users->get(8);
        $this->assertInstanceOf('Felis\User', $user);
        $this->assertEquals(8, $user->getId());
        $this->assertEquals('cbowen@cse.msu.edu', $user->getEmail());
        $this->assertEquals('Owen, Charles', $user->getName());
        $this->assertEquals('999-999-9999', $user->getPhone());
        $this->assertEquals('Owen Address', $user->getAddress());
        $this->assertEquals('Owen Notes', $user->getNotes());
        $this->assertEquals(strtotime('2015-01-01 23:50:26'), $user->getJoined());
        $this->assertEquals('A', $user->getRole());
    }

    public function test_update(){
        $users = new \Felis\Users(self::$site);

        // get a valid update
        $user = $users->get(8);
        $user->setEmail('newemail@wherever.com');
        $this->assertTrue($users->update($user));

        // get an invalid update
        $items['email'] = 'hi@hello.com';
        $items['name'] = 'hello';
        $items['phone'] = '123-456-7890';
        $items['address'] = 'Some address';
        $items['notes'] = 'Some notes';
        $items['joined'] = '2019-03-20 12:00:00';
        $items['role'] = 'S';
        $items['id'] = 100;
        $newUser = new \Felis\User($items);

        $this->assertFalse($users->update($newUser));
        $newUser->setEmail('newemail@wherever.com');
        $this->assertFalse($users->update($newUser));
    }
}