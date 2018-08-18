<script>
  export default {
    props: ['attributes'],

    data() {
      return {
        title: this.attributes.title,
        body: this.attributes.body,
        project_end: this.attributes.project_end
      }
    },

    methods: {
      update() {
        axios.patch('/projects/' + this.attributes.id, {
          title: this.title,
          body: this.body,
          project_end: this.project_end
        })
      }
    }
  }
</script>