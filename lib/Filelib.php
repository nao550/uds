<?php
// File lib
// array($color, $errmsg, $filename) = up( $_FILES )
// set config file

namespace morris;
use PDO;

class Filelib {
  private $pdo;

  function __construct(){
    $dsn = 'mysql:host=' . $GLOBALS['DBSV'] . ';dbname=' . $GLOBALS['DBNM'] . ';charset=utf8';
    try{
      $this->pdo = new PDO($dsn, $GLOBALS['DBUSER'], $GLOBALS['DBPASS']);
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }

  function up ( $files, $examcd ){
    // from http://qiita.com/mpyw/items/73ee77a9535cc65eff1e

    if (isset($files['fileup']['error']) && is_int($files['fileup']['error'])) {
      try {

	// $files['fileup']['error'] の値を確認
	switch ($files['fileup']['error']) {
	case UPLOAD_ERR_OK: // OK
	  break;
	case UPLOAD_ERR_NO_FILE:   // ファイル未選択
	  throw new RuntimeException('ファイルが選択されていません');
	case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
	case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過
	  throw new RuntimeException('ファイルサイズが大きすぎます');
	default:
	  throw new RuntimeException('その他のエラーが発生しました');
	}

	// $files['fileup']['mime']の値はブラウザ側で偽装可能なので、MIMEタイプを自前でチェックする
	$types = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
	$type = @exif_imagetype($files['fileup']['tmp_name']);
	//	if (!in_array($type, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG], true)) {
	if (!in_array($type, $types, true)) {
	  throw new RuntimeException('画像形式が未対応です');
	}

	// ファイルデータからSHA-1ハッシュを取ってファイル名を決定し、ファイルを保存する
	//$filename = sha1_file($files['fileup']['tmp_name']) . image_type_to_extension($type);
	// ファイル名は $examcd を使用して問題番号と合せる
	$filename = $examcd . image_type_to_extension($type);
	$path = sprintf( __DIR__.'/../uploads/%s', $filename);
	if (!move_uploaded_file($files['fileup']['tmp_name'], $path)) {
	  throw new RuntimeException('ファイル保存時にエラーが発生しました');
	}
	chmod($path, 0644);

	$msg = array('green', 'ファイルは正常にアップロードされました', $filename);

      } catch (RuntimeException $e) {
	$msg = array('red', $e->getMessage(), '' );
      }
      return $msg;
    }
  }

  function chkImage ( $examcd ){
    $extends = array('jpeg', 'png', 'gif');
    $imgfile = array();

    foreach ( $extends as $extend ){
      $imgpath = ( __DIR__.'/../uploads/'.$examcd.'.'.$extend );

      if (file_exists( $imgpath )){
        $size = (getimagesize($imgpath));

	$imgfile = array('flag' => true,
                         'path' => $imgpath,
                         'extend' => $extend,
                         'imgx' => $size[0],
                         'imgy' => $size[1] );

        return $imgfile;
      }
    }
    return $imgfile['flag'] = false;
  }

  function isImage( $examcd ){
    global $CFG;
    $extends = array('.jpeg', '.png', 'gif');

    foreach ( $extends as $extend ){
      if (file_exists( __DIR__.'/../web/uploads/'.$examcd.$extend )){
	echo '<img src="'.$CFG['HOMEPATH'].'/uploads/'.h($examcd).$extend.'">'."\n";
      }
    }
  }

  function isImageDel( $examcd ){
    global $CFG;
    $extends = array('.jpeg', '.png', 'gif');

    foreach ( $extends as $extend ){
      if (file_exists( __DIR__.'/../web/uploads/'.$examcd.$extend )){
	echo '<img src="'.$CFG['HOMEPATH'].'/uploads/'.h($examcd).$extend.'">'."\n";
        echo '<button class="btn btn-default" type="submit" name="delimage" value="delimage">画像削除</button>';

      }
    }
  }

  function delImageFile( $mondai ){
    global $CFG;
    $extends = array('.jpeg', '.png', 'gif');
    foreach ( $extends as $extend ){
      if (file_exists( __DIR__.'/../web/uploads/'.$mondai.$extend )){
        unlink( __DIR__.'/../web/uploads/'.$mondai.$extend );
      }
    }
  }

  function delImage( $mondai ) {
    global $CFG;
    $extends = array('.jpeg', '.png', 'gif');
    foreach ( $extends as $extend ){
      if ( file_exists( __DIR__.'/../web/uploads/'.$mondai.$extend )) {
        unlink( __DIR__.'/../web/uploads/'.$mondai.$extend );
      }
    }
  }

}
