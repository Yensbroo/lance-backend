<script>
const moment = require("moment");
export default {
  props: ["attributes", "categories"],

  data() {
    return {
      user_id: this.attributes.user_id,
      title: this.attributes.title,
      body: this.attributes.body,
      deleted_at: this.attributes.deleted_at,
      id: this.attributes.id,
      published: this.attributes.published,
      budget: this.attributes.budget,
      category_id: this.attributes.category_id,
      project_start: moment(this.attributes.project_start)
        .toISOString()
        .slice(0, 16),
      project_end: moment(this.attributes.project_end)
        .toISOString()
        .slice(0, 16),
      today: moment(new Date())
        .toISOString()
        .slice(0, 16)
    };
  },

  created: function() {
    console.log(this.project_end);
    console.log(this.today);
  },

  methods: {
    update() {
      axios.patch("/projects/" + this.attributes.id, {
        user_id: this.user_id,
        title: this.title,
        body: this.body,
        budget: this.budget,
        category_id: this.category_id,
        project_start: this.project_start,
        published: this.published,
        project_end: this.project_end
      });
    }
  }
};
</script>