<script>
import CartPageBreadcrumbs from './CartPageBreadcrumbs.vue'
import CartReservedUnitsTable from './CartReservedUnitsTable.vue'
import CartPageActions from './CartPageActions.vue'
import CartTotals from './CartTotals.vue'

export default {
  name: 'Cart',

  components: {
    CartPageBreadcrumbs,
    CartReservedUnitsTable,
    CartPageActions,
    CartTotals
  },

  inject: ['reservedUnits', 'clearCart', 'revokeArticle', 'updateArticle'],

  methods: {
    countUpSubtotalPerUnit(unit) {
      return unit.rrp * unit.qty
    },

    countUpSubtotalNet() {
      return this.reservedUnits.reduce((acc, val) => acc + this.countUpSubtotalPerUnit(val), 0)
    },

    countUpVAT(vatPercentageValue = 0.19) {
      return this.countUpSubtotalNet() * vatPercentageValue
    },

    countUpTotalGross() {
      return this.countUpSubtotalNet() + this.countUpVAT()
    },

    decrementQty(unit) {
      if (unit.qty === 1) return
      unit.qty--
      this.updateArticle(unit)
    },

    incrementQty(unit) {
      unit.qty++
      this.updateArticle(unit)
    },

    updateQty(unit) {
      unit.qty = Number(this.$refs[`cartQtyToOrder${unit.id}`][0].value)
      this.updateArticle(unit)
    }
  }
}
</script>

<template>
  <main class="overflow-hidden ">

    <CartPageBreadcrumbs/>

    <section class="cart-area pt-120 pb-120">
      <div class="container">
        <div class="row wow fadeInUp animated">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <CartReservedUnitsTable
                :reservedUnits="reservedUnits"
                :decrementQty="decrementQty"
                :incrementQty="incrementQty"
                :updateQty="updateQty"
                :countUpSubtotalPerUnit="countUpSubtotalPerUnit"
                :revokeArticle="revokeArticle"
            />

          </div>
        </div>

        <div class="row">
          <div class="col-xl-12">

            <CartPageActions :clearCart="clearCart"/>

          </div>
        </div>

        <div class="row pt-120">
          <div class="col-xl-6 col-lg-5 offset-xl-6 offset-lg-7 wow fadeInUp animated">

            <CartTotals
                :countUpSubtotalNet="countUpSubtotalNet"
                :countUpVAT="countUpVAT"
                :countUpTotalGross="countUpTotalGross"
            />

          </div>
        </div>
      </div>
    </section>

  </main>
</template>

<style scoped>

</style>