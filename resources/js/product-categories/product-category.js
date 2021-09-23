new Vue({
    el: '#productCategory',
    data: {       
        selected_id: null,
        product_categories:product_categories,
        data:{
            id: null,
            name: null,
            sequence: 0,
            enable_status: 1
        }
    },

    methods: {
        clearData() {
            this.data = {
                id: null,
                name: null,
                sequence: 0,
                enable_status: 1
            };    
            
            setTimeout(() => {
                this.$validator.errors.remove('name', 'productCateogory');
                this.$validator.errors.remove('sequence', 'productCateogory');
            }, 0);
        },

        setData (product_category) {
            this.clearData()
              
            this.data = Object.assign({}, {
                id: product_category.id,
                name: product_category.name_en,
                sequence: product_category.sequence,
                enable_status: product_category.enable_status
            });
        },
        save(){
            axios.post(`/portal/product-categories/${this.data.id}`,
                this.data
            ).then(response => {
                if (response.data.success) {
                    window.location.href = '/portal/product-categories';
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                hideLoading();
                console.log(error)
                showAlertError('Cannot update product category');
            }) 
        },

        submit(){
            showLoading();
            this.$validator.validateAll('productCateogory').then((result) => {
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

        deleteCategory () {
            axios.delete(`/portal/product-categories/delete/${this.data.id}`)
                .then(response => {
                    hideLoading();
                    if (response.data.success) {
                        window.location.href = '/portal/product-categories';
                    } else {
                        showAlertError(response.data.message);
                    } 
            }).catch(error => {
                console.log(error);
                hideLoading();
                showAlertError('Cannot delete task');
            });
        }
    }
});
