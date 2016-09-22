<?php
/**
 * すべてのHTMLに特定のテキストを追加するプラグイン
 *
 * @author TakamiChie
 */

class Pico_AppendHTML extends AbstractPicoPlugin {
  protected $enabled = false;
  private $addhtml;

  public function onConfigLoaded(array &$config)
  {
    $this->addhtml = array();
    if(isset($config['appendhtml'])){
      $this->addhtml = $config['appendhtml'] + $this->addhtml;
    }
  }

  public function onPageRendered(&$output)
  {
    if(isset($this->addhtml['head'])){
      $output = preg_replace("/<\/head>/", $this->addhtml['head'] . "\n</head>", $output, 1);
    }
    if(isset($this->addhtml['bodytop'])){
      $output = preg_replace("/<body>/", "<body>\n" . $this->addhtml['bodytop'], $output, 1);
    }
    if(isset($this->addhtml['bodybottom'])){
      $output = preg_replace("/<\/body>/", $this->addhtml['bodybottom'] . "\n</body>", $output, 1);
    }
  }
}

?>