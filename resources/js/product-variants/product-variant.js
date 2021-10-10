new Vue({
    el: "#product_variant",
    data: {
        product_variants : data,
        data:{
            product_id: product_id,
            name: '',
            sequence: 0,
            enable_status: true,
            is_required: true,
            values: [],
        },
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
            axios.post(`/portal/product_variants/${this.data.id ?? ''}`,
                this.data
            ).then(response => {
                if (response.data.success) {
                    window.location.href = '/portal/product_variants?product_id=' + this.data.product_id;
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                hideLoading();
                showAlertError('Can not add product variant');
                console.log(error)
            })
        },

       clearData() {
            this.data = {
                name: '',
                sequence: 0,
                enable_status: true,
                is_required: true,
                values: [],
            };    
            
            setTimeout(() => {
                this.$validator.errors.remove('name');
            }, 0);
        },

        setData (variant) {
            this.clearData()
            this.data = Object.assign({}, {
                id: variant.id,
                product_id: variant.product_id,
                name: variant.name_en,
                sequence: variant.sequence,
                enable_status: variant.enable_status,
                is_required: variant.is_required,
               //issue
               values : []
            });
        },

        submit(){
            // showLoading();
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
        deleteVariant() {
            showLoading();
            axios.delete(`/portal/product_variants/${this.data.id}`)
                .then(response => {
                    hideLoading();
                    console.log(response.data);
                    if (response.data.success) {
                        console.log(this.data);
                        window.location.href = '/portal/product_variants?product_id=' + this.data.product_id;
                    } else {
                        showAlertError(response.data.message);
                    } 
            }).catch(error => {
                console.log(error);
                hideLoading();
                showAlertError('Cannot delete product variant');
            });
        }
    },

  
})