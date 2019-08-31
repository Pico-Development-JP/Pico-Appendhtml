# pico-uppendhtml

すべてのHTMLに特定のテキストを追加するプラグインです。追加内容はconfig.phpで設定可能です。

## 使用方法

1. プラグインをダウンロードし、`plugins`フォルダに`Pico_AppendHTML`というフォルダ名で保存する
2. `config/config.yml`に、`Pico_AppendHTML.enabled: true`という行を書き加える
3. `config/config.yml`出力したいRSSに対応した設定を行う(以下コンフィグオプション参照)

## 記事に追加する値

なし

## 追加するTwig変数

なし

## コンフィグオプション

```yaml
appendhtml:
  head: <head>終了タグ直前に挿入する文字列およびタグ
  bodytop: <body>開始タグ直後に挿入する文字列およびタグ
  bodybottom: <body>終了タグ直前に挿入する文字列およびタグ
```

### 記入例

```yaml
appendhtml:
  head: <!-- This header was added by the AppendHTML plug-in. -->
  bodytop: <p>This tag was added by the AppendHTML plug-in.</p>
  bodybottom: <p> This tag was added by the AppendHTML plug-in. </p>
```
