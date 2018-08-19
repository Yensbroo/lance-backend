<script>
export default {
  props: ["attributes"],

  data() {
    return {
      full_name: this.attributes.full_name,
      email: this.attributes.email,
      role_id: this.attributes.role_id
    };
  },

  methods: {
    update() {
      axios.patch("/users/" + this.attributes.id, {
        full_name: this.attributes.full_name,
        email: this.attributes.email,
        role_id: this.attributes.role_id
      });
    }
  }
};
</script>