<template>
    <div class="services-case-studies" v-if="cases != null">
        <div class="inner">
            <div class="inner_padding">
                <div class="inner-content">
                    <div class="cs-nav -flex -flex-jc-sb">
                        <div class="left-arrow cs-arrow -sans-serif -ls-3" v-if="activeCS.next != null" @click="changeActiveCS(activeCS.next.id)" @keypress.enter="changeActiveCS(activeCS.next.id)" tabindex="0">
                            <span>&lt; previous</span>
                        </div>
                        <div class="left-arrow cs-arrow -sans-serif -ls-3 inactive" v-else>
                            <span>&lt; previous</span>
                        </div>
                        <div class="right-arrow cs-arrow -sans-serif -ls-3" v-if="activeCS.previous != null" @click="changeActiveCS(activeCS.previous.id)" @keypress.enter="changeActiveCS(activeCS.previous.id)" tabindex="0">
                            <span>next &gt;</span>
                        </div>
                        <div class="right-arrow cs-arrow -sans-serif -ls-3 inactive" v-else>
                            <span>next &gt;</span>
                        </div>
                    </div>
    
                    <h3 v-html="activeCS.title.rendered"></h3>
                    
                    <div class="content" v-html="activeCS.content.rendered"></div>
    
                    <div class="cs-nav-dots">
                        <ul>
                            <li v-for="(c, index) in cases" :key="'dot-'+index" @click="changeActiveCS(c.id)" @keypress.enter="changeActiveCS(c.id)" tabindex="0" :class="{ active: checkActive(c.id) }"></li>
                        </ul>
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
                return this.$store.getters['getActiveCS'][0]
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