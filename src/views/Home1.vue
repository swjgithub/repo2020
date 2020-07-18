<template>
    <div class="app">
        <div class="line">
            <div class="gauge">
                <ve-gauge :data="chartData1" :settings="chartSettings"></ve-gauge>
                <ve-gauge :data="chartData2" :settings="chartSettings"></ve-gauge>
            </div>
            <svg width=100% height=100%>
                <polyline points="15,15 776,15 790,35 790,375 775,385 15,385 10,375 10,25 15,15 " style="fill:transparent;stroke:red;stroke-width:2" />
            </svg>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        this.chartSettings = {
            dataType: {
                '使用率': 'percent',
                digit: 2
            },

            seriesMap: {
                '使用率': {
                    min: 0,
                    max: 1,
                    radius: "54%",
                    axisLine: { //仪表盘轴线                           
                        lineStyle: {
                            color: [
                                [0.8, "hotpink"],
                                [1, "green"]
                            ],
                            width: 15, //环圆线宽
                            shadowColor: "#fff",
                            shadowBlur: 10
                        }

                    },
                    axisTick: { //刻度 线
                        length: 0, //刻度线长度
                        lineStyle: {
                            color: "auto", //颜色
                            shadowColor: "#fff",
                            shadowBlur: 10
                        }
                    },
                    splitLine: { //分割线-> 刻度线                        
                        length: 0, //数字距离刻度线的位置
                        lineStyle: {
                            width: 1,
                            color: "#fff", //刻度线颜色
                            shadowColor: "#fff", //刻度阴影
                            shadowBlur: 10 //模糊阴影大小 配合shadowColor,shadowOffsetX, shadowOffsetY设置使用
                        }
                    },
                    axisLabel: { //标签数字
                        show: false,
                        textStyle: {
                            fontWeight: "bolder", //标签数字的粗细
                            color: "#999", // 标签数字的颜色
                            shadowColor: "#fff",
                            shadowBlur: 10
                        }
                    },
                    pointer: {
                        width: 10, //指针的宽度
                        shadowColor: "#fff",
                        shadowBlur: 5
                    },
                    title: {
                        show: true
                    },
                    detail: { //详情展示 数据 百分比                       
                        show: true
                    }
                }
            }
        };

        return {
            chartData1: {
                columns: ['type', 'value'],
                rows: [
                    { type: '使用率', value: 0.01 }
                ],


            },
            chartData2: {
                columns: ['type', 'value'],
                rows: [
                    { type: '使用率', value: 0.05 }
                ],

            }

        }

    },
    mounted() {

        // 随机生成模拟数据
        setInterval(() => {
            this.chartData1.rows[0].value = (Math.random()).toFixed(2);
            this.chartData2.rows[0].value = (Math.random()).toFixed(2);
        }, 2000);
    }
}
</script>
<style>
.app {
    width: 800px;
    height: 400px;
    margin: 0 auto;
    overflow: hidden;
    border: 1px #999 solid;
}

.line {
    position: relative;
    z-index: 20;
    width: 800px;
    height: 400px;
    margin: 0;
    padding: 0;
}

.gauge {
    position: absolute;
    left: 0;
    font: 0;
    z-index: 100;
    display: flex;
    flex-flow: row nowrap;
    justify-content: space-around;
    align-items: center;
    width: 800px;
    height: 400px;

}

.gauge>div {
    flex: 1;
}
</style>