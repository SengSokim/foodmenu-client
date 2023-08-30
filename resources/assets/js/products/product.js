app = new Vue({
    el: '#product',
    data: {
        image: null,
        error: {
            image: null
        },

        product_categories:product_categories,
        products:products,
        total: 0,

        data:{
            id: null,
            code: '',
            name: '',
            price: 0,
            sequence: 0,
            enable_status: 1,
            category_id: null,
            description:'',
            image:null
        },
        product_category_selected: undefined,
        product_category_id: null,
        is_loaded_product : 0,
        isLoading: 0,
        // search: search
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
            // showLoading()
            // this.isLoading = true;
            // axios.get(`/admin/products/get?search=${this.search}&limit=24&offset=${this.products.length}`
            //     ).then(response => {
            //         this.isLoading = false;
            //         this.is_loaded_product =1

            //     if (response.data.success) {
            //         hideLoading()
            //         this.products.push(...response.data.data.list);
            //         this.total = response.data.data.total;
            //     } else {
            //         console.log('response not success');
            //     }
            // }).catch(err => {
            //     this.isLoading = false;
            //     hideLoading()
            // })
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
            // showLoading();
            axios.post(`/admin/products/${this.data.id ?? ''}`,
                this.data
            ).then(response => {
            
                if (response.data.success) {
                    window.location.href = '/admin/products';
                } else {
                    alert(response.data.message.code[0]);
                    // hideLoading()
                }
            }).catch(error => {
                // hideLoading();
                // showAlertError('Cannot update product');
            })
        },

        submit() {
            this.$validator.validate().then((result) => {
                console.log(result);
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
                code: '',
                name: '',
                price: 0,
                sequence: 0,
                enable_status: 1,
                category_id: null,
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
                code: product.code,
                name: product.name,
                category_id: product.category.id,
                price: product.price,
                sequence: product.sequence,
                enable_status: product.enable_status,
                media: product.media,
                description: product.description
            });
            $("#product_category").select2();
            $('.product-category-select2').val(product.category_id ? product.category_id: null).trigger('change');
        },

        updateProductStatus(value){
            // showLoading();
            axios.post(`/admin/products/status/${this.data.id}`,
                { enable_status : value}
            ).then(response => {
                if (response.data.success) {
                    window.location.href = '/admin/products';
                } else {
                    // alert('Error')
                    // showAlertError(response.data.message);
                    // hideLoading();
                }
            }).catch(error => {
                alert('Cannot update product');
                // hideLoading();
                // showAlertError('');
            })
        },
        deleteProduct() {
            axios.delete(`/admin/products/${this.data.id}`)
                .then(response => {
                    // hideLoading();
                    if (response.data.success) {
                        window.location.href = '/admin/products';
                    } else {
                        alert(response.data.message);
                        // showAlertError(response.data.message);
                    }
            }).catch(error => {
                alert('Cannot delete product');
                // hideLoading();
                // showAlertError('Cannot delete product');
            });
        },
        copy(text) {
            showToastSuccess("Link copied successfully");
            if (window.clipboardData && window.clipboardData.setData) {
                // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
                return window.clipboardData.setData("Text", text);
            } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
                var textarea = document.createElement("textarea");
                textarea.textContent = text;
                textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in Microsoft Edge.
                document.body.appendChild(textarea);
                textarea.select();
                try {
                    return document.execCommand("copy"); // Security exception may be thrown by some browsers.
                } catch (ex) {
                    console.warn("Copy to clipboard failed.", ex);
                    return false;
                } finally {
                    document.body.removeChild(textarea);
                }
            }
        },


    },
    computed: {
        resultQuery()
        {

            var vm = this, lists = vm.products
            return _.filter(lists, function(query){
                var product_category = vm.category_ids ? (query.category_ids == vm.category_ids) : true;
                return product_category;
            });
        },
    }

});
