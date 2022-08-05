 @extends('web.layout.template')
 @section('title','main')
 @section('content')

 @push('css')


 <body class="goto-here">
     <div class="py-1 bg-black">
         <div class="container">
             <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                 <div class="col-lg-12 d-block">
                     <div class="row d-flex">
                         <div class="col-md pr-4 d-flex topper align-items-center">
                             <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                             <span class="text">+ 1235 2355 98</span>
                         </div>
                         <div class="col-md pr-4 d-flex topper align-items-center">
                             <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                             <span class="text">youremail@email.com</span>
                         </div>
                         <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                             <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="hero-wrap hero-bread" style="background-image: url('{{url('public/images/fff.jpg')}}');">
         <div class="container">
             <div class="row no-gutters slider-text align-items-center justify-content-center">
                 <div class="col-md-9 ftco-animate text-center">
                     <p class="breadcrumbs"><span class="mr-2"><a href="{{route('index')}}">Home</a></span> /<span>Checkout</span></p>
                     <h1 class="mb-0 bread">Checkout</h1>
                 </div>
             </div>
         </div>
     </div>
     <section class="ftco-section">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-xl-10 ftco-animate">
                     <form  class="billing-form" action="{{route('registration')}}" method="post" id="form">
                     @csrf
                       <center>  <h3 class="mb-4 billing-heading " >Register</h3></center>
                         <div class="row align-items-end">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="name">Firt Name</label>
                                     <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                      @error('name')<span class="spanclass" style="color:red;">{{ $message }}</span>@enderror
                                 </div>
                             </div>
                     
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="phone">Phone</label>
                                     <input type="text"  name="phone"class="form-control" placeholder="Enter Phone Number">
                                      @error('phone')<span class="spanclass" style="color:red;">{{ $message }}</span>@enderror
                                 </div>
                             </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="email">Email</label>
                                     <input type="email"  name="email"class="form-control" placeholder="Enter email">
                                      @error('email')<span class="spanclass" style="color:red;">{{ $message }}</span>@enderror
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="password">Password</label>
                                     <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                      @error('password')<span class="spanclass" style="color:red;">{{ $message }}</span>@enderror
                                 </div>
                             </div>
                        
                            
                             <input type="submit" name="submit" class="form-control"value="submit">
                             
                         </div>
                     </form><!-- END -->

                 </div>
             </div>
         </div> <!-- .col-md-8 -->
         </div>
         </div>
     </section> <!-- .section -->

     @endsection
     
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
 <script>
     if ($("#form").length > 0) {
         $("#form").validate({
             rules: {
                 name: {
                     required: true
                 , }
                 , phone: {
                     required: true
                 , }
                 , email: {
                     required: true
                 , }

             , }
             , messages: {
                 name: {
                     required: "Please enter category_name"
                 , }
               
                 , phone: {
                     required: "Please select image"
                 , }
                   , email: {
                     required: "Please enter decription"
                 , }



             , }
         , })
     }

 </script>
