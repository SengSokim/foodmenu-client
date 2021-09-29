new Vue({
    el: '#editRestaurant',
    data: {
        data:{}
    },

    methods: {
        // save() {
        //     axios.post(`/portal/product-categories`,
        //         this.data
        //         ).then(response => {
        //             if (response.data.success) {
        //                 window.location.href = '/portal/product-categories';
        //             } else {
        //                 showAlertError(response.data.message);
        //                 hideLoading()
        //             }
        //         }).catch(error => {
        //             hideLoading();
        //             console.log(error)
        //             showAlertError('Cannot create product category');
        //         })
        // },

        // submit() {
        //     showLoading();
        //     this.$validator.validate().then((result) => {
        //         let save = true;
        //         if (!result || !save) {
        //             hideLoading();
        //             //set Window location to top
        //             window.scrollTo(0, 0);
        //         } else {
        //             this.save();
        //         }
        //     })
        // },

        showRestaurant(){
            console.log('editRestaurant');
            axios.get(`/portal/restaurants`
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
        },
        uploadProfile(){

        },
        uploadBanner(){
            
        }

    }
});
