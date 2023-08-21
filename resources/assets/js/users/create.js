createUser = new Vue({
    el: '#createUser',
    data: {
        data: {
            name: '',
            phone: '',
            email: '',
            password: '',
            role_id: null,
            gender: '',
            is_active: 1
        },

    },
   methods: {
        save() {
            axios.post(`/admin/users/create`,
                this.data
            ).then(response => {
                if (response.data.success) {
                    window.location.href = '/admin/users';
                } else {
                    alert(response.data.message);
                    // showAlertError(response.data.message);
                    // hideLoading()
                }
            }).catch(error => {
                alert('Can not add user!');
                // hideLoading();
                // showAlertError('Can not add user!');
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
