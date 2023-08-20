<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'Main'
})
</script>

<template>
  <main class="overflow-hidden">

    <div class="catagory4 pt-60 pb-60">
      <div class="container">
        <div class="row mt--30">
          <div class="col-lg-6 h-100 mt-30">
            <a href="shop-grid.html" class="catagory-single one home3cat">
              <img src="main/images/home-three/cat-1.png" alt="#" class="background-img bg-img imgone">
              <div class="content">
                <div class="row w-100 h-100 align-items-center">
                  <div class="col-xl-7 col-md-9">
                    <h5 class="wow animated fadeInUp" data-wow-delay="0.2s"> Shop & Save</h5>
                    <h3 class="wow animated fadeInUp" data-wow-delay="0.3s"> Exclusive Women Shoes
                    </h3>
                    <span class=" link wow animated fadeInUp" data-wow-delay="0.4s"> explore
                                            now</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="co-12 mt-30 ">
                <a href="shop-grid.html" class="catagory-single home3cat">
                  <img src="main/images/home-three/catbg-3.png" alt=""
                       class="background-img bg-img">
                  <div class="content">
                    <div class="row w-100 h-100 align-items-center">
                      <div class="col-12">
                        <h5 class=" wow animated red fadeInUp" data-wow-delay="0.2s"> 20% Off
                        </h5>
                        <h3 class=" wow animated fadeInUp" data-wow-delay="0.3s"> Men Sneakers
                        </h3>
                        <span class="link wow animated fadeInUp" data-wow-delay="0.4s"> explore
                                                    now</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12 mt-30">
                <a href="shop-grid.html" class="catagory-single home3cat">
                  <img src="main/images/home-three/catbg-2.png" alt=""
                       class="background-img bg-img">
                  <div class="content">
                    <div class="row w-100 h-100 align-items-center">
                      <div class="col-xxl-6 col-lg-9">
                        <h5 class=" wow animated fadeInUp" data-wow-delay="0.2s"> New Products
                        </h5>
                        <h3 class=" wow animated fadeInUp" data-wow-delay="0.3s"> Women Sneakers
                        </h3>
                        <span class="link wow animated fadeInUp" data-wow-delay="0.4s"> explore
                                                    now</span>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="categories-tab pt-60 pb-60 wow fadeInUp">
      <div class="container auto-container">
        <div class="row">
          <div class="col-12">
            <ul class="nav three nav-pills justify-content-center" id="pills-tab-two" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active"
                        id="pills-best-sellers-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-best-sellers" type="button" role="tab"
                        aria-controls="pills-best-sellers" aria-selected="true"> Best Sellers
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link"
                        id="pills-new-arrivals-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-new-arrivals" type="button" role="tab"
                        aria-controls="pills-new-arrivals" aria-selected="false"> New Arrivals
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-top-rated-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-top-rated" type="button" role="tab"
                        aria-controls="pills-top-rated" aria-selected="false"> Top Rated
                </button>
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="tab-content" id="pills-tabContent-two">
            <div class="tab-pane fade show active" id="pills-best-sellers" role="tabpanel"
                 aria-labelledby="pills-best-sellers-tab">
              <div class="catagory-slider-three">
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/products-1.jpg" class="first-img"
                             alt=""/>
                        <img src="main/images/home-three/products-hover-1.png" alt=""
                             class="hover-img"/>
                      </a>
                      <div class="products-grid-one__badge-box"> <span
                          class="bg_base badge new ">New</span> <span
                          class="bg_black badge discount">-40%</span></div>
                      <a
                          href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="compare.html"> <i
                              class="flaticon-left-and-right-arrows"></i> <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Apex Sneakers </a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/products-2.jpg" alt=""/>
                      </a>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="#0"> <i class="flaticon-left-and-right-arrows"></i>
                            <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Sports Shoes</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/products-3.jpg" class="first-img"
                             alt=""/>
                        <img src="main/images/home-three/products-hover-3.png" alt=""
                             class="hover-img"/>
                      </a>
                      <div class="products-grid-one__badge-box"> <span
                          class="bg_base badge new ">New</span></div>
                      <a href="cart.html"
                         class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="#0"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span>
                          </a></li>
                          <li><a href="#0"> <i class="flaticon-left-and-right-arrows"></i>
                            <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Trendy stylish shoes</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/products-4.jpg" alt=""/>
                      </a>
                      <a href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="compare.html"> <i
                              class="flaticon-left-and-right-arrows"></i> <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Casual Shoes</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img img-bg">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/products-5.png" alt=""/>
                      </a>
                      <div class="products-grid-one__badge-box"> <span
                          class="bg_black badge discount">-10%</span></div>
                      <a
                          href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="compare.html"> <i
                              class="flaticon-left-and-right-arrows"></i> <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">High Quality Sneakers </a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/products-6.png" alt=""/>
                      </a>
                      <div class="products-grid-one__badge-box"> <span
                          class="bg_base badge new ">New</span></div>
                      <a href="cart.html"
                         class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="compare.html"> <i
                              class="flaticon-left-and-right-arrows"></i> <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Outdoor Sports Shoes</a></h5>
                      <p>
                        <del>$200.00</del>
                        $159.00
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-new-arrivals" role="tabpanel"
                 aria-labelledby="pills-new-arrivals-tab">
              <div class="catagory-slider-three">
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/productss2-1.jpg" class="first-img"
                             alt=""/>
                        <img src="main/images/home-three/productss2-hover-1.png" alt=""
                             class="hover-img"/>
                      </a>
                      <div class="products-grid-one__badge-box"> <span
                          class="bg_base badge new ">New</span> <span
                          class="bg_black badge discount">-40%</span></div>
                      <a
                          href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="compare.html"> <i
                              class="flaticon-left-and-right-arrows"></i> <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Sport Sneakers</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/productss2-2.jpg" alt=""/>
                      </a>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="#0"> <i class="flaticon-left-and-right-arrows"></i>
                            <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Brown Office Shoe</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/productss2-3.jpg" class="first-img"
                             alt=""/>
                        <img src="main/images/home-three/productss2-hover-3.png" alt=""
                             class="hover-img"/>
                      </a>
                      <div class="products-grid-one__badge-box"> <span
                          class="bg_base badge new ">New</span></div>
                      <a href="cart.html"
                         class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="#0"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span>
                          </a></li>
                          <li><a href="#0"> <i class="flaticon-left-and-right-arrows"></i>
                            <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Sport Shoe Lilo</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/productss2-4.jpg" alt=""/>
                      </a>
                      <a href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="compare.html"> <i
                              class="flaticon-left-and-right-arrows"></i> <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Black Office Shoe</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img img-bg">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/productss2-5.jpg" alt=""/>
                      </a>
                      <div class="products-grid-one__badge-box"> <span
                          class="bg_black badge discount">-10%</span></div>
                      <a
                          href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="compare.html"> <i
                              class="flaticon-left-and-right-arrows"></i> <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Leather Sneakers</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/productss2-2.jpg" alt=""/>
                      </a>
                      <div class="products-grid-one__badge-box"> <span
                          class="bg_base badge new ">New</span></div>
                      <a href="cart.html"
                         class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="compare.html"> <i
                              class="flaticon-left-and-right-arrows"></i> <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">White Casual Shoe</a></h5>
                      <p>
                        <del>$200.00</del>
                        $159.00
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-top-rated" role="tabpanel"
                 aria-labelledby="pills-top-rated-tab">
              <div class="catagory-slider-three">
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/productss3-1.jpg" class="first-img"
                             alt=""/>
                        <img src="main/images/home-three/productss3-hover-1.jpg" alt=""
                             class="hover-img"/>
                      </a>
                      <div class="products-grid-one__badge-box"> <span
                          class="bg_base badge new ">New</span> <span
                          class="bg_black badge discount">-40%</span></div>
                      <a
                          href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="compare.html"> <i
                              class="flaticon-left-and-right-arrows"></i> <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Sport Sneakers</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/productss3-2.jpg" alt=""/>
                      </a>
                      <a href="cart.html" class="addcart btn--primary style2">
                        Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="#0"> <i class="flaticon-left-and-right-arrows"></i>
                            <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Brown Office Shoe</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/productss3-3.jpg" class="first-img"
                             alt=""/>
                        <img src="main/images/home-three/productss3-hover-3.png" alt=""
                             class="hover-img"/>
                      </a>
                      <div class="products-grid-one__badge-box"> <span
                          class="bg_base badge new ">New</span></div>
                      <a href="cart.html"
                         class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="#0"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span>
                          </a></li>
                          <li><a href="#0"> <i class="flaticon-left-and-right-arrows"></i>
                            <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Sport Shoe Lilo</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/productss3-4.jpg" alt=""/>
                      </a>
                      <a href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="compare.html"> <i
                              class="flaticon-left-and-right-arrows"></i> <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Black Office Shoe</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img img-bg">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/productss3-5.png" alt=""/>
                      </a>
                      <div class="products-grid-one__badge-box"> <span
                          class="bg_black badge discount">-10%</span></div>
                      <a
                          href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="compare.html"> <i
                              class="flaticon-left-and-right-arrows"></i> <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">Leather Sneakers</a></h5>
                      <p>$159.00</p>
                    </div>
                  </div>
                </div>
                <div class="products-three__inner">
                  <div class="products-three-single w-100">
                    <div class="products-three-single-img">
                      <a href="shop-details-3.html" class="d-block">
                        <img src="main/images/home-three/productss3-3.jpg" alt=""/>
                      </a>
                      <div class="products-grid-one__badge-box"> <span
                          class="bg_base badge new ">New</span></div>
                      <a href="cart.html"
                         class="addcart btn--primary style2"> Add To Cart </a>
                      <div class="products-grid__usefull-links">
                        <ul>
                          <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                                wishlist</span> </a></li>
                          <li><a href="compare.html"> <i
                              class="flaticon-left-and-right-arrows"></i> <span>
                                                                compare</span> </a></li>
                          <li><a href="shop-details-3.html"> <i
                              class="flaticon-visibility"></i> <span> quick
                                                                view</span> </a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="products-three-single-content text-center"><span>Men Shoes</span>
                      <h5><a href="shop-details-3.html">White Casual Shoe</a></h5>
                      <p>
                        <del>$200.00</del>
                        $159.00
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="loder">
              <div id="overlay" style="display:none;">
                <div class="spinner"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="newsLetter-one border-0 style-two pt-60 pb-60 overflow-hidden">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div
                class="newsLetter-one__content-box d-flex align-items-center justify-content-md-start justify-content-center wow fadeInUp animated"
                data-wow-delay="0.1s">
              <div class="thumb"><img src="main/images/home-two/envalop.png" alt=""></div>
              <h3 class="t36"><span>Sign Up For </span> Newsletter </h3>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div
                class="newsLetter-one__content-box d-flex align-items-center justify-content-md-start justify-content-center wow fadeInUp animated "
                data-wow-delay="0.2s">
              <h6 class="text-md-start text-center"> Subscribe to ours weekly newsletter for all the
                latest updates </h6>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div
                class="newsLetter-one__content-box three d-flex align-items-center justify-content-md-start justify-content-center wow fadeInUp animated"
                data-wow-delay="0.3s">
              <form action="#0" class="form">
                <div class="newsLetter-one__subscribe-box"><input type="email"
                                                                  placeholder="Email address" name="email">
                  <button type="submit"
                          class="subscrib-btn"> Subscribe
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="categories-three overflow-hidden">
      <div class="auto-container container">
        <div class="row">
          <div class="categories-three__inner pt-120 pb-120">
            <div class="row align-items-center justify-content-xl-start justify-content-center">
              <div class="col-xl-4 col-md-7">
                <div class="categories-three__content text-xl-start text-center wow fadeInUp animated">
                  <div class="sec-title-style2 style3">
                    <h2>Shop by Categories</h2>
                  </div>
                  <p>Continually enhance long-term don high impact niche markets whereas user centric
                    niche markets. actualize backward compatible...</p>
                  <div class="btn-box"><a href="shop-grid-left-sidebar.html"
                                          class="btn--primary style2">Discover More</a></div>
                </div>
              </div>

              <div class="col-xl-8">
                <div class="row  justify-content-center">
                  <div class="col-lg-4 col-sm-6">
                    <div class="categories-three__list-item mt-30 wow fadeInUp animated">
                      <div class="categories-three__list-item-inner"><a
                          href="shop-grid-right-sidebar.html" class="img-box"> <img
                          src="main/images/home-three/categories-v2-img1.jpg" alt=""/>
                        <div class="text"><span>369 Items</span></div>
                      </a>
                        <div class="title text-center">
                          <h4><a href="shop-grid-left-sidebar.html">Sport’s Shoes</a></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                    <div class="categories-three__list-item mt-30 wow fadeInUp animated">
                      <div class="categories-three__list-item-inner"><a
                          href="shop-grid-left-sidebar.html" class="img-box"> <img
                          src="main/images/home-three/categories-v2-img2.jpg" alt=""/>
                        <div class="text"><span>369 Items</span></div>
                      </a>
                        <div class="title text-center">
                          <h4><a href="shop-grid-left-sidebar.html">Casual Shoes</a></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-sm-6">
                    <div class="categories-three__list-item mt-30 wow fadeInUp animated">
                      <div class="categories-three__list-item-inner"><a
                          href="shop-grid-left-sidebar.html" class="img-box"> <img
                          src="main/images/home-three/categories-v2-img3.jpg" alt=""/>
                        <div class="text"><span>369 Items</span></div>
                      </a>
                        <div class="title text-center">
                          <h4><a href="shop-grid-left-sidebar.html">Office Shoes</a></h4>
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
              <div class="review-one__single-review">
                <div class="review-one__single-content">
                  <div class="review-one__aurthor">
                    <div class="thumb"><img src="main/images/testimonial/testimonial-v1-2.png"
                                            alt=""></div>
                    <span class="quate"> <i
                        class="flaticon-right-quotes-symbol"></i> </span>
                  </div>
                  <div class="review-one__review-text">
                    <p> “Quickly explot worldwide leadership long-term high-impact "outside the box
                      thinking. Quickly network synergistic enterprise customer service” </p>
                    <h4><a href="#0">Elaine Hayes</a></h4> <span>UI/UX Designer </span>
                  </div>
                </div>
              </div>
              <div class="review-one__single-review">
                <div class="review-one__single-content">
                  <div class="review-one__aurthor">
                    <div class="thumb"><img src="main/images/testimonial/testimonial-v1-3.png"
                                            alt=""></div>
                    <span class="quate"> <i
                        class="flaticon-right-quotes-symbol"></i> </span>
                  </div>
                  <div class="review-one__review-text">
                    <p> “Quickly explot worldwide leadership long-term high-impact "outside the box
                      thinking. Quickly network synergistic enterprise customer service” </p>
                    <h4><a href="#0">Jane Young </a></h4> <span>Web Engineer </span>
                  </div>
                </div>
              </div>
              <div class="review-one__single-review">
                <div class="review-one__single-content">
                  <div class="review-one__aurthor">
                    <div class="thumb"><img src="main/images/testimonial/testimonial-v1-2.png"
                                            alt=""></div>
                    <span class="quate"> <i
                        class="flaticon-right-quotes-symbol"></i> </span>
                  </div>
                  <div class="review-one__review-text">
                    <p> “Quickly explot worldwide leadership long-term high-impact "outside the box
                      thinking. Quickly network synergistic enterprise customer service” </p>
                    <h4><a href="#0">Kim Douglas </a></h4> <span>React Developer</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="blog-three pt-60 pb-120 overflow-hidden">
      <div class="container">
        <div class="section-header style3 text-center wow fadeInUp animated">
          <h2>Latest News </h2>
          <p> Weekend Updates </p>
        </div>
        <div class="row justify-content-center">
          <!--Start Blog Three Single-->
          <div class="col-xl-4 col-lg-4 col-sm-6 wow fadeInUp animated ">
            <div class="blog-three__single mt-30 ">
              <a href="blog-single.html" class="blog-three__single-img d-block">
                <img src="main/images/blog/blog-v3-1.jpg" alt=""/>
              </a>
              <div class="blog-three__single-content text-center"><span>Vendora Style</span>
                <h4><a href="blog-single.html">A Perfect Style With Our Fashion Shoes</a></h4>
                <div class="btn-box"><a href="blog-single.html">Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-sm-6 wow fadeInUp animated">
            <div class="blog-three__single mt-30"><a href="blog-single.html"
                                                     class="blog-three__single-img d-block"> <img
                src="main/images/blog/blog-v3-2.jpg"
                alt=""/> </a>
              <div class="blog-three__single-content text-center"><span>Vendora Style</span>
                <h4><a href="blog-single.html">2021-2021 fall-winter men's shoe trends.</a></h4>
                <div class="btn-box"><a href="blog-single.html">Read More</a></div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-sm-6 wow fadeInUp animated">
            <div class="blog-three__single mt-30"><a href="blog-single.html"
                                                     class="blog-three__single-img d-block"> <img
                src="main/images/blog/blog-v3-3.jpg"
                alt=""/> </a>
              <div class="blog-three__single-content text-center"><span>Vendora Style</span>
                <h4><a href="blog-single.html">What men's shoes will be in fashion in the spring </a>
                </h4>
                <div class="btn-box"><a href="blog-single.html">Read More</a></div>
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
