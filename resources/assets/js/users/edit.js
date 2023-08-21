editUser = new Vue({
    el: '#editUser',
    data: {
        data: data,
    },

    methods: {
        save() {
            axios.put(`/admin/users/${data.id}`,
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
                // hideLoading();
                // showAlertError('Can not update user!');
                alert('Can not update user!');
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
    },

    created(){
        this.$validator.extend('phone_number', {
            getMessage: field => 'The ' + field + ' field must be Phone.',
            validate: (value) => {
                const p = /^(\s*[0-9]+\s*)+$/;
                return p.test(value);
            }
        });
    }
});
