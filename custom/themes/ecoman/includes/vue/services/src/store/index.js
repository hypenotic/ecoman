import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import _ from 'lodash';

Vue.use(Vuex)

export default new Vuex.Store({
    state:{
        activeService: null,
        caseStudies: null,
        services: null,
        testimonials: null
    },
    getters: {
        getServices: state => {
            return state.services
        },
        getActiveService: state => {
            return state.activeService
        },
        getTestimonials: state => {
            return state.testimonials
        }
    },
    mutations:{
        SET_SERVICES: (state, payload) => {
            state.services = payload
        },
        SET_ACTIVE_SERVICE: (state, payload) => {
            state.activeService = payload
        },
        SET_CASE_STUDIES: (state, payload) => {
            state.caseStudies = payload
        },
        SET_TESTIMONIALS: (state, payload) => {
            state.testimonials = payload
        },
    },
    actions:{
        apiServices: ({commit, dispatch}) => {
            axios.get('http://ecoman.test/wp-json/wp/v2/service?_embed')
            .then(function (response) {
                let slugAsKeys = _.mapKeys(response.data, 'slug');
                commit('SET_SERVICES', slugAsKeys);
                commit('SET_ACTIVE_SERVICE', response.data[0]);
            })
            .catch(function (error) {
                console.log(error)
            })
        },
        apiCaseStudies: ({commit}) => {
            axios.get('http://ecoman.test/wp-json/wp/v2/case_study?_embed')
            .then(function (response) {
                commit('SET_CASE_STUDIES', response.data);
            })
            .catch(function (error) {
                console.log(error)
            })
        },
        apiTestimonials: ({commit}) => {
            axios.get('http://ecoman.test/wp-json/wp/v2/testimonial')
            .then(function (response) {
                let idAsKeys = _.mapKeys(response.data, 'id');
                console.log(idAsKeys, 'fire');
                commit('SET_TESTIMONIALS', idAsKeys);
            })
            .catch(function (error) {
                console.log(error)
            })
        },
        changeActiveService: ({commit, state}, info) => {
            commit('SET_ACTIVE_SERVICE', state.services[info]);
        }
    }
})