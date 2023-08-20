<script>
export default {
  name: 'ArticleCategories',

  inject: ['categories', 'getCategoriesData'],

  methods: {
    async getFilterParams(categoryId) {
      try {
        const filterParams = {
          category: [categoryId]
        }

        const { data } = await this.axios.post('/api/articles', filterParams)

        this.$emit('getFilteredDataPerCategory', [data, filterParams])
      } catch (err) {
        console.error(err.message)
      }
    },
  }
}
</script>

<template>
  <section class="product-categories-one pb-60">
    <div class="container">
      <div class="row wow fadeInUp animated">
        <div class="col-xl-12">
          <div class="product-categories-one__inner">
            <ul>
              <li v-for="category in categories">
                <div role="button">
                  <a @click.prevent="getFilterParams(category.id)" class="img-box">
                    <div class="inner">
                      <img :src="category.preview_img" alt=""/>
                    </div>
                  </a>
                  <div class="title">
                    <a @click.prevent="getFilterParams(category.id)">
                      <h6>{{ category.title }}</h6>
                    </a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>

</style>
