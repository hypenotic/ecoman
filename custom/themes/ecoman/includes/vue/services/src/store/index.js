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
            var match = state.caseStudies.filter(obj => {
                return obj.id === state.activeCS
              })
            return match;
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
            // axios.get('http://ecoman.test/wp-json/wp/v2/case_study?_embed')
            axios.get('http://hypelabs.ca/ecoman/wp-json/wp/v2/case_study?_embed')
            .then(function (response) {
                // let idAsKeys = _.mapKeys(response.data, 'id');
                // commit('SET_CASE_STUDIES', idAsKeys);
                commit('SET_CASE_STUDIES', response.data);
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