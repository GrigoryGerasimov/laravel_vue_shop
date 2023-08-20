<script>
export default {
  name: 'ArticleFilterSidebar',

  props: {
    sortParams: Object,
    itemsPerPage: Number
  },

  data() {
    return {
      clickedIds: [],
      categories: [],
      colors: [],
      prices: [],
      tags: [],
      categoryIds: [],
      priceVals: [],
      colorIds: [],
      tagIds: []
    }
  },

  emits: ['getFilteredData'],

  methods: {
    async getFilteredData() {
      try {
        const { data } = await this.axios('/api/filterlists')
        Object.assign(this, data)
      } catch (err) {
        console.error(err.message)
      }
    },

    handlePriceFiltering() {
      if ($('#priceRange').length) {
        const numTotalPrices = this.prices.map(Number)
        const min = Math.min(...numTotalPrices)
        const max = Math.max(...numTotalPrices)

        $('#price-range').slider({
          range: true,
          min,
          max,
          values: [min, max],
          slide: (event, ui) => {
            $('#priceRange').val(`${ui.values[0]} EUR - ${ui.values[1]} EUR`);
            this.priceVals = [ui.values[0], ui.values[1]]
          }
        })
        $('#priceRange').val(`${$('#price-range').slider('values', 0)} EUR - ${$('#price-range').slider("values", 1)} EUR`);
      }
    },

    handleClick(uid) {
      this.clickedIds = !this.clickedIds.includes(uid) ? [...this.clickedIds, uid] : this.clickedIds.filter(existingUid => existingUid !== uid)
    },

    getFilterParams({name, value}) {
      this.handleClick(`${name}::${value}`)
      this[name] = !this[name].includes(value) ? [...this[name], value] : this[name].filter(existingVal => existingVal !== value)
    },

    async handleSubmit() {
      try {
        const filterParams = {
          ...this.sortParams,
          itemsPerPage: this.itemsPerPage,
          category: this.categoryIds,
          color: this.colorIds,
          price: this.priceVals,
          tag: this.tagIds
        }

        const { data } = await this.axios.post('/api/articles', filterParams)

        this.$emit('getFilteredData', [data, filterParams])
      } catch (err) {
        console.error(err.message)
      }
    }
  },

  async mounted() {
    await this.getFilteredData()
    this.handlePriceFiltering()
  }
}
</script>

<template>
  <div class="shop-grid-sidebar">

    <button class="remove-sidebar d-lg-none d-block">
      <i class="flaticon-cross"></i>
    </button>
    <div class="sidebar-holder">

      <div class="single-sidebar-box mt-30 wow fadeInUp animated ">
        <h4>Select Categories</h4>
        <div class="checkbox-item">
          <div class="form-group" v-for="category in categories">
            <input type="checkbox" :id="category.id" name="category" :value="category.id"
                   @change="getFilterParams({ name: 'categoryIds', value: category.id })">
            <label :for="category.id">{{ category.title }}</label>
          </div>
        </div>
      </div>

      <div class="single-sidebar-box mt-30 wow fadeInUp animated">
        <h4>Color Option </h4>
        <ul class="color-option">
          <li v-for="color in colors">
            <a role="button" @click.prevent="getFilterParams({ name: 'colorIds', value: color.id })"
               class="color-option-single color-additional-styling"
               :style="`background-color: #${color.hex}; ${clickedIds.includes(`colorIds::${color.id}`) ? 'transform: scale(0.8); opacity: 0.8' : ''}`">
              <span>{{ color.title }}</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="single-sidebar-box mt-30 wow fadeInUp animated">
        <h4>Filter By Price</h4>
        <div class="slider-box">
          <div id="price-range" class="slider"></div>
          <div class="output-price">
            <label for="priceRange">Price:</label>
            <input type="text" id="priceRange" readonly></div>

          <button class="filterbtn"
                  type="submit" @click.prevent="handleSubmit"> Filter
          </button>
        </div>
      </div>

      <div class="single-sidebar-box mt-30 wow fadeInUp animated pb-0 border-bottom-0 ">
        <h4>Tags </h4>
        <ul class="popular-tag">
          <li v-for="tag in tags">
            <a role="button" @click.prevent="getFilterParams({ name: 'tagIds', value: tag.id })"
               :style="`${clickedIds.includes(`tagIds::${tag.id}`) ? 'background-color: var(--thm-base)' : ''}`">#{{
                tag.title
              }}</a>
          </li>
        </ul>
      </div>

    </div>
  </div>
</template>

<style scoped>
.color-additional-styling {
  border: 1px solid #4b545c;
}
</style>
