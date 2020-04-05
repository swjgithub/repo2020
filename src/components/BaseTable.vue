<template>
    <table>
        <thead>
            <tr class="th">
                <th v-for="item in col" :key="item">{{item}}</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in dataList" :key="item.id">
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

th {
    background: #eb4a70;
    color: #fff;
}
</style>