<script>
import ArticlePopupDetails from './ArticlePopupDetails.vue'

export default {
  name: 'ArticleAsGridElement',

  components: {
    ArticlePopupDetails
  },

  props: {
    article: Object,
    popupArticle: Object,
    getArticle: Function
  },

  inject: ['reserveQty'],

  data() {
    return {
      gridArticle: this.article
    }
  },

  watch: {
    popupArticle: {
      handler() {
        this.gridArticle = this.popupArticle
      }
    }
  }
}
</script>

<template>
  <div class="products-three-single w-100">

    <div class="products-three-single-img">

      <router-link :to="{ name: 'Article', params: { id: article.id } }" class="d-block">
        <img :src="article.preview_img" class="first-img article-img__params" :alt="article.title"/>
        <img :src="article.article_imgs[0]" class="hover-img article-img__params" :alt="article.title"/>
      </router-link>

      <div class="products-grid-one__badge-box"></div>

      <a
          role="button"
          class="addcart btn--primary style2"
          @click.prevent="reserveQty(article, 1)"
      >
        Add To Cart
      </a>

      <div class="products-grid__usefull-links grid-links__additional-positioning">
        <a
            @click.prevent="getArticle(article.id)"
            :href="`#popup${gridArticle.id}`"
            class="popup_link"
        >
          <i class="flaticon-visibility"></i>
          <span>quick view</span>
        </a>
      </div>

    </div>

    <ArticlePopupDetails
        :popupArticleData="gridArticle"
        :getArticle="getArticle"
        :reserveQty="reserveQty"
    />

    <div class="products-three-single-content text-center">
      <span>{{ article.category.title }}</span>
      <h5>
        <router-link :to="{ name: 'Article', params: { id: article.id } }">{{ article.title }}</router-link>
      </h5>
      <p>
        <del v-if="article.previous_price">{{ article.previous_price }}&#8364;</del>
        {{ article.recommended_retail_price }}&#8364;
      </p>
    </div>

  </div>
</template>

<style scoped>
.article-img__params {
  height: 390px;
  object-fit: cover;
}
.grid-links__additional-positioning {
  top: 10%;
}
</style>