<template>
    <table>
        <thead>
            <tr class="th">
                <th v-for="item in col" :key="item">{{item}}</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in dataList" :key="item.id" :class="changebg">
                <td v-for="(k,val,index) in item" :key="index">{{k}}</td>
                <td><button class="btn btn-open" @click="deleData(item.id)">删除</button>
                    <button class="btn btn-open" @click="editData(item.id)">修改</button>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script>
export default {
    props: ['dataList', 'col'],
    data(){
        return {
            changebg:{
                cbg:true
            }
        }
    },
    methods: {
        deleData(id) {
            this.$emit("delete", id)
        },
        editData(id) {
            this.$emit("edit", id);
        }
    }
}
</script>
<style>
table,
tr,
td,
th {
    border-collapse: collapse;
    border: 1px #999 solid;
}

table {
    margin-top: 1em;
    text-align: center;
    width: 100%;
}
tr:nth-child(2n+1){
    background: #eee;
}
th {
    background: #eb4a70;
    color: #fff;
}
.cbg:hover {
    background: #ffe;
}
</style>