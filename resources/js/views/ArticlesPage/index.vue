<script>
import {
  ArticlesPageBreadcrumbs,
  ArticleCategories,
  ArticleFilterSidebar,
  ArticlesLayout,
  ArticleShowingOptions,
  Pagination
} from './compounds'
import keys from '../../services/keys'

export default {
  name: 'index',

  components: {
    Pagination,
    ArticleShowingOptions,
    ArticleCategories,
    ArticlesPageBreadcrumbs,
    ArticleFilterSidebar,
    ArticlesLayout
  },

  data() {
    return {
      articles: [],
      filterParams: {},
      paginationParams: {},
      sortParams: {},
      itemsPerPage: null
    }
  },

  methods: {
    async getArticlesData() {
      try {
        const { data } = await this.axios('/api/articles')
        this.articles = data
      } catch (err) {
        console.error(err.message)
      }
    },

    getFilteredData(data) {
      const [filteredData, filterParams] = data
      this.articles = filteredData
      this.filterParams = filterParams
    },

    getFilteredDataPerCategory(data) {
      const [filteredData, filterParams] = data
      this.articles = filteredData
      this.filterParams = filterParams
      this.paginationParams = {}
      this.sortParams = {}
      this.itemsPerPage = null
    },

    getSortedData(data) {
      const [sortedData, sortParams] = data
      this.articles = sortedData
      this.sortParams = sortParams
    },

    getDataPerPage(data) {
      const [paginatedData, paginationParams] = data
      this.articles = paginatedData
      this.paginationParams = paginationParams
    },

    getCountPerPage(data) {
      this.itemsPerPage = data
    }
  },

  mounted() {
    $(document).trigger(keys.JQ_TRIGGER_KEY)

    this.getArticlesData()
  }
}
</script>

<template>
  <main class="overflow-hidden ">

    <ArticlesPageBreadcrumbs/>

    <ArticleCategories
        @getFilteredDataPerCategory="getFilteredDataPerCategory"
    />

    <div class="product-grid pt-60 pb-120">

      <div class="container">
        <div class="row gx-4">
          <div class="col-xl-3 col-lg-4">

            <ArticleFilterSidebar
                :sortParams="sortParams"
                :itemsPerPage="itemsPerPage"
                @getFilteredData="getFilteredData"
            />

          </div>
          <div class="col-xl-9 col-lg-8">

            <div class="row">
              <div class="col-xl-12">

                <ArticleShowingOptions
                    :articles="articles"
                    :filterParams="filterParams"
                    :paginationParams="paginationParams"
                    @getSortedArticles="getSortedData"
                    @getItemsPerPage="getCountPerPage"
                />

              </div>
            </div>

            <ArticlesLayout :articles="articles.data"/>

            <div class="row">
              <div class="col-12 d-flex justify-content-center wow fadeInUp animated">

                <Pagination
                    :articles="articles"
                    :itemsPerPage="itemsPerPage"
                    :filterParams="filterParams"
                    :sortParams = "sortParams"
                    @getPaginatedData="getDataPerPage"
                />

              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </main>
</template>

<style scoped>

</style>
