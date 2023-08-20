import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Main',
      component: () => import('../views/MainPage/index.vue')
    },
    {
      path: '/articles',
      name: 'Articles',
      component: () => import('../views/ArticlesPage/index.vue')
    },
    {
      path: '/articles/:id',
      name: 'Article',
      component: () => import('../views/SingleArticlePage/index.vue')
    },
    {
      path: '/cart',
      name: 'Cart',
      component: () => import('../views/CartPage/index.vue')
    }
  ]
})

export default router
