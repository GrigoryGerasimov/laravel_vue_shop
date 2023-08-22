<script>
export default {
  name: 'MainPanelTopRatedList',

  computed: {
    articlesList() {
      return this.getTopRatedList()
    }
  },

  props: {
    getTopRatedList: Function,
    reserveQty: Function
  }
}
</script>

<template>
  <div
      class="tab-pane fade"
      id="pills-top-rated"
      role="tabpanel"
      aria-labelledby="pills-top-rated-tab"
  >
    <div class="catagory-slider-three" v-if="articlesList.length">
      <div class="products-three__inner" v-for="article in articlesList">
        <div class="products-three-single w-100">
          <div class="products-three-single-img">
            <router-link :to="{ name: 'Article', params: { id: article.id } }" class="d-block">
              <img
                  :src="article.preview_img"
                  :alt="article.title"
                  class="first-img"
              />
              <img
                  :src="article.article_imgs[0]"
                  :alt="article.title"
                  class="hover-img"
              />
            </router-link>

            <div class="products-grid-one__badge-box">
              <span class="bg_base badge new ">New</span>
              <span class="bg_black badge discount">-40%</span>
            </div>

            <a
                role="button"
                class="addcart btn--primary style2"
                @click.prevent="reserveQty(article, 1)"
            >
              Add To Cart
            </a>
          </div>
          <div class="products-three-single-content text-center">
            <span>{{ article.category.title }}</span>
            <h5>
              <router-link :to="{ name: 'Article', params: { id: article.id } }">{{
                  article.content
                }}
              </router-link>
            </h5>
            <p>{{ article.recommended_retail_price }}&#8364;</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>
