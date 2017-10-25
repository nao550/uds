<?php
namespace morris;

require_once 'config.php';

use PHPUnit\Framework\TestCase;
use morris\User;


class UserTest extends TestCase
{

  private $user = null;
  private $failuser = null;
  private $password = null;
  private $failpassword = null;
  private $oldpassword = null;
  private $newpassword = null;
  private $rank = null;
  private $regdate = null;
  private $chdate = null;
  private $target = null;
  
  public function setUp()
  {
    $this->user = 'testadmin';
    $this->failuser = 'aa';
    $this->password = 'testpass';
    $this->failpassword = 'ps';
    $this->oldpassword = 'testpass';
    $this->newpassword = 'testpass2';    
    $this->rank = 3;
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
    // 以前のエラー終了時の残り削除
    $this->target->delUser( $this->user, $this->password ); 

    $this->assertEquals( 1, $this->target->addUser( $this->user, $this->password, $this->rank ));
    $this->assertEquals( 0, $this->target->AddUser( $this->user, $this->password, $this->rank ));    

  }

  public function testChkLogin ( )
  {
    $this->assertTrue( $this->target->ChkLogin( $this->user, $this->password ) );
    $this->assertFalse( $this->target->ChkLogin( $this->failuser, $this->password ) );    
  }

  public function testExistUser()
  {
    $this->assertTrue( $this->target->existUser( $this->user ));
    $this->assertFalse( $this->target->existUser( $this->failuser ));    
  }

  public function testGetUserRank()
  {
    $this->assertEquals($this->rank, $this->target->getUserRank( $this->user, $this->oldpassword) );
  }
  
  public function testCngUserPassword ( )
  {
    //$this->markTestIncomplete();
    $this->assertEquals( 1, $this->target->cngUserPassword( $this->user, $this->oldpassword, $this->newpassword ) );
    $this->assertEquals( 0, $this->target->cngUserPassword( $this->user, $this->oldpassword, $this->oldpassword ));
  }

  public function testDelUser ( )
  {
    $this->assertEquals( 1, $this->target->delUser( $this->user, $this->newpassword ) );
    $this->assertEquals( 0, $this->target->delUser( $this->failuser, $this->newpassword ) );    
  }

  
}
