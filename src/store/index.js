import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        announceword: '今日上架的图书全部6折',
        selected: false,
        book: {},
        slides: [
            { 'id': 1, 'img_url': require("../books/slides/cc1_1580x740.jpg") },
            { 'id': 2, 'img_url': require("../books/slides/cc2_1580x740.jpg") },
            { 'id': 3, 'img_url': require("../books/slides/cc3_1580x740.jpg") },
            { 'id': 4, 'img_url': require("../books/slides/cc4_1580x740.jpg") },
            { 'id': 5, 'img_url': require("../books/slides/cc5_1580x740.jpg") },
            { 'id': 6, 'img_url': require("../books/slides/cc6_1580x740.jpg") },
        ],
        latestUpdated: [{
                'id': 1,
                'title': 'C++',
                'authors': ["John", "Linda"],
                'img_url': require('../books/newbook/new1_320x320.jpg')
            },
            {
                'id': 2,
                'title': 'Vue开发项目实战',
                'authors': "zhangsan",
                'img_url': require('../books/newbook/new2_320x320.jpg')
            },
            {
                'id': 3,
                'title': '程序员修炼宝典',
                'authors': ['linda', 'frank'],
                'img_url': require('../books/newbook/new3_320x320.jpg')
            },
            {
                'id': 4,
                'title': '架构实践',
                'authors': ['linda', 'frank'],
                'img_url': require('../books/newbook/new4_320x320.jpg')
            }
        ],
        recommended: [{
                'id': 8,
                'title': 'C++',
                'authors': "Jhon Link",
                'img_url': require('../books/newbook/tj1_320x320.jpg')
            },
            {
                'id': 10,
                'title': 'C++',
                'authors': "Jhon Link",
                'img_url': require('../books/newbook/tj2_320x320.jpg')
            },
            {
                'id': 11,
                'title': 'C++',
                'authors': "Jhon Link",
                'img_url': require('../books/newbook/tj3_320x320.jpg')
            },
            {
                'id': 12,
                'title': 'C++',
                'authors': "Jhon Link",
                'img_url': require('../books/newbook/tj4_320x320.jpg')
            },
        ]
    },
    getters: {
        book: (state) => (id) => {
            if (id < 5) {
                return state.latestUpdated.find((item, index) => {
                    return item.id == id;
                })
            } else {
                return state.recommended.find((item, index) => {
                    return item.id == id
                });
            }
        }
    },
    mutations: {

    },
    actions: {},
    modules: {}
})