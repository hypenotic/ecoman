import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import _ from 'lodash';

Vue.use(Vuex)

export default new Vuex.Store({
    state:{
        activeCS: null,
        caseStudies: null
    },
    getters: {
        getCases: state => {
            return state.caseStudies
        },
        getActiveCS: state => {
            return state.activeCS
        },
    },
    mutations:{
        SET_ACTIVE_CS: (state, payload) => {
            state.activeCS = payload
        },
        SET_CASE_STUDIES: (state, payload) => {
            state.caseStudies = payload
        },
    },
    actions:{
        apiCaseStudies: ({commit}) => {
            axios.get('http://ecoman.test/wp-json/wp/v2/case_study?_embed')
            .then(function (response) {
                let idAsKeys = _.mapKeys(response.data, 'id');
                commit('SET_CASE_STUDIES', idAsKeys);
                commit('SET_ACTIVE_CS', response.data[0].id);
            })
            .catch(function (error) {
                console.log(error)
            })
        },
        changeActiveCS: ({commit, state}, info) => {
            commit('SET_ACTIVE_CS', info);
        }
    }
})