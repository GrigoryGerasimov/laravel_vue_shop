<script>
import { ErrorHandlingService } from "../../../../services/ErrorHandlingService.js";
import config from './config.json'
import router from "../../../../router/index.js";

export default {
    name: 'RegisterPageForm',

    computed: {
        userInitState() {
            return {
                firstName: '',
                middleName: '',
                lastName: '',
                email: '',
                password: '',
                passwordConfirmation: '',
                age: null,
                genderId: '1',
                countryId: '1',
                addressLine1: '',
                addressLine2: '',
                streetNumber: '',
                unitNumber: '',
                city: '',
                region: '',
                postalCode: '',
                addressCountryId: '1',
                confirmSubmit: false,
            }
        }
    },

    data() {
        return {
            genders: [],
            countries: [],
            errors: [],
            passwordVisibility: {},
            user: {}
        }
    },

    methods: {
        async getGendersList() {
            try {
                const {data} = await this.axios('/api/genders');
                this.genders = data
            } catch (err) {
                console.error(err)
            }
        },

        async getCountriesList() {
            try {
                const {data} = await this.axios('/api/countries')
                this.countries = data
            } catch (err) {
                console.error(err)
            }
        },

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

        async handleSubmit() {
            try {
                this.errors = ErrorHandlingService.setError(this.user, config)
                if (this.errors.length) return

                const userData = {
                    'first_name': this.user.firstName,
                    'middle_name': this.user.middleName,
                    'last_name': this.user.lastName,
                    'email': this.user.email,
                    'password': this.user.password,
                    'password_confirmation': this.user.passwordConfirmation,
                    'age': this.user.age,
                    'gender_id': this.user.genderId,
                    'country_id': this.user.countryId,
                    'address_line_1': this.user.addressLine1,
                    'address_line_2': this.user.addressLine2,
                    'street_number': this.user.streetNumber,
                    'unit_number': this.user.unitNumber,
                    'city': this.user.city,
                    'region': this.user.region,
                    'postal_code': this.user.postalCode,
                    'address_country_id': this.user.addressCountryId
                }

                const { data } = await this.axios.post('/auth/register', userData)

                if (data) {
                    await router.replace({ name: 'Login' })
                }
            } catch (err) {
                console.error(err)
            }
        }
    },

    mounted() {
        this.user = this.userInitState
        this.getGendersList()
        this.getCountriesList()
    }
}
</script>

<template>
    <section class="login-page pt-120 pb-120" v-if="genders.length && countries.length">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-9 wow fadeInUp animated">
                    <div class="login-register-form">
                        <div class="top-title text-center ">
                            <h2>Register</h2>
                            <p>Already have an account?
                                <router-link :to="{ name: 'Login' }" class="ms-1">
                                    Sign in
                                </router-link>
                            </p>
                        </div>
                        <form class="common-form">
                            <h6 class="text-secondary mt-5 mb-4">Personal Details</h6>

                            <div class="form-group">
                                <input
                                    type="text"
                                    id="first_name"
                                    name="first_name"
                                    placeholder="First Name"
                                    v-model="user.firstName"
                                    :class="`form-control ${getError('firstName') && 'is-invalid'}`"
                                >
                                <p v-if="getError('firstName')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('firstName') }}</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="middle_name"
                                    name="middle_name"
                                    placeholder="Middle Name"
                                    v-model="user.middleName"
                                    :class="`form-control ${getError('middleName') && 'is-invalid'}`"
                                >
                                <p v-if="getError('middleName')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('middleName') }}</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="last_name"
                                    name="last_name"
                                    placeholder="Last Name"
                                    v-model="user.lastName"
                                    :class="`form-control ${getError('lastName') && 'is-invalid'}`"
                                >
                                <p v-if="getError('lastName')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('lastName') }}</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="Email"
                                    v-model="user.email"
                                    :class="`form-control ${getError('email') && 'is-invalid'}`"
                                >
                                <p v-if="getError('email')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('email') }}</small>
                                </p>
                            </div>
                            <div class="form-group eye">
                                <div class="form-group__inner-position">
                                    <div class="icon icon-1" role="button" @click.prevent="showPassword('password')">
                                        <i
                                            v-if="passwordVisibility.password?.relatedField === 'password' && passwordVisibility.password?.visible"
                                            class="flaticon-visibility"
                                        ></i>
                                        <i v-else class="flaticon-hidden"></i>
                                    </div>
                                    <input
                                        :type="passwordVisibility.password?.relatedField === 'password' && passwordVisibility.password?.visible ? 'text' : 'password'"
                                        id="password"
                                        name="password"
                                        placeholder="Password"
                                        v-model="user.password"
                                        :class="`form-control ${getError('password') && 'is-invalid'}`"
                                    >
                                </div>
                                <p v-if="getError('password')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('password') }}</small>
                                </p>
                            </div>
                            <div class="form-group eye">
                                <div class="form-group__inner-position">
                                    <div class="icon icon-1" role="button" @click="showPassword('password_confirmation')">
                                        <i
                                            v-if="passwordVisibility['password_confirmation']?.relatedField === 'password_confirmation' && passwordVisibility['password_confirmation']?.visible"
                                            class="flaticon-visibility"
                                        ></i>
                                        <i v-else class="flaticon-hidden"></i>
                                    </div>
                                    <input
                                        :type="passwordVisibility['password_confirmation']?.relatedField === 'password_confirmation' && passwordVisibility['password_confirmation']?.visible ? 'text' : 'password'"
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        placeholder="Password Confirmation"
                                        v-model="user.passwordConfirmation"
                                        :class="`form-control ${getError('passwordConfirmation') && 'is-invalid'}`"
                                    >
                                </div>
                                <p v-if="getError('passwordConfirmation')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('passwordConfirmation') }}</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input
                                    type="number"
                                    id="age"
                                    name="age"
                                    min="18"
                                    placeholder="Age"
                                    v-model="user.age"
                                    :class="`form-control ${getError('age') && 'is-invalid'}`"
                                >
                                <p v-if="getError('age')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('age') }}</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <select
                                    id="gender_id"
                                    name="gender_id"
                                    v-model="user.genderId"
                                    :class="`form-select-sm select-options__params ps-4 ${getError('genderId') && 'is-invalid'}`"
                                >
                                    <option v-for="gender in genders" :value="gender.id">
                                        {{ `${gender.title[0].toUpperCase()}${gender.title.slice(1)}` }}
                                    </option>
                                </select>
                                <p v-if="getError('genderId')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('genderId') }}</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <select
                                    id="country_id"
                                    name="country_id"
                                    v-model="user.countryId"
                                    :class="`form-select-sm select-options__params ps-4 ${getError('countryId') && 'is-invalid'}`"
                                >
                                    <option v-for="country in countries" :value="country.id">
                                        {{ country.title }}
                                    </option>
                                </select>
                                <p v-if="getError('countryId')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('countryId') }}</small>
                                </p>
                            </div>

                            <h6 class="text-secondary mt-5 mb-4">Address Details</h6>

                            <div class="form-group">
                                <input
                                    type="text"
                                    id="address_line_1"
                                    name="address_line_1"
                                    placeholder="Address Line 1"
                                    v-model="user.addressLine1"
                                    :class="`form-control ${getError('addressLine1') && 'is-invalid'}`"
                                >
                                <p v-if="getError('addressLine1')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('addressLine1') }}</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="address_line_2"
                                    name="address_line_2"
                                    placeholder="Address Line 2"
                                    v-model="user.addressLine2"
                                    :class="`form-control ${getError('addressLine2') && 'is-invalid'}`"
                                >
                                <p v-if="getError('addressLine2')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('addressLine2') }}</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="street_number"
                                    name="street_number"
                                    placeholder="Street Nr"
                                    v-model="user.streetNumber"
                                    :class="`form-control ${getError('streetNumber') && 'is-invalid'}`"
                                >
                                <p v-if="getError('streetNumber')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('streetNumber') }}</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="unit_number"
                                    name="unit_number"
                                    placeholder="Unit Nr"
                                    v-model="user.unitNumber"
                                    :class="`form-control ${getError('unitNumber') && 'is-invalid'}`"
                                >
                                <p v-if="getError('unitNumber')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('unitNumber') }}</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="city"
                                    name="city"
                                    placeholder="City"
                                    v-model="user.city"
                                    :class="`form-control ${getError('city') && 'is-invalid'}`"
                                >
                                <p v-if="getError('city')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('city') }}</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="region"
                                    name="region"
                                    placeholder="Region"
                                    v-model="user.region"
                                    :class="`form-control ${getError('region') && 'is-invalid'}`"
                                >
                                <p v-if="getError('region')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('region') }}</small>
                                </p>
                            </div>
                            <div class="form-group">
                                <input
                                    type="text"
                                    id="postal_code"
                                    name="postal_code"
                                    placeholder="Postal Code"
                                    v-model="user.postalCode"
                                    :class="`form-control ${getError('postalCode') && 'is-invalid'}`"
                                >
                                <p v-if="getError('postalCode')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('postalCode') }}</small>
                                </p>
                            </div>

                            <div class="form-group">
                                <select
                                    id="address_country_id"
                                    name="address_country_id"
                                    v-model="user.addressCountryId"
                                    :class="`form-select-sm select-options__params ps-4 ${getError('addressCountryId') && 'is-invalid'}`"
                                >
                                    <option v-for="country in countries" :value="country.id">
                                        {{ country.title }}
                                    </option>
                                </select>
                                <p v-if="getError('addressCountryId')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('addressCountryId') }}</small>
                                </p>
                            </div>

                            <div class="checkk d-flex flex-column align-items-start">
                                <div class="form-check p-0 mt-4">
                                    <input
                                        type="checkbox"
                                        id="confirmSubmit"
                                        name="confirmSubmit"
                                        v-model="user.confirmSubmit"
                                    >
                                    <label class="p-0" for="confirmSubmit">
                                        Accept the Terms and Privacy Policy
                                    </label>
                                </div>
                                <p v-if="getError('confirmSubmit')" class="text-danger my-1">
                                    <small class="d-inline-block">{{ getError('confirmSubmit') }}</small>
                                </p>
                            </div>
                            <button
                                type="submit"
                                class="btn--primary style2 my-4"
                                @click.prevent="handleSubmit"
                            >
                                Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.select-options__params {
    height: 60px;
    width: 100%;
    color: #6c757d;
    font-weight: 300;
    border: 1px solid #ced4da;
}
.form-group__inner-position {
    position: relative;
}
</style>
