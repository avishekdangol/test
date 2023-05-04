import Vue from 'vue'

const mixin = Vue.mixin({
    methods: {
        showSuccessMessage(response) {
            this.$toast(response.data, {
                toastClassName: 'bg-success',
                bodyClassName: 'bg-success',
                })
        },

        showErrorMessage(response) {
            this.$toast(response.data, {
                toastClassName: 'bg-danger',
                bodyClassName: 'bg-danger',
            }) 
        }
    },
})

export default mixin
