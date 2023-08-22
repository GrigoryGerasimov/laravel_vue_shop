<script>
export default {
  name: 'MainPanelNavbar'
}
</script>

<template>
  <ul class="nav three nav-pills justify-content-center" id="pills-tab-two" role="tablist">
    <li class="nav-item" role="presentation">
      <button
          class="nav-link active"
          id="pills-best-sellers-tab"
          data-bs-toggle="pill"
          data-bs-target="#pills-best-sellers"
          type="button"
          role="tab"
          aria-controls="pills-best-sellers"
          aria-selected="true"
      >
        Best Sellers
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button
          class="nav-link"
          id="pills-new-arrivals-tab"
          data-bs-toggle="pill"
          data-bs-target="#pills-new-arrivals"
          type="button"
          role="tab"
          aria-controls="pills-new-arrivals"
          aria-selected="false"
      >
        New Arrivals
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button
          class="nav-link"
          id="pills-top-rated-tab"
          data-bs-toggle="pill"
          data-bs-target="#pills-top-rated"
          type="button"
          role="tab"
          aria-controls="pills-top-rated"
          aria-selected="false"
      >
        Top Rated
      </button>
    </li>
  </ul>
</template>

<style scoped>

</style>
