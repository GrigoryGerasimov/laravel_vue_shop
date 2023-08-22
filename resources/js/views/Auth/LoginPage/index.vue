<script>
import { LoginPageBreadcrumbs, LoginPageForm } from './compounds'

export default {
  name: 'index',

  components: {
    LoginPageBreadcrumbs,
    LoginPageForm
  }
}
</script>

<template>
  <main class="overflow-hidden ">

    <LoginPageBreadcrumbs/>

    <LoginPageForm/>

  </main>
</template>

<style scoped>

</style>
