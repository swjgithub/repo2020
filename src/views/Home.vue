<template>
    <div class="home">
        <section>
            <slider :slides="slides"></slider>
            <announcement :announceword="announceword"></announcement>
        </section>
        <book-list @onbookselect="preview($event)" :books="latestUpdated" heading="最近更新"></book-list>
        <book-list @onbookselect="preview($event)" :books="recommended" heading="编辑推荐"></book-list>
        <!-- <book-detail :selected="selected">
           
        </book-detail> -->
    </div>
</template>
<script>
import Slider from "../components/Slider"
import Announcement from "../components/Announcement"
import BookList from "../components/BookList"
// import BookDetail from "../components/BookDetail"
import store from 'vuex'

export default {
    name: 'Home',
    components: {
        Slider,
        Announcement,
        BookList,
        // BookDetail
    },
   
    mounted() {
        console.log(this.$store.state.announceword);
    },
    data() {
        return {
            announceword: this.$store.state.announceword,
            selected: false,
            book: {},
            slides:this.$store.state.slides ,
            latestUpdated:this.$store.state.latestUpdated ,
            recommended:this.$store.state.recommended 

        }
    }

}
</script>