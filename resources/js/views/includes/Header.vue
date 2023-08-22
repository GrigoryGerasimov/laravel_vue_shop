<script>
import { defineComponent } from 'vue'
import CartQuickView from '../CartPage/CartQuickView.vue'
import router from '../../router'

export default defineComponent({
  name: 'Header',

  components: {
    CartQuickView
  },

  inject: ['reservedUnits', 'categories', 'getCategoriesData'],

  data() {
    return {
      searchedTitle: null
    }
  },

  methods: {
    async handleSubmit() {
      try {
        const { data } = await this.axios.post('/api/articles/search', { title: this.searchedTitle })
        if (data) await router.push({ name: 'Article', params: { id: data.id }})
        this.searchedTitle = null
      } catch (err) {
        console.error(err)
      }
    }
  },

  mounted() {
    $(".mobile-menu__sidebar-menu .dropdown-list .menuarrow").on("click", function () {
      $(this).parent().parent().find(".dropdown").toggle(300);
      $(this).parent().parent().toggleClass("active");
    });

    $('.mobile-menu__sidebar-menu .dropdown').on("click", function (e) {
      if (e.target.classList.contains('flaticon-next-1')) {
        $(e.target).parent().parent().parent().find(".subdropdown").toggle(300);
        $(e.target).parent().parent().parent().toggleClass("active");
      }
    });
  }
})
</script>

<template>
  <header class="header-style-3">
    <div class="menubox">
      <div class="container-fluid">
        <div class="row d-lg-none d-block">

          <div class="mobile-menu ">
            <div class="mobile-menu__menu-top border-bottom-0">
              <div class="container">
                <div class="row">
                  <div class="menu-info d-flex justify-content-between align-items-center">
                    <div class="menubar">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    <router-link :to="{ name: 'Main' }" class="logo">
                      <img src="main/images/logo/logo.png" alt="">
                    </router-link>
                    <div class="cart-holder">
                      <a role="button" class="cart cart-icon position-relative">
                        <i class="flaticon-shopping-cart"></i>
                        <small class="count">({{ reservedUnits.length }})</small>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="menu-closer"></div>
            <div class="mobile-menu__sidebar-menu">
              <div class="menu-closer two">
                <span>Shoppy Menu</span>
                <span class="cross">
                  <i class="flaticon-cross"></i>
                </span>
              </div>

              <div class="search-box-holder">
                <form @submit.prevent="handleSubmit">
                  <div class="form-group search-box menu">
                    <input type="text" class="form-control" placeholder="Search for products" v-model="searchedTitle">
                    <span class="search-icon">
                        <button type="submit" class="btn bg-transparent border-0 m-0 p-0">
                          <i class="flaticon-magnifying-glass"></i>
                        </button>
                    </span>
                  </div>
                </form>
              </div>

              <ul class="page-dropdown-menu">
                <li class="dropdown-list">
                  <router-link :to="{ name: 'Main' }">
                    <span>Home</span>
                  </router-link>
                </li>
                <li class="dropdown-list">
                  <router-link :to="{ name: 'Articles' }">
                    <span>Articles</span>
                    <span class="menuarrow">
                      <i class="flaticon-next-1"></i>
                    </span>
                  </router-link>
                  <ul class="dropdown">
                    <li class="subhed position-relative" v-if="categories" v-for="category in categories">
                      <a role="button">
                        <span>{{ category.title }}</span>
                        <span class="menuarrowtwo">
                          <i class="flaticon-next-1"></i>
                        </span>
                      </a>
                      <ul class="subdropdown">
                        <li v-for="article in category.articles">
                          <router-link :to="{ name: 'Article', params: { id: article.id } }">{{ article.title }}</router-link>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>
                    <router-link :to="{ name: 'Login' }">Sign In</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'Register' }">Sign Up</router-link>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="d-lg-block d-none">
          <div class="row g-0 position-relative">
            <div class="col-lg-3 d-flex align-items-center justify-content-center border-rit ">
              <div class="logo">
                <router-link :to="{ name: 'Main' }">
                  <img src="main/images/logo/logo.png" alt="">
                </router-link>
              </div>
            </div>
            <div class="col-lg-9 g-0 p-0">
              <div class="row g-0 holder">
                <div class="col-12">
                  <div class="some-info">
                    <p class="d-flex align-items-center">
                      <span class="icon">
                        <i class="flaticon-power"></i>
                      </span>Welcome to Shoppy Online Shop - Your Best Guide in Fashion Streetwear World
                    </p>
                    <div class="right d-flex align-items-center ">
                      <router-link :to="{ name: 'Login' }">
                          Sign In / Sign Up
                      </router-link>
                    </div>
                  </div>
                </div>
              </div>

              <div class="border-one"></div>
              <div class="row g-0 holder">
                <div class="col-12">
                  <div class="mega-menu-default mega-menu d-lg-block d-none">
                    <div class=" d-flex align-items-center justify-content-between ">
                      <nav>
                        <ul class="page-dropdown-menu d-flex align-items-center justify-content-center">
                          <li class="dropdown-list">
                            <router-link :to="{ name: 'Main' }">
                              <span>Home</span>
                            </router-link>
                          </li>
                          <li class="dropdown-list">
                            <router-link :to="{ name: 'Articles' }">
                              <span>Articles</span>
                              <span class="menuarrow"><i class="flaticon-down-arrow"></i></span>
                            </router-link>
                            <ul class="dropdown">
                              <li class="submenu-parent" v-if="categories" v-for="category in categories">
                                <a role="button">
                                  <span>{{ category.title }}</span>
                                  <span class="menuarrow">
                                      <i class="flaticon-next-1"></i>
                                    </span>
                                </a>
                                <ul class="submenu">
                                  <li v-for="article in category.articles">
                                    <router-link :to="{ name: 'Article', params: { id: article.id } }">
                                        {{ article.title }}
                                    </router-link>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                            <li class="dropdown-list">
                                <a href="/admin">
                                    <span>Admin</span>
                                </a>
                            </li>
                        </ul>
                      </nav>

                      <div class="right d-flex align-items-center justify-content-end">
                        <ul class="main-menu__widge-box d-flex align-items-center ">
                          <li class="d-lg-block d-none">
                            <a href="my-account.html">
                              <i class="flaticon-user"></i>
                            </a>
                          </li>
                          <li class="cartm">
                            <a role="button" class="number cart-icon">
                              <i class="flaticon-shopping-cart"></i>
                              <span class="count">({{ reservedUnits.length }})</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <CartQuickView :reserved-units="reservedUnits"/>

  </header>
</template>

<style scoped>

</style>
