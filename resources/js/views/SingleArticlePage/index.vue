<script>
import {
  SingleArticlePageBreadcrumbs,
  SingleArticlePreview,
  SingleArticleDetails,
  SingleArticleExtraDetails
} from './compounds'

export default {
  name: 'index',

  components: {
    SingleArticlePageBreadcrumbs,
    SingleArticlePreview,
    SingleArticleDetails,
    SingleArticleExtraDetails
  },

  data() {
    return {
      article: null
    }
  },

  computed: {
    routeId() {
      return this.$route.params.id
    }
  },

  watch: {
    routeId: {
      handler() {
        this.getArticle()
      }
    }
  },

  inject: ['requestArticle'],

  methods: {
    async getArticle() {
      const { data } = await this.axios(`/api/articles/${this.$route.params.id}`)
      this.article = data
    },

    async getArticleVariant(id) {
      try {
        this.article = await this.requestArticle(id)
      } catch (err) {
        console.error(err.message)
      }
    },
  },

  mounted() {
    this.getArticle()
  }
}
</script>

<template>
  <main v-if="article">
    <SingleArticlePageBreadcrumbs/>

    <section class="shop-details-top two ">
      <div class="container">
        <div class="row mt--30">
          <SingleArticlePreview :article="article"/>
          <SingleArticleDetails :article="article" :getArticleVariant="getArticleVariant"/>
        </div>
      </div>
    </section>

    <section class="product pt-60 pb-60 wow fadeInUp overflow-hidden ">
      <div class="container">

        <SingleArticleExtraDetails :article="article"/>

      </div>
    </section>
  </main>
</template>

<style scoped>

</style>
