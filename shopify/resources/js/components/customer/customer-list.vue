 

<template>
  
  <div>
    <h1 class="m-0 font-weight-bold">Customers</h1>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="customer in filtersearch" :key="customer.id">
                        <td> {{ customer.name }} </td>
                        <td>{{ customer.email }}</td>
                        <td>{{ customer.phone }}</td>
                        <td>{{ customer.address }}</td>
                        <td>
                            <router-link :to="{name: 'editCustomer', params:{id:customer.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            <router-link :to="{name: 'createOrder', params:{id:customer.id}}" class="btn btn-sm btn-primary">Create Order</router-link>
                            <router-link :to="{name: 'cusDetail', params:{id:customer.id}}" class="btn btn-sm btn-primary">View Activity</router-link>
                            <a @click="deleteCustomer(customer.id)" class="btn btn-sm btn-danger"><font color="#ffffff">Delete</font></a>
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
        this.allCustomer();
      }
    },
    data(){
      return{
        customers:[],
        searchTerm:''
      }
    },
    computed:{
      filtersearch(){
        return this.customers.filter(customer => {
            return customer.name.match(this.searchTerm)
        }) 
      }
    },
 
  methods:{
    allCustomer(){
      axios.get('/api/customer/')
      .then(({data}) => (this.customers = data))
      .catch()
    },
    deleteCustomer(id){
      axios.delete('api/customer/' + id)
      .then(()=>{
        this.customers = this.customers.filter(customer =>{
          return customer.id != id
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

</style>