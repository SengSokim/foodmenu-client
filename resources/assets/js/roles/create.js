createRole = new Vue({
    el: '#createRole',
    data: {
        data: {
            name: '',
            data: []
        },
    },
   methods: {
        save() {
            axios.post(`/admin/roles/store`,
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
                // showAlertError('Can not add role!');
                console.log(error)
            })
        },

        submit() {
            // showLoading();
            this.$validator.validate().then((result) => {
                let save = true;

                if (!result || !save) {
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
