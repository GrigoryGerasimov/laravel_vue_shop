<script>
export default {
    name: 'MainCategoryPreview',

    props: {
        articlesList: Array
    }
}
</script>

<template>
    <div class="catagory4 pt-60 pb-60">
        <div class="container">
            <div class="row mt--30">
                <div class="col-lg-6 h-100 mt-30">
                    <router-link :to="{ name: 'Article', params: { id: articlesList[0].id } }" class="catagory-single one home3cat">
                        <img :src="articlesList[0].preview_img" :alt="articlesList[0].title" class="background-img bg-img imgone">
                        <div class="content">
                            <div class="row w-100 h-100 align-items-center">
                                <div class="col-xl-7 col-md-9">
                                    <h5 class="wow animated fadeInUp" data-wow-delay="0.2s">Shop & Save</h5>
                                    <h3 class="wow animated fadeInUp" data-wow-delay="0.3s">Exclusive {{ articlesList[0].category.title }}</h3>
                                    <span class=" link wow animated fadeInUp" data-wow-delay="0.4s">explore now</span>
                                </div>
                            </div>
                        </div>
                    </router-link>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="co-12 mt-30 ">
                            <router-link :to="{ name: 'Article', params: { id: articlesList[1].id } }" class="catagory-single home3cat">
                                <img :src="articlesList[1].preview_img" :alt="articlesList[1].title"
                                     class="background-img bg-img">
                                <div class="content">
                                    <div class="row w-100 h-100 align-items-center">
                                        <div class="col-12">
                                            <h5 class=" wow animated red fadeInUp" data-wow-delay="0.2s">20% Off</h5>
                                            <h3 class=" wow animated fadeInUp" data-wow-delay="0.3s">{{ articlesList[1].category.title }}</h3>
                                            <span class="link wow animated fadeInUp" data-wow-delay="0.4s">explore now</span>
                                        </div>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                        <div class="col-12 mt-30">
                            <router-link :to="{ name: 'Article', params: { id: articlesList[2].id } }" class="catagory-single home3cat">
                                <img :src="articlesList[2].preview_img" :alt="articlesList[2].title" class="background-img bg-img">
                                <div class="content">
                                    <div class="row w-100 h-100 align-items-center">
                                        <div class="col-xxl-6 col-lg-9">
                                            <h5 class=" wow animated fadeInUp" data-wow-delay="0.2s">New Products</h5>
                                            <h3 class=" wow animated fadeInUp" data-wow-delay="0.3s">{{ articlesList[2].category.title }}</h3>
                                            <span class="link wow animated fadeInUp" data-wow-delay="0.4s">explore now</span>
                                        </div>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
