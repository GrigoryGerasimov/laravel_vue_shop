<script>
import ArticlePopupDetails from './ArticlePopupDetails.vue'

export default {
  name: 'ArticleAsListElement',
  components: {
    ArticlePopupDetails
  },

  props: {
    article: Object,
    popupArticle: Object,
    getArticle: Function,
    handleAddingToCart: Function
  },

  inject: ['reserveQty'],

  data() {
    return {
      listArticle: this.article
    }
  },

  watch: {
    popupArticle: {
      handler() {
        this.listArticle = this.popupArticle
      }
    }
  }
}
</script>

<template>
  <div class="product-grid-two list mt-30 ">
    <div class="product-grid-two__img">

      <router-link :to="{ name: 'Article', params: { id: article.id } }" class="d-block">
        <img :src="article.preview_img" class="first-img" :alt="article.title"/>
        <img :src="article.article_imgs[0]" :alt="article.title" class="hover-img"/>
      </router-link>

      <div class="products-grid-one__badge-box"></div>
    </div>

    <ArticlePopupDetails
        :popupArticleData="listArticle"
        :reserveQty="reserveQty"
        :getArticle="getArticle"
    />

    <div class="product-grid-two-content text-center">
      <span>{{ article.category.title }}</span>
      <h5>
        <router-link :to="{ name: 'Article', params: { id: article.id } }">{{ article.title }}</router-link>
      </h5>
      <p>
        <del v-if="article.previous_price">{{ article.previous_price }}&#8364;</del>
        {{ article.recommended_retail_price }}&#8364;
      </p>
      <p class="text">{{ article.description }}</p>

      <div class="product-grid-two__overlay-box">
        <div class="title">
          <h6>
            <a @click.prevent="reserveQty(article, 1)">Add To Cart</a>
          </h6>
        </div>
        <div class="icon">
          <ul>
            <li>
              <a
                  @click.prevent="getArticle(article.id)"
                  :href="`#popup${listArticle.id}`"
                  class="popup_link"
              >
                <i class="flaticon-eye"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>
