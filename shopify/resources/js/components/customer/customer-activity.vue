  

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
                    <h1 class="h4 text-gray-900 mb-4"> Basic Information</h1>
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
                              <th>Total Spent</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td> {{ form.name }} </td>
                              <td>{{ form.email }}</td>
                              <td>{{ form.phone }}</td>
                              <td>{{ form.address }}</td>
                              <td>RM {{ form.totalSpent }}</td>
                            </tr>
                          
                          </tbody>
                        </table>
                      </div>
                      <div class="card-footer"></div>
                      </div>
                  <hr>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"> Purchase History</h1>
                  </div>
                  <div class="col-xl-8 col-lg-7 mb-4">
                  <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Customer Transactions</h6>
                    </div>
                    <div class="table-responsive">
                      <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th>Detail</th>
                            <th>FulFillment Status</th>
                            <th>Payment Status</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="order in allUserProduct" :key="order.id">
                            <td>{{order.Customer_Name}} purchased {{order.product_id}}</td>
                            <td v-if="order.Fulfillment == 'Fulfilled'"><span class="badge badge-success">{{order.Fulfillment}}</span></td>
                            <td v-if="order.Fulfillment == 'Unfulfilled'"><span class="badge badge-warning">{{order.Fulfillment}}</span></td>
                            <td v-if="order.Payment_status == 'Paid'"><span class="badge badge-success">{{order.Payment_status}}</span></td>
                            <td v-if="order.Payment_status == 'Unpaid'"><span class="badge badge-warning">{{order.Payment_status}}</span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer"></div>
                  </div>
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
      if (!User.loggedIn()) {
        this.$router.push({name: '/'})
      }
    },

    data(){
    return {
      form:{
        name: '',
        email: '',
        phone: '',
        address: '',
        totalSpent: null
        
      },
      errors:{},
      allOrders:[],
      allUserProduct:[]
    }
  },
  created(){
  	let id = this.$route.params.id
  	axios.get('/api/customer/'+id)
  	.then(({data}) => (this.form = data))
  	.catch(console.log('error'))

    axios.get('/api/make-order/')
    .then(({data}) => {
        this.allOrders=data;
        this.sortOrder();
        this.calculateTotal();
    })
    .catch()
    
    
  },

  methods:{
    updateCustomer(){
        let id = this.$route.params.id
        axios.patch('/api/customer/'+id,this.form)
        .then(() => {
            this.$router.push({ name: 'AllCustomer'})
        })
        .catch(error =>this.errors = error.response.data.errors)
        },
    sortOrder(){
        for(let i=0;i<this.allOrders.length;i++){
            if(this.allOrders[i].Customer_Name == this.form.name){
                this.allUserProduct.push(this.allOrders[i])
            }
        }
    },
    calculateTotal(){
        let k=0
        for(let i=0;i<this.allUserProduct.length;i++){
            k = k+ this.allUserProduct[i].product_Price
        }
        k = k.toFixed(2);
        this.form.totalSpent = k;

    }
  } 


  }
   
</script>


<style type="text/css">
  
</style>