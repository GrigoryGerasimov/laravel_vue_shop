<script>
import MainPanelNavbar from './MainPanelNavbar.vue'
import MainPanelBestSellersList from './MainPanelBestSellersList.vue'
import MainPanelNewArrivalsList from './MainPanelNewArrivalsList.vue'
import MainPanelTopRatedList from './MainPanelTopRatedList.vue'

export default {
  name: 'MainPanel',

  components: {
    MainPanelNavbar,
    MainPanelBestSellersList,
    MainPanelNewArrivalsList,
    MainPanelTopRatedList
  },

  props: {
    getRandomArticlesList: Function,
    reserveQty: Function
  }
}
</script>

<template>
  <section class="categories-tab pt-60 pb-60 wow fadeInUp">
    <div class="container auto-container">
      <div class="row">
        <div class="col-12">

          <MainPanelNavbar/>

        </div>
      </div>

      <div class="row">
        <div class="tab-content" id="pills-tabContent-two">

          <MainPanelBestSellersList :get-best-sellers-list="getRandomArticlesList" :reserve-qty="reserveQty"/>

          <MainPanelNewArrivalsList :get-new-arrivals-list="getRandomArticlesList" :reserve-qty="reserveQty"/>

          <MainPanelTopRatedList :get-top-rated-list="getRandomArticlesList" :reserve-qty="reserveQty"/>

          <div class="loder">
            <div id="overlay" style="display:none;">
              <div class="spinner"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>

</style>
