<template>
    <!--<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            &lt;!&ndash; This element is to trick the browser into centering the modal contents. &ndash;&gt;
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                <form>
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="">
                            <div class="mb-4">
                                <label for="formBookTitle"
                                       class="block text-gray-700 text-sm font-bold mb-2">Title: </label>
                                <input type="text"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="formBookTitle" placeholder="Enter Title">

                            </div>
                            <div class="mb-4">
                                <label for="formBookAuthor"
                                       class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
                                <input type="text"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="formBookAuthor" placeholder="Enter Author">

                            </div>
                            <div class="mb-4">
                                <label for="formBookImage"
                                       class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                                <input type="text"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="formBookImage" placeholder="Enter Image">
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                          <button  type="button"
                                   class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                          >
                            Save
                          </button>
                        </span>
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                          <button  type="button"
                                   class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                          >
                            Update
                          </button>
                        </span>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                          <button
                              type="button"
                              class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Cancel
                          </button>
                        </span>
                    </div>
                </form>

            </div>
        </div>
    </div>-->

    <!-- -------------------------------------------------------------------- -->
    <!--<TransitionRoot as="template" :show="open">-->
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <form>
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div
                                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <ExclamationTriangleIcon class="h-6 w-6 text-red-600" aria-hidden="true"/>
                                        </div>
                                        <div class="w-full mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <DialogTitle as="h3"
                                                         class="text-base font-semibold leading-6 text-gray-900">
                                                Bookstore CRUD
                                            </DialogTitle>
                                            <div class="mt-2">
                                                <!-- CONTENIDO -->
                                                <div class="">
                                                    <div class="mb-4">
                                                        <div class="relative rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
                                                            <label for="title" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Title</label>
                                                            <input v-model="form.title" type="text" name="title" id="title" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Title of the book" />
                                                        </div>
                                                        <!--<label for="formBookTitle"
                                                               class="block text-gray-700 text-sm font-bold mb-2">Title: </label>
                                                        <input type="text"
                                                               v-model="form.title"
                                                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                               id="formBookTitle" placeholder="Enter Title">-->
                                                        <div v-if="$page.props.errors.title" class="text-red-500">{{ $page.props.errors.title }}</div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="relative rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
                                                            <label for="author" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Author</label>
                                                            <input v-model="form.author" type="text" name="author" id="author" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Author of the book" />
                                                        </div>
                                                        <!--<label for="formBookAuthor"
                                                               class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
                                                        <input type="text"
                                                               v-model="form.author"
                                                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                               id="formBookAuthor" placeholder="Enter Author">-->
                                                        <div v-if="$page.props.errors.author" class="text-red-500">{{ $page.props.errors.author }}</div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="relative rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
                                                            <label for="image" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Image</label>
                                                            <input v-model="form.image" type="text" name="image" id="title" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Image of the book" />
                                                        </div>
                                                        <!--<label for="formBookImage"
                                                               class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                                                        <input type="text"
                                                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                               id="formBookImage" placeholder="Enter Image">-->
                                                        <div v-if="$page.props.errors.image" class="text-red-500">{{ $page.props.errors.image }}</div>
                                                    </div>
                                                    <div class="mb-4">
                                                        <div class="relative rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
                                                            <label for="image" class="absolute -top-2 left-2 -mt-px inline-block bg-white px-1 text-xs font-medium text-gray-900">Image</label>
                                                            <FilePond
                                                                name="imageFilepond"
                                                                ref="pond"
                                                                v-bind:allow-multiple="false"
                                                                accepted-file-types="image/png, image/jpeg"
                                                                v-bind:server="{
                                                                    url: '',
                                                                    timeout: 7000,
                                                                    process: {
                                                                        url: '/upload-books',
                                                                        method: 'POST',
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': $page.props.csrf_token
                                                                        },
                                                                        withCredentials: false,
                                                                        onload: handleFilePondLoad,
                                                                        onerror: () => {}
                                                                    }
                                                                }"
                                                                v-bind:file="myFiles"
                                                                v-on:init="handleFilePondInit"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                    <button type="button"
                                            class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto"
                                            @click="/*open = false;*/ $emit('formclose')" ref="cancelButtonRef">Cancel
                                    </button>
                                    <button type="button"
                                            v-show="!isEdit"
                                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                                            @click.prevent="/*open = false;*/ $emit('formsave', form)">Save
                                    </button>
                                    <button type="button"
                                            v-show="isEdit"
                                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                                            @click.prevent="/*open = false;*/ $emit('formsave', form)">Update
                                    </button>
                                </div>
                            </form>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { ref } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { ExclamationTriangleIcon } from '@heroicons/vue/24/outline'

/*------------------------------*/
// Import Vue FilePond
import vueFilePond from "vue-filepond";

// Import FilePond styles
import "filepond/dist/filepond.min.css";

// Import FilePond plugins
// Please note that you need to install these plugins separately

// Import image preview plugin styles
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
/*------------------------------*/
// Create component
const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview
);
/*------------------------------*/

// let open = ref(false)
/*------------------------------*/
let props = defineProps({
    form: Object,
    isOpen: Boolean,
    isEdit: Boolean,
    open: Boolean,
    /*open: {
        type: Boolean,
        default: false
    },*/
    myFiles: [],
});
/*------------------------------*/
function handleFilePondInit() {

}

function handleFilePondLoad(response) {
    props.form.image = response;
}
/*export default {
    name: "Form"
}*/
</script>

<style scoped>

</style>
