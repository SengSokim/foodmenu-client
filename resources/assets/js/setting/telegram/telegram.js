new Vue({
    el: '#telegram',
    data: {       
        telegramData: {},
        data:{
            telegram_user: '',
            telegram_group: '',
            name: ''
        },
        is_exist : false,
    },
    mounted() {
        showLoading();
        axios.get(`/portal/restaurants`
        ).then(response => {
            if (response.data.success) {
                this.telegramData = response.data.data
                this.data.name = this.telegramData.name
                this.data.telegram_user = this.telegramData.telegram_user
                this.data.telegram_group = this.telegramData.telegram_group
                hideLoading()
            } else {
                showAlertError(response.data.message);
                hideLoading()
            }
        }).catch(error => {
            hideLoading();
            console.log(error)
        })
    },
    methods: {
        save(){
            showLoading()
            axios.post(`/portal/restaurants`,
                this.data
            ).then(response => {
                if (response.data.success) {
                    window.location.href = '/portal/setting/telegram';
                } else {
                    showAlertError(response.data.message);
                    hideLoading()
                }
            }).catch(error => {
                hideLoading();
                console.log(error)
                showAlertError('Cannot update telegram');
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
    }
});
