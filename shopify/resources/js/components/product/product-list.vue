 

<template>
  
  <div>
    <h1 class="m-0 font-weight-bold">Inventory</h1>
    <br>
   
   
   <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Inventory">
                </div>
                
              <div class="card">
                
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Media</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>cost_per_item</th>
                        <th>SKU</th>
                        <th>Weight</th>
                        <th>Edit / Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="product in filtersearch" :key="product.id">
                        <td><img :src="product.media" id="media-size"></td>
                        <td> {{ product.Title }} </td>
                        <td>{{ product.price }}</td>
                        <td>{{ product.cost_per_item }}</td>
                        <td>{{ product.SKU }}</td>
                        <td>{{ product.weight }}</td>
                        <td>
                            <router-link :to="{name: 'editprod', params:{id:product.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            <a @click="deleteProduct(product.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
                        </td>
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
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
      }else{
        this.allProduct();
      }
    },
    data(){
      return{
        products:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
        return this.products.filter(product => {
            return product.Title.match(this.searchTerm)
        }) 
      }
    },
 
  methods:{
    allProduct(){
      axios.get('/api/product/')
      .then(({data}) => (this.products = data))
      .catch()
    },
    deleteProduct(id){
      axios.delete('api/product/' + id)
      .then(()=>{
        this.products = this.products.filter(product =>{
          return product.id != id
        })
      })
      .catch(()=>{
        this.$router.push({name:'inventory'})
      })

    }

    }
    
  

    } 
</script>


<style type="text/css">
  #media-size{
    height: 50px;
    width: 50px;
  }
</style>