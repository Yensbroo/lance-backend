<template>
  <div class="alert alert-flash" role="alert" v-show="show">
      <p>{{ body }}</p>
  </div>
</template>

<script>
export default {
    props:['message'],

  data() {
      return {
        body: '',
        show: false
      }
  },

  created() {
      if(this.message) {
          this.flash(this.message)
      }

      window.events.$on('flash', message => {
          this.flash(message);
      })
  },

  methods: {
      flash(message) {
          this.body = message,
          this.show = true;

          this.hide();
      },

      hide() {
           setTimeout(() => {
            this.show = false;
        }, 3000);
      }
  }


}
</script>
