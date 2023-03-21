<template>
    <AppLayout>
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Books</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their id, title, author and image.</p>
                </div>
                <!--Alert-->
                <div class="rounded-md bg-green-50 p-4" v-if="$page.props.flash.message">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <CheckCircleIcon class="h-5 w-5 text-green-400" aria-hidden="true" />
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ $page.props.flash.message }}</p>
                        </div>
                        <div class="ml-auto pl-3">
                            <div class="-mx-1.5 -my-1.5">
                                <button type="button" class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                                    <span class="sr-only">Dismiss</span>
                                    <XMarkIcon class="h-5 w-5" aria-hidden="true" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/-->
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button
                        @click="openForm()"
                        type="button"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                        Add book
                    </button>
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Title</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Author</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Image</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 flex justify-between">
                                        <span class="sr-only">Edit</span>
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-for="book in books.data" :key="book.id">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ book.id }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ book.title }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ book.author }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ book.image }}</td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 flex justify-between">
                                        <!--<Link :href="`/books/${book.id}/edit`" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ book.id }}</span></Link>-->
                                        <!--<Link :href="`/books/${book.id}/edit`" class="text-indigo-600 hover:text-indigo-900">Delete<span class="sr-only">, {{ book.id }}</span></Link>-->
                                        <a href="#" @click="openForm(book)" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ book.id }}</span></a>
                                        <a href="#" @click="deleteItem(book)" class="text-indigo-600 hover:text-indigo-900">Delete<span class="sr-only">, {{ book.id }}</span></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!-- Pagination -->
                            <div class="">
                                <Pagination :links="books.links.slice(1, -1)" :fromTo="[books.from, books.to, books.total]" :linkPrevNext="[books.prev_page_url, books.next_page_url]"/>
                                <BookForm :open="isFormOpen" :isOpen="isFormOpen" :isEdit="isFormEdit" :form="formObject" @formsave="saveItem" @formclose="closeModal" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- header -->
        <!--<template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Book</button>

                    &lt;!&ndash; table &ndash;&gt;
                    <table class="table-fixed w-full posts-table">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Author</th>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="book in books.data" :key="book.id" class="text-gray-600">
                                <td class="px-4 py-2 w-20">{{ book.id }}</td>
                                <td class="px-4 py-2">{{ book.title }}</td>
                                <td class="px-4 py-2">{{ book.author }}</td>
                                <td class="px-4 py-2">{{ book.image }}</td>
                                <td class="px-4 py-2 text-center">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">Edit</button>
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded ml-2">Edit</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Pagination :links="books.links" class="mt-8 flex flex-row justify-center" />
                </div>
            </div>
        </div>-->
    </AppLayout>
</template>

<script setup>
// import AppLayout from "@/Layouts/AppLayout.vue";
// import Pagination from "@/Components/Pagination_.vue";
import Pagination from "@/Components/Pagination.vue";
import BookForm from "@/Components/Book/Form.vue";
import {ref} from "vue";

import { CheckCircleIcon, XMarkIcon } from '@heroicons/vue/20/solid'

import { router } from '@inertiajs/vue3'

/*---------------*/
const defaultFormObject = {
    title: null,
    author: null,
    image: null
}
/*---------------*/
const isFormOpen = ref(false);
const isFormEdit = ref(false);
const formObject = ref(defaultFormObject);
/*---------------*/

defineProps({
    books: Object,
});

/*----------------*/
function saveItem(item) {
    // console.log(item);
    let url = '/books';
    if (item.id) {
        url = '/books/' + item.id;
        item._method = 'PUT';
    }
    router.post(url, item, {
        onError: () => {

        },
        onSuccess: () => {
            closeModal();
        }
    });
}

function closeModal() {
    isFormOpen.value = false;
}

function openForm(item) {
    // alert('Open modal');
    console.log('open-form - formOpen: ' + isFormOpen.value);
    isFormOpen.value = true;
    isFormEdit.value = !!item; // vemos si existe el parametro item
    formObject.value = item ? item : defaultFormObject;

    // $page.props.errors = {};
}

function deleteItem(item) {
    console.log('delete: ' + item.id);
    if (window.confirm('Are you sure?')){
        router.post('/books/' + item.id, {
            _method: 'DELETE'
        });
    }
}
/*----------------*/
/*export default {
    name: "Index.vue"
}*/
</script>

<style scoped>

</style>
