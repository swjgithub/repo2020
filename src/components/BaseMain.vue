<template>
    <main>
        <div class="search">
            <form action="" @submit.prevent>
                <label for="keywords">输入关键字：</label>
                <input @input="searchData" v-model="srch" type="search" id="keywords" class="keywords">
                <button class="btn btn-open" v-show="!show" @click="show=!show">添加信息
                </button>
            </form>
            <!-- <div class="tbl"> -->
            <base-dialog :is_edit="isEdit" :edData="editContent" :show="show" :col="columns" @push="getData($event)" @close="close()">
            </base-dialog>
            <!-- </div> -->
        </div>
        <base-table :is_edit="isEdit" @edit="editData($event)" @delete="removeData($event)" :data-list="people" :col="columns">
        </base-table>
        <div>
            <base-pagination :totalRecord="totalRecord" :pageSize="pageSize" :current="currentpg" :pageGroup="pageGroup" @pagechange="pageChange($event)">
            </base-pagination>
        </div>
    </main>
</template>
<script>
import BaseTable from "./BaseTable";
import BaseDialog from "./BaseDialog";
import BasePagination from "./BasePagination";
import Storage from "../modules/storage";

export default {
    data() {
        return {
            columns: ['ID', '姓名', '年龄', '姓别'],
            people: [
                // { id: 1, name: 'Jack', age: 30, sexy: '女' },
                // { id: 2, name: 'Bill', age: 26, sexy: '女' },
                // { id: 3, name: 'Tracy', age: 22, sexy: '男' },
                // { id: 4, name: 'Chris', age: 36, sexy: '女' }
            ],
            vpeople: [],
            //////////////
            show: false,
            isEdit: false, //是不时入编辑状态
            edIndex: 0, //数组中的下标位置,然后获取下标
            srch: "", //searchQuery查询字符串
            /////////////
            totalRecord: 0,
            pageSize: 5,
            pageGroup: 5,
            currentpg:1,
        }
    },
    computed: {
        editContent() {
            return this.people[this.edIndex];
        }

    },

    methods: {
        getData(p) { //从监听子组件数据（push)并进行数据更新
            if (!this.isEdit) { //当是新增信息情况
                if (p.name !== "") { //获取Id最大值，用于产生新的id
                    if (this.people.length == 0) {
                        var $id_max = 0;
                    } else {
                        var $id_max = this.people.reduce(function(init, item, index) {
                            return init > item.id ? init : item.id;
                        }, 0);
                    };

                    // p.id = parseInt($id_max) + 1; 直接赋值，数据顺序不对
                    // console.log(p);
                    //进行对象合并，使用Object.assign()方法
                    var o = Object.assign({ id: parseInt($id_max) + 1 }, p)
                    //追加到数组尾部
                    this.people.push(o);
                    // this.show = false;

                } else { //没有输入用户名提示
                    alert("您还没有输入用户名呢！")
                    return;
                }
            } else { //当是编辑情况,也可以判断是否同名，由于方便测试没有限制
                this.people.splice(this.edIndex, 1, p);
            }
            /////
            Storage.set('data', this.people);
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
            /////
            Storage.set('data', this.people);
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
                    return item.name.indexOf(keywords) > -1 || item.age.toString().indexOf(keywords) > -1 || item.sexy.indexOf(keywords) > -1;
                })
            }
        },
        sortBy(value) {

        },
        pageChange(idx) {
            // console.log(idx)
            //获取当前记录（数组下标）         
            idx=idx-1;
            this.people = this.vpeople.slice(idx* this.pageSize, this.pageSize*(idx+1));
            console.log((2 *idx - 1) * this.pageSize);
        }
    },

    components: {
        BaseTable,
        BaseDialog,
        BasePagination
    },
    mounted() {
        // 读取localStorage中的数据
        this.vpeople = Storage.get('data');
        this.totalRecord = this.vpeople.length;
        var p=this.currentpg-1;
        this.people = this.vpeople.slice(p* this.pageSize, this.pageSize*(p+1));
      
    }
}
</script>
<style>
#app main {
    flex: 1;
    padding: 20px;
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
</style>