opCommunityDesignPlugin
=======================

OpenPNE で管理画面からコミュニティごとに個別のデザイン設定をするためのプラグインです。

機能概要
--------

管理画面にコミュニティごとのデザイン設定画面が追加され、個別にデザインの設定をすることができるようになります。

OpenPNE ではエンドユーザーが自由にコミュニティを作成できるため、公式・公認コミュニティや管理側で特に目立たせたいコミュニティなどがあったとしても、コミュニティ名やアイコン画像と説明文だけではどうしても通常のコミュニティとの差別化が難しく埋もれてしまいがちという問題があります。
このプラグインを使えば特定のコミュニティにのみアイキャッチ画像を追加したり、配色を変更したりすることができるので、特別なコミュニティであることを視覚的にわかりやすくすることができます。

現在、設定できる項目は以下の2項目です。（PC画面のみ）

* CSS
* ヘッダーHTML

デザイン設定画面へは、コミュニティ管理内のコミュニティリストで「個別デザイン設定」のリンクからアクセスすることができます。

対応バージョン
--------------

* OpenPNE 3.8.0 以上

インストール方法
----------------

opCommunityDesignPlugin のソースコードを OpenPNE の plugins ディレクトリに設置した後に以下のコマンドを実行してください。

    $ php symfony plugin:publish-assets
    $ php symfony cc
