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
                  
                     <form action="{{route('update',$editlist->id)}}" method="POST" enctype="multipart/form-data" id="form">
                         @csrf
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="category_name">Category</label>
                                    <input type="hidden" class="form-control" id="hidden_id" name="hidden_id" value="{{$editlist->id}}">
                                 <input type="text" class="form-control" name="category_name" value="{{$editlist->category_name}}">
                               
                             </div>
                             <div class="form-group">
                                 <label for="description">Description</label>
                                 <textarea  class="form-control" name="description">{{$editlist->description}}</textarea>
                        

                             </div>
                             <div class="form-group">
                                 <label for="image">Image</label>
                                 <div class="input-group">
                                     <div class="custom-file">
                                         <input type="file" name="image"  value="{{$editlist->image}}">
                                          <img src="{{url('public/'.$editlist->image)}}" height="80" width="80">
                                             <label for="image" class="error">
                                     </div>

                                 </div>
                        
                             </div>
                         </div>


                         <div class="card-footer">
                             <button type="submit" class="btn btn-primary">update</button>

                         </div>
                     </form>
                 </div>



             </div>
             <!-- /.card-body -->
         </div>
         <!-- /.card -->
     </div>

 </section>

 

 @endsection
