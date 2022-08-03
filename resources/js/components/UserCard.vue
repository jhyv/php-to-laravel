<template>
<section id="main">
    <header>
        <span class="avatar"><img :src="`/images/users/${_user.id}.jpg`" alt="" /></span>
        <h1>{{ _user.name }}</h1>
        <p v-html="_user.comments"></p>
    </header>
</section>
</template>

<script>
export default {
    props:['_user']
}
</script>

<style>

</style>