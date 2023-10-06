
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="vue.css">


<section class="container" id="product_list" >
  <div class="floatright position-relative" >
      <div class="mb-4" >
        <span class="font-weight-bold bg-white" style="margin-right:10px;">{{currency(cartTotal)}}</span>
        <button @click="displayCart = !displayCart" class="btn btn-success btn-sm ml-3" id="cartDropdown" aria-haspopup="true" aria-expanded="false">
          <i class="glyphicon glyphicon-shopping-cart mr-4" style="margin-right:5px;"></i>
          {{cart.length}}
        </button>
      </div>
      <div v-if="displayCart" class="list-group position-absolute" aria-labelledby="cartDropdown" style="top: 30px;right: 0; width:300px; z-index:100;">
        <div v-for="(item, index) in cart" :key="index" class="list-group-item " style="display:flex;">
          <div style="margin-right: 10px;">{{item.name}} </div>
          <div class="ml-3 font-weight-bold">{{currency(item.price)}}</div>
        </div>
      </div>
  </div>

  <label for="max-price" class="form-label h2">Max Price</label>
  <div class="label label-success" style="margin-left: 20px;">results: {{filteredProducts.length}}</div>
  <input v-model.number="max" class="form-control" id="max-price">
  <input v-model.number="max" type="range" class="form-range" min="0" max="130">

  <div class="showLabels">
    <input v-model="displayLabels" type="checkbox" id="showLabels" >
    <span class="span-showLabels" >Show labels</span>
  </div>
 
  <div v-for="(item, index) in filteredProducts" :key="item.id" id="display-list" class="row mb-3 display-center mt-3">
      <div class="col-sm-1 m-auto">
        <button @click="addToCart(item)" class="btn btn-success">+</button>
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
          {{currency(item.price)}}</div>
      </div>
  
  </div>
</section>
<script src="vue.js"></script>



