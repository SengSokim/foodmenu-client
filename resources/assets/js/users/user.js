Users = new Vue({
    el: "#Users",
    data: {
        image: null,
        error: {
            image: null,
        },
        restaurant_users: restaurant_users,
        data:{
            id: '',
            name: '',
            gender: null,
            phone_number: '',
            password: '',
            address: null,
            role: null,
            image: null,
            enable_status: true,
        }
    },
    methods: {
        clearData(){
            this.data={
                id: '',
                name: '',
                gender: null,
                phone_number: '',
                password: '',
                address: null,
                role: null,
                image: null,
                enable_status: true,
            }
            setTimeout(() => {
               // this.$validator.errors.remove('name');
               this.$validator.errors.clear();
               this.error.image = ''
            }, 0);
        },

        setData (restaurant_users) { 
            console.log(restaurant_users);
            this.data = Object.assign({}, {
                id: restaurant_users.id,
                name: restaurant_users.name,
                gender: restaurant_users.gender,
                phone_number: restaurant_users.phone_number,
                password: restaurant_users.password,
                address: restaurant_users.address,
                role: restaurant_users.role,
                media: restaurant_users.media,
                enable_status: restaurant_users.enable_status,
            });
        },

        save(){
            showLoading();
            var url = '/admin/users/';
            if(this.data.id) {
                url += this.data.id;
            }
            axios.post(url, this.data)
            .then(response => {
                if (response.data.success) {
                    window.location.href = '/admin/users';
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                hideLoading();
                console.log(error);
                if(this.data.id) {
                    showAlertError('Cannot update user');
                } else {
                    showAlertError('Cannot create user');
                }
            }) 
        },

        submit() {
            showLoading();
            this.$validator.validate().then((result) => {
                let save = true;
                if(!this.data.id && !this.data.image) {
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

        deleteUser() {
            showLoading();
            axios.delete(`/admin/users/${this.data.id}`)
            .then(response=> {
                hideLoading();
                console.log(response.data);
                if(response.data.success) {
                    window.location.href = '/admin/users'
                } else {
                    showAlertError(response.data.message);
                }
            }).catch( error =>{
                console.log(error);
                hideLoading();
                showAlertError();
            });
        }

    },
});