<template>
    <div id="app">
        <header>
            <div class="left">&lt;</div>
            <h1>个人信息管理系统</h1>
            <div class="right">&gt;</div>
        </header>
        <main>
            <div class="search">
                <form action="" @submit.prevent>
                    <label for="keywords">输入关键字：</label>
                    <input @input="searchData" v-model="srch" type="search" id="keywords" class="keywords">
                    <button class="btn btn-open" v-show="!show" @click="show=!show">添加信息
                    </button>
                </form>
                <div class="tbl">
                    <new-person :is_edit="isEdit" :edData="editContent" :show="show" :col="columns" @pull="getData($event)" @close="close()">
                    </new-person>
                </div>
            </div>
            <base-table :is_edit="isEdit" @edit="editData($event)" @delete="removeData($event)" :data-list="people" :col="columns">
            </base-table>
            <div>
                <base-paginate></base-paginate>
            </div>
        </main>
        <footer>
            <p>Copyright &copy;2020 swj@cvit.com.cn.All Rights Reserved. </p>
            <!--   <p>Copyright ©2020 [使用者网站] Powered By [网站程序名称] Version 1.0.0 </p>
            <p>Copyright &copy;2020 XXX.All Rights Reserved.</p> -->
        </footer>
    </div>
</template>
<script>
import BaseTable from "./components/BaseTable";
import NewPerson from "@/components/NewPerson";
import BasePaginate from "@/components/BasePaginate";
export default {
    data() {
        return {
            searchQuery: '',
            columns: ['ID', '姓名', '年龄', '姓别'],
            people: [
                { id: 1, name: 'Jack', age: 30, sexy: '女' },
                { id: 2, name: 'Bill', age: 26, sexy: '女' },
                { id: 3, name: 'Tracy', age: 22, sexy: '男' },
                { id: 4, name: 'Chris', age: 36, sexy: '女' }
            ],
            vpeople: [],
            show: false,
            isEdit: false, //是不时入编辑状态
            edIndex: 0, //数组中的下标位置
            srch: ""
        }
    },
    computed: {
        editContent() {
            return this.people[this.edIndex];
        }
    },
    methods: {
        getData(p) { //从监听子组件数据（pull)
            if (!this.isEdit) { //当是新增信息情况
                if (p.name !== "") { //获取Id最大值，用于产生新的id
                    if (this.people.length == 0) {
                        var $id_max = 0;
                    } else {
                        var $id_max = this.people.reduce(function(init, item, index) {
                            return init > item.id ? init : item.id;
                        }, 0);
                    };

                    p.id = parseInt($id_max) + 1;
                    //进行对象合并，使用Object.assign()方法
                    var o = Object.assign({ id: $id_max + 1 }, p)
                    //追加到数组尾部
                    this.people.push(o);
                    // this.show = false;

                } else { //没有输入用户名提示
                    alert("您还没有输入用户名呢！")
                    return;
                }
            } else { //当是编辑情况
                this.people.splice(this.edIndex, 1, p);
            }
        },
        close() { //监听子组件close事件
            this.show = false;
            this.isEdit = false;
        },
        removeData(p) { //删除数据
            let indexById = this.people.findIndex(function(item, index) {
                return item.id == p;
            });
            this.people.splice(indexById, 1);
        },
        editData(p) { //编辑数据,使用Aarry.findIndex()方法查当前id的数组下标位置indexById
            let indexById = this.people.findIndex(function(item, index) {
                return item.id == p;
            });
            this.edIndex = indexById; //当前编辑的数组元素位置
            this.isEdit = true; //设置当前为可编辑状态            
            this.show = true; //打开编辑对话框
        },
        searchData() {
            let keywords = this.srch;
            if (!this.srch) {
                this.people = this.vpeople;
            } else {
                this.people = this.people.filter(function(item, index) {
                    return item.name.indexOf(keywords) > -1 || item.age.toString().indexOf(keywords)>-1 || item.sexy.indexOf(keywords)>-1 ;
                })
            }
        },
        sortBy(value){

        }
    },

    components: {
        BaseTable,
        NewPerson,
        BasePaginate
    },
    mounted() {
        this.vpeople = this.people;
    }
}
</script>
<style>
html,
body {
    width: 100%;
    height: 100%;
}

* {
    margin: 0;
    padding: 0;
}

header,
main,
footer {
    display: block;
}

#app {
    display: flex;
    flex-flow: column nowrap;
    justify-content: space-between;
    height: 100%;
}

#app>header {
    display: flex;
    flex-flow: row wrap;
    justify-content: space-between;
    align-content: center;
    align-items: center;
    width: 100%;
    height: 60px;
    margin-bottom: 20px;
    background: #42b983;
    color: #fff;
}

#app>header>h1 {
    flex: 1;
    text-align: center;
}

#app>main {
    flex: 1;
    padding: 20px;
}

#app>footer {
    height: 60px;
    line-height: 60px;
    text-align: center;
    background: #42b983;
}

#app .search>form {
    display: flex;
    flex-flow: row nowrap;
    justify-content: space-between;
    align-items: stretch;
}

#app .keywords {
    flex: 1;
    margin: 0 8px;
    padding-left: 8px;
    font-size: 1.2em;
    border: 1px #666 solid;
    border-radius: 4px;
    outline: none;
}

.btn {
    display: inline-block;
    font-size: .85em;
    line-height: 1.15em;
    border: 1px #eb4a70 solid;
    border-radius: .15em;
    outline: none;
    background: #fff;
    color: #eb4a70;
    margin: 2px 4px;
    padding: 2px 8px;

}

.btn-open {
    padding: 4px 8px;

}

.btn:hover {
    background: #eb4a70;
    color: #fff;
    cursor: pointer;
    box-shadow: 4px 4px 8px #ccc;
}

.btn:active {
    background: #ff0;
    color: #eb4a70;
}

header>.left,
header>.right {
    padding: 0 10px;
}
</style>