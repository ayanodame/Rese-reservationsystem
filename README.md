# Rese-reservationsystem2

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


# Environment

1.　MAMP内のhtdocsファイルにプロジェクトを保存

2.　MAMPを立ち上げ、startボタンをクリック

3.　ターミナルにて、下記を入力し、ディレクトリ移動をする。

```bash
cd /Applications/MAMP/Library/bin
```

4.　MySQLへログインします。
 
```bash
./mysql -u root -p
```
※パスワードは「root」です。


5.　データベースを作成します。
```bash
CREATE DATABASE 「データベース名」;
```

6.　.envファイルを、下記のように修正してください。
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=「データベース名」←5で作成したデータベース名。
DB_USERNAME=root
DB_PASSWORD=root
```
※MAIL環境については、ご自身のご使用しているアカウントに合わせて設定してください。

7.　ターミナルにて、Laravelプロジェクト配下で、下記を入力し、データを挿入
```bash
php artisan migrate
php artisan db:seed
```

8. ターミナルにて、Laravelプロジェクト配下で下記を入力してサーバーを立ち上げることができます。  
「http://127.0.0.1:8000
」にアクセスするとアプリを確認することができます。
```bash
php artisan serve
```


# Usage

### 【ユーザー】

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
 
 
### 【管理者】

**店舗担当者一覧**
 
登録した店舗担当者の一覧が表示されています。上部の検索にて、担当者の絞り込み検索が可能です。
また、エリア・ジャンルの一覧が表示されています。
 
管理者は下記のことが利用できます。
 
1. 店舗担当者の登録をすることができる。
2. エリアの登録ができる。
3. ジャンルの登録ができる。 
 
 
 
### 【店舗担当者】

**店舗担当者画面**

担当店舗の情報が表示されています。
担当店舗の予約状況も確認することができます。

店舗担当者は下記のことが利用できます。

1. 店舗登録済みの担当者は、店舗情報の更新ができる。
2. 店舗登録済みでない担当者は、店舗登録ができる。


# Author

* Ayano Minami
* @ayanodame

