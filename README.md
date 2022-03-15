# Rese-reservationsystem

とある企業のグループ会社の飲食店予約サービスです。


# DEMO

<http://still-hollows-32002.herokuapp.com>
 <img width="1437" alt="shop_all" src="https://user-images.githubusercontent.com/89112485/158315174-c5ec560f-1089-4947-a8c8-1e48d817e76c.png">

# Features

* ユーザー登録をして、店舗の予約ができる
* お店のお気に入り登録ができる
* マイページで予約状況とお気に入り状況が一目でわかる
* シンプルなデザインでわかりやすい


# Requirement

* Laravel 7.3.0
* MySQL 5.7


# Installation (for Mac)

### Laravel（Laravelを利用するために用いるプログラム＝**Composer**のダウンロード）
 1. Composer公式サイトにアクセス
     <https://getcomposer.org/download/>
  
 2. ページの下部にある「Manual Download」から2.〇.〇の最新バージョンのリンクをクリック（＝「compose.phar」ファイルが「ダウンロードフォルダ」にダウンロードされる）
  
 3. ターミナルを起動後、下記コマンドを実行
     ```bash
     cd Downloads
     sudo mv composer.phar /usr/local/bin/composer
     chmod a+x /usr/local/bin/composer
     ``` 
 4. 下記コマンドを実行し、Composerバージョンが返ってきたらダウンロード成功
     ```bash
     composer -v
     ``` 
    （成功例）
     ```bash
     Composer version 2.0.8 2020-12-03 17:20:38
     ``` 

### MySQL （MySQLを利用する為のアプリケーション=**MAMP**のダウンロード）
  1. MAMPの公式サイトにアクセス
      <https://www.mamp.info/en/downloads/>

  2. Appleマークがある、「MAMP ＆MAMP PRO」をクリック

  3. ファイルがダウンロードされるので、インストーラーのウィザードに従ってインストールを進める。（基本的にすべて「続ける」をクリック）


# Usage

**店舗一覧**

 Reseに登録されている店舗の一覧が表示されています。右上の検索にて、店舗の絞り込み検索が可能です。
 

**店舗詳細**

予約したいお店の「詳細をみる」をクリックし、お店の詳細を見ることができます。
 

**会員登録**

ユーザーネーム・メールアドレス・パスワードを入力して、会員登録ができます。

会員登録をして、ログインをすると下記のことが利用できます。
 
1. お店のお気に入り登録をすることができる。
2. 店舗詳細にて、予約することができる。
3. マイページにて、お気に入り店舗・予約状況を確認することができる。
 
# Author

* Ayano Minami
* @ayanodame

