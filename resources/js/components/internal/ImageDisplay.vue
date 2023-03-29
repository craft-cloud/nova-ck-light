<template>
  <div class="h-full flex items-start justify-center">
    <div class="relative w-full">
      <button
        v-if="showClearButton"
        @click="clearImage"
        type="button"
        class="rounded-full shadow bg-white dark:bg-gray-800 text-center flex items-center justify-center h-[20px] w-[21px] absolute z-20 top-[-10px] right-[-9px] v-popper--has-tooltip"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
          width="20"
          height="20"
          class="inline-block text-gray-800 dark:text-gray-200"
          role="presentation"
        >
          <path
            fill-rule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <div
        class="bg-gray-50 dark:bg-gray-700 relative aspect-square flex items-center justify-center border-2 border-gray-200 dark:border-gray-700 overflow-hidden rounded-lg"
      >
        <img :src="src" class="aspect-square object-scale-down" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "NovaCKLightImageDisplay",

  props: ["src", "showClearButton"],

  methods: {
    /**
     * Clear the image.
     */
    clearImage() {
      this.$emit("clearImage");
    },
  },
};
</script>
