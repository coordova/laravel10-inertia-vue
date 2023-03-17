<template>
    <div v-if="links.length > 3" class="flex flex-wrap mb-1">
        <template v-for="link in links">
            <a
                :href="link.url"
                v-html="link.label"
                class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-blue-700 hover:text-white"
                :class="{'bg-blue-700 text-white': link.active}"
            ></a>
        </template>
    </div>
</template>

<script setup>
defineProps({
    links: Array
})

/*export default {
    name: "Pagination"
}*/
</script>

<style scoped>

</style>
