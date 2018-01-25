<?php
namespace morris;

class Request {

  function getStr( $post ){
    $val = isset( $post ) && is_string( $post )? $post : '';
    return $val;
  }

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

    if( isset($_POST['correct'][0])){
      $arExam['correct'][0] = is_string( $_POST['correct'][0])? $_POST['correct'][0] : '';
    } else {
      $arExam['correct'][0] = '';
    }
    if( isset($_POST['correct'][1])){
      $arExam['correct'][1] = is_string( $_POST['correct'][1])? $_POST['correct'][1] : '';
    } else {
      $arExam['correct'][1] = '';
    }
    if( isset($_POST['correct'][2])){
      $arExam['correct'][2] = is_string( $_POST['correct'][2])? $_POST['correct'][2] : '';
    } else {
      $arExam['correct'][2] = '';
    }
    if( isset($_POST['correct'][3])){
      $arExam['correct'][3] = is_string( $_POST['correct'][3])? $_POST['correct'][3] : '';
    } else {
      $arExam['correct'][3] = '';
    }
    if( isset($_POST['correct'][4])){
      $arExam['correct'][4] = is_string( $_POST['correct'][4])? $_POST['correct'][4] : '';
    } else {
      $arExam['correct'][4] = '';
    }

    $arExam['ans1'] = (string)filter_input( INPUT_POST, 'ans1');
    $arExam['ans2'] = (string)filter_input( INPUT_POST, 'ans2');
    $arExam['ans3'] = (string)filter_input( INPUT_POST, 'ans3');
    $arExam['ans4'] = (string)filter_input( INPUT_POST, 'ans4');
    $arExam['ans5'] = (string)filter_input( INPUT_POST, 'ans5');
    return $arExam;
  }
}
