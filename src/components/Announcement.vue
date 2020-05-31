<template>
    <aside class="announce">
        <label for="">快讯</label>
        <span>{{announceword}}</span>
    </aside>
</template>
<script>
export default {
    props:['announceword']
   
}
</script>
<style>
.announce>label {
    display: inline-block;
    width: 60px;
    height: 24px;
    border-radius: 2px;
    background: #f0f;
    margin-right: 20px;
    text-align: center;
}
.announce {
    margin: 15px 0;
    background: #ccc;
    height: 24px;
}
</style>