<script>
export default {
  props: ["attributes"],

  data() {
    return {};
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