<?php
use morris\Exam;
require_once __DIR__.'/Generic_Tests_DatabaseTestCase.php';

class RespTest extends Generic_Tests_DatabaseTestCase
{

  private $catecd;
  private $type;
  private $exam;
  private $correnct;
  private $ans1;
  private $ans2;
  private $ans3;
  private $ans4;
  private $ans5;
  private $regdate;
    
  
/*
  public function setUp(){
  }
  */
  /**
  * @return PHPUnit_Extensions_Database_DataSet_IDataSet
  **/
  public function getDataSet()
  {
    $this->catecd = '1';
    $this->type = '1';
    $this->exam = "問題文問題文";
    $this->correct = '2';
    $this->ans1 = "解答選択肢1";
    $this->ans2 = "解答選択肢2";
    $this->ans3 = "解答選択肢3";
    $this->ans4 = "解答選択肢4";
    $this->ans5 = "解答選択肢5";

    $this->arExam = array(
      'catecd' => $this->catecd,
      'type' => $this->type,
      'exam' => $this->exam,
      'correct' => $this->correct,      
      'ans1' => $this->ans1,
      'ans2' => $this->ans2,
      'ans3' => $this->ans3,
      'ans4' => $this->ans4,
      'ans5' => $this->ans5,
    );

    $this->target = new Exam;

    return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/ExamDB.xml');    
  }

  public function testGetAllExam()
  {
    // 登録データについては比較せず、件数のみ
    $this->assertEquals(3, $this->target->countExam());
  }

  public function testAddExam ()
  {
    $this->assertEquals(1, $this->target->addExam( $this->arExam) );
    $cd = $this->target->getLastInsertId();
    foreach ( $this->arExam as $key => $value ){
      $this->assertEquals($value, $this->target->getSelectedValue( $cd, $key));
    }
    $this->assertEquals(4, $this->getConnection()->getRowCount( 'Exam'));
  }

  public function testGetExamStr()
  {
    $this->target->addExam( $this->arExam );
    $cd = $this->target->getLastInsertId();    
    $this->assertEquals( $this->arExam, $this->target->getExamStr($cd));
  }

  public function testUpdateExam()
  {
    $this->target->addExam( $this->arExam);
    $cd = $this->target->getLastInsertId();
    $this->arExam['cd'] = $cd;
    $this->arExam['catecd'] = '3';
    $this->arExam['type'] = '2';
    $this->arExam['exam'] = '更新した問題、';
    $this->arExam['correct'] = '1';    
    $this->arExam['ans1'] = '更新した解答1';
    $this->arExam['ans2'] = '更新した解答2';
    $this->arExam['ans3'] = '更新した解答3';
    $this->arExam['ans4'] = '更新した解答4';
    $this->arExam['ans5'] = '更新した解答5';
    $this->assertTrue( $this->target->UpdateExam( $this->arExam ));
    foreach ( $this->arExam as $key => $value ){
      $this->assertEquals($value, $this->target->getSelectedValue( $cd, $key));
    }
  }

  public function testDelExam()
  {
    $this->target->addExam( $this->arExam);
    $cd = $this->target->getLastInsertId();    
    $this->assertTrue( $this->target->delExam( $cd ));
  }
  
}



/*  
  public function testGetRowCount()
  {
    $this->assertEquals(4, $this->getConnection()->getRowCount( 'Exam'));
  }

  public function testGetAllExamDataset()
  {
    $queryTable = $this->getConnection()->createQueryTable('Exam', 'SELECT * FROM Exam;');
    $expectedTable = $this->createFlatXmlDataSet( __DIR__.'/_files/ExamDB.xml')->getTable('Exam');
    $this->assertTablesEqual($expectedTable, $queryTable);
  }

  
  
  public function testAddExam ()
  {
    //$this->markTestIncomplete();
    $this->assertEquals(1, $this->target->addExam( $this->arExam) );
    $cd = $this->target->getLastInsertId();
    foreach ( $this->arExam as $key => $value ){
      $this->assertEquals($value, $this->target->getSelectedValue( $cd, $key));
    }
    $this->assertEquals(5, $this->getConnection()->getRowCount( 'Exam'));
  }


}
*/

