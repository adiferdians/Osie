<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Page</title>
    <link href="{{ URL::asset('/assets/css/login.css') }}" rel="stylesheet">

    <!-- JQuery CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- Axios CDN-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Sweetalert CDN-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom styles for this template-->
</head>

<body>
    <div class="parent clearfix">
        <div class="bg-illustration">
            <img src="{{ URL::asset('/assets/img/logo.png') }}" alt="logo">
        </div>

        <div class="login">
            <div class="container">
                <h1>Welcome Back!</h1>
                <div class="login-form">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" placeholder="E-mail Address" value="admin">
                    <label for="password">Password</label>
                    <input type="password" id="password" placeholder="Password" value="sapiii" >
                    <button type="submit" id="submit">LOG-IN</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $('#submit').on('click', function(submit) {
        const email = $('#email').val();
        const password = $('#password').val();

        axios.post('/login', {
            email,
            password
        }).then(response => {
            console.log(response);
            if (response.data.OUT_STAT) {
                localStorage.setItem('token', response.data.token);
                Swal.fire({
                    text: response.data.MESSAGE,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1000,
                    customClass: {
                        icon: 'my-custom-icon-class'
                    }
                }).then((result) => {
                    window.location.href = "dashboard";
                })
            } else {
                Swal.fire({
                    text: response.data.MESSAGE,
                    position: 'top-end',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1000,
                    width: '400px',
                })
            }
        });
    });
</script>

</html>