<script>
import { RegisterPageBreadcrumbs, RegisterPageForm } from './compounds'
export default {
  name: 'index',

  components: {
    RegisterPageBreadcrumbs,
    RegisterPageForm
  }
}
</script>

<template>
  <main class="overflow-hidden ">

    <RegisterPageBreadcrumbs/>

    <RegisterPageForm/>

  </main>
</template>

<style scoped>

</style>
