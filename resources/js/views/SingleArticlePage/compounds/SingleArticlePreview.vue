<script>
export default {
  name: 'SingleArticlePreview',

  props: {
    article: Object
  }
}
</script>

<template>
  <div class="col-xl-6 col-lg-6 mt-30">
    <div class="single-item">
      <img :src="article.preview_img" alt="preview_img">
    </div>

    <div class="navholder mt-1">
      <div class="d-flex flex-row justify-content-between">
        <div v-for="(articleImg, index) in article.article_imgs">
          <span class="single-item article-img-block__height">
            <img :src="articleImg" :alt="`article_img_${index}`" class="article-img__params">
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.article-img-block__height {
  height: 260px;
}
.article-img__params {
  width: 210px;
  height: inherit;
  object-fit: fill;
}
</style>