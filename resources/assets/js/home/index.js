app = new Vue({
    el: "#homePage",
    data: {
        data: data.data,
        productDetail: "",
        toAdd: {
            name:'',
            img:'',
            qty:'',
            price:'',
            subtotal:'',
            description:'',
        },
        carts: [],
        grandtotal: 0
    },
    
    methods: {
        alert() {
            alert("123");
        },
        getDetail(product)
        {
            this.productDetail = product;
            this.toAdd.name = this.productDetail.name;
            this.toAdd.img = this.productDetail.image.url;
            this.toAdd.price = this.productDetail.price;
            this.toAdd.description = this.productDetail.description;
            this.toAdd.qty = 1;
            this.subtotal = this.toAdd.price * this.productDetail.qty;
        },
        clear() {
            this.productDetail = "";
        },
        decrement() {
            this.toAdd.qty -= 1;
        },
        increment() {
            this.toAdd.qty += 1;
        },

        addToCart(){
            this.carts.push({
                name:this.toAdd.name,
                img: this.toAdd.img,
                price: this.toAdd.price,
                qty: this.toAdd.qty,
                subtotal: this.toAdd.subtotal
            })
            alert('added to cart!')
            this.grandtotal = this.carts.map((product) => product.subtotal).reduce((acc,curr) => acc + curr)
        },



        number_format(number, decimals, dec_point, thousands_sep) {
            // Strip all characters but numerical ones.
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
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
        prefix_number_format(
            number,
            prefix = null,
            is_start = true,
            decimal = 2,
            dec_point = ".",
            thousads_sep = ","
        ) {
            if (decimal < 0) {
                number = number.toString();
                number = number.substring(0, number.length - decimal);
                for (let i = 1; i >= -decimal; i++) {
                    number += "" + 0;
                }

                decimal = 0;
            }

            let res = this.number_format(number, decimal, dec_point, thousads_sep);

            if (prefix) {
                if (is_start) {
                    res = prefix + res;
                } else {
                    res += prefix;
                }
            }

            return res;
        },

        dollar(number, prefix = "$", decimal = 2) {
            return this.prefix_number_format(number, prefix, true, decimal);
        },
    },
    watch: {
        'toAdd.qty'() {
            this.toAdd.subtotal = this.toAdd.price * this.toAdd.qty;
        }
    },
});
