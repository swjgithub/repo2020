<template>
    <section class="booklist">
        <h2><span>{{heading}}</span><span>更多...</span></h2>
        <div class="new">
            <div v-for="item in books" :key="item.id">
                <router-link :to="{'name':'BookDetail',params:{'id':item.id}}">
                    <div><img :src="item.img_url" /></div>
                    <div>{{item.title}}</div>
                    <div>{{item.authors.toString()}}</div>
                </router-link>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props: ['books', 'heading'],

}
</script>
<style>
.new {
    display: flex;
    flex-flow: row wrap;
    justify-content: space-around;
    margin: 20px auto 40px;
}

.new>div {
    box-sizing: border-box;
    margin-bottom: 25px;
    text-align: center;
    flex: 1;
    /* border: 1px #f00 solid; */
}

.new>div:hover {
    cursor: pointer;
    border: 1px #f00 solid;
    /* transform: scale(1.2); */
}

.new img {
    min-width: 10%;
    /* max-width: 70%; */
}

.booklist>h2 {
    display: flex;
    flex-flow: row nowrap;
    justify-content: space-between;
}
</style>