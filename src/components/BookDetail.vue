<template>
    <div class="dialog-wrapper">
        <div class="dialog">
            <div class="dialog-content">
                <header>
                 <!--    <router-link :to="{'name':'Home'}">
                        <i class="fa fa-chevron-left" aria-hidden="true">&nbsp;返回</i>
                    </router-link>
                    <h2>掌上书店</h2>
                    <i class="fa fa-window-close-o" aria-hidden="true"></i> -->
                    <base-header></base-header>
                </header>
                <section class="center">
                    <h2>{{book.title}}</h2>
                    <div>
                        <img :src="book.img_url" />
                    </div>
                    <p>{{book.authors}}</p>
                    <p>图书单价:￥50.00</p>
                </section>
                <footer class="center">
                    <button>立即购买</button> <button>加入购物车</button>
                </footer>
            </div>
            <div class="overlay"></div>
        </div>
    </div>
</template>
<script>
import store from 'vuex'
import BaseHeader from "../components/BaseHeader"
import "font-awesome/css/font-awesome.css"
//yarn add font-awesome;

export default {
    data() {
        return {
            myid: 0
        }
    },

    computed: {
        book() {
            //方法二：使用getters
            return this.$store.getters.book(this.myid);
            // 方法二:使用find()方法
            // return this.$store.state.latestUpdated.find((item, index) => {
            //     return item.id == this.myid;
            // })
        }

    },
    created() {
        this.myid = this.$route.params.id;
        // console.log(this.myid);
    },
    components:{
        BaseHeader
    }
}
</script>
<style>
.dialog {
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0px;
    top: 0px;
    right: 0px;
    bottom: 0px;
    background: #ccc;
    z-index: 100;
}

.dialog header {
   
}

.dialog i:hover {
    cursor: pointer;
    color: #00f;
}

.dialog-content>footer,
.dialog-content>section {
    text-align: center;
}

.dialog-content>footer {
    position: absolute;
    bottom: 40px;
    width: 100%;
}

.dialog-content>footer button {
    width: 120px;
    height: 36px;
    text-align: center;
    background: 1px #f00 solid;
    line-height: 36px;
    margin: 0 6px;
    border: 1px solid rgb(216, 23, 5);
    cursor: pointer;
}

.dialog-content>footer button:last-child {
    background: rgb(216, 23, 5);
    border: none;
    outline: none;
    color: #fff;
}

.dialog-content>section p {
    margin-top: 24px;
    text-align: center;

}

.dialog-content>section div {
    margin-top: 24px;
}



</style>