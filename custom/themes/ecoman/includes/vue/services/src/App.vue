<template v-if="services != null">
    <section class="">
        <ul class="vue-tab-list -lst-none -m0 -p0 -flex -flex-jc-sb -bg-green">	
            <li v-for="service in services" :key="'tab-'+service.id" @click="changeActiveService(service.slug)" @keyup.enter="changeActiveService(service.slug)" class="-hover-pointer -flex -flex-ai-c -flex-jc-c" :class="{ active: checkActive(service.slug) }" tabindex="0">
                    <div class="tab-icon" style="background-image:url(<?php echo $iconurl[0]; ?>);">
                    </div>
                    <span class="-ls-3 -sans-serif" v-html="service.title.rendered"></span>
            </li>     
        </ul>
        
        <div v-if="activeService != null" class="-bg-lgrey">
            <div class="">
                <div class="outer-container">
                    <div class="main-content">
                        <div class="tabs-panel-intro">
                            <div class="tabs-panel__left">
                                <img src="<?php echo $imageurl[0]; ?>" alt="">
                            </div>
                            <div class="tabs-panel__right">
                                <h2 v-html="activeService.title.rendered"></h2>
                                <div v-html="activeService.content.rendered"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="grey-background">
                <div class="outer-container">
                    <div class="tabs-panel-pockets">	
                        <div class="service-pocket__single" v-for="(pocket,index) in activeService._pockets" :key="'pocket-'+activeService.id+'-'+index">
                            <h4 v-html="pocket._heading"></h4>
                            <p v-html="pocket._text"></p>
                        </div>   
                    </div>
                </div>
            </div>
            
            <div class="services-testimonial" v-if="activeService._test_select != ''">
                <div class="outer-container">
                <div class="main-content wow fadeInLeft">
                    <div class="testimonial-border__circle--top"></div>
                    <p class="uppercase">What clients say when we leave the room</p>
                    <blockquote class="testimonial__quotation" v-html="testimonials[activeService._test_select]._single_quotation">
                        
                    </blockquote>
                    <div class="testimonial__creds">
                        <p>{{testimonials[activeService._test_select]._single_source}}<span v-if="testimonials[activeService._test_select]._single_title != ''">, {{testimonials[activeService._test_select]._single_title}}</span></p>
                    </div> 
                    <div class="testimonial-border__circle--bottom"></div> 
                </div>
            </div>
            </div>

            <div class="services-case-studies" id="" data-cases="">
            </div>
        </div>

    </section>
</template>

<script>
    import store from './store';
    
    export default {
        store,
        data(){
            return {
            }
        },
        computed:{
            services() {
                return this.$store.getters['getServices']
            },
            activeService() {
                return this.$store.getters['getActiveService']
            },
            testimonials() {
                return this.$store.getters['getTestimonials']
            },
        },
        created() {
            this.$store.dispatch('apiServices');
            this.$store.dispatch('apiCaseStudies');
            this.$store.dispatch('apiTestimonials');
        },
        methods: {
            changeActiveService(slug, event) {
                this.$store.dispatch('changeActiveService', slug);
            },
            checkActive(slug) {
                if (slug == this.activeService.slug) {
                    return true
                } else {
                    return false
                }
            }
        }
    }
</script>

<style lang="scss">
    @import './sass/base.scss';
    @import './sass/components/tabs.scss';
</style>