<template>
    <div class="dialog-wrapper">
        <div class="dialog" v-show="selected">
            <div class="dialog-content">
                <header>
                   <a href="/home" target="_self">                    
                        <i class="fa fa-chevron-left" aria-hidden="true">&nbsp;返回</i>
                    </a>
                    <slot name="title">标题{{$route.params.id}}</slot>
                    <i @click="close" class="fa fa-window-close-o pt" aria-hidden="true">&nbsp;关闭</i>
                </header>
                <section>
                    <slot name='body'>内容</slot>
                </section>
                <footer>
                    <slot name="footer">按钮</slot>
                </footer>
            </div>
            <div class="overlay"></div>
        </div>
    </div>
</template>
<script>
import "font-awesome/css/font-awesome.css";
export default {
    props: ['selected'],
    methods:{
        close(){
            this.$emit("close");
        }
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
    background: #f00;
    z-index: 100;
}

.dialog header {
    display: flex;
    flex-flow: row nowrap;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    height: 64px;
    background: #f0f;
}
.dialog .pt:hover{
    cursor: pointer;
    color: #00f;
}
</style>