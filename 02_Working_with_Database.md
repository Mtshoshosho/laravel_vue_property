## Laravel DebugbarとIDEヘルパー (Laravel Debugbar &IDE Helper)
### Debugbarのインストール (Installing Debugbar)

```terminal
composer require barryvdh/laravel-debugbar --dev
```

.envファイルのAPP_DEBUGをtrueにする

[Debugbarについて](https://github.com/barryvdh/laravel-debugbar)

### IDE Helperのインストール (Installing IDE Helper)

```terminal
composer require --dev barryvdh/laravel-ide-helper
```

[IDE Helperについて](https://github.com/barryvdh/laravel-ide-helper)

IDE Helperパッケージを使用して補助情報ファイルを生成

```terminal
php artisan ide-helper:generate
```
composer.jsonの"scripts"セクションの"post-update-cmd"に"@php artisan ide-helper:generate"と"@php artisan ide-helper:meta"を追加すると、composer updateコマンドを実行した際に、自動的にこれらのコマンドも実行される。
- @php artisan ide-helper:generateコマンドはLaravelのFacadeや他のクラスについての補助情報を生成
- @php artisan ide-helper:metaコマンドはPHPStormなどのIDEで利用可能な.phpstorm.meta.phpファイルを生成
```json
"@php artisan ide-helper:generate",
"@php artisan ide-helper:meta"
```

## データベースへの接続 (Connecting to the Database)
### docker-compose.ymlの作成 (Creating docker-compose.yml)
[Dockerについての解説](https://fadocodecamp.com/running-a-mysql-database-with-docker-compose-a-beginners-guide/)
```yml
version: "3.9"
services:
  mysql:
    image: mariadb:10.8.3
    # Appleシリコンの場合以下を追加
    platform: linux/arm64/v8
    command: --default-authentication-plugin=mysql_native_password
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: root
    ports:
      - 3306:3306
  adminer:
    image: adminer
    restart: always
    ports:
      - 8080:8080
```
Docker Composeを使ってMySQL（ここではMariaDBのイメージを使用）とAdminerを立ち上げるための設定

この**`docker-compose.yml`**ファイルは、Docker Composeを使ってMySQL（ここではMariaDBのイメージを使用）とAdminerを立ち上げるための設定が書かれています。

各行の詳細は以下：

```yaml
version: "3.9"

```
この行は、使用するDocker Composeのバージョンを指定しています。ここではバージョン3.9を使用しています。

```yaml
services:

```
この行からは、起動するサービス（Dockerコンテナ）の定義が始まります。

```yaml
  mysql:

```
この行は、MariaDB（MySQLのフォークで完全互換）のコンテナを定義しています。

```yaml
    image: mariadb:10.8.3

```
MariaDBのバージョン10.8.3のイメージを指定しています。

```yaml
    platform: linux/arm64/v8

```
この行は、Apple Silicon（M1チップなど）で動作させる場合に必要な設定です。これにより、ARM64アーキテクチャのLinuxをターゲットとします。

```yaml
    command: --default-authentication-plugin=mysql_native_password

```
MariaDBコンテナ起動時に実行されるコマンドです。ここでは、デフォルトの認証プラグインを**`mysql_native_password`**に設定しています。

```yaml
    restart: always

```
この行は、コンテナが何らかの理由で終了した場合に、常に自動的に再起動するように設定しています。

```yaml
    environment:
      MYSQL_ROOT_PASSWORD: root

```
環境変数を設定しています。ここでは、MariaDBのrootユーザのパスワードを**`root`**に設定しています。

```yaml
    ports:
      - 3306:3306

```
ホストマシンのポート3306を、コンテナ内のポート3306にマッピング（つなげる）設定をしています。

```yaml
  adminer:

```
Adminer（データベースの管理ツール）のコンテナを定義しています。

```yaml
    image: adminer

```
Adminerの最新バージョンのイメージを使用します。

```yaml
    restart: always

```
Adminerコンテナも何らかの理由で終了した場合に常に自動的に再起動するように設定しています。

```yaml
    ports:
      - 8080:8080

```
ホストマシンのポート8080を、Adminerコンテナ内のポート8080にマッピングしています。

### Dockerコンテナの起動 (Starting Docker Containers)
```terminal
docker-compose up -d
```

### Laravelのデータベース設定 (Laravel Database Configuration)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_vue_property
DB_USERNAME=root
DB_PASSWORD=root
```

### Adminerの利用 (Using Adminer)
http://localhost:8080/ にアクセスすると、Adminerが起動します。
- データベース種類：MySQL
- サーバー：mysql
- ユーザー名：root
- パスワード：root

にてログインすると、データベースの管理画面が表示されます。

MySQLサービスは mysql という名前でホストされていると想定されます。したがって、PHPアプリケーションからデータベースに接続する際、ホスト名として mysql を使用する必要があります。

### データベースの作成 (Creating a Database)
- データベース名:laravel_vue_property
- 文字コード:utf8mb4_general_ci

### DB接続の確認 (Checking the DB)
```terminal
php artisan db:show
```

## モデルとマイグレーション (Models and Migrations)
### modelとmigrationの作成 (Creating a Model and Migration)
```terminal 
php artisan make:model Listing -m
```
**Listing**という名前のモデルを作成し、同時にそれに関連する新しいデータベースのマイグレーションファイルを生成します。-mオプションは、"マイグレーションを作成する"という意味


[モデルクラスを生成する(Generating Model Classes)](https://laravel.com/docs/9.x/eloquent#table-names)


## マイグレーションの操作 (Working with Migrations)
### マイグレーションの実行 (Running Migrations)
```terminal
php artisan migrate
```
まだ適用されていないマイグレーションをデータベースに適用します。

### フィールドを追加 (Adding Fields)
```terminal
php artisan make:migration add_fields_to_listings_table
```
既存のlistingsテーブルに新しいフィールドを追加したり、既存のフィールドを変更したりするためのマイグレーションファイルを作成します。

マイグレーションファイルの実行状態の確認
```terminal
php artisan migrate:status
```
すると上記で追加したマイグレーションファイルが未実行の状態(**Pending**)になっている。


### マイグレーションのロールバック (Rolling Back Migrations)
```terminal
php artisan migrate:rollback
```
最後に実行されたマイグレーションをロールバックします。すると、上記で追加した未実行の状態(**Pending**)のマイグレーションファイルが消えている。

### 追加したフィールドの内容　(Contents of a Migration File)
| フィールド名 | 型 | 長さ | 説明 |
| --- | --- | --- | --- |
| property_name | string | 100 | 物件名 |
| year_built | unsigned integer | - | 築年数 |
| postal_code | string | 7 | 郵便番号 |
| prefecture | string | 10 | 都道府県 |
| city | string | 50 | 市区町村 |
| address1 | string | 50 | 市区町村以下の住所 |
| nearest_station | string | 100 | 最寄駅 |
| floor | unsigned integer | - | 建物の階数 |
| rent | unsigned integer | - | 賃料 |
| administration_fee | unsigned integer | - | 管理費 |
| security_deposit | unsigned integer | - | 敷金 |
| gratuity_fee | unsigned integer | - | 礼金 |
| floor_plan | string | 50 | 間取り |
| exclusive_area | decimal | 8,2 | 専有面積 |

**`up`**メソッド：
  - このメソッドはマイグレーションが実行されるときに呼び出されます。データベースのテーブルを新規作成したり、テーブル構造を変更したり、データを挿入したりするような操作をここに記述します。
  
**`down`**メソッド：
  - このメソッドはマイグレーションがロールバック（元に戻す操作）されるときに呼び出されます。**`up`**メソッドで行った操作を元に戻すための操作をここに記述します。例えば、**`up`**メソッドでテーブルを新規作成した場合、**`down`**メソッドではそのテーブルを削除します

### マイグレーションの実行 (Running Migrations)
```terminal
php artisan migrate
```
マイグレーションを実行すると、**`up`**メソッドで定義された内容が実行される。


## モデルファクトリとシーダー (Model Factorise & Seeders)
## データベースへのクエリ (Querying the Database)
## データの更新と挿入、マスアサインメント (Updating and Inserting Data,Mass Assignment)
## リソースコントローラとルートモデルバインディング (Resource Controller and Route Model Binding)
## Vueのディレクティブ（v-for, v-bind）とカスタムコンポーネント (Vue Directives(v-for,v-bind) & Custom Components)
## フォームの処理（useForm、v-model） (Handling Forms(useForm,v-model))
## Laravelでのフォームの処理 (Handling Forms in Laravel)
## ミドルウェアと全ページでのデータ共有 (Middlewares and Sharing Data with All Pages)
## 計算データと条件付きレンダリング（フラッシュメッセージの表示） (Computed Data and Conditional Rendering(Displaying Flash Messages))
## データバリデーション（バックエンドとフロントエンド） (Data Validation(Back End & Front End))
## フォームの編集 (Edit Form)
## データの削除 (Deleting Data)
## VueでのLaravelルート名 (Laravel Route Names in Vue)