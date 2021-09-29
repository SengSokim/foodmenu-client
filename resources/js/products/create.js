// new Vue({
//     el: '#createProduct',
//     data: {
//         error: {
//             image: null
//         },
//         data: {
//             name: '',
//             price: 0,
//             sequence: 0,
//             enable_status: 1,
//             description: '',
//             image: null
//         },
//         product_categories: product_categories
//     },

//     methods: {
//         save() {
//             axios.post(`/portal/products`,
//                 this.data
//             ).then(response => {
//                 if (response.data.success) {
//                     window.location.href = '/portal/products';
//                 } else {
//                     showAlertError(response.data.message);
//                     hideLoading()
//                 }
//             }).catch(error => {
//                 hideLoading();
//                 console.log(error)
//                 showAlertError('Cannot create product');
//             })
//         },

//         submit() {
//             showLoading();
//             this.$validator.validate().then((result) => {
//                 let save = true;
//                 if(!this.data.image) {
//                     this.error.image = 'The Image field is required.';
//                     save = false;
//                 }

//                 if (!result || !save) {
//                     hideLoading();
//                     //set Window location to top
//                     window.scrollTo(0, 0);
//                 } else {
//                     this.save();
//                 }
//             })
//         },

//         uploadImage(event) {
//             console.log('create');
//             const input = event.target;
//             if (input.files && input.files[0]) {
//                 const reader = new FileReader();

//                 reader.onload = (e) => {
//                     this.data.image = e.target.result;
//                     this.error.image = null;
//                 };
//                 reader.readAsDataURL(input.files[0])
//             }
//         },
//     }
// });
