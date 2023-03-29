<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <div v-if="field.imageOnly">
        <button
          class="shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900 mb-5"
          type="button"
          @click="openCKFinderModal"
        >
          Select file
        </button>

        <div v-if="value" class="grid grid-cols-4 gap-x-6 gap-y-2">
          <ImageDisplay
            :src="value"
            @clearImage="clearImage"
            :showClearButton="true"
          />
        </div>
      </div>

      <div v-else>
        <ckeditor
          :editor="editor"
          v-model="value"
          :config="editorConfig"
        ></ckeditor>
      </div>

      <p v-if="hasError" class="my-2 text-danger">
        {{ firstError }}
      </p>
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from "laravel-nova";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import CKEditor from "@ckeditor/ckeditor5-vue";
import ImageDisplay from "./internal/ImageDisplay.vue";

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ["resourceName", "resourceId", "field"],

  components: {
    ckeditor: CKEditor.component,
    ImageDisplay,
  },

  mounted() {
    let ckFinderScript = document.createElement("script");
    ckFinderScript.setAttribute(
      "src",
      "https://ckeditor.com/apps/ckfinder/3.4.5/ckfinder.js"
    );
    document.head.appendChild(ckFinderScript);
  },

  data() {
    return {
      selectedImage: null,
      editor: ClassicEditor,
      editorConfig: {
        // The configuration of the editor.
        toolbar: {
          items: [
            "ckfinder",
            "|",
            "heading",
            "|",
            "bold",
            "italic",
            "link",
            "bulletedList",
            "numberedList",
            "blockQuote",
            "insertTable",
            "mediaEmbed",
            "undo",
            "redo",
          ],
        },

        ckfinder: {
          uploadUrl:
            "/ckfinder/connector?command=QuickUpload&type=Files&responseType=json",
          options: {
            resourceType: "Images",
            connectorPath: "/ckfinder/connector",
          },
        },
      },
    };
  },

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      this.value = this.field.value || "";
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || "");
    },

    /**
     * Open the CKFinder modal.
     */
    openCKFinderModal() {
      CKFinder.modal({
        chooseFiles: true,
        connectorPath: "/ckfinder/connector",
        resourceType: "Images",
        onInit: (finder) => {
          finder.on("files:choose", (evt) => {
            const fileUrl = evt.data.files.first().getUrl();
            this.value = fileUrl;
          });
        },
      });
    },

    /**
     * Clear the image.
     */
    clearImage() {
      this.value = null;
    },
  },
};
</script>
