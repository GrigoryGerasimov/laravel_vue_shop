<script>
export default {
  name: 'SingleArticlePageBreadcrumbs'
}
</script>

<template>
  <div class="shop-details-breadcrumb wow fadeInUp animated overflow-hidden ">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="shop-details-inner">
            <ul class="shop-details-menu">
              <li>
                <router-link :to="{ name: 'Main' }">Home</router-link>
              </li>
              <li class="active">{{ this.$route.name }} ID #{{ this.$route.params.id }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>