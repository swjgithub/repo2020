<template>
    <div class="pagination">
        <ul>
            <!-- 上一页 -->
            <li v-show="currentPage!=1"><a href="javascript:void(0);" @click="setCurrent(currentPage-1)"> « </a> </li>
            <!-- 动态首页在  groupList()中 -->
            <!-- 偏移页 -->
            <li v-for="(item,index) in groupList" :key="index"><a href="#" :class="{'active': (currentPage==item.val)}" @click="setCurrent(item.val)"> {{ item.txt }} </a></li>
            <!--动态尾页在  groupList()中 -->
            <!-- 下一页 -->
            <li v-show="currentPage!==totalPages"><a :class="{not:currentPage==totalPages}" @click="setCurrent(currentPage+1)" href="javascript:void(0);"> » </a>
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
        // 默认可视为5页(可视页码)
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
        // 获取中间区域页码数据
        groupList() {
            // 距离中间那个数的偏移量
            let offset = Math.floor(this.pageGroup / 2),
                //以当前页为中间数
                center = this.currentPage,
                // 临时数组
                temp = [],
                // 返回的数组
                list = [];
            //////第一种情况：判断当总页数<=分页数的情况 或总页数<=5页时执行//////页码全部显示出来///////// 
            if (this.totalPages <= this.pageGroup || this.pageGroup > this.totalPages - 2) {
                // 初始化数据然后赋值
                list = Array.apply(null, { length: this.totalPages }).map(function(val, index) {
                    return { txt: index + 1, val: index + 1 };
                })
                return list;
            } else {
                /////////////第二种情况：总页数total>分页数目的情况//////////////
                temp = Array.apply(null, { length: this.totalPages }).map(function(val, index) {
                    return index + 1;
                });
                // 判断这个位置与中间偏离的大小
                // 计算出中间值 ，校正左右位置的中间值
                (this.currentPage <= offset + 1) && (center = offset + 2);
                //校正起始位置,左侧                
                ////如果this.pageGroup是奇数，左右对称，否则，左右差1，要校正，如为8时就左4右3      
                // this.pageGroup为偶数时右侧校正

                this.pageGroup % 2 == 0 && this.currentPage >= this.totalPages - offset && (center = this.totalPages - offset);

                // console.log(this.currentPage);
                // this.pageGroup为奇数时右侧校正
                this.pageGroup % 2 != 0 && this.currentPage >= this.totalPages - (offset + 1) && (center = this.totalPages - (offset + 1));
                // console.log(center);
                //  校正结束位置，右侧
                // 从当前位置减去偏移量再减去1就是数组索引， 获取this.pagegroup长度数组   

                temp = temp.splice(center - offset - 1, this.pageGroup);
                // console.log(temp)
                //根据临时数组中的值，组装可视页码部分（this.pageGroup个） 的数据list。

                // console.log(temp);              
                list = temp.map(function(val, index) {
                    return { txt: val, val: val };
                });
                // console.log(list);

                ////////添加左侧...到页码列表后面中//////////////
                if (this.totalPages > this.pageGroup + 2) {
                    ////////添加左侧...到页码表前面///////////
                    (this.currentPage > offset + 2) && list.unshift({ txt: '...', val: list[0].val - 1 });
                    //左侧修正了当隔一个页码时不加...,                 
                    //     (this.currentPage == offset + 3) && (list[this.currentPage - offset - 3].txt = list[this.currentPage - offset - 3].val);

                }
                //////////////添加首页码////////////////////////
                list.unshift({
                    txt: 1,
                    val: 1
                });

                ////////添加右侧...到页码列表后面中//////////////
                if (this.totalPages > this.pageGroup + 2) {
                    //校正右侧添加...的位置
                    let correctionPosition = this.pageGroup % 2 == 0 ? this.totalPages - offset : this.totalPages - (offset + 1);
                    ////====添加右侧...到页码列表后面中=====================////
                    this.currentPage < correctionPosition && list.push({ txt: '...', val: list[list.length - 1].val + 1 });
                    // 进行右侧修正，当隔一个页码时不加...,

                    // this.pageGroup % 2 == 0 && this.currentPage == this.totalPages - offset - 1 && (list[list.length - 1].txt = list[list.length - 1].val);


                    // this.pageGroup % 2 != 0 && this.currentPage == this.totalPages - offset - 2 && (list[list.length - 1].txt = list[list.length - 1].val);
                }
                // console.log(list);
                ////////////////添加尾页码///////////////////////
                list.push({ txt: this.totalPages, val: this.totalPages });
            }
            return list;
        }
    },
    methods: {
        setCurrent(idx) { //方法 触发自定义事件
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
    display: flex;
    flex-flow: row nowrap;
    justify-content: center;
    align-items: center;
    /* background: #eee; */
}

.pagination li {
    margin: 4px;
    width: 1.8em;
    height: 1.8em;
    list-style: none;
}

.pagination a {
    display: inline-block;
    text-decoration: none;
    width: 1.8em;
    height: 1.8em;
    background: #fff;
    text-align: center;
    line-height: 1.8em;
    border: 1px #4ecb70 solid;
}

.pagination a:hover {
    content: "";
    background: #ff0;
    box-shadow: 4px 4px 8px #ccc;
    cursor: pointer;
}

.pagination a.active {
    /* border: 1px #f00 solid; */
    border: 1px #fff solid;
}

.pagination a.not {
    background: #eee;
    cursor: text;
}
</style>