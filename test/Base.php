<?php 
if (php_sapi_name() != 'cli') return;
require_once(__DIR__."/../../../lib/test.php");
require_once(__DIR__."/../pico-appendhtml.php");

class AppendHTMLTestBase extends PHPUnit_Framework_TestCase {
  public function setUp() {
    $this->pico = $GLOBALS['pico'];
  }

  /**
   * テスト用のPico-AppendHTMLオブジェクトを取得する
   */
  public function getTest($head = null, $bodytop = null, $bodybottom = null) {
    $test = new Pico_AppendHTML($this->pico);
    $config = $this->pico->getConfig();
    if($head){
      $config['appendhtml']['head'] = $head;
    }
    if($bodytop){
      $config['appendhtml']['bodytop'] = $bodytop;
    }
    if($bodybottom){
      $config['appendhtml']['bodybottom'] = $bodybottom;
    }
    $test->onConfigLoaded($config);
    return $test;
  }

  /**
   * テスト用のHTMLファイルを取得する
   */
  public function getHTML($htmltag = true, $headtag = true, $bodytag = true) {
    $html = "";
    if($htmltag){
      $html .= "<html>";
    }
    if($headtag){
      $html .= "<head>\n  <title>TEST</title>\n</head>";
    }
    if($bodytag){
      $html .= "<body>\n  <p>This is a TEST</p>\n</body>";
    }
    if($htmltag){
      $html .= "</html>";
    }
    return $html;
  }
  
  /**
   * 警告を出さないためのダミーテスト
   */
  public function test(){
    $this->assertNull(null);
  }
};
?>