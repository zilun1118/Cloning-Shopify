  

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
                    <h1 class="h4 text-gray-900 mb-4">Customer Order</h1>
                  </div>

                  <form class="user" @submit.prevent="createOrder" enctype="multipart/form-data" >
                    <div class="form-group">
                      <label>Customer Name</label>
                      <input type="text" class="form-control" placeholder="Customer Name" v-model="form.Customer_Name">
                      
                    </div>
                    <br>
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Order Detail</h1>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Product Name</label>
                        <select class="form-control" id="exampleFormControlSelect1" placeholder="Please Select: " @change="onChange()" v-model="form.product_id">
                          <option v-bind:key="product.id" v-for="product in products">{{ product.Title }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Product Price</label>
                      <input type="text" class="form-control" placeholder="Price" v-model="form.product_Price">
                      <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Payment Status</label>
                        <select class="form-control" id="exampleFormControlSelect1" v-model="form.Payment_status">
                          <option>Paid</option>
                          <option>Unpaid</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Fulfillment status</label>
                        <select class="form-control" id="exampleFormControlSelect1" v-model="form.Fulfillment">
                          <option>Fulfilled</option>
                          <option>Unfulfilled</option>
                        </select>
                    </div>



                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Create Order</button>
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
        axios.get('/api/customer/'+id)
        .then(({data}) => (this.form.Customer_Name = data.name))
        .catch(console.log('error'))

        axios.get('/api/product/')
        .then(({data}) => (this.products = data))

      }
    },

    data(){
    return {
      form:{
        Customer_Name: '',
        product_id: null,
        product_Price: '',
        Payment_status: null,
        Fulfillment: null
        
      },
      errors:{},
      products:{},
      customer:{}
    }
  },

  methods:{
    createOrder(){
        axios.post('/api/make-order/',this.form)
        .then(() => {
          this.$router.push({ name: 'AllOrders'})
        })
        .catch(error =>this.errors = error.response.data.errors)



      },
    onChange(){
      let curProd = this.form.product_id
      for(let i = 0;i<this.products.length;i++){
        if(curProd == this.products[i].Title){
          this.form.product_Price = this.products[i].price
        }
      }
    }
  } 


  }
   
</script>


<style type="text/css">
  
</style>