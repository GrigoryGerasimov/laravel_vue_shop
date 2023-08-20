<script>
export default {
  name: 'CartPageActions',

  props: {
    clearCart: Function
  }
}
</script>

<template>
  <div class="cart-button-box">
    <div>
      <button @click.prevent="clearCart" class="btn--primary mt-30" type="submit">Clear Shopping Cart</button>
    </div>
    <div class="cart-button-box-right wow fadeInUp animated">
      <router-link :to="{ name: 'Articles' }" class="btn--primary mt-30" type="submit">Continue Shopping</router-link>
      <button class="btn--primary mt-30" type="submit">Complete Order</button>
    </div>
  </div>
</template>

<style scoped>

</style>