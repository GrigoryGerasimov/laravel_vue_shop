<script>
export default {
  name: 'CartPageBreadcrumbs'
}
</script>

<template>
  <section class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="breadcrumb-content text-center wow fadeInUp animated">
            <h2>Cart</h2>
            <div class="breadcrumb-menu">
              <ul>
                <li>
                  <router-link :to="{ name: 'Main' }">
                    <i class="flaticon-home pe-2"></i>Home
                  </router-link>
                </li>
                <li> <i class="flaticon-next"></i> </li>
                <li class="active">{{ this.$route.name }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>

</style>
