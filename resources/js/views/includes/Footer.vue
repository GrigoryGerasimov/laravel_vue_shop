<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'Footer'
})
</script>

<template>
  <footer class="footer-default footer-3 ">
    <div class="footer-default__main-footer position-relative">
      <div class="container">
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">

            <div class="footer-default__single-box">
              <div class="company-info">
                <div class="footer-title">
                  <h4>Head Office</h4>
                </div>
                <div class="text1">
                  <p>42 Wonderland Lane, Neverwhere Alley</p>
                  <p>Osterhasenstadt, D-00000</p>
                  <p>Germany</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
            <div class="footer-default__single-box">
              <div class="footer-title">
                <h4>Useful Links</h4>
              </div>
              <ul class="footer-links">
                <li>
                  <a href="my-account.html">Account</a>
                </li>
                <li>
                  <a href="login.html">Sign In</a>
                </li>
                <li>
                  <a href="cart.html">View Cart</a>
                </li>
                <li>
                  <a href="wishlist.html">My WishList</a>
                </li>
                <li>
                  <a href="compare.html">Compare Products</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
            <div class="footer-default__single-box">
              <div class="footer-title">
                <h4>Information</h4>
              </div>
              <ul class="footer-links">
                <li>
                  <a href="about-us.html">About us</a>
                </li>
                <li>
                  <a href="contact.html">Contact Us</a>
                </li>
                <li>
                  <a href="faq.html">Faq</a>
                </li>
                <li>
                  <a href="blog.html">Latest Posts</a>
                </li>
                <li>
                  <a href="order-track.html">Order Track</a>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
            <div class="footer-default__single-box">
              <div class="footer-title">
                <h4>Newsletter</h4>
              </div>
              <div class="footer-newsletter">
                <p class="text">Enter your email to receive our latest updates about our products & promotions.</p>
                <form class="footer-default__subscrib-form">
                  <div class="footer-input-box">
                    <input type="email" placeholder="Email address" name="email">
                    <button type="submit" class="subscribe_btn">Subscribe</button>
                  </div>
                </form>
                <div class="newsletter-bottom d-flex align-items-center">
                  <div class="footer-title-box">
                    <p>Follow Us:</p>
                  </div>
                  <div class="footer__medio-boxx  medio-boxx  d-flex align-items-center">
                    <ul>
                      <li>
                        <a href="https://www.facebook.com/" target="_blank" class="active">
                          <i class="flaticon-facebook-app-symbol"></i>
                        </a>
                      </li>
                      <li>
                        <a href="https://www.youtube.com/" target="_blank">
                          <i class="flaticon-youtube"></i>
                        </a>
                      </li>
                      <li>
                        <a href="https://twitter.com/">
                          <i class="flaticon-twitter" target="_blank"></i>
                        </a>
                      </li>
                      <li>
                        <a href="https://www.instagram.com/">
                          <i class="flaticon-instagram" target="_blank"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer_bottom position-relative">
      <div class="container">
        <div class="footer_bottom_content">
          <div class="copyright wow fadeInUp animated">
            <p>© {{ new Date().getUTCFullYear() }} <a href="index.html">Shoppy.</a> An educational non-commercial creative project.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<style scoped>

</style>