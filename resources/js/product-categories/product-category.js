new Vue({
    el: '#productCategory',
    data: {
        data: {
            name: '',
            sequence: 0,
            enable_status: 1,
        }
    },

    methods: {
        save() {
            axios.post(`/portal/product-categories`,
                this.data
            ).then(response => {
                if (response.data.success) {
                    window.location.href = '/portal/product-categories';
                } else {
                    showAlertError(response.data.message);
                    // hideLoading()
                }
            }).catch(error => {
                // hideLoading();
                console.log(error)
                showAlertError('Cannot create product category');
            })
        },

        submit() {
            showLoading();
            this.$validator.validate().then((result) => {
                let save = true;
                if (!result || !save) {
                    // hideLoading();
                    //set Window location to top
                    window.scrollTo(0, 0);
                } else {
                    this.save();
                }
            })
        },

        // addNewContent(content_type) {

        //     this.temp_content = {
        //         content_type: content_type,
        //         page_id: data.id,
        //         title_en: null,
        //         title_kh: null,
        //         text_en: null,
        //         text_kh: null,
        //         video_url: null,
        //         image: null,
        //         sequence: 0,
        //     };

        //     this.error.content.image = null;

        //     setTimeout(() => {
        //         this.$validator.errors.remove('title_en', 'content');
        //         this.$validator.errors.remove('title_kh', 'content');
        //         this.$validator.errors.remove('text_en', 'content');
        //         this.$validator.errors.remove('text_kh', 'content');
        //         this.$validator.errors.remove('video', 'content');
        //     }, 0);
        // },

        // createContent() {
        //     showLoading();
        //     this.$validator.validateAll('content').then((result) => {
        //         let save = true;

        //         if(this.temp_content.content_type === 'image' && !this.temp_content.image) {
        //             save = false;
        //             this.error.content.image = 'The image field is required.'
        //         }

        //         if (!result || !save) {
        //             hideLoading();
        //         } else {
        //             axios.post(`/admin/page-contents`,
        //                 this.temp_content
        //                 ,{
        //                     cancelToken: new CancelToken(function executor(c) {
        //                         // An executor function receives a cancel function as a parameter
        //                         cancel_request = c;
        //                     })
        //                 }).then(response => {
        //                 hideLoading();
        //                 if (response.data.success) {
        //                     $('#modal-content').modal('hide');
        //                     showToastSuccess('Add content successfully');
        //                     this.contents.push(response.data.data);
        //                 } else {
        //                     showAlertError(response.data.message);
        //                 }
        //             }).catch(error => {
        //                 console.log(error);
        //                 hideLoading();
        //                 showAlertError('Cannot add content');
        //             });
        //         }
        //     });
        // },

        // editContent() {
        //     showLoading();
        //     this.$validator.validateAll('content').then((result) => {
        //         if (!result || !this.temp_content.id) {
        //             hideLoading();
        //         } else {
        //             axios.put(`/admin/page-contents/${this.temp_content.id}`,
        //                 this.temp_content
        //                 ,{
        //                     cancelToken: new CancelToken(function executor(c) {
        //                         // An executor function receives a cancel function as a parameter
        //                         cancel_request = c;
        //                     })
        //                 }).then(response => {
        //                 hideLoading();
        //                 if (response.data.success) {
        //                     $('#modal-content').modal('hide');
        //                     showToastSuccess('Update content successfully');
        //                     Vue.set(this.contents, this.selected_content_index, response.data.data);
        //                 } else {
        //                     showAlertError(response.data.message);
        //                 }
        //             }).catch(error => {
        //                 console.log(error);
        //                 hideLoading();
        //                 showAlertError('Cannot update content');
        //             });
        //         }
        //     });
        // },
    }
});
