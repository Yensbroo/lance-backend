<script>
export default {
  props: ["attributes"],

  data() {
    return {
      headline: this.attributes[0].headline,
      bio: this.attributes[0].bio,
      user_id: this.attributes[0].user_id
    };
  },
  created: function() {
    console.log(this.headline);
  },

  methods: {
    update() {
      axios.patch("/profile/" + this.attributes[0].id, {
        headline: this.headline,
        bio: this.bio
      });
    }
  }
};
</script>