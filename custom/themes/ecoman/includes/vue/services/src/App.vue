<template>
    <div class="services-case-studies" v-if="activeCS != null">
        <div class="inner">
            <div class="inner_padding">
                <div class="inner-content">
                    <div class="cs-nav -flex -flex-jc-sb">
                        <div class="left-arrow cs-arrow -sans-serif -ls-3" v-if="cases[activeCS].previous != null">
                            <span>&lt; previous</span>
                        </div>
                        <div class="left-arrow cs-arrow -sans-serif -ls-3 inactive" v-else>
                            <span>&lt; previous</span>
                        </div>
                        <div class="right-arrow cs-arrow -sans-serif -ls-3" v-if="cases[activeCS].next != null">
                            <span>next &gt;</span>
                        </div>
                        <div class="right-arrow cs-arrow -sans-serif -ls-3 inactive" v-else>
                            <span>next &gt;</span>
                        </div>
                    </div>
    
                    <h3 v-html="cases[activeCS].title.rendered"></h3>
                    
                    <div class="content" v-html="cases[activeCS].content.rendered"></div>
    
                    <div class="cs-nav-dot">
    
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            activeCS() {
                return this.$store.getters['getActiveCS']
            },
            cases() {
                return this.$store.getters['getCases']
            },
        },
        created() {
            this.$store.dispatch('apiCaseStudies');
        },
        methods: {
            changeActiveCS(id) {
                this.$store.dispatch('changeActiveCS', id);
            },
            checkActive(csID) {
                if (csID == this.activeCS.id) {
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
    @import './sass/components/cs.scss';
</style>