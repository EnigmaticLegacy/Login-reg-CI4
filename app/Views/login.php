<div class="card-body min-vw-25 py-5 px-md-5">
  <div class="row d-flex justify-content-center">
    <div class="col-lg-8">
      <h2 class="fw-bold mb-5">Login</h2>
      <form class="login-form">

        <div data-mdb-input-init class="form-outline mb-4">
          <input type="email" id="email" name="email" class="form-control" required/>
          <label class="form-label" for="email">Email address</label>
        </div>


        <div data-mdb-input-init class="form-outline mb-4">
          <input type="password" id="password" name="password" class="form-control" required/>
          <label class="form-label" for="password">Password</label>
        </div>


        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4"
          id="login-submit" >
          Login
        </button>
      </form>
      <div class="text-center">
        <p>Not a member? <a href="#" class="register-modal">Register</a></p>
        </button>
      </div>
    </div>
  </div>
</div>
<script>
  $(".register-modal").click(function () {
    $.ajax({
      url: "/register",
      type: "GET",
      success: function (res) {
        $(".modal-content").html(res);
      }
    })
  })

  $(".login-form").submit(function () {
    event.preventDefault()
    $("#AuthModal").modal('toggle')
    $.ajax({
      url: "/login",
      type: "POST",
      data: $(".login-form").serialize(),
      success: function (res) {
        if (res == "success") {
          Swal.fire({
            icon: 'success',
            title: 'Login Success'
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
            title: 'Invalid Username or Password'
          })
        }
      }
    })
  })
</script>