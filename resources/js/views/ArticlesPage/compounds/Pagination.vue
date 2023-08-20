<script>
export default {
  name: 'Pagination',

  props: {
    articles: Object,
    filterParams: Object,
    sortParams: Object,
    itemsPerPage: Number
  },

  watch: {
    articles: {
      handler() {
        this.articlesMetadata = this.articles.meta
      }
    },

    itemsPerPage: {
      async handler() {
        await this.getArticlesPerPage(1)
      }
    }
  },

  emits: ['getPaginatedData'],

  data() {
    return {
      articlesMetadata: null
    }
  },

  methods: {
    async getArticlesPerPage(pageId) {
      try {
        const paginationParams = { ...this.filterParams, ...this.sortParams, itemsPerPage: this.itemsPerPage, pageId: Number(pageId) }

        const { data } = await this.axios.post('/api/articles', paginationParams)

        this.articlesMetadata = data.meta
        this.$emit('getPaginatedData', [data, paginationParams])
      } catch (err) {
        console.error(err)
      }
    }
  }
}
</script>

<template>
  <ul class="pagination text-center" v-if="articlesMetadata">
    <li class="next" v-if="articlesMetadata.current_page !== 1">
      <a role="button" @click.prevent="getArticlesPerPage(articlesMetadata.current_page - 1)">
        <i class="flaticon-left-arrow-1" aria-hidden="true"></i>
      </a>
    </li>

    <template v-for="link in articlesMetadata.links.map(l => ({ ...l, label: Number(l.label) }))">
      <li v-if="link.label === 1 || link.label === articlesMetadata.last_page || link.label === articlesMetadata.current_page">
        <a
            role="button"
            @click.prevent="getArticlesPerPage(link.label)"
            :style="`${ link.active ? 'background-color: var(--thm-base)'  : '' }`"
        >
          {{ link.label }}
        </a>
      </li>
      <li v-else-if="articlesMetadata.current_page - link.label < 2 && articlesMetadata.current_page - link.label > -2">
        <a>...</a>
      </li>
    </template>

    <li class="next" v-if="articlesMetadata.current_page !== articlesMetadata.last_page">
      <a role="button"
         @click.prevent="getArticlesPerPage((articlesMetadata.current_page + 1) > articlesMetadata.last_page ? articlesMetadata.last_page : articlesMetadata.current_page + 1)">
        <i class="flaticon-next-1" aria-hidden="true"></i>
      </a>
    </li>
  </ul>
</template>

<style scoped>

</style>
