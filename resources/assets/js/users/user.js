var createUser = new Vue({
    el: "#createUser",
    image: null,
    error: {
        image: null,
    },
    data: {
        username: '',
        gender: null,
        phone_number: '',
        address: null,
        roles: [],
        image: null,
        enable_status: true,
    },
    roles: roles,
    methods: {
        save() {
            console.log("data: ",this.data);
            axios.post(`${baseURL}/users`,
                this.data
            ).then(response => {
                console.log("response: ", response.data);
                if (response.data.success) {
                    window.location.href = baseURL + '/users';
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                hideLoading();
                showAlertError('Can not add user');
                console.log(error)
            })
        },
        submit() {
            showLoading();
            this.$validator.validate().then((result) => {
                let save = true;
                if(!this.data.image) {
                    this.error.image = 'The Image field is required.';
                    save = false;
                }
                if (!result || !save) {
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
        removeRole(removeRoleId) {
            let i = 0;
            const length = this.data.roles.length;
            for(i; i < length ; i++){
                if(this.data.roles[i] == removeRoleId){
                    this.data.roles.splice(i, 1);
                    break;
                }
            }
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