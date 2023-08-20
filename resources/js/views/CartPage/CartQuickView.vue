<script>
export default {
  name: 'CartQuickView',

  props: {
    reservedUnits: Array
  },

  inject: ['revokeArticle']
}
</script>

<template>
  <div class="side-cart d-flex flex-column justify-content-between">
    <div class="top">
      <div class="content d-flex justify-content-between align-items-center">
        <h6 class="text-uppercase">Your Cart ({{ reservedUnits.length }})</h6> <span class="cart-close text-uppercase">X</span>
      </div>
      <div class="cart_items">

        <div class="items d-flex justify-content-between align-items-center" v-for="reservedUnit in reservedUnits">
          <div class="left d-flex align-items-center">
            <router-link :to="{ name: 'Article', params: { id: reservedUnit.id } }" class="thumb d-flex justify-content-between align-items-center">
              <img :src="reservedUnit.img" :alt="reservedUnit.ttl">
            </router-link>
            <div class="text">
              <router-link :to="{ name: 'Article', params: { id: reservedUnit.id } }">
              <h6>{{ reservedUnit.ttl }}</h6>
              </router-link>
              <p>{{ reservedUnit.qty }} <span>{{ reservedUnit.rrp }}&#8364;</span> </p>
            </div>
          </div>
          <div class="right">
            <div class="item-remove" @click.prevent="revokeArticle(reservedUnit.id)">
              <i class="flaticon-cross"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bottom">
      <div class="total-ammount d-flex justify-content-between align-items-center">
        <h6 class="text-uppercase">Total <small>(net)</small>:</h6>
        <h6 class="ammount text-uppercase">{{ reservedUnits.reduce((acc, val) => acc + val.rrp * val.qty, 0).toFixed(2) }} EUR</h6>
      </div>
      <div class="button-box d-flex justify-content-between">
        <router-link :to="{ name: 'Cart' }" class="btn_black">View Cart</router-link>
        <router-link :to="{ name: 'Cart' }" class="button-2 btn_theme">Chekout</router-link>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>