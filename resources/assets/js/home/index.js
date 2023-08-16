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
      grandtotal: 0
    },
    
    methods: {
      showAlert() {
        alert("123");
      },
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
        const existingItem = this.carts.find(item => item.id === id);
  
        if (existingItem) {
          existingItem.qty += this.toAdd.qty;
          existingItem.subtotal = existingItem.price * existingItem.qty;
          this.grandtotal = this.calculateGrandtotal();
          showToastSuccess(`${existingItem.name} +${existingItem.qty}`);
        } else {
          const newItem = {
            ...this.toAdd,
            subtotal: this.toAdd.price * this.toAdd.qty
          };
          this.carts.push(newItem);
          showToastSuccess('Added to Cart!');
          this.grandtotal = this.calculateGrandtotal();
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
        },
    },
    
    watch: {
      'toAdd.qty'() {
        this.calculateSubtotal();
      }
    },
  });