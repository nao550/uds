<?php
//  public function __construct(array $opts = array()) {}
//
//! ログイン中かチェックする
//! @return boolean true:ログイン中	false:ログインしていない(未認証)
//  protected function chkLogined() {
//! セッション処理オブジェクトを取得
//! @return	object	セッションクラス(Session)オブジェクト
// public function getSessObj() {
//! ログインのチェック
// public function isLogined() {}
//! ログイン処理 
// public function loginProc() {}
//  
//  protected function chkLogined() {
// 
//--------------------------------------------------------------//
//!	認証チェック処理クラス

namespace morris\uds;

class Auth {
  protected	$options = array();	//!<	オプション
  protected	$sessoption = array();  //!< セッションオプション
  protected	$sessobj = null;	//!<	セッションクラスオブジェクト

  //!	コンストラクタ
  //!	@param	array	$opts		オプション配列
  public function __construct(array $opts = array()) {
    global $CFG;
    $this->options = $CFG;

    if(is_array($opts) && count($opts) > 0){
      $this->options = array_merge($this->options, $opts);
    }

    $this->sessoption['timeout'] = 0;
    if(isset($opts['timeout'])){
      $this->sessoption['timeout'] = $opts['timeout'];	//	セッションタイムアウト
    }
  }

  //!	ログイン中かチェックする
  //!	@return	boolean		true:ログイン中	false:ログインしていない(未認証)
  protected function chkLogined() {
    $sess = new Session($this->options['sessname'], $this->sessoption);
    if(!$sess->sessionExists()){
      return false;
    }

    if(!$sess->start()){	//	セッション開始とタイムアウトチェック
      $sess->endProc();	//	セッション終了
      return false;
    }
d
    $loggedin = $sess->get('loggedin');
    if(empty($loggedin)){
      $sess->endProc();	//	セッション終了
      return false;
    }

    // セッション情報の比較
    $sid = $sess->get('sid');
    if(empty($sid) || getPost("sid") != $sid ){
      $sess->endProc();
      return false;
    }
    
    $this->sessobj = $sess;	//	セッション処理オブジェクト
    return true;
  }

  //!	セッション処理オブジェクトを取得
  //!	@return	object	セッションクラス(Session)オブジェクト
  public function getSessObj() {
    return $this->sessobj;
  }


  public function isLogined() {
    return $this->chkLogined();
    }
  }

  //!	ログイン処理
  public function loginProc() {
    $obj = new AuthLogin($this->options);
    $obj->loginProc();
  }
}
