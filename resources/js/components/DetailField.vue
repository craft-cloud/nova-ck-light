<template>
  <PanelItem :index="index" :field="field">
    <template #value>
      <div v-if="field.imageOnly && field.value">
        <div class="break-all md:w-3/4 md:py-3 lg:break-words">
          <span>
            <img
              :src="field.value"
              style="max-width: 128px"
              class="aspect-square object-scale-down"
            />
          </span>
        </div>
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
