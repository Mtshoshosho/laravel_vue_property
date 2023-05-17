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
## モデルとマイグレーション (Models and Migrations)
## マイグレーションの操作 (Working with Migrations)
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