editProfile = new Vue({
    el: '#editProfile',
    data: {
        error: {
            image: null
        },
        data: {}
        // data:data
    },
    methods: {
        save() {
            axios.post(`/portal/profile`,
                this.data
            ).then(response => {
                if (response.data.success) {
                    window.location.href = '/portal/products';
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                hideLoading();
                showAlertError('Cannot update profile');
                console.log(error)
            })
        },
        submit() {
            // showLoading();
            this.$validator.validate().then((result) => {
                if (!result) {
                    hideLoading();
                    //set Window location to top
                    window.scrollTo(0, 0);
                } else {
                    this.save();
                }
            })
        },
        uploadImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.data.image = e.target.result;
                    this.error.image = null;
                };
                reader.readAsDataURL(input.files[0])
            }
        },
        
        viewProfile(){
            axios.get(`/portal/profile`
            ).then(response => {
                if (response.data.success) {
                    this.data = response.data.data
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                // hideLoading();
                console.log(error)
            })
        }
    },

    created(){

        this.$validator.extend('phone_number', {
            getMessage: field => 'The ' + field + ' field contains an invalid number.',
            validate: (value) => {
                return new Promise(resolve => {
                    let phone = new PhoneNumber(value, 'kh');
                    resolve({ valid: phone.isValid() })
                })
            }
        });
    }
});


// updatePassword = new Vue({
//     el: '#updatePassword',
//     data: {
//         data: {
//             old_password: '',
//             password: '',
//             confirm_password: '',
//         },
//     },
//     methods: {
//         save() {
//             axios.post(`${baseURL}/admin/profile/change_password`,
//                 this.data
//             ).then(response => {
//                 if (response.data.success) {
//                     window.location.href = baseURL + '/admin/profile';
//                 } else {
//                     showAlertError(response.data.message);
//                     hideLoading()
//                 }
//             }).catch(error => {
//                 hideLoading();
//                 showAlertError('Cannot update profile');
//                 console.log(error)
//             })
//         },
//         submit() {
//             showLoading();
//             this.$validator.validate().then((result) => {
//                 if (!result) {
//                     hideLoading();
//                     //set Window location to top
//                     window.scrollTo(0, 0);
//                 } else {
//                     if(this.data.password == this.data.confirm_password) {
//                         this.save();
//                     } else {
//                         showAlertError('The confirm password is not match!');
//                         hideLoading();
//                         //set Window location to top
//                         window.scrollTo(0, 0);
//                     }
//                 }
//             })
//         },
//     }
// });
