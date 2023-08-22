<script>
export default {
    name: 'LoginPageForm'
}
</script>

<template>
    <section class="login-page pt-120 pb-120 wow fadeInUp animated">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-9">
                    <div class="login-register-form">
                        <div class="top-title text-center ">
                            <h2>Login</h2>
                            <p>Don't have an account yet?
                                <router-link :to="{ name: 'Register' }" class="ms-1">Sign up for free</router-link>
                            </p>
                        </div>
                        <form class="common-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group eye">
                                <div class="icon icon-1">
                                    <i class="flaticon-hidden"></i>
                                </div>
                                <input type="password" id="password-field" class="form-control" placeholder="Password">
                                <div class="icon icon-2 ">
                                    <i class="flaticon-visibility"></i>
                                </div>
                            </div>
                            <button type="submit" class="btn--primary style2 my-4">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

</style>
