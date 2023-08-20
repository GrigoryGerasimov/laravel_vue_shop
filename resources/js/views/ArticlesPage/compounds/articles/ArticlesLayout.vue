<script>
import ArticleAsGridElement from './ArticleAsGridElement.vue'
import ArticleAsListElement from './ArticleAsListElement.vue'

export default {
  name: 'ArticlesLayout',

  components: {
    ArticleAsGridElement,
    ArticleAsListElement
  },

  props: {
    articles: Object
  },

  data() {
    return {
      popupArticle: null
    }
  },

  inject: ['requestArticle'],

  methods: {
    async getArticle(id) {
      try {
        this.popupArticle = await this.requestArticle(id)
      } catch (err) {
        console.error(err.message)
      }
    }
  },
}
</script>

<template>
  <div class="row">
    <div class="col-12">
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-grid" role="tabpanel" aria-labelledby="pills-grid-tab">
          <div class="row">
            <div class="col-xl-4 col-lg-6 col-6" v-for="article in articles">

              <ArticleAsGridElement
                  :article="article"
                  :popupArticle="popupArticle"
                  :getArticle="getArticle"
              />

            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
          <div class="row ">
            <div class="col-12" v-for="article in articles">

              <ArticleAsListElement
                  :article="article"
                  :popupArticle="popupArticle"
                  :getArticle="getArticle"
              />

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>
