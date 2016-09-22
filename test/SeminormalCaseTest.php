<?php
if (php_sapi_name() != 'cli') return;
require_once('Base.php');

class SeminormalCaseTest extends AppendHTMLTestBase
{
  /**
  * 以下の状態において、bodyに挿入する値が無視されることを確認する
  *
  * 入力値：すべて
  * HTML：html, head部のみ
  */
  public function testNoneBody() {
    Closure::bind(function() {
      $test = $this->getTest("HEADING TEST", "BODYTOP TEST", "BODYBOTTOM TEST");
      $html = $this->getHTML(true, true, false);
      $test->onPageRendered($html);
      $this->assertRegExp("|HEADING TEST\n</head>|", $html);
      $this->assertNotRegExp("|<body>\nBODYTOP TEST|", $html);
      $this->assertNotRegExp("|BODYBOTTOM TEST\n</body>|", $html);
    }, $this, 'Pico_AppendHTML')->__invoke();
  }

  /**
   * 以下の状態において、headに挿入する値が無視されることを確認する
   *
   * 入力値：すべて
   * HTML：html, body部のみ
   */
  public function testNoneHead() {
    Closure::bind(function() {
      $test = $this->getTest("HEADING TEST", "BODYTOP TEST", "BODYBOTTOM TEST");
      $html = $this->getHTML(true, false, true);
      $test->onPageRendered($html);
      $this->assertNotRegExp("|HEADING TEST\n</head>|", $html);
      $this->assertRegExp("|<body>\nBODYTOP TEST|", $html);
      $this->assertRegExp("|BODYBOTTOM TEST\n</body>|", $html);
    }, $this, 'Pico_AppendHTML')->__invoke();
  }

  /**
   * 以下の状態において、HTMLに値が正常に挿入されることを確認する
   *
   * 入力値：すべて
   * HTML：head, body部のみ
   */
  public function testNoneHTML() {
    Closure::bind(function() {
      $test = $this->getTest("HEADING TEST", "BODYTOP TEST", "BODYBOTTOM TEST");
      $html = $this->getHTML(false, true, true);
      $test->onPageRendered($html);
      $this->assertRegExp("|HEADING TEST\n</head>|", $html);
      $this->assertRegExp("|<body>\nBODYTOP TEST|", $html);
      $this->assertRegExp("|BODYBOTTOM TEST\n</body>|", $html);
    }, $this, 'Pico_AppendHTML')->__invoke();
  }

  /**
   * 以下の状態において、テキストが変更されないことを確認する
   *
   * 入力値：すべて
   * HTML：非HTML
   */
  public function testNoHTML() {
    Closure::bind(function() {
      $test = $this->getTest("HEADING TEST", "BODYTOP TEST", "BODYBOTTOM TEST");
      $text = "じゅげむじゅげむごこうのすりきれ";
      $html = $text;
      $test->onPageRendered($html);
      $this->assertEquals($text, $html);
    }, $this, 'Pico_AppendHTML')->__invoke();
  }

  /**
   * 以下の状態において、値が変更されないことを確認する。
   *
   * 入力値：すべて
   * HTML：非テキスト(バイナリデータ)
   */
  public function testBinaryData() {
    Closure::bind(function() {
      $test = $this->getTest("HEADING TEST", "BODYTOP TEST", "BODYBOTTOM TEST");
      $bin = file_get_contents(__DIR__ . "/test.png");
      $html = $bin;
      $test->onPageRendered($html);
      $this->assertEquals($bin, $html);
    }, $this, 'Pico_AppendHTML')->__invoke();
  }

}