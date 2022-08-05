 @extends('admin.layouts.layout')
 @section('title','Dashboard')
 @section('content')

 <!-- Main content -->

 <style>

 .error{
    color:red;
 }
 </style>
 <section class="content">
     <div class="container-fluid">
         <div class="row">
             <!-- left column -->
             <div class="col-md-6">
                 <!-- general form elements -->
                 <div class="card card-primary">
                     <div class="card-header">
                        
                       
                         <h3 class="card-title">Add Category</h3>

                     </div>
                  
                     <form action="{{route('save-form')}}" method="POST" enctype="multipart/form-data" id="form">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="category_name">Category</label>
                                 <input type="text" class="form-control" name="category_name">
                               
                             </div>
                             <div class="form-group">
                                 <label for="desc">Description</label>
                                 <textarea  type="text"   value="" class="form-control" name="description"  rows="5" cols="30"> </textarea>

                             </div>
                             <div class="form-group">
                                 <label for="image">Image</label>
                                 <div class="input-group">
                                     <div class="custom-file">
                                         <input type="file" name="image">
                                             <label for="image" class="error">
                                     </div>

                                 </div>
                        
                             </div>
                         </div>


                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary">ADD</button>

                         </div>
                     </form>
                 </div>



             </div>
             <!-- /.card-body -->
         </div>
         <!-- /.card -->
     </div>
     <!--/.col (right) -->

 </section>

 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
 <script>
     if ($("#form").length > 0) {
         $("#form").validate({
             rules: {
                 category_name: {
                     required: true
                 , }
                 , image: {
                     required: true
                 , }
                 , description: {
                     required: true
                 , }

             , }
             , messages: {
                 category_name: {
                     required: "Please enter category_name"
                 , }
               
                 , image: {
                     required: "Please select image"
                 , }
                   , description: {
                     required: "Please enter decription"
                 , }



             , }
         , })
     }

 </script>


 @endsection
