<template>
    <div class="dialog-wrapper">
        <div class="dialog" v-show="selected">
            <div class="dialog-content">
                <header>
                    <i @click="goback" class="fa fa-chevron-left" aria-hidden="true">&nbsp;返回</i>
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
    methods: {
        close() {
            this.$emit("close");
        },
        goback(){
            this.$router.go(0);
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
    background: #ccc;
    z-index: 100;
}

.dialog header {
    display: flex;
    flex-flow: row nowrap;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    height: 64px;
    background: rgb(216,23,5);
    color: #fff;
}

.dialog .pt:hover {
    cursor: pointer;
    color: #00f;
}
.dialog-content>footer,.dialog-content>section {
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
    border: 1px solid rgb(216,23,5);
    cursor: pointer;
}
.dialog-content>footer button:last-child {
    background: rgb(216,23,5);
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