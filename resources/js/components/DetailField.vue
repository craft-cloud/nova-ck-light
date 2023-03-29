<template>
  <PanelItem :index="index" :field="field">
    <template #value>
      <div v-if="field.imageOnly && field.value">
        <ImageDisplay :src="field.value" :showClearButton="false" />
      </div>

      <div v-else>
        <Excerpt
          :content="field.value"
          :plain-text="true"
          :should-show="field.shouldShow"
        />
      </div>
    </template>
  </PanelItem>
</template>

<script>
import ImageDisplay from "./internal/ImageDisplay.vue";

export default {
  props: ["index", "resource", "resourceName", "resourceId", "field"],

  components: {
    ImageDisplay,
  },
};
</script>
