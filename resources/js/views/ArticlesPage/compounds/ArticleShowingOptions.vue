<script>
export default {
  name: 'ArticleShowingOptions',

  props: {
    articles: Object,
    paginationParams: Object,
    filterParams: Object
  },

  emits: ['getSortedArticles', 'getItemsPerPage'],

  methods: {
    async sortArticles(name, key = 'asc') {
      const sortingParams = {...this.filterParams, ...this.paginationParams, col: name, dir: key}

      const {data} = await this.axios.post('/api/articles', sortingParams)

      this.$emit('getSortedArticles', [data, sortingParams])
    }
  },

  mounted() {
    $('#sort').on('change', ({target}) => {
      const [name, key] = target.value.split('::')
      this.sortArticles(name, key)
    })

    $('#itemsPerPage').on('change', ({target}) => {
      const {value} = target
      this.$emit('getItemsPerPage', Number(value))
    })
  }
}
</script>

<template v-if="articles">
  <div class="shop-grid-page-top-info p-0 justify-content-md-between justify-content-center">
    <div class="right-box wow fadeInUp animated">
      <div class="short-by">
        <div class="select-box">
          <select id="itemsPerPage" class="wide">
            <option data-display="3">3</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="30">30</option>
            <option value="50">50</option>
          </select>
        </div>
      </div>
    </div>

    <div class="right-box justify-content-md-between justify-content-center align-items-baseline wow fadeInUp animated">
      <div class="short-by">
        <div class="select-box">
          <select id="sort" class="wide">
            <option data-display="Short by latest">Featured</option>
            <option value="title::asc">Alphabetically, A-Z</option>
            <option value="title::desc">Alphabetically, Z-A</option>
            <option value="recommended_retail_price::asc">Price, low to high</option>
            <option value="recommended_retail_price::desc">Price, high to low</option>
            <option value="created_at::asc">Date, new to old</option>
            <option value="created_at::desc">Date, old to new</option>
          </select>
        </div>
      </div>

      <div class="product-view-style d-flex justify-content-md-between justify-content-center">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button
                class="nav-link active"
                id="pills-grid-tab"
                data-bs-toggle="pill"
                data-bs-target="#pills-grid"
                type="button"
                role="tab"
                aria-selected="true"
            >
              <i class="flaticon-grid"></i>
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
                class="nav-link"
                id="pills-list-tab"
                data-bs-toggle="pill"
                data-bs-target="#pills-list"
                type="button"
                role="tab"
                aria-selected="false"
            >
              <i class="flaticon-list"></i>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <p class="mt-3">Showing {{ articles?.meta?.from }}–{{ articles?.meta?.to }} of {{ articles?.meta?.total }} Results</p>
</template>

<style scoped>

</style>
