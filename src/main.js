import Vue from 'vue'
import VeGauge from 'v-charts/lib/gauge.common'
import App from './App.vue'
import router from './router'
import store from './store'


Vue.config.productionTip = false

Vue.component(VeGauge.name, VeGauge)

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
