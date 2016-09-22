# pico-uppendhtml
すべてのHTMLに特定のテキストを追加するプラグインです。追加内容はconfig.phpで設定可能です。

## 記事に追加する値

なし

##  追加するTwig変数

なし

##  コンフィグオプション

 * $config['appendhtml']['head']:<head>終了タグ直前に挿入する文字列およびタグ
 * $config['appendhtml']['bodytop']:<body>開始タグ直後に挿入する文字列およびタグ
 * $config['appendhtml']['bodybottom']:<body>終了タグ直前に挿入する文字列およびタグ