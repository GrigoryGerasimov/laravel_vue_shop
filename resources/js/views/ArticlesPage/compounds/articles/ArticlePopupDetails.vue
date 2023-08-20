<script>
import keys from '../../../../services/keys'

export default {
  name: 'ArticlePopupDetails',

  props: {
    popupArticleData: Object,
    getArticle: Function,
    reserveQty: Function
  },

  inject: ['qtyToReserve', 'updateQtyToReserve', 'incrementQtyToReserve', 'decrementQtyToReserve'],

  mounted() {
    $(document).trigger(keys.JQ_TRIGGER_KEY)
  }
}
</script>

<template>
  <div v-if="popupArticleData" :id="`popup${popupArticleData.id}`" class="product-gird__quick-view-popup mfp-hide">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
          <div class="quick-view__left-content">
            <div class="tabs">

              <div class="popup-product-thumb-box">
                <ul>
                  <li
                      class="tab-nav popup-product-thumb"
                      v-for="(articleImg, articleImgIndex) in popupArticleData.article_imgs"
                  >
                    <a :href="`#${articleImgIndex}`">
                      <img :src="articleImg" :alt="`img_${articleImgIndex}`" class="article-img__params"/>
                    </a>
                  </li>
                </ul>
              </div>

              <div class="popup-product-main-image-box">
                <div
                    v-for="(articleImg, articleImgIndex) in popupArticleData.article_imgs"
                    :id="articleImgIndex"
                    class="tab-item popup-product-image"
                >
                  <div class="popup-product-single-image">
                    <img :src="articleImg" :alt="`img_${articleImgIndex}`" class="article-img-main__params"/>
                  </div>
                </div>

                <button v-if="popupArticleData.article_imgs.length >= 2" class="prev">
                  <i class="flaticon-back"></i>
                </button>
                <button v-if="popupArticleData.article_imgs.length >= 2" class="next">
                  <i class="flaticon-next"></i>
                </button>
              </div>

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="popup-right-content">
            <h3>{{ popupArticleData.content }}</h3>
            <p class="text">{{ popupArticleData.description }}</p>
            <div class="price">
              <h2>{{ popupArticleData.recommended_retail_price }} EUR
                <del v-if="popupArticleData.previous_price">{{ popupArticleData.previous_price }} EUR</del>
              </h2>
            </div>
            <div class="color-varient">
              <template v-for="popupArticle in popupArticleData.group.articles">
                <a
                    v-for="popupArticleColor in popupArticle.colors"
                    @click.prevent="getArticle(popupArticle.id)"
                    class="color-name color-additional-styling"
                    :style="`background-color: #${popupArticleColor.hex}`"
                >
                  <span>{{ popupArticleColor.title }}</span>
                </a>
              </template>
            </div>

            <div class="add-product">
              <h6>Qty:</h6>

              <div class="button-group">
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

                <button
                    class="btn--primary "
                    @click.prevent="reserveQty(popupArticleData, Number(this.$refs.qtyToOrder.value))"
                >
                  Add to Cart
                </button>
              </div>
            </div>

            <div class="payment-method">
              <a href="">
                <img src="main/images/payment_method/method_1.png" alt="">
              </a>
              <a href="">
                <img src="main/images/payment_method/method_2.png" alt="">
              </a>
              <a href="">
                <img src="main/images/payment_method/method_3.png" alt="">
              </a>
              <a href="">
                <img src="main/images/payment_method/method_4.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.article-img__params {
  width: 90px;
  height: 135px;
  object-fit: cover;
}
.article-img-main__params {
  height: 460px;
  object-fit: cover;
}
.color-additional-styling {
  border: 1px solid #4b545c
}
</style>
