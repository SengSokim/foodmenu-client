app = new Vue({
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
        is_loaded_product : 0,
        isLoading: 0,
        search: search
    },
    mounted() {
        this.init()
    },
    methods:{
        
        showMore() {
            if(this.products.length >= this.total) {
                return;
            }

            this.init();
        },
        init(){
            if(this.isLoading) {
                return;
            }
            showLoading()
            this.isLoading = true;
            axios.get(`/admin/products/get?search=${this.search}&limit=24&offset=${this.products.length}`
                ).then(response => {
                    this.isLoading = false;
                    this.is_loaded_product =1
                
                if (response.data.success) {
                    hideLoading()
                    this.products.push(...response.data.data.list);
                    this.total = response.data.data.total;
                } else {
                    console.log('response not success');
                }
            }).catch(err => {
                this.isLoading = false;
                hideLoading()
            })
        }, 

        formatCurrency(money) {
            switch (restaurant.currency_code) {
                case 'khr':
                    return number_format(money, 0, '', ',') + ' ៛';
                default:
                    return '$' + number_format(money, 2, '.', ',');
            }
        },

        save(){
            showLoading();
            axios.post(`/admin/products/${this.data.id ?? ''}`,
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

            $('.product-category-select2').val(product.product_category_id ? product.product_category_id: null).trigger('change');
        },

        updateProductStatus(value){
            showLoading();
            axios.post(`/admin/products/status/${this.data.id}`,
                { enable_status : value}
            ).then(response => {
                if (response.data.success) {
                    window.location.href = '/admin/products';
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
            axios.delete(`/admin/products/${this.data.id}`)
                .then(response => {
                    hideLoading();
                    if (response.data.success) {
                        window.location.href = '/admin/products';
                    } else {
                        showAlertError(response.data.message);
                    } 
            }).catch(error => {
                hideLoading();
                showAlertError('Cannot delete product');
            });
        },
        shareLinkProduct() {
            const el = document.querySelector('#share_link_product')
            el.setAttribute('type', 'text')   
            el.select()
            console.log(el);

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                alert('Link copied ' + msg);
            } catch (err) {
                alert('Oops, unable to copy');
            }

            /* unselect the range */
            el.setAttribute('type', 'hidden')
            window.getSelection().removeAllRanges()
        },


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
