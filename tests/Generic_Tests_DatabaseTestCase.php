<?php
include_once './vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

abstract class Generic_Tests_DatabaseTestCase extends PHPUnit_Extensions_Database_TestCase
{
  // PDO のインスタンス生成は、クリーンアップおよびフィクスチャ読み込みのときに一度だけ
  static private $pdo = null;

  // PHPUnit_Extensions_Database_DB_IDatabaseConnection のインスタンス生成は、テストごとに一度だけ
  private $conn = null;

  final public function getConnection()
  {
    if ($this->conn === null) {
      if (self::$pdo == null) {
        self::$pdo = new PDO( $GLOBALS['DBDSN'], $GLOBALS['DBUSER'], $GLOBALS['DBPASS'] );
      }
      $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DBDBNAME']);
    }
    
    return $this->conn;
  }
}
