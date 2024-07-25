<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
<div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" id="logout_btn" href="#">Logout</a>
</div>
<script>
    $("#logout_btn").click(function () {
        $("#AuthModal").modal('toggle')
        $.ajax({
            url: "/logout",
            type: "GET",
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Logout Success'
                })
                $("#main_content").html("<h5>Please Login to see dashboard by clicking the Guest on Top Right corner</h5>")
                $("#user").html("Guest")
                $("#Dropdown").html(`<a class="dropdown-item login-modal" data-toggle="modal" data-target="#AuthModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Login
                        </a>`)
                var temp = document.createElement("script")
                temp.innerText = `$(".login-modal").click(function () {
                                $.ajax({
                                    url: "/login",
                                    type: "GET",
                                    success: function (res) {
                                        $(".modal-content").html(res);
                                    }
                                })
                            })`
                $("#Dropdown").append(temp)
            }
        })
    })
</script>