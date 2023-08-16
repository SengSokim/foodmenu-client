app = new Vue({
    el: '#productDetail',
    data: {  
       data:{

       }
    },
    
    methods:{
        alert() {
            alert('123')
        },
        showModal() {
            $('#product-detail-modal').show();
        },
        getProduct(product){
            alert(product)
            $('#product-detail-modal').show();
        }
    }
  
});
