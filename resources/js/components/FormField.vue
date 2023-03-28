<template>
    <DefaultField
        :field="field"
        :errors="errors"
        :show-help-text="showHelpText"
        :full-width-content="fullWidthContent"
    >
        <template #field>
            <div>
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

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ["resourceName", "resourceId", "field"],

    components: {
        // Use the <ckeditor> component in this view.
        ckeditor: CKEditor.component,
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
    },
};
</script>
