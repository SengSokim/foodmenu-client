const EditProductVariant = new Vue({
    el: "#editProductVariant",
    data: {
        data : data,
        data_adding:{
            name: '',
            extra_price: 0,
            sequence: 0,
            enable_status: true,
            isEdit:false
        },
        isAddNew:false,
        isEdit:false,
        selected_variant_index: null,
    },
    methods: {
        addVariantValue() {
            this.data_adding= {  //clear variant value after comfirm add
                name: '',
                extra_price: 0,
                sequence: 0,
                enable_status: true,
                isEdit:false
            }
           this.isAddNew = true; //show input add variant value in table
           this.isEdit = true;
        },
        confirmAdd(){
            this.isAddNew = false;
            this.isEdit = false;
            this.data.values.push(this.data_adding);
        },
        cancelAdd(){
            this.isAddNew = false;
            this.isEdit = false;
        },

        editVariantValue(){
            this.isEdit = true;
        },

        confirmEdit(){
            this.isEdit = false;
        },

        cancelEdit(){
            this.isEdit = false;
        },

        removeVariantValue(){
            this.data.values.splice(this.selected_variant_index, 1); 
        },
        save() {
            axios.post(`${baseURL}/admin/product-variants/${ data.id }`,
                this.data
            ).then(response => {
                if (response.data.success) {
                    window.location.href = baseURL+'/admin/product-variants?product_id=' + this.data.product_id;
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                hideLoading();
                showAlertError('Can not update product variant');
                console.log(error)
            })
        },
        submit(){
            showLoading();
            this.$validator.validate().then((result) =>{
                if (!result) {
                    hideLoading();
                    //set Window location to top
                    window.scrollTo(0, 0);
                } else {
                    this.save();
                }    
            })
        },
    }, 
    mounted() {
        this.data.values.forEach(value => {
            Vue.set(value, 'isEdit', false);
        });
    }
})