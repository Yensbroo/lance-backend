<script>
const moment = require("moment");
export default {
  props: ["attributes"],

  data() {
    return {
      title: this.attributes.title,
      body: this.attributes.body,
      project_end: moment(this.attributes.project_end)
        .toISOString()
        .slice(0, 16)
    };
  },

  created: function() {
    console.log(this.project_end);
  },

  methods: {
    update() {
      axios.patch("/projects/" + this.attributes.id, {
        title: this.title,
        body: this.body,
        project_end: this.project_end
      });
    }
  }
};
</script>