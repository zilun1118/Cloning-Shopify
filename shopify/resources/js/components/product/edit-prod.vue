  

<template>
  
  <div>
    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"> Edit Product</h1>
                  </div>

                  <form class="user" @submit.prevent="updateProd" enctype="multipart/form-data" >
                    <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" placeholder="Product Title" v-model="form.Title">
                      <small class="text-danger" v-if="errors.Title">{{errors.Title[0]}}</small>
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" id="exampleInputPassword" placeholder="Product Description" v-model="form.Description">
                      <small class="text-danger" v-if="errors.Description">{{errors.Description[0]}}</small>
                    </div>
                  
                    <div class="form-group">
                      <label>Price</label>
                      <input type="text" class="form-control" id="exampleInputPassword" placeholder="price" v-model="form.price">
                      <small class="text-danger" v-if="errors.price">{{errors.price[0]}}</small>
                    </div>
                    <div class="form-group">
                      <label>Cost Per Item</label>
                      <input type="text" class="form-control" id="exampleInputPassword" placeholder="Cost Per Item" v-model="form.cost_per_item">
                      <small class="text-danger" v-if="errors.cost_per_item">{{errors.cost_per_item[0]}}</small>
                    </div>
                    <div class="form-group">
                      <label>Stock Keeping Unit</label>
                      <input type="text" class="form-control" id="exampleInputPassword" placeholder="Stock Keeping Unit" v-model="form.SKU">
                      <small class="text-danger" v-if="errors.SKU">{{errors.SKU[0]}}</small>
                    </div>
                    <div class="form-group">
                      <label>Weight</label>
                      <input type="text" class="form-control" id="exampleInputPassword" placeholder="Weight" v-model="form.weight">
                      <small class="text-danger" v-if="errors.weight">{{errors.weight[0]}}</small>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Update Product</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
  
  
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</template>



<script type="text/javascript">
  
  export default {
    created(){
      if (!user.loggedIn()) {
        this.$router.push({name: '/'})
      }
      else{
        let id = this.$route.params.id
        axios.get('/api/product/'+id)
        .then(({data}) => (this.form = data))
        .catch(console.log('error'))
      }
    },

    data(){
    return {
      form:{
        Title: '',
        Description: '',
        price: '',
        cost_per_item: '',
        SKU: '',
        weight: '',
        
      },
      errors:{}
    }
  },

  methods:{
  updateProd(){
  	  let id = this.$route.params.id
       axios.patch('/api/product/'+id,this.form)
       .then(() => {
        this.$router.push({ name: 'inventory'})
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  } 


  }
   
</script>


<style type="text/css">
  
</style>