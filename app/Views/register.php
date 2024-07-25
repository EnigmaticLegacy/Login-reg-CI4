<div class="card-body py-5 px-md-5">

  <div class="row d-flex justify-content-center">
    <div class="col-lg-8">
      <h2 class="fw-bold mb-5">Sign up now</h2>
      <form class="register-form">

        <div data-mdb-input-init class="form-outline mb-4">
          <input type="text" id="name" name="name" class="form-control" required/>
          <label class="form-label" for="name">Name</label>
        </div>


        <div data-mdb-input-init class="form-outline mb-4">
          <input type="email" id="email" name="email" class="form-control" required/>
          <label class="form-label" for="email">Email address</label>
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
          <input type="text" id="phone" name="phone" class="form-control" required/>
          <label class="form-label" for="phone">Phone Number</label>
        </div>


        <div data-mdb-input-init class="form-outline mb-4">
          <input type="password" id="password" name="password" class="form-control" required/>
          <label class="form-label" for="password">Password</label>
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
          <input type="password" id="password2" name="password2" class="form-control" required/>
          <label class="form-label" for="password2">Confirm Password</label>
        </div>

        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
          Sign up
        </button>
      </form>
      <div class="text-center">
        <p>Already have an existing account? <a class="login-modal2" href="#">Login</a></p>
        </button>
      </div>
    </div>
  </div>
</div>
<script>
  $(".login-modal2").click(function(){
            $.ajax({
                url:"/login",
                type:"GET",
                success:function(res){
                    $(".modal-content").html(res);
                }
            })
        })
    $(".register-form").submit(function () {
      event.preventDefault()
      $("#AuthModal").modal('toggle')
      var data = $(".register-form").serialize()
      if(data["password"] == data["password2"]){
        $.ajax({
          url: "/register",
          type: "POST",
          data: data,
          success: function (res) {
            if (res == "success") {
              Swal.fire({
                icon: 'success',
                title: 'Register Success'
              })
              $.ajax({
                    url:"/content",
                    type:"GET",
                    success:function(resp){
                      var response = JSON.parse(resp);
                      $("#main_content").html(response.content)
                      $("#user").html(response.session_name)
                      $("#Dropdown").html(`<a class="dropdown-item logout-modal" data-toggle="modal" data-target="#AuthModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>`)
                      var temp = document.createElement("script")
                      temp.innerText = `$(".logout-modal").click(function(){
                          $.ajax({
                              url:"/logoutView",
                              type:"GET",
                              success:function(res){
                                  $(".modal-content").html(res);
                              }
                          })
                      })`
                      $("#Dropdown").append(temp)
                    }
                })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Please Check your credentials'
              })
            }
          }
        })
      }else{
        Swal.fire({
          icon: 'error',
          title: 'Please Check your credentials'
        })
      }
    
  })
</script>