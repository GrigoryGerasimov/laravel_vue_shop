<script>
export default {
  name: 'MainProductGroupsPreview',

  data() {
    return {
      groups: []
    }
  },

  methods: {
    async getGroups() {
      try {
        const { data } = await this.axios('/api/groups')
        this.groups = data
      } catch (err) {
        console.error(err)
      }
    }
  },

  mounted() {
    this.getGroups()
  }
}
</script>

<template>
  <section class="categories-three overflow-hidden" v-if="groups.length">
    <div class="auto-container container">
      <div class="row">
        <div class="categories-three__inner pt-120 pb-120">
          <div class="row align-items-center justify-content-xl-start justify-content-center">
            <div class="col-xl-4 col-md-7">
              <div class="categories-three__content text-xl-start text-center wow fadeInUp animated">
                <div class="sec-title-style2 style3">
                  <h2>Shop by Product Groups</h2>
                </div>
                <p>Continually enhance long-term don high impact niche markets whereas user centric
                  niche markets. actualize backward compatible...</p>
                <div class="btn-box">
                  <a role="button" class="btn--primary style2">Discover More</a>
                </div>
              </div>
            </div>

            <div class="col-xl-8">
              <div class="row  justify-content-center">
                <div class="col-lg-4 col-sm-6" v-for="group in groups">
                  <div class="categories-three__list-item mt-30 wow fadeInUp animated">
                    <div class="categories-three__list-item-inner">
                      <div class="img-box">
                        <img :src="group.articles[group.articles.length-1].preview_img" :alt="group.title" class="group-img__params"/>
                        <div class="text">
                          <span>{{ group.articles.length }} pcs</span>
                        </div>
                    </div>
                      <div class="title text-center">
                        <h5>
                          <span>{{ group.title }}</span>
                        </h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.group-img__params {
  width: 205px;
  height: 225px;
  object-fit: cover;
}
</style>
