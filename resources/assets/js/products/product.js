Product = new Vue({
    el: '#product',
    data: {  
        image: null,
        error: {
            image: null
        },    
       
        product_categories:product_categories,
        products:[],
        total: 0,

        data:{
            id: null,
            name: '',
            price: 0,
            sequence: 0,
            enable_status: 1,
            product_category_id: null,
            description:'',
            image:null
        },
        product_category_selected: undefined,
        product_category_id: null,
        is_loaded_product : 0
    },
    mounted() {
        this.init()
    },
    methods:{
        init(){
            axios.get(`/portal/products/get`
                ).then(response => {
                    this.is_loaded_product =1
                if (response.data.success) {
                    hideLoading()
                    this.products.push(...response.data.data.list);
                    this.total = response.data.data.total;
                } else {
                    console.log('response not success');
                }
            })
        }, 
        
        formatCurrency(money)
        {
            var formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 2
            });
            return formatter.format(money);
        },

        save(){
            showLoading();
            axios.post(`/portal/products/${this.data.id ?? ''}`,
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
                showAlertError('Cannot update product');
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

        clearData(){
             this.data={
                id: null,
                name: '',
                price: 0,
                sequence: 0,
                enable_status: 1,
                product_category_id: null,
                description:'',
                image:null
            }
            setTimeout(() => {
                // this.$validator.errors.remove('name');
                this.$validator.errors.clear();
                this.error.image = ''
            }, 0);
        },

        setData (product) {              
            this.data = Object.assign({}, {
                id: product.id,
                name: product.name_en,
                product_category_id: product.product_category_id,
                price: product.price,
                sequence: product.sequence,
                enable_status: product.enable_status,
                media: product.media,
                description: product.long_description
            });
        },

        updateProductStatus(value){
            showLoading();
            axios.post(`/portal/products/status/${this.data.id}`,
                { enable_status : value}
            ).then(response => {
                if (response.data.success) {
                    window.location.href = '/portal/products';
                } else {
                    showAlertError(response.data.message);
                    hideLoading();
                }
            }).catch(error => {
                hideLoading();
                showAlertError('Cannot update product');
            })
        },
        deleteProduct() {
            axios.delete(`/portal/products/${this.data.id}`)
                .then(response => {
                    hideLoading();
                    if (response.data.success) {
                        window.location.href = '/portal/products';
                    } else {
                        showAlertError(response.data.message);
                    } 
            }).catch(error => {
                hideLoading();
                showAlertError('Cannot delete product');
            });
        }   

    },
    computed: {
        resultQuery()
        {
            
            var vm = this, lists = vm.products
            return _.filter(lists, function(query){
                var product_category = vm.product_category_id ? (query.product_category_id == vm.product_category_id) : true;
                return product_category;
            });
        },
    }
  
});
