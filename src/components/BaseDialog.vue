<template>
    <div>
        <div class="dialog" v-if="show">
            <form action="" @submit.prevent>
                <div class="header">
                    <h2>编辑个人信息<span></span></h2>
                </div>
                <div class="main">
                    <ul>
                        <li v-if="is_edit">
                            <label for="">ID:</label>
                            <input type="text" v-model="id" disabled>
                        </li>
                        <li>
                            <label for="">姓名:</label>
                            <input v-focus type="text" v-model="name">
                        </li>
                        <li><label for="">年龄:</label>
                            <input type="number" v-model="age" min="0" max="150" value="20"></li>
                        <li>
                            <label for="">性别:</label>
                            男<input value="男" type="radio" v-model="sexy">
                            女<input value="女" type="radio" v-model="sexy">
                        </li>
                    </ul>
                </div>
                <div class="footer">
                    <button class="btn " @click="sendData">确认操作</button>
                    <button class="btn" @click="close">结束操作</button>
                </div>
            </form>
        </div>
        <div class="overlay" v-show="show"></div>
    </div>
</template>
<script>
export default {
    props: ['show', 'is_edit', 'edData'],
    data() {
        return {
            id: 0,
            name: '',
            age: 20,
            sexy: '男'
        }
    },
    watch: { //监视is_edit:是否进入编辑状态
        is_edit: function(value, oldValue) {
            console.log(value, oldValue);
            if (value) { //变量解构
                [this.id, this.name, this.age, this.sexy] = [this.edData.id, this.edData.name, this.edData.age, this.edData.sexy];
            }
        }
    },
    methods: {
        sendData() { //发送新增或编辑的数据
            if (!this.is_edit) { //新增数据
                this.$emit("push", { name: this.name, age: this.age, sexy: this.sexy });

            } else { //编辑数据
                this.$emit("push", { id: this.id, name: this.name, age: this.age, sexy: this.sexy });
            }
        },
        close() { //触发自定义关闭事件，并设置数据为初始值（复原数据）
            this.name = "";
            this.id = 0;
            this.age = 20;
            this.sexy = '男';
            this.$emit("close");
        }
    },
    directives: {
        focus: {
            // 指令的定义
            inserted: function(el) {
                el.focus()
            }
        }
    }
}
</script>
<style>
/* init */

.dialog {
    position: absolute;
    z-index: 300;
    background: #fff;
    box-shadow: 8px 8px 15px rgba(0, 0, 5, .5);
    border-radius: 8px;
    border: 1px solid #666;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    padding-bottom: 10px;
}

.overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    z-index: 100;
}

.dialog h2 {
    text-align: center;
    line-height: 2em;
    font-size: 1.5em;
    /* font-weight: 200; */
    background: #eb4a70;
    color: #fff;
    border: 1px solid #fff;
}


.dialog li {
    list-style: none;
    line-height: 1.5em;
    margin: 1em 0;
    font-size: 1em;
    padding: 0 .5em;
}

.dialog label {
    display: inline-block;
    text-align: right;
    margin-right: 8px;
    font-size: 1em;
    width: 3em;

}

.dialog input {
    font-size: 1.15em;
    padding-left: 5px;
    border: 1px #ccc solid;
    outline: none;
    border-radius: .15em;


}

.dialog .footer::before {
    content: "";
    display: block;
    border-bottom: 1px solid #eb4a70;
    margin: 0 20px;

}

.dialog .footer {
    height: 60px;
    line-height: 60px;
    text-align: center;
}

@media screen and (min-width: 640px) {
    .dialog {
        width: 480px;
    }

    .dialog .main {
        width: 360px;
        margin: 0 auto;
    }
}
</style>