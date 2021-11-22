new Vue({
    el: '#RestaurantTables',
    data: {       
        selected_id: null,
        restaurant_tables : restaurant_tables,
        data:{
            id: null,
            name: '',
            enable_status: 1
        }
    },

    methods: {
        clearData() {
            this.data = {
                id: null,
                name: '',
                enable_status: 1
            };    
            
            setTimeout(() => {
                this.$validator.errors.remove('name');
            }, 0);
        },

        setData (restaurant_tables) {
            console.log(restaurant_tables);
            this.clearData();
              
            this.data = Object.assign({}, {
                id: restaurant_tables.id,
                name: restaurant_tables.name,
                enable_status: restaurant_tables.enable_status
            });
        },

        save(){
            showLoading();

            var url = '/admin/tables/';
            if(this.data.id) {
                url += this.data.id;
            }
            axios.post(url,
                this.data
            ).then(response => {
                if (response.data.success) {
                    hideLoading();
                    window.location.href = '/admin/tables';
                } else {
                    showAlertError(response.data.message);
                    hideLoading();
                }
            }).catch(error => {
                hideLoading();
                console.log(error)
                if(this.data.id) {
                showAlertError('Cannot create table');

                } else {
                showAlertError('Cannot update table');

                }
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
        deleteTable () {
            showLoading();
            axios.delete(`/admin/tables/${this.data.id}`)
                .then(response => {
                    hideLoading();
                    console.log(response.data);
                    if (response.data.success) {
                        window.location.href = '/admin/tables';
                    } else {
                        showAlertError(response.data.message);
                    } 
            }).catch(error => {
                console.log(error);
                hideLoading();
                showAlertError('Cannot delete table');
            });
        }
    }
});
