  

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
                    <h1 class="h4 text-gray-900 mb-4"> Edit Customer</h1>
                  </div>

                  <form class="user" @submit.prevent="updateCustomer" enctype="multipart/form-data" >
                    <div class="form-group">
                      <label>Customer Name</label>
                      <input type="text" class="form-control" placeholder="Customer Name" v-model="form.name">
                      <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" placeholder="Customer Email" v-model="form.email">
                      <small class="text-danger" v-if="errors.email">{{errors.email[0]}}</small>
                    </div>
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" class="form-control" placeholder="Customer phone number" v-model="form.phone">
                      <small class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</small>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control" placeholder="Customer Address" v-model="form.address">
                      <small class="text-danger" v-if="errors.address">{{errors.address[0]}}</small>
                    </div>
                  
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">update Customer</button>
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
        
      },
      errors:{}
    }
  },
  created(){
  	let id = this.$route.params.id
  	axios.get('/api/customer/'+id)
  	.then(({data}) => (this.form = data))
  	.catch(console.log('error'))

  },

  methods:{
  updateCustomer(){
  	  let id = this.$route.params.id
       axios.patch('/api/customer/'+id,this.form)
       .then(() => {
        this.$router.push('/customers')
       })
       .catch(error =>this.errors = error.response.data.errors)
     },
  } 


  }
   
</script>


<style type="text/css">
  
</style>