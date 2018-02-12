import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import * as Cookies from 'js-cookie'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state:{
        subjects: [],
        number_of_semester: 0,
        selected_semester: -1,
        selected_subject: {},
        units_in_selected_subject: []
    },
    actions: {
        loadData({commit}){
            return new Promise((resolve, reject) => {
                var profile;
                var number_of_semester;
                axios.get('/api/user/profile').then(response => {
                    profile = response.data.data;
                    //self.number_of_semester = profile.degree.number_of_semesters;
                    //console.log(profile.degree.number_of_semesters, this);
                    console.log(profile);
                    var branch = profile.branch;
                    return axios.get('/api/branch/'+branch.id+'/subjects/units/subtopics');
                }).then(response => {
                    //console.log(response.data.data, this);
                    //return self.calculateRows();
                    console.log("adfasdf"+profile.degree.number_of_semesters);
                    commit('updateInitialData', [response.data.data.subjects,profile.degree.number_of_semesters]);
                    resolve(response);
                })
            });
        }
    },
    mutations:{
        updateInitialData(state, [subjects, number_of_semester]){
            state.subjects = subjects;
            state.number_of_semester = number_of_semester;
        },
        updateSelectedSemester(state, value){
            state.selected_semester = value;
            state.selected_subject = {};
            state.units_in_selected_subject = [];
        },
        updateSelectedSubject(state, subject){
            state.selected_subject = subject;
            state.units_in_selected_subject = subject.units;
            console.log(state.selected_subject);
        },
        clearStateData(state){
            state.subjects = [];
            state.number_of_semester = 0;
            state.selected_semester = -1;
            state.selected_subject = {};
            state.units_in_selected_subject = [];
        }
    },
    plugins: [
        createPersistedState({
            storage: {
              getItem: key => Cookies.get(key),
              setItem: (key, value) => Cookies.set(key, value, { expires: 3, secure: true }),
              removeItem: key => Cookies.remove(key)
            }
          })
    ]
})