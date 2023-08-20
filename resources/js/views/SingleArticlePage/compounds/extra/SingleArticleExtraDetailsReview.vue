<script>
export default {
  name: 'SingleArticleExtraDetailsReview'
}
</script>

<template>
  <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
    <div class="product-drescription">
      <div class="review-single">
        <div class="left">
          <div>
            <h6>Vary Good quality Theme </h6>
            <small class="d-inline-block text-sm mt-2">
              <strong>Raul Bates on January 28, 2022</strong>
            </small>
          </div>
          <p class="mt-2"> Assertively conceptualize parallel process improvements through user
            friendly colighue to action items. Interactively antidos cultivate
            interdependent customer service without clicks-and-mortar e-services. </p>
        </div>
      </div>
      <div class="review-from-box mt-30">
        <h6>Write a Review</h6>
        <form action="#" class="review-from">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group"><label for="name">NAME</label> <input
                  type="text" id="name" class="form-control"
                  placeholder="David Warner"></div>
            </div>
            <div class="col-lg-6">
              <div class="form-group"><label for="number">Number</label> <input
                  type="text" id="number" class="form-control"
                  placeholder="Phone Number"></div>
            </div>
            <div class="col-lg-6">
              <div class="form-group"><label for="email"> Email </label> <input
                  type="text" id="email" class="form-control"
                  placeholder="support@gmail.com"></div>
            </div>
            <div class="col-lg-6">
              <div class="form-group"><label for="namee"> REVIEW TITLE</label> <input
                  type="text" id="namee" class="form-control"
                  placeholder="Give your review title"></div>
            </div>
            <div class="col-12">
              <div class="form-group m-0"><label for="email">BODY OF REVIEW (1500)
              </label> <textarea
                  placeholder="Write Your Comments Here"></textarea></div>
            </div>
          </div>
          <button type="submit" class="btn--primary style2 ">Submit Review
          </button>
        </form>
      </div>
    </div>
  </div>

</template>

<style scoped>

</style>