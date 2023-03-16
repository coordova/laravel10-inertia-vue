<template>
    <AppLayout>
        <!-- header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Book</button>

                    <!-- table -->
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
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    books: Object
});

/*export default {
    name: "Index.vue"
}*/
</script>

<style scoped>

</style>
