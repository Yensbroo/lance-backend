<script>
export default {
  props: ["attributes", "levels"],

  data() {
    return {
      id: this.attributes.id,
      full_name: this.attributes.full_name,
      email: this.attributes.email,
      level_id: this.attributes.level_id
    };
  },

  created: function() {
    console.log();
  },

  methods: {
    update() {
      axios.patch("/admins/" + this.attributes.id, {
        full_name: this.full_name,
        email: this.email,
        level_id: this.level_id
      });
    }
  }
};
</script>