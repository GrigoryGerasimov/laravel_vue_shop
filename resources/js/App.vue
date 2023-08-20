<script>
import { defineComponent, computed } from 'vue'
import { Header, Footer } from './views/includes'
import MainPage from './views/MainPage/index.vue'
import { StorageService } from './services/StorageService'
import keys from './services/keys'

export default defineComponent({
  name: 'App',

  components: {
    Header, Footer, MainPage
  },

  data() {
    return {
      unitsToReserve: StorageService.read(keys.CART_KEY) ?? [],
      qtyToReserve: 1,
      categories: []
    }
  },

  methods: {
    async getCategories() {
      try {
        const { data } = await this.axios('/api/categories')
        this.categories = data
      } catch (err) {
        console.error(err.message)
      }
    },

    async getUnit(id) {
      try {
        const { data } = await this.axios(`/api/articles/${id}`)
        return data
      } catch (err) {
        console.error(err.message)
      }
    },

    addUnit(article, qty) {
      const newUnit = {
        id: article.id,
        ttl: article.title,
        img: article.preview_img,
        rrp: article.recommended_retail_price,
        qty
      }

      const existingPositionIndex = this.unitsToReserve.findIndex(u => u.id === newUnit.id)

      if (~existingPositionIndex) {
        this.unitsToReserve[existingPositionIndex].qty += newUnit.qty
      } else {
        this.unitsToReserve.push(newUnit)
      }

      StorageService.store(keys.CART_KEY, this.unitsToReserve)

      this.qtyToReserve = 1
    },

    removeAll() {
      this.unitsToReserve = []
      StorageService.clear()
    },

    removeUnit(id) {
      this.unitsToReserve = this.unitsToReserve.filter(u => u.id !== id)
      StorageService.store(keys.CART_KEY, this.unitsToReserve)
    },

    updateUnit(unit) {
      const updatedPositionIndex = this.unitsToReserve.findIndex(u => u.id === unit.id)
      if (~updatedPositionIndex) this.unitsToReserve[updatedPositionIndex] = unit
      StorageService.store(keys.CART_KEY, this.unitsToReserve)
    },

    updateReservedQty(elem) {
      this.qtyToReserve = elem.value
    },

    incrementQty() {
      this.qtyToReserve++
    },

    decrementQty() {
      if (this.qtyToReserve === 1) return
      this.qtyToReserve--
    },

    handleQtyReserve(id, qty) {
      this.addUnit(id, qty)
      this.qtyToReserve = 1
    }
  },

  provide() {
    return {
      categories: computed(() => this.categories),
      getCategoriesData: this.getCategories,
      reservedUnits: computed(() => this.unitsToReserve),
      requestArticle: this.getUnit,
      addArticle: this.addUnit,
      clearCart: this.removeAll,
      revokeArticle: this.removeUnit,
      updateArticle: this.updateUnit,
      qtyToReserve: computed(() => this.qtyToReserve),
      updateQtyToReserve: this.updateReservedQty,
      incrementQtyToReserve: this.incrementQty,
      decrementQtyToReserve: this.decrementQty,
      reserveQty: this.handleQtyReserve
    }
  },

  mounted() {
    $(document).trigger(keys.JQ_TRIGGER_KEY)

    this.getCategories()
  }
})
</script>

<template>
  <Header/>

  <router-view/>

  <Footer/>
</template>

<style scoped>
</style>
