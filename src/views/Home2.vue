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
                   //
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