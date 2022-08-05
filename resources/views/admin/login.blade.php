<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Login Form</title>
<!------ Include the above in your HEAD tag ---------->
<style>
.error{
    color:red;
}
body {
  margin: 0;
  padding: 0;

  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
</style>
</head>

<body>
    <div id="login">
        {{-- <h3 class="text-center text-black pt-5">Login form</h3> --}}
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form class="form" action="{{route('admin_authenticate')}}" method="post" id="form">
                        @csrf
                            <h3 class="text-center text-info">Login Form</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Username:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div> 
                            <div class="form-group">
                        <br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
                 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
                 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
                 <script>
                     if ($("#form").length > 0) {
                         $("#form").validate({
                             rules: {
                                 email: {
                                     required: true
                                 , }
                                 , password: {
                                     required: true
                                 , }
                            
                             , }
                             , messages: {
                                 email: {
                                     required: "Please enter email"
                                 , }
                                 , password: {
                                     required: "Please enter password"
                                 , }
                                
                             , } 
                         , })
                     }

                 </script>

</html>
