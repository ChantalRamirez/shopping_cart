const { createApp } = Vue
  createApp({
    data(){
      return{
        displayLabels: true,
        max: 50,
        cart:[],
        displayCart: false,        
        mensaje: 'Hola pondremos aquí una lista',
        products: [],
      }
    },
    created(){
      fetch("https://hplussport.com/api/products/order/price")
      .then(response => response.json())
      .then(data =>{
        this.products = data;
      })
    },
    computed:{
      filteredProducts(){
        return this.products.filter(item => (item.price < this.max));
      },
      cartTotal(){
        return this.cart.reduce((inc, item) => Number(item.price) + inc, 0)
      }
    },
    methods:{
      addToCart(product){
        this.cart.push(product)
      },
      currency(value){
        return `$ ${Number.parseFloat(value).toFixed(2)}`
      }
    }
  }).mount('#product_list')

 


  