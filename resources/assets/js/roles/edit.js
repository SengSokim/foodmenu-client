editRole = new Vue({
    el: '#editRole',
    data: {
        data: data,
    },

    methods: {
        save() {
            axios.post(`/admin/roles/update/${this.data.id}`,
                this.data
            ).then(response => {
                if (response.data.success) {
                    window.location.href = '/admin/roles';
                } else {
                    // showAlertError(response.data.message);
                    // hideLoading()
                }
            }).catch(error => {
                // hideLoading();
                // showAlertError('Can not update role!');
                console.log(error)
            })
        },

        submit() {
            // showLoading();
            this.$validator.validate().then((result) => {
                if (!result) {
                    // hideLoading();
                    //set Window location to top
                    window.scrollTo(0, 0);
                } else {
                    this.save();
                }
            })
        },
    }
});
