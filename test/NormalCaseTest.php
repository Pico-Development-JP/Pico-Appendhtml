<?php
if (php_sapi_name() != 'cli') return;
require_once('Base.php');

class NormalCaseTest extends AppendHTMLTestBase
{
  /**
  * 以下の状態において、HTMLに値が正常に挿入されることを確認する
  *
  * 入力値：headのみ
  * HTML：完全なHTML
  */
  public function testHEAD() {
    Closure::bind(function() {
      $test = $this->getTest("HEADING TEST", "", "");
      $html = $this->getHTML();
      $test->onPageRendered($html);
      $this->assertRegExp("|HEADING TEST\n</head>|", $html);
    }, $this, 'Pico_AppendHTML')->__invoke();
  }

  /**
   * 以下の状態において、HTMLに値が正常に挿入されることを確認する
   *
   * 入力値：body上部のみ
   * HTML：完全なHTML
   */
  public function testBODYTOP() {
    Closure::bind(function() {
      $test = $this->getTest("", "BODYTOP TEST", "");
      $html = $this->getHTML();
      $test->onPageRendered($html);
      $this->assertRegExp("|<body>\nBODYTOP TEST|", $html);
    }, $this, 'Pico_AppendHTML')->__invoke();
  }

  /**
   * 以下の状態において、HTMLに値が正常に挿入されることを確認する
   *
   * 入力値：body下部のみ
   * HTML：完全なHTML
   */
  public function testBODYBOTTOM() {
    Closure::bind(function() {
      $test = $this->getTest("", "", "BODYBOTTOM TEST");
      $html = $this->getHTML();
      $test->onPageRendered($html);
      $this->assertRegExp("|BODYBOTTOM TEST\n</body>|", $html);
    }, $this, 'Pico_AppendHTML')->__invoke();
  }

  /**
   * 以下の状態において、HTMLに値が正常に挿入されることを確認する
   *
   * 入力値：すべて
   * HTML：完全なHTML
   */
  public function testALLElement() {
    Closure::bind(function() {
      $test = $this->getTest("HEADING TEST", "BODYTOP TEST", "BODYBOTTOM TEST");
      $html = $this->getHTML();
      $test->onPageRendered($html);
      $this->assertRegExp("|HEADING TEST\n</head>|", $html);
      $this->assertRegExp("|<body>\nBODYTOP TEST|", $html);
      $this->assertRegExp("|BODYBOTTOM TEST\n</body>|", $html);
    }, $this, 'Pico_AppendHTML')->__invoke();
  }

}