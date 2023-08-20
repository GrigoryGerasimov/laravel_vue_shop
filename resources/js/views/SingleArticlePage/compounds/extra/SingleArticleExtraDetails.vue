<script>
import SingleArticleExtraDetailsNavbar from './SingleArticleExtraDetailsNavbar.vue';
import SingleArticleExtraDetailsDescription from './SingleArticleExtraDetailsDescription.vue'
import SingleArticleExtraDetailsSizeChart from './SingleArticleExtraDetailsSizeChart.vue'
import SingleArticleExtraDetailsReview from './SingleArticleExtraDetailsReview.vue'

export default {
  name: 'SingleArticleExtraDetails',

  components: {
    SingleArticleExtraDetailsNavbar,
    SingleArticleExtraDetailsDescription,
    SingleArticleExtraDetailsSizeChart,
    SingleArticleExtraDetailsReview
  },

  props: {
    article: Object
  }
}
</script>

<template>
  <div class="row wow fadeInUp animated">
    <div class="col-12">

      <SingleArticleExtraDetailsNavbar/>

    </div>
  </div>

  <div class="row wow fadeInUp animated">
    <div class="tab-content" id="pills-tabContent-two">

      <SingleArticleExtraDetailsDescription :article="article"/>

      <SingleArticleExtraDetailsSizeChart/>

      <SingleArticleExtraDetailsReview/>

    </div>
  </div>
</template>

<style scoped>

</style>