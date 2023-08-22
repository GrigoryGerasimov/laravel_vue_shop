<script>
export default {
    name: 'RegisterPageForm',

    methods: {
        async getGendersList() {
            const { data } = await this.axios('/api/')
        }
    }
}
</script>

<template>
    <section class="login-page pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-9 wow fadeInUp animated">
                    <div class="login-register-form">
                        <div class="top-title text-center ">
                            <h2>Register</h2>
                            <p>Already have an account?
                                <router-link :to="{ name: 'Login' }" class="ms-1">Sign in</router-link>
                            </p>
                        </div>
                        <form class="common-form">
                            <h6 class="text-secondary my-5">Personal Details</h6>

                            <div class="form-group">
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                       placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="middle_name" name="middle_name"
                                       placeholder="Middle Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                       placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group eye">
                                <div class="icon icon-1">
                                    <i class="flaticon-hidden"></i>
                                </div>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="Password"
                                >
                                <div class="icon icon-2 ">
                                    <i class="flaticon-visibility"></i>
                                </div>
                            </div>
                            <div class="form-group eye">
                                <div class="icon icon-1">
                                    <i class="flaticon-hidden"></i>
                                </div>
                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    class="form-control"
                                    placeholder="Password Confirmation"
                                >
                                <div class="icon icon-2 ">
                                    <i class="flaticon-visibility"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" min="18" placeholder="Last Name">
                            </div>

                            <div
                                class="right-box justify-content-md-between justify-content-center align-items-baseline wow fadeInUp animated">
                                <div class="short-by">
                                    <div class="select-box">
                                        <select id="gender_id" class="wide">
                                            <option data-display="Short by latest">Featured</option>
                                            <option value="title::asc">Alphabetically, A-Z</option>
                                            <option value="title::desc">Alphabetically, Z-A</option>
                                            <option value="recommended_retail_price::asc">Price, low to high</option>
                                            <option value="recommended_retail_price::desc">Price, high to low</option>
                                            <option value="created_at::asc">Date, new to old</option>
                                            <option value="created_at::desc">Date, old to new</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="right-box justify-content-md-between justify-content-center align-items-baseline wow fadeInUp animated">
                                <div class="short-by">
                                    <div class="select-box">
                                        <select id="country_id" class="wide">
                                            <option data-display="Short by latest">Featured</option>
                                            <option value="title::asc">Alphabetically, A-Z</option>
                                            <option value="title::desc">Alphabetically, Z-A</option>
                                            <option value="recommended_retail_price::asc">Price, low to high</option>
                                            <option value="recommended_retail_price::desc">Price, high to low</option>
                                            <option value="created_at::asc">Date, new to old</option>
                                            <option value="created_at::desc">Date, old to new</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h6 class="text-secondary my-5">Address Details</h6>

                            <div class="form-group">
                                <input type="text" class="form-control" id="address_line_1" name="address_line_1"
                                       placeholder="Address Line 1">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="address_line_2" name="address_line_2"
                                       placeholder="Address Line 2">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="street_number" name="street_number"
                                       placeholder="Street Nr">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" is="unit_number" name="unit_number"
                                       placeholder="Unit Nr">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" is="city" name="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" is="region" name="region" placeholder="Region">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" is="postal_code" name="postal_code"
                                       placeholder="Postal Code">
                            </div>

                            <div class="select-box">
                                <select id="address_country_id" class="wide">
                                    <option data-display="Short by latest">Featured</option>
                                    <option value="title::asc">Alphabetically, A-Z</option>
                                    <option value="title::desc">Alphabetically, Z-A</option>
                                    <option value="recommended_retail_price::asc">Price, low to high</option>
                                    <option value="recommended_retail_price::desc">Price, high to low</option>
                                    <option value="created_at::asc">Date, new to old</option>
                                    <option value="created_at::desc">Date, old to new</option>
                                </select>
                            </div>


                            <div class="checkk ">
                                <div class="form-check p-0 mt-4">
                                    <input type="checkbox" id="confirm">
                                    <label class="p-0" for="confirm">Accept the Terms and Privacy Policy</label>
                                </div>
                            </div>
                            <button type="submit" class="btn--primary style2 my-4">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

</style>
