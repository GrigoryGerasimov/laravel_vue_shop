<script>
export default {
  name: 'SingleArticleExtraDetailsDescription',

  props: {
    article: Object
  }
}
</script>

<template>
  <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
    <div class="product-drescription">
      <h4>Product Details:</h4>
      <p>{{ article.description }}</p>
    </div>
  </div>
</template>

<style scoped>

</style>