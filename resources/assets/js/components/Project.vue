<script>
const moment = require("moment");
export default {
  props: ["attributes", "categories"],

  data() {
    return {
      title: this.attributes.title,
      body: this.attributes.body,
      published: this.attributes.published,
      budget: this.attributes.budget,
      category_id: this.attributes.category_id,
      project_start: moment(this.attributes.project_start)
        .toISOString()
        .slice(0, 16),
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
        category_id: this.category_id,
        project_start: this.project_start,
        published: this.published,
        project_end: this.project_end
      });
    }
  }
};
</script>