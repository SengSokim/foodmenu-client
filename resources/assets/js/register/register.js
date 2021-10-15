new Vue({
    el: '#register',
    data: {
        data: {
            restaurant_name: '',
            phone_number: '',
            password: '',
            verify_code: ''
        }
    },
    methods: {
        submitVerify() {
            showLoading();
            this.$validator.validate().then((result) => {
                if (!result) {
                    hideLoading();
                    //set Window location to top
                    window.scrollTo(0, 0);
                } else {
                    axios.post(`/auth/register/check_phone`, this.data)
                        .then(response => {
                            hideLoading()
                            if (response.data.success) {
                                console.log('res succ');
                                if (response.data.data.is_login) {
                                    console.log('login');
                                    $('#modalLogin').modal('show');
                                } else {
                                    console.log('not yet');
                                    Vue.set(this.data, 'verify_code', response.data.data.verify_code);
                                    $('#modalVerify').modal('show');
                                }
                            } else {
                                showAlertError(response.data.message);
                            }
                        }).catch(error => {
                            hideLoading();
                            showAlertError('Something went wrong');
                        })
                }
            })
        },
        submitRegister() {
            showLoading();
            this.$validator.validate().then((result) => {
                if (!result) {
                    hideLoading();
                    //set Window location to top
                    window.scrollTo(0, 0);
                } else {
                    axios.post(`/auth/register`, this.data)
                        .then(response => {
                            if (response.data.success) {
                                window.location.href = "portal/products";
                            } else {
                                showAlertError(response.data.message);
                                hideLoading()
                            }
                        }).catch(error => {
                            hideLoading();
                            showAlertError('Something went wrong');
                        })
                }
            })
        }
    }
});
