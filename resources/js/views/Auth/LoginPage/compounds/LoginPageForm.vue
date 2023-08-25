<script>
import { ErrorHandlingService } from "../../../../services/ErrorHandlingService.js";

export default {
    name: 'LoginPageForm',

    data() {
        return {
            email: '',
            password: '',
            passwordVisibility: {},
            errors: []
        }
    },

    methods: {
        showPassword(fieldId) {
            if (!this.passwordVisibility[fieldId]) {
                this.passwordVisibility[fieldId] = {}
                this.passwordVisibility[fieldId].relatedField = fieldId
            }
            this.passwordVisibility[fieldId].visible = !this.passwordVisibility[fieldId].visible
        },

        getError(name) {
            const error = ErrorHandlingService.existsError(this.errors, name)
            return error ? error.message : null
        },

        handleSubmit() {
            console.log(this.email, this.password)
        }
    }
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
                                <router-link :to="{ name: 'Register' }" class="ms-1">
                                    Sign up for free
                                </router-link>
                            </p>
                        </div>
                        <form class="common-form">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Email"
                                    v-model="email"
                                    :class="`form-control ${getError('email') && 'is-invalid'}`"
                                >
                                <p v-if="getError('email')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('email') }}</small>
                                </p>
                            </div>
                            <div class="form-group eye">
                                <div class="form-group__inner-position">
                                    <div
                                        class="icon icon-1"
                                        role="button"
                                        @click.prevent="showPassword('password')"
                                    >
                                        <i
                                            v-if="passwordVisibility.password?.relatedField === 'password' && passwordVisibility.password?.visible" class="flaticon-visibility"
                                        ></i>
                                        <i v-else class="flaticon-hidden"></i>
                                    </div>
                                    <input
                                        :type="passwordVisibility.password?.relatedField === 'password' && passwordVisibility.password?.visible ? 'text' : 'password'"
                                        id="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="Password"
                                        v-model="password"
                                        :class="`form-control ${getError('password') && 'is-invalid'}`"
                                    >
                                </div>
                                <p v-if="getError('password')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('password') }}</small>
                                </p>
                            </div>
                            <button
                                type="submit"
                                class="btn--primary style2 my-4"
                                @click.prevent="handleSubmit"
                            >
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.form-group__inner-position {
    position: relative;
}
</style>
