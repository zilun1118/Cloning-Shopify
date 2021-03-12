<template>
    
    <div>
        <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Customer</h1>
                  </div>
                  <form class="user" @submit.prevent="customerInsert" enctype="multipart/form-data" >
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
                      <button type="submit" class="btn btn-primary btn-block">Add Customer</button>
                    </div>
                  </form>
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
    
    export default{
      created(){
        if(!user.loggedIn()){
          this.$router.push({ name: '/'})
        }
      },
      data(){
        return{
          form:{
            name : null,
            email : null,
            phone : null,
            address : null,
          },
          errors:{}
        }
      },
      methods:{
        customerInsert(){
          axios.post('/api/customer',this.form)
          .then(()=>{
            this.$router.push({ name: 'AllCustomer'})
          })
          .catch(error => this.errors = error.response.data.errors)

        }
      }
      
    }



</script>



<style type="text/css>


</style>