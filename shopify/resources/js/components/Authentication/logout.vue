<template>
    
    
</template>

<script type="text/javascript">
    export default{
        created(){
            // remove the loggedIn token so user is not loggedIn
            localStorage.removeItem('token')
            localStorage.removeItem('user')
            //push the user back to login page after logout
            this.$router.push({name:'/'})
        }
        
    }

</script>



<style type="text/css>


</style>