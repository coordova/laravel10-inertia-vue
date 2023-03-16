<template>
    <div>
        Hola {{ $page.props.csrf_token }}
        <ul>
            <li v-for="d in data">{{ d.title }}</li>
        </ul>
    </div>
</template>

<script setup>
defineProps({
    'data': Object
})
/*export default {
    name: "Index.vue"
}*/
</script>

<style scoped>

</style>
