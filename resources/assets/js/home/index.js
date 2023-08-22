const app = new Vue({
    el: "#homePage",
    data: {
      data: data.data,
      productDetail: "",
      toAdd: {
        code: '',
        name: '',
        img: '',
        qty: '',
        price: '',
        subtotal: '',
        description: '',
      },
      carts: [],
      orderDetails: {
        customer_name: "",
        phone_number: "",
        address: "",
        total_order: "",
        product_ids:""
      },
      grandtotal: 0
    },

    methods: {
      getDetail(product) {
        this.productDetail = product;
        this.toAdd = {
          id: this.productDetail.id,
          code: this.productDetail.code,
          name: this.productDetail.name,
          img: this.productDetail.image.url,
          price: this.productDetail.price,
          description: this.productDetail.description,
          qty: 1,
          subtotal: this.productDetail.price
        };
      },
      incrementQtyAdd(item) {
        item.qty += 1;
       
      },
      decrementQtyAdd(item) {
        item.qty -= 1;
        
      },
      incrementQty(item) {
        item.qty += 1;
        this.calculateSubtotal(item);
        this.orderDetails.product_ids = this.orderInfo();
        this.orderDetails.total_order = this.calculateGrandtotal();
      },
      decrementQty(item) {
        item.qty -= 1;
        this.calculateSubtotal(item);
        this.orderDetails.product_ids = this.orderInfo();
        this.orderDetails.total_order = this.calculateGrandtotal();
      },
      addToCart(id) {
        const existingItem = this.carts?.find(item => item.id === id);

        if (existingItem) {
          existingItem.qty += this.toAdd.qty;
          existingItem.subtotal = existingItem.price * existingItem.qty;
          this.grandtotal = this.calculateGrandtotal();
          showToastSuccess(`${existingItem.name} +${this.toAdd.qty}`);
        } else {
          const newItem = {
            ...this.toAdd,
            subtotal: this.toAdd.price * this.toAdd.qty
          };
          this.carts.push(newItem);
          showToastSuccess('Added to Cart!');
          this.grandtotal = this.calculateGrandtotal();
          this.orderDetails.product_ids = this.orderInfo();
          this.orderDetails.total_order = this.calculateGrandtotal();
        }
      },
      orderInfo() {
        const details = this.carts.map(function(item) {
          return {
            product_id: item.id,
            qty: item.qty,
            total: item.subtotal
          }
        })
        return details
      },
      removefromCart(index) {
        this.carts.splice(index-1);
        this.grandtotal = this.calculateGrandtotal();
      },
      calculateSubtotal(item) {
        item.subtotal = item.price * item.qty;
        
        this.grandtotal = this.calculateGrandtotal();
        
        
      },
      calculateGrandtotal() {
        return this.carts.map(product => product.subtotal).reduce(function(acc, curr) {
          return acc + curr},0);
      },
      formatNumber(number, decimals, decPoint, thousandsSep) {
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        const n = !isFinite(+number) ? 0 : +number;
        const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);
        const sep = typeof thousandsSep === 'undefined' ? ',' : thousandsSep;
        const dec = typeof decPoint === 'undefined' ? '.' : decPoint;
        let s = '';

        const toFixedFix = function(n, prec) {
          const k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };

        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');

        if (s[0].length > 3) {
          s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }

        if ((s[1] || '').length < prec) {
          s[1] = s[1] || '';
          s[1] += new Array(prec - s[1].length + 1).join('0');
        }

        return s.join(dec);
      },
      formatCurrency(number, prefix = '$', decimal = 2) {
        const formattedNumber = this.formatNumber(number, decimal, '.', ',');
        return prefix + formattedNumber;
      },
      
      clear() {
        this.productDetail = "";
        this.orderDetails= {
          customer_name: "",
          phone_number: "",
          address: "",
          total_order: "",
          product_ids:""
        },
        this.carts =[];
        this.grandtotal = "";
        },
        submit() {
          // showLoading();

          this.$validator.validate().then((result) => {
              let save = true;

              if (!result || !save) {
                  // hideLoading();
                  //set Window location to top
                  window.scrollTo(0, 0);

              } else {
                  this.createOrder();
              }
          })
      },
      createOrder() {
        axios.post('/createorder',
          this.orderDetails
        ).then(response => {
          if(response.status === 200) {
            showToastSuccess('Order has been created!');
            $('#myModal').modal('toggle');
            $('#invoiceModal').modal('toggle');

          }
        })
        .catch(error => {
          alert('Cannot create order'+" "+ error);
        })
      }
    },
    
    watch: {
      // 'toAdd.qty'() {
      //   this.calculateSubtotal();
      // }
    },
  });
