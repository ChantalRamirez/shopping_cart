
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="libs/vue.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

<section class="container" id="product_list">
  <div v-for="(item, index) in products" :key="item.id" id="display-list" class="row mb-3 display-center">
    <div class="col-sm-4">
      <img class="image_product" :src="item.image" :alt="item.name">
    </div>
    <div class="col-sm-8 ">
      <h3 class="text-info">{{index +1}}) {{item.name}}</h3>
      <p class="mb-0">{{item.description}}</p>
      <div class="floatright">${{item.price}}</div>
    </div>
  </div>
</section>

  <ul >
    <template v-for="(text, i) in array">
      <li >
        {{ text }}
        <button type="button" class="btn btn-danger delete" @click="deleteToArray(i)">Eliminar</button>
      </li>
      <hr class="line">
    </template>
  </ul>
</div> 

<script src="libs/js/vue.js"></script>
</body>
</html>







