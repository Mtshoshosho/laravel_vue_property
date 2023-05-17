import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import MainLayout from '@/Layouts/MainLayout.vue'

createInertiaApp({
  resolve: async (name) => {
    // import.meta.globはファイルを読み込む
    const pages = import.meta.glob('./Pages/**/*.vue')
    // pageを呼ぶとページコンポーネントにはデフォルトのプロパティが設定される
    const page = await pages[`./Pages/${name}.vue`]()
    // ページコンポーネントにデフォルトのレイアウトを設定する
    page.default.layout = page.default.layout || MainLayout
    // ページコンポーネントを返す
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el)
  },
})
