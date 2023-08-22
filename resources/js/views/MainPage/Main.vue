<script>
import { defineComponent } from 'vue'
import { MainCategoryPreview, MainPanel, MainProductGroupsPreview } from './compounds'

export default defineComponent({
    name: 'Main',

    components: {
        MainCategoryPreview,
        MainPanel,
        MainProductGroupsPreview
    },

    data() {
        return {
            articlesList: []
        }
    },

    inject: ['reserveQty'],

    methods: {
        async getAllArticles() {
            try {
                const { data } = await this.axios.get('/api/articles/list')
                this.articlesList = data
                this.getRandomArticle()
            } catch (err) {
                console.error(err)
            }
        },

        getRandomArticle() {
            const randomIndex = Math.floor(Math.random() * this.articlesList.length)
            return this.articlesList[randomIndex]
        },

        getRandomArticlesList() {
            const arr = []

            for (let i = 0; i < Math.trunc(this.articlesList.length / 2); i++) arr.push(this.getRandomArticle())

            return arr
        }
    },

    mounted() {
        this.getAllArticles()
    }
})
</script>

<template>
    <main class="overflow-hidden" v-if="articlesList.length">

        <MainCategoryPreview :articles-list="articlesList"/>

        <MainPanel
            :get-random-articles-list="getRandomArticlesList"
            :reserve-qty="reserveQty"/>

        <MainProductGroupsPreview/>

        <section class="core-features pt-120 mb-60 overflow-hidden">
            <div class="container auto-container">
                <div class="row mt--30">
                    <div class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated " data-wow-delay="0.2s">
                        <div class="core-features__box d-flex ms-0"><span class="one"></span> <span class="two"></span>
                            <div class="icon"><img src="main/images/icon/f-icon-1.png" alt=""></div>
                            <div class="core-features__box-content"><a href="login.html" class="d-block">
                                <h4> Secure Payment </h4>
                            </a>
                                <p>Everybody different which the why give offer styles for every body.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated " data-wow-delay="0.3s">
                        <div class="core-features__box d-flex "><span class="one"></span> <span class="two"></span>
                            <div class="icon"><img src="main/images/icon/f-icon-2.png" alt=""></div>
                            <div class="core-features__box-content"><a href="login.html" class="d-block">
                                <h4> 27/7 Fast Delivery </h4>
                            </a>
                                <p>Everybody different which the why give offer styles for every body.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated " data-wow-delay="0.4s">
                        <div class="core-features__box d-flex "><span class="one"></span> <span class="two"></span>
                            <div class="icon"><img src="main/images/icon/f-icon-3.png" alt=""></div>
                            <div class="core-features__box-content"><a href="login.html" class="d-block">
                                <h4> Return & Refund </h4>
                            </a>
                                <p>Everybody different which the why give offer styles for every body.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md-6 mt-30 wow fadeInUp animated " data-wow-delay="0.5s">
                        <div class="core-features__box d-flex me-0"><span class="one"></span> <span class="two"></span>
                            <div class="icon"><img src="main/images/icon/f-icon-4.png" alt=""></div>
                            <div class="core-features__box-content"><a href="login.html" class="d-block">
                                <h4> Quality Support </h4>
                            </a>
                                <p>Everybody different which the why give offer styles for every body.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="review-one pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="review-one__section-head text-center wow fadeInUp animated">
                            <div class="title">
                                <h2>What Client’s Say</h2>
                            </div>
                            <p>Over 10000 Reviews</p>
                        </div>
                    </div>
                    <div class="col-12 wow fadeInUp animated">
                        <div class="reviewOneSlider owl-carousel">
                            <div class="review-one__single-review">
                                <div class="review-one__single-content">
                                    <div class="review-one__aurthor">
                                        <div class="thumb"><img src="main/images/testimonial/testimonial-v1-1.png"
                                                                alt=""></div>
                                        <span class="quate"> <i
                                            class="flaticon-right-quotes-symbol"></i> </span>
                                    </div>
                                    <div class="review-one__review-text">
                                        <p> “Quickly explot worldwide leadership long-term high-impact "outside the box
                                            thinking. Quickly network synergistic enterprise customer service” </p>
                                        <h4><a href="#0">Ana Fleming </a></h4> <span> Web Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</template>

<style scoped>

</style>
