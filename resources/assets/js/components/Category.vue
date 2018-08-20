<script>
export default {
  props: ["attributes", "categories"],

  data() {
    return {
      category_id: this.attributes.id,
      name: this.attributes.name,
      slug: this.attributes.slug
    };
  },
  created: function() {
    console.log(this.headline);
  },

  methods: {
    update() {
      axios.patch("/category/" + this.attributes.id, {
        name: this.name,
        slug: this.slug
      });
    }
  }
};
</script>