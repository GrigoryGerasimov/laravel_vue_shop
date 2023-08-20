<script>
export default {
  name: 'SingleArticleExtraDetailsNavbar'
}
</script>

<template>
  <ul class="nav product-details-nav nav-one nav-pills justify-content-center" id="pills-tab-two"
      role="tablist">
    <li class="nav-item" role="presentation">
      <button
          class="nav-link active"
          id="pills-description-tab"
          data-bs-toggle="pill"
          data-bs-target="#pills-description"
          type="button"
          role="tab"
          aria-controls="pills-description"
          aria-selected="true"
      >
        Description
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button
          class="nav-link"
          id="pills-sizechart-tab"
          data-bs-toggle="pill"
          data-bs-target="#pills-sizechart"
          type="button"
          role="tab"
          aria-controls="pills-sizechart"
          aria-selected="false"
      >
        Size Chart
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button
          class="nav-link"
          id="pills-review-tab"
          data-bs-toggle="pill"
          data-bs-target="#pills-review"
          type="button"
          role="tab"
          aria-controls="pills-review"
          aria-selected="false"
      >
        Review
      </button>
    </li>
  </ul>
</template>

<style scoped>

</style>