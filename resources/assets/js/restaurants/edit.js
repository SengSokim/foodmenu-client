EditRestaurant = new Vue({
    el: '#editRestaurant',
    data: {
        image:null,
        banner_image:null,
        error : {
            image : null,
            banner_image : null
        },
        data:{},
        share_link:'',
    },

    methods: {
        save() {
            axios.post(`/admin/restaurants`,
                this.data
                ).then(response => {
                    if (response.data.success) {
                        window.location.href = '/admin/products';
                    } else {
                        showAlertError(response.data.message);
                        hideLoading()
                    }
                }).catch(error => {
                    hideLoading();
                    console.log(error)
                    showAlertError('Cannot update restaurant');
                })
        },

        submit() {
            console.log('test');
            showLoading();
            this.$validator.validate().then((result) => {
                let save = true;
                if (!result || !save) {
                    hideLoading();
                    //set Window location to top
                    window.scrollTo(0, 0);
                } else {
                    this.save();
                }
            })
        },
        copySharableLink() {
            const el = document.querySelector('#share-link')
            el.setAttribute('type', 'text')    // 不是 hidden 才能複製
            el.select()

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                showToastSuccess('Link copied successfully');
            } catch (err) {
                alert('Oops, unable to copy');
            }

            /* unselect the range */
            el.setAttribute('type', 'hidden')
            window.getSelection().removeAllRanges()
        },

        showRestaurant(){
            this.data = {};

            axios.get(`/admin/restaurants`
            ).then(response => {
                if (response.data.success) {
                    this.data = response.data.data
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                hideLoading();
                console.log(error)
            })
        },
        uploadProfile(){
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
        uploadBanner(){
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.data.banner_image = e.target.result;
                    this.error.banner_image = null;
                };

                reader.readAsDataURL(input.files[0])
            }
        },
    }
});
