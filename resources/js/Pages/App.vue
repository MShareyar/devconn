<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header"> Dashboard</div>

          <div class="card-body">
            <div class="alert alert-success" role="alert">
              <!-- {{ session("status") }} -->
            </div>

            Welcome {{ user.email }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>4


<script>
export default {
  props:{
    user:Object
  },
  mounted(){
    console.log(this.user)
  }
}
</script>