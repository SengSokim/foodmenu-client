new Vue({
    el: "#tables",
    data: {
        data:{
            name: '',
            enable_status: true
        }
    },
    methods: {
        save() {
            console.log("data: ",this.data);
            axios.post(`${baseURL}/tables`,
                this.data
            ).then(response => {
                console.log("response: ", response.data);
                if (response.data.success) {
                    window.location.href = baseURL + '/tables';
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                hideLoading();
                showAlertError('Can not add table');
                console.log(error)
            })
        },
        submit() {
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
    }
})