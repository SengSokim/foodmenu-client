new Vue({
    el: '#productCategory',
    data: {       
        selected_index: null,
        product_categories:product_categories,
        data:{}
    },

    methods: {
        clearData() {
            this.data = {};
        },

        editCategory (product_category) {
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

        deleteCategory () {
            axios.delete(`/portal/product-categories/delete/${this.selected_index}`).then(response => {
                hideLoading();
                if (response.data.success) {
                    $('#deleteCategory').modal('hide');
                    showToastSuccess('Delete task successfully');
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
