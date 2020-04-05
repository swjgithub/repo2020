<template>
    <div class="pagination">
        <ul>
            <!-- 上一页 -->
            <li><a :class="{not:currentPage==1}" @click="setCurrent(currentPage-1)" href="javascript:void(0)"> « </a> </li>
            <!-- 首页 -->
            <li><a :class="{not:currentPage==1}" @click="setCurrent(1)" href="javascript:void(0)"> &lt;</a></li>
            <!-- 偏移页 -->
            <li v-for="(item,index) in groupList" :key="index"><a :class="{'active': (currentPage==item.val)}" @click="setCurrent(item.val)" href="javascript:void(0)"> {{ item.txt }} </a></li>
            <!-- 尾页 -->
            <li><a :class="{not:currentPage==totalPages}" @click="setCurrent(totalPages)" href="javascript:void(0)"> &gt; </a></li>
            <!-- 下一页 -->
            <li><a :class="{not:currentPage==totalPages}" @click="setCurrent(currentPage+1)" href="javascript:void(0)"> » </a>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    data() {
        return {
            currentPage: this.currentpg,
        }
    },
    props: {
        // 数目总条数
        totalRecord: {
            type: Number,
            default: 0
        },
        // 每一页显示10条数据
        pageSize: {
            type: Number,
            default: 10,
        },
        // 当前处于哪一页
        currentpg: {
            type: Number,
            default: 1,
        },
        // 分页数目
        // 默认可视为5页
        pageGroup: {
            type: Number,
            default: 5,
        }
    },
    // 如何计算总页数
    // 总页数目是随着后台数据的变化而变化的所以需要计算属性，实时计算
    computed: {

        // 获取总页数
        totalPages() {
            return Math.ceil(this.totalRecord / this.pageSize);
        },
        // 获取中间区域页码
        groupList() {
            // 总页数
            let total = this.totalPages,
                // 距离中间那个数的偏移量
                offset = Math.floor(this.pageGroup / 2),
                // 以当前页为中间数
                center = this.currentPage,
                // 临时数组
                temp = [],
                // 返回的数组
                list = [];            
             /////////////第一种情况：判断当总页数<=分页数的情况///////////////
            if (total <= this.pageGroup) {
                while (total--) {
                    temp.push({
                        txt: this.totalPages - total,
                        val: this.totalPages - total
                    })
                }

                return temp;
            }
            /////////////第二种情况：总页数total>分页数目的情况/////////////////
          
            while (total--) {
                temp.push(this.totalPages - total);
            }         
            // 另一种写法：
            // $app=Array.apply(null,{length:10}).map(Number.call,Number);
            // temp=Array.apply(null,{length:total}).map(function(val,index){
            //     return index+1;
            // })
            // 找出当前页在这个数据中的位置
            // let idx = temp.indexOf(center);

            // 另一种写法：
            // let idx=temp.findIndex(function(val,index){
            //     return center==val;
            // })
            // 判断这个位置与中间偏离的大小
            // 计算出中间值
            // (idx < offset) && (center = center + offset - idx);
            (this.currentPage<=offset+1) && (center =offset+1);
             // console.log(center);
            (this.currentPage > this.totalPages - offset) && (center = this.totalPages - offset);
            // console.log(center);
            // 从当前位置减去偏移量再减去1就是数组索引，
            // 获取this.pagegroup长度数组
            temp = temp.splice(center - offset - 1, this.pageGroup);

            do {
                // 拼接数据
                let t = temp.shift();
                list.push({
                    txt: t,
                    val: t
                })
            } while (temp.length)

            // 接着判断数组是否到达处于中间
            if (this.totalPages > this.pageGroup) {
                (this.currentPage > offset + 1) && list.unshift({ txt: '...', val: list[0].val - 1 });
                (this.currentPage < this.totalPages - offset) && list.push({ txt: '...', val: list[list.length - 1].val + 1 });
            }
            return list;
        }
    },
    methods: {
        setCurrent(idx) {
            if (this.currentPage != idx && idx > 0 && idx < this.totalPages + 1) {
                // 判断当前页码不等于本身，和大于零，而且要小于总页数的时候，才触发
                this.currentPage = idx;
                this.$emit('pagechange', this.currentPage);
            }
        }
    }
}
</script>
<style>
.pagination {
    margin-top: 20px;

}

.pagination>ul {
    width: 100%;
    display: flex;
    flex-flow: row nowrap;
    justify-content: center;
}

.pagination a {
    text-decoration: none;
    display: inline-block;
    width: 1.8em;
    height: 1.8em;
    background: #fff;
    margin: 4px;
    text-align: center;
    line-height: 1.8em;
    border: 1px #4ecb70 solid;
}

.pagination a:hover {
    background: #ff0;
    box-shadow: 4px 4px 8px #ccc;
    cursor: pointer;
}

.pagination li {
    list-style: none;
}

.pagination a.active {
   border: 1px #f00 solid;
}

.pagination a.not {
    background: #ccc;
    cursor:text;
}
</style>