 

<template>
  
  <div>
    <h1 class="m-0 font-weight-bold">All Orders</h1>
    <br>
   
   
   <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <input type="text" v-model="searchTerm" class="form-control" style="width: 300px;" placeholder="Search Customers">
                </div>
                
              <div class="card">
                
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Customer Name</th>
                        <th>Product Bought</th>
                        <th>Total Price</th>
                        <th>Payment status</th>
                        <th>Fulfillment</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="order in filtersearch" :key="order.id">
                        <td> {{ order.Customer_Name }} </td>
                        <td>{{ order.product_id }}</td>
                        <td>{{ order.product_Price }}</td>
                        <td>{{ order.Payment_status }}</td>
                        <td> {{ order.Fulfillment }} </td>
                        
                        <td>
                            <router-link :to="{name: 'editOrders', params:{id:order.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            
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
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },
    data(){
      return{
        orders:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
        return this.orders.filter(order => {
            return order.Customer_Name.match(this.searchTerm)
        }) 
      }
    },
 
  methods:{
    allOrders(){
      axios.get('/api/make-order/')
      .then(({data}) => (this.orders = data))
      .catch()
    },

    },
    created(){
        this.allOrders();
    } 
 
    } 
</script>


<style type="text/css">

</style>