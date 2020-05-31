<template>
    <div>
        <router-view></router-view>
        <nav-list></nav-list>
    </div>
</template>
<script>
import NavList from "../views/NavList"
import BookDetail from "../components/BookDetail"
export default {
    components: {
        NavList,
        BookDetail

    }
}
</script>
<style>
* {
    margin: 0;
    padding: 0;
}

a {
    text-decoration: none;
}

ul,
li {
    list-style: none;
}

body,
html {
    width: 100%;
    height: 100%;
}

header,
section,
nav,
footer {
    display: block;
}
</style>