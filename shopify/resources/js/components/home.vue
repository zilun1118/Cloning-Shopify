<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Total Earnings -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Earnings</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">RM {{form.totalSales}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Total Customer -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Customer</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{form.totalCustomer}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                        <span>Since last years</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Transactions Table -->
            <div class="col-xl-8 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Transactions</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Item Ordered</th>
                        <th>FulFillment Status</th>
                        <th>Payment Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="product in allCustomerProducts" :key="product.id">
                        <td>{{product.id}}</td>
                        <td>{{product.Customer_Name}}</td>
                        <td>{{product.product_id}}</td>
                        <td v-if="product.Fulfillment == 'Fulfilled'"><span class="badge badge-success">{{product.Fulfillment}}</span></td>
                        <td v-if="product.Fulfillment == 'Unfulfilled'"><span class="badge badge-warning">{{product.Fulfillment}}</span></td>
                        <td v-if="product.Payment_status == 'Paid'"><span class="badge badge-success">{{product.Payment_status}}</span></td>
                        <td v-if="product.Payment_status == 'Unpaid'"><span class="badge badge-warning">{{product.Payment_status}}</span></td>
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
    return {
      form:{
        totalSales: null,
        totalCustomer : null
        
      },
      allCustomers:[],
      allCustomerProducts:[],
      orderCreatedTime:[]
    }
  },
  created(){

    axios.get('/api/make-order/')
    .then(({data}) => {
        this.allCustomerProducts=data;
        this.calculateTotal();
        console.log(this.allCustomerProducts)
    })
    .catch()

    axios.get('/api/customer/')
    .then(({data}) => {
        this.allCustomers=data;
        this.calculateTotalCustomer();
    })
    .catch()
    
    
  },

  methods:{
    calculateTotal(){
        let k=0
        for(let i=0;i<this.allCustomerProducts.length;i++){
            k = k+ this.allCustomerProducts[i].product_Price
        }
        k = k.toFixed(2);
        this.form.totalSales = k;

    },
    calculateTotalCustomer(){
      let c = 0
      for(let i =0;i<this.allCustomers.length;i++){
        c++;
      }
      this.form.totalCustomer = c;
    },
  } 


  }
   
</script>



<style type="text/css>


</style>