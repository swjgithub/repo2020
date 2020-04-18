<template>
    <div id="app">
        <header>
            <!-- <div class="left">&lt;</div> -->
            <h1>个人信息管理系统</h1>
            <!-- <div class="right">&gt;</div> -->
        </header>
        <base-main></base-main>
        <footer>
            <p>Copyright &copy;2020 swj@cvit.com.cn.All Rights Reserved. </p>
            <p>Personal Information Management System, PIMS</p>
            <!--   <p>Copyright ©2020 [使用者网站] Powered By [网站程序名称] Version 1.0.0 </p>
            <p>Copyright &copy;2020 XXX.All Rights Reserved.</p> -->
        </footer>
    </div>
</template>
<script>
import BaseMain from "./components/BaseMain.vue";

export default {
    components: {
        BaseMain,

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

header>.left,
header>.right {
    padding: 0 10px;
}
</style>