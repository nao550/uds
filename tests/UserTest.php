<?php
namespace morris;

require 'vendor/autoload.php';
require 'config.php';

use PHPUnit\Framework\TestCase;
use morris\User;


class UserlibTest extends TestCase
{

  private $user = '';
  private $password = '';
  private $oldpassword = '';
  private $newpassword = '';  
  private $regdate = '';
  private $chdate = '';
  private $target = '';
  
  public function setUp()
  {
    $this->user = 'testadmin';
    $this->password = 'testpass';
    $this->oldpassword = 'testpass';
    $this->newpassword = 'testpass2';    
    $this->regdate = getToDay();
    $this->chdate = getToDay();
    $this->target = new User;
  }

  /*
     test からはじまるメソッドがテストメソッド
     assert は基本、左側がexpected(期待値)、右側がactual(実際の値)です
  */

  public function testAddUser ( )
  {
    $this->assertTrue( $this->target->AddUser( $this->user, $this->password ));
  }

  public function testChkLogin ( )
  {
    $this->assertTrue( $this->target->ChkLogin( $this->user, $this->password ) );
  }

  public function testCngUserPassword ( )
  {
    $this->assertTrue( $this->target->CngUserPassword( $this->user, $this->oldpassword, $this->newpassword ) );
  }

  public function testDelUser ( )
  {
    $this->assertTrue( $this->target->DelUser( $this->user, $this->password ) );
  }

  
}
