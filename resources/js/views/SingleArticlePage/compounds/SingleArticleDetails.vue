<script>
export default {
  name: 'SingleArticleDetails',

  props: {
    article: Object,
    getArticleVariant: Function
  },

  inject: ['qtyToReserve', 'updateQtyToReserve', 'incrementQtyToReserve', 'decrementQtyToReserve', 'reserveQty'],

  methods: {
    countUpVAT: (netValue, vatPercentageValue = 0.19) => netValue * vatPercentageValue,

    countUpTotalGross(netValue) {
      netValue = typeof netValue !== 'number' ? Number(netValue) : netValue
      return netValue + this.countUpVAT(netValue)
    }
  }
}
</script>

<template>
  <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
    <div class="shop-details-top-right ">
      <div class="shop-details-top-right-content-box">
        <div class="shop-details-top-title">
          <h3>{{ article.title }}</h3>
        </div>
        <ul class="shop-details-top-info">
          <li><span>EAN/GTIN:</span> {{ article.ean }}</li>
        </ul>
        <div class="shop-details-top-price-box">
          <h3>{{ article.recommended_retail_price }} &#8364;
            <del v-if="article.previous_price">{{ article.previous_price }} &#8364;</del>
          </h3>
          <p>+19% VAT:
            <strong>{{ countUpTotalGross(article.recommended_retail_price).toFixed(2) }} &#8364;</strong>
          </p>
        </div>

        <div class="shop-details-top-size-box">
          <h4>Size: (XS)</h4>
          <div class="shop-details-top-size-list-box">
            <ul class="shop-details-top-size-list">
              <li>XS</li>
              <li>S</li>
              <li>M</li>
              <li>XL</li>
            </ul>
          </div>
        </div>

        <div class="shop-details-top-color-sky-box">
          <h4>Available Colors</h4>
          <ul class="varients">
            <template v-for="article in article.group.articles">
              <li>
                <a
                    role="button"
                    v-for="articleColor in article.colors"
                    @click.prevent="getArticleVariant(article.id)"
                    :style="`background-color: #${articleColor.hex}`"
                    class="shop-details-top-color-sky-img article-variant-styling"
                >
                </a>
              </li>
            </template>
          </ul>
        </div>

        <div class="shop-details-top-color-sky-box d-flex flex-row align-items-baseline">
          <h4>Total Amount on Stock:</h4>
          <strong class="ms-2">{{ article.total_amount }}</strong>
        </div>

        <div class="product-quantity">
          <h4>Quantity</h4>

          <div class="product-quantity-box d-flex align-items-center flex-wrap">
            <div class="qty mr-2">
              <div class="qtySelector text-center">
                <span class="decreaseQty" @click.prevent="decrementQtyToReserve">
                  <i class="flaticon-minus"></i>
                </span>
                <input
                    ref="qtyToOrder"
                    type="number"
                    min="1"
                    step="1"
                    :value="qtyToReserve"
                    @input="updateQtyToReserve(this.$refs.qtyToOrder)"
                />
                <span class="increaseQty" @click.prevent="incrementQtyToReserve">
                  <i class="flaticon-plus"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="shop-details-top-cart-box-btn mt-4">
          <button
              class="btn--primary style2 "
              type="submit"
              @click.prevent="reserveQty(article, Number(this.$refs.qtyToOrder.value))"
          >
            Add to Cart
          </button>
        </div>

        <div class="shop-details-top-social-box mt-4">
          <p>Share:</p>
          <ul class="ps-1 social_link d-flex align-items-center">
            <li>
              <a href="https://www.facebook.com/" class="active" target="_blank">
                <i class="flaticon-facebook-app-symbol"></i>
              </a>
            </li>
            <li>
              <a href="https://www.youtube.com/" target="_blank">
                <i class="flaticon-youtube"></i>
              </a>
            </li>
            <li>
              <a href="https://twitter.com/" target="_blank">
                <i class="flaticon-twitter"></i>
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/" target="_blank">
                <i class="flaticon-instagram"></i>
              </a>
            </li>
          </ul>
        </div>

        <div class="checked-box">
          <form>
            <div class="form-group">
              <input type="checkbox" id="html">
              <label for="html">I agree with all company terms & condition</label>
            </div>
          </form>
        </div>
        <div class="shop-details-top-buy-now-btn">
          <a href="#" class="btn--primary">Buy It Now</a>
        </div>

        <ul class="shop-details-top-category-tags mt-4">
          <li>Category: <span>{{ article.category.title }}</span></li>
          <li>Tags: <span>{{ article.tags.reduce((acc, val) => acc + `, #${val.title}`, '').slice(2)}}</span></li>
        </ul>
        <ul class="shop-details-top-feature">
          <li>
            <div class="icon"><i class="flaticon-portfolio"></i></div>
            <div class="text">
              <p>Money back guarantee</p>
            </div>
          </li>
          <li>
            <div class="icon"><i class="flaticon-truck"></i></div>
            <div class="text">
              <p>Free Shipping & Return</p>
            </div>
          </li>
          <li>
            <div class="icon"><i class="flaticon-security"></i></div>
            <div class="text">
              <p>Comportable Support</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped>
.article-variant-styling {
  height: 10px;
  border: 1px solid #4b545c
}
</style>