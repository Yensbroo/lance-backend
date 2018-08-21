<script>
export default {
  props: ["attributes"],

  data() {
    return {
      id: this.attributes.id,
      full_name: this.attributes.full_name,
      email: this.attributes.email,
      role_id: this.attributes.role_id,
      deleted_at: this.attributes.deleted_at
    };
  },

  created: function() {
    console.log();
  },

  methods: {
    update() {
      axios.patch("/users/" + this.attributes.id, {
        full_name: this.full_name,
        email: this.email,
        role_id: this.role_id
      });
    }
  }
};
</script>