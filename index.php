
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="vue.css">


<section class="container" id="product_list" >
  <div class="floatright position-relative" >
      <div class="mb-4" >
      <span class="font-weight-bold bg-white" style="margin-right:10px;" :class="totalColor"><curr :amt = "cartTotal"></curr></span>
        <button :class="cartBtn" @click="displayCart = !displayCart" class="btn btn-sm ml-3" id="cartDropdown" aria-haspopup="true" aria-expanded="false">
          <i class="glyphicon glyphicon-shopping-cart mr-4" style="margin-right:5px;"></i>
          {{cart.length}}
        </button>
      </div>
      <div class="dropdown-clip" >
        <transition name='dropdown'
          @enter = 'transitionColor'
          @after-leave ='resetColor' >
          <div v-if="displayCart" class="list-group " aria-labelledby="cartDropdown" style="position:absolute; top: 30px;right: 0; width:300px; z-index:100;">
            <div v-for="(item, index) in cart" :key="index" class="list-group-item " style="display:flex;">
              <div style="margin-right: 10px;">{{item.name}} </div>
              <div class="ml-3 font-weight-bold"><curr :amt = "item.price"></curr></div>
            </div>
          </div>
        </transition>
      </div>
  </div>

  <label for="max-price" class="form-label h2">Max Price</label>
  <div class="label label-success" style="margin-left: 20px;">results: {{filteredProducts.length}}</div>
  <input v-model.number="max" class="form-control" id="max-price">
  <input v-model.number="max" type="range" class="form-range" min="0" max="130">

  <!-- <div class="showLabels">
    <input v-model="displayLabels" type="checkbox" id="showLabels" >
    <span class="span-showLabels" >Show labels</span>
  </div> -->
 
  <custom-alert type="danger" close="true" v-if="cartTotal >= 100" ></custom-alert>
  <transition-group name="products" appear>
    <div v-for="(item, index) in filteredProducts" :key="item.id" id="display-list" class="row mb-3 display-center mt-3">
        <product :item="item" :index="index" @add-to-cart="addToCart"></product>
    </div>
  </transition-group>
</section>
<script src="vue.js"></script>



