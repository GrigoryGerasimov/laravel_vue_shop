<script>
export default {
  name: 'CartTotals',

  props: {
    countUpSubtotalNet: Function,
    countUpVAT: Function,
    countUpTotalGross: Function
  }
}
</script>

<template>
  <div class="cart-check-out mt-30">
    <h3>Cart Totals</h3>
    <ul class="cart-check-out-list">
      <li>
        <div class="left">
          <p>Subtotal (net)</p>
        </div>
        <div class="right">
          <p>{{ countUpSubtotalNet().toFixed(2) }}</p>
        </div>
      </li>
      <li>
        <div class="left">
          <p>VAT (19%)</p>
        </div>
        <div class="right">
          <p>{{ countUpVAT().toFixed(2) }}</p>
        </div>
      </li>
      <li>
        <div class="left">
          <p>Total Price (gross)</p>
        </div>
        <div class="right">
          <p>{{ countUpTotalGross().toFixed(2) }}</p>
        </div>
      </li>
    </ul>
  </div>
</template>

<style scoped>

</style>