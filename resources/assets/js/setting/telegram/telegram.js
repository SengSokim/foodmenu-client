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
        axios.get(`/admin/restaurants`
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

        preview(param){
            switch (param) {
                case 'user':
                    var URL=this.data.telegram_user;
                    if (URL.indexOf("https://t.me/") > -1) {
                        var urlSplit=URL.split('/');
                        window.open('https://t.me/' + urlSplit[3], '_blank');
                    }else
                    window.open('https://t.me/' + this.data.telegram_user, '_blank');
                    break;
                case 'group':
                    var URL=this.data.telegram_group;
                    if (URL.indexOf("https://t.me/") > -1) {
                        var urlSplit=URL.split('/');
                        window.open('https://t.me/' + urlSplit[3], '_blank');
                    }else
                    window.open('https://t.me/' + this.data.telegram_group, '_blank');
                    break;
                default:
                    window.open('https://web.telegram.org/', '_blank');
                    break;
            }
        },
        save(){
            showLoading()
            axios.post(`/admin/restaurants`,
                this.data
            ).then(response => {
                if (response.data.success) {
                    window.location.href = '/admin/setting/telegram';
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

        created(){
            return  this.data.telegram_user ==null;
        }
    }
});
