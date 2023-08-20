<script>
import Main from './Main.vue'
import keys from '../../services/keys'
export default {
  name: 'index',

  components: {
    Main
  },

  mounted() {
    $(document).trigger(keys.JQ_TRIGGER_KEY)
  }
}
</script>

<template>
  <Main/>
</template>

<style scoped>

</style>
