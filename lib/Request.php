<?php
namespace morris;

class Request {

  /*
   * getExamPost()
   * Exam テーブル用のPOSTデータフォーマット
   *
   * @return array()
   */
  function getExamPost( ){
    $arExam = array();
    $arExam['cd'] = (int)filter_input( INPUT_POST, 'cd');
    $arExam['catecd'] = (int)filter_input( INPUT_POST, 'catecd');
    $arExam['type'] = (int)filter_input( INPUT_POST, 'type');
    $arExam['exam'] = (string)filter_input( INPUT_POST, 'exam');
    $arExam['correct'] = (string)filter_input( INPUT_POST, 'correct');
    $arExam['ans1'] = (string)filter_input( INPUT_POST, 'ans1');
    $arExam['ans2'] = (string)filter_input( INPUT_POST, 'ans2');
    $arExam['ans3'] = (string)filter_input( INPUT_POST, 'ans3');
    $arExam['ans4'] = (string)filter_input( INPUT_POST, 'ans4');
    $arExam['ans5'] = (string)filter_input( INPUT_POST, 'ans5');
    return $arExam;
  }
}
