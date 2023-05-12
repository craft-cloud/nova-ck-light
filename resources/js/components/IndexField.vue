<template>
  <div v-if="field.imageOnly && field.value">
    <img :src="field.value" style="max-width: 32px;" />
  </div>

  <div v-else>
    <span v-html="field.value"></span>
  </div>
</template>

<script>
import ImageDisplay from "./internal/ImageDisplay.vue";

export default {
  props: ["resourceName", "field"],

  components: {
    ImageDisplay,
  },

  computed: {
    fieldValue() {
      return this.field.displayedAs || this.field.value;
    },
  },
};
</script>
