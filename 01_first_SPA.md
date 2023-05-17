# 01_first_SPA

## リアクティブな変数

reactive:
- メリット:
  - Options APIのDataの定義と似ている。
  - まとまったデータを定義するのに向いている。
- デメリット:
  - 通常のオブジェクトと区別がつきづらい。
  - 分割代入をするとリアクティブ性が失われる。

ref:
- メリット:
  - リアクティブなデータか判別しやすい。
- デメリット:
  - 常に.valueでアクセスする必要がある。

### 参考文献
- [リアクティビティーの基礎](https://ja.vuejs.org/guide/essentials/reactivity-fundamentals.html)
- [refとreactiveについて](https://zenn.dev/azukiazusa/articles/ref-vs-article)

## Inertiaによる永続的なレイアウト
### 参考文献
- [レイアウトの永続化](https://inertiajs.com/pages#persistent-layouts)

## デフォルトレイアウト

### app.jsの内容

```js
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import MainLayout from '@/Layouts/MainLayout.vue'

createInertiaApp({
  resolve: async (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue')
    const page = await pages[`./Pages/${name}.vue`]()
    page.default.layout = page.default.layout || MainLayout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
```
まずはじめに、createInertiaAppという関数が呼ばれています。この関数は、Inertiaアプリケーションを作成するためのものです。この関数はオブジェクトを引数に取り、そのオブジェクトは2つのメソッドを含みます：resolveとsetup。

resolveメソッド：このメソッドは、ページコンポーネントの解決を担当します。具体的には、ページの名前を引数として受け取り、対応するVueコンポーネントを動的にインポートします。ここで使用されているimport.meta.globは、指定したパターンに一致するすべてのモジュールをインポートするためのメソッドで、ここでは./Pages/**/*.vueというパターンですべてのVueコンポーネントをインポートしています。そして、await pages[./Pages/${name}.vue]()という行で、特定のページコンポーネントを非同期的にロードしています。そして、そのページコンポーネントのデフォルトレイアウトを設定し、ページコンポーネントを返しています。

setupメソッド：このメソッドは、Vueアプリケーションのセットアップを担当します。引数として、アプリケーションをマウントするための要素(el)、ルートコンポーネント(App)、初期プロパティ(props)、Inertiaプラグイン(plugin)を受け取ります。createApp関数でVueアプリケーションを作成し、render関数でルートコンポーネントをレンダリングします。そして、Inertiaプラグインを適用(use(plugin))し、指定された要素にアプリケーションをマウント(mount(el))します。
