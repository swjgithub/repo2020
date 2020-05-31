<template>
    <div class="head">
        <router-link :to="{'name':'Home'}">
            <i class="fa fa-chevron-left" aria-hidden="true">
                &nbsp;返回
            </i>
        </router-link>
        <h1>掌上书店</h1>
        <i class="fa fa-bars" aria-hidden="true">
            &nbsp;菜单
        </i>
    </div>
</template>
<script>
// import "font-awesome/css/font-awesome.css";
</script>
<style>
.head {
    display: flex;
    flex-flow: row nowrap;
    justify-content: space-between;
    align-items: center;
    height: 64px;
    background: rgb(216,23,5);
    color: #fff;
    padding: 0 15px;
}

.head i:hover {
    cursor: pointer;
}
.head a {
	color: #fff;
}
</style>