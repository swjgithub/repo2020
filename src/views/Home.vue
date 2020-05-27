<template>
    <div class="home">
        <section>
            <slider :slides="HomeData.slides"></slider>
            <announcement :announceword="HomeData.announceword"></announcement>
        </section>
        <book-list @onbookselect="preview($event)" :books="HomeData.latestUpdated" heading="最近更新"></book-list>
        <book-list @onbookselect="preview($event)" :books="HomeData.recommended" heading="编辑推荐"></book-list>
       
        <book-detail @close="close" :selected="selected" >
            <template v-slot:title>
                {{book.title}}
            </template>
            <template v-slot:body>
                <p>{{book.authors}}</p>
                <div>
                    <img :src="book.img_url" />
                </div>
            </template>
            <template v-slot:footer>
                <div>
                    <button>立即购买</button><button>加入购物车</button>
                </div>
            </template>
        </book-detail>  
      
    </div>
</template>
<script>
import Slider from "../components/Slider"
import Announcement from "../components/Announcement"
import BookList from "../components/BookList"
import BookDetail from "../components/BookDetail"
import HomeData from "../books/home.js"
export default {
    name: 'Home',
    components: {
        Slider,
        Announcement,
        BookList,
        BookDetail     
    },
    methods: {
        preview(book) {
            // console.log(book);
            this.book = book;
            //打开图书详情对话框
            this.selected = true;
        },
        close(){
            this.selected = false;
        }
    },
    mounted(){
        this.HomeData=HomeData;      
    }
    ,
    data() {
        return {   
            "HomeData":"",            
            "selected":false,
            "book":"" 
        }
    }

}
</script>


