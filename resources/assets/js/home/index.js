const app = new Vue({
    el: "#homePage",
    data: {
      data: data.data,
      productDetail: "",
      toAdd: {
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
          name: this.productDetail.name,
          img: this.productDetail.image.url,
          price: this.productDetail.price,
          description: this.productDetail.description,
          qty: 1,
          subtotal: this.productDetail.price
        };
      },
      decrement() {
        this.toAdd.qty -= 1;
        this.calculateSubtotal();
      },
      increment() {
        this.toAdd.qty += 1;
        this.calculateSubtotal();
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
          this.orderDetails.product_ids = this.carts.map(function(item) {
            return {
              product_id: item.id,
              qty: item.qty, 
              total: item.subtotal
            }
          })
          this.orderDetails.total_order = this.grandtotal
        }
      },
      calculateSubtotal() {
        this.toAdd.subtotal = this.toAdd.price * this.toAdd.qty;
      },
      calculateGrandtotal() {
        return this.carts.map(product => product.subtotal).reduce((acc, curr) => acc + curr);
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
      submitOrder() {
          const token = '6357184660:AAFQRBXntuUJHfGjep2-dZSydkXrIb54ew4';// Replace with your actual bot token
          const chatId = '-882376119'; // Replace with your desired chat ID
          const messages = JSON.stringify(this.carts, null, 4); 
      
          const formattedMessages = `<pre>${messages}</pre>`;
          //  // Wrapping JSON in <pre> tag for HTML formatting
          // axios.get(`https://api.telegram.org/bot${token}/sendPhoto?chat_id=${chatId}&photo=https://as1.ftcdn.net/v2/jpg/01/05/43/24/1000_F_105432459_fl1Ag0kyXxNp4fvI4S77cVmxPG9fT3gy.jpg`)
          //     .then(response => {
          //         console.log(response);
          //         // You might want to handle successful submission here
          //     })
          //     .catch(error => {
          //         alert('Cannot submit order');
          //         console.error(error);
          //         // You can also handle error cases here
          //     });

          axios.get(`https://api.telegram.org/bot${token}/sendMessage?chat_id=${chatId}&text=${encodeURIComponent(formattedMessages)}&parse_mode=HTML`)
              .then(response => {
                  console.log(response);
                  this.createOrder();
                  $('#myModal').modal('toggle');
                  
                  // You might want to handle successful submission here
              })
              .catch(error => {
                  alert('Cannot submit order');
                  console.error(error);
                  // You can also handle error cases here
              });

      },
      createOrder() {
        axios.post('http://127.0.0.1:8002/api/admin/order/create',
          this.orderDetails
        ).then(response => {
          console.log(response);
          showToastSuccess('Order has been created!');
          this.clear();
        })
        .catch(error => {
          alert('Cannot create order'+" "+ error);
        })
      }
    },
    
    watch: {
      'toAdd.qty'() {
        this.calculateSubtotal();
      }
    },
  });