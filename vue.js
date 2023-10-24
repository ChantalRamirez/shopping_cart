const App = Vue.createApp({
  data(){
    return{
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
    cartBtn(){
      return{
        'btn-secondary': this.cartTotal <= 100,
        'btn-success': this.cartTotal > 100,
        'btn-danger': this.cartTotal > 200,
      }
    },
    filteredProducts(){
      return this.products.filter(item => (item.price < this.max));
    },
    cartTotal(){
      return this.cart.reduce((inc, item) => Number(item.price) + inc, 0)
    }
  },
  methods:{
    transitionColor(el){
      this.totalColor = 'text-danger';
    },
    resetColor(){
      this.totalColor = 'text-secondary';
    },
    addToCart(product){
      this.cart.push(product)
      if (this.cartTotal >= 100) {this.salesBtn = 'btn-success'}
    },
    // currency(value){
    //   return `$ ${Number.parseFloat(value).toFixed(2)}`
    // }
  }
})

App.component('custom-alert', {
  props: ['type','close'],
  template: `
  <div :class="[(type ? 'alert-' + type: 'alert-info'), (close ? 'alert-dismissible' : '')]" class="alert" role="alert" >
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">X</span></button>
  <slot> Congrats on getting some items in your cart.</slot>  
  </div>
  `
})

App.component('product',{
  props:['item', 'index'],
  emits: ['addToCart'],
  template: `
      <div class="col-sm-1 m-auto">
        <button @click="$emit('addToCart', item)" class="btn btn-success">+</button>
      </div>
      <div class="col-sm-2">
        <img class="image_product" :src="item.image" :alt="item.name">
      </div>
      <div class="col-sm-9">
        <h3 class="text-info">{{index +1}}) {{item.name}}</h3>
        <p class="mb-0">{{item.description}}</p>
        <div class="floatright">
          <span class="label label-success" v-if="item.price>=90 && displayLabels ">premier</span>
          <span class="label label-primary" v-else-if="(item.price<90 && item.price>10) && displayLabels">value</span>
          <span class="label label-danger" v-else-if="item.price<10 && displayLabels" >sale</span>
          <curr :amt = "item.price"></curr></div>
      </div>`
})

App.component('curr',{
  props:['amt'],
  template: `{{dollar(amt)}}`,
  methods: {
    dollar(value){
      return '$' + Number.parseFloat(value).toFixed(2);
    }
  }
})

App.mount('#product_list');

 


  