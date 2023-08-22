<script>
export default {
  name: 'CartReservedUnitsTable',

  props: {
    reservedUnits: Array,
    decrementQty: Function,
    incrementQty: Function,
    updateQty: Function,
    countUpSubtotalPerUnit: Function,
    revokeArticle: Function
  }
}
</script>

<template>
  <div class="cart-table-box">
    <div class="table-outer">
      <table class="cart-table">
        <thead class="cart-header">
        <tr>
          <th class="">Product Name</th>
          <th class="price">Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
          <th class="hide-me"></th>
        </tr>
        </thead>
        <tbody>

        <tr v-if="reservedUnits" v-for="reservedUnit in reservedUnits">
          <td>
            <div class="thumb-box">
              <router-link :to="{ name: 'Article', params: { id: reservedUnit.id } }" class="thumb">
                <img :src="reservedUnit.img" :alt="reservedUnit.ttl">
              </router-link>
              <router-link :to="{ name: 'Article', params: { id: reservedUnit.id } }" class="title">
                <h5> {{ reservedUnit.ttl }} </h5>
              </router-link>
            </div>
          </td>

          <td>{{ reservedUnit.rrp }}</td>

          <td class="qty">
            <div class="qtySelector text-center">
              <span @click.prevent="decrementQty(reservedUnit)" class="decreaseQty">
                <i class="flaticon-minus"></i>
              </span>
              <input
                  :ref="`cartQtyToOrder${reservedUnit.id}`"
                  type="number"
                  min="1"
                  step="1"
                  :value="reservedUnit.qty"
                  @input="updateQty(reservedUnit)"
              />
              <span @click.prevent="incrementQty(reservedUnit)" class="increaseQty">
                <i class="flaticon-plus"></i>
              </span>
            </div>
          </td>

          <td class="sub-total">{{ countUpSubtotalPerUnit(reservedUnit).toFixed(2) }}</td>
          <td>
            <div class="remove" @click.prevent="revokeArticle(reservedUnit.id)">
              <i class="flaticon-cross"></i>
            </div>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>

</style>