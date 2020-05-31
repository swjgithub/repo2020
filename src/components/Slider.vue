<template>
    <swiper class="swiper" :options="swiperOption">
        <swiper-slide v-for="item in slides" :key="item.id">
            <img :src="item.img_url" alt="">
        </swiper-slide>
        <div class="swiper-pagination" slot="pagination"></div>
        <div class="swiper-button-prev" slot="button-prev"></div>
        <div class="swiper-button-next" slot="button-next"></div>
    </swiper>
</template>
<script>
import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
import 'swiper/css/swiper.css'
export default {
    props: ['slides'],
    name: 'swiper-example-loop',
    title: 'Loop mode / Infinite loop',
    components: {
        Swiper,
        SwiperSlide
    },
    data() {
        return {
            swiperOption: {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                }
            }
        }
    }
}
</script>
<style lang="scss" scoped>
@import './base.scss';

.swiper-slide img {
    max-width: 100%;
    display: block;
    height: auto;   
}
</style>