 @extends('admin.layouts.layout')
 @section('title','Dashboard')
 @section('content')

 <!-- Main content -->
 <div class="container">
     <div class="card card-info">
         <div class="card-header">
             <h3 class="card-title"> Edit Product</h3>
         </div>

         <form action="{{route('product_update',$product_edit->id)}}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="card-body">
                 <div class="form-group row">
                     <label for="product" class="col-sm-2 col-form-label">Product Name</label>
                     <div class="col-sm-10">   
                      <input type="hidden" class="form-control" id="hidden_id" name="hidden_id" value="{{$product_edit->id}}">
                         <input type="text" name="product" class="form-control"value="{{$product_edit->product}}">
                     </div> @error('product')<span class="spanclass" style="color:red;">{{ $message }}</span>@enderror
                 </div>
                  <div class="form-group row">
                     <label for="prize" class="col-sm-2 col-form-label">Prize</label>
                     <div class="col-sm-10">   
                    
                         <input type="number" name="prize" class="form-control" value="{{$product_edit->prize}}">
                     </div> @error('product')<span class="spanclass" style="color:red;">{{ $message }}</span>@enderror
                 </div>

                 <div class="form-group row">
                     <label for="desc" class="col-sm-2 col-form-label">Description</label>
                     <div class="col-sm-10">
                         <textarea class="form-control" name="desc">{{$product_edit->desc}}</textarea>
                         @error('desc')<span class="spanclass" style="color:red;">{{ $message }}</span>@enderror
                     </div>
                 </div>
             </div>
             <div class="card-body">
                 <div class="form-group row">
                     <label for="img" class="col-sm-2 col-form-label">Image</label>
                     <div class="col-sm-10">
                         <input type="file" name="img" value="{{$product_edit->img}}">
                          <img src="{{url('public/'.$product_edit->img)}}" height="80" width="80">
                     </div> @error('img')<span class="spanclass" style="color:red;">{{ $message }}</span>@enderror
                 </div>
                 <div class="form-group row">
                     <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                     <div class="col-sm-10">
                         <input type="number" name="stock" class="form-control" value="{{$product_edit->stock}}"> 
                     </div>
                 </div>
             </div>
                 <!-- /.card-body -->
                 <div class="card-footer">

                     <button type="submit" class="btn btn-primary">Update</button>

                 </div>
                 <!-- /.card-footer -->
         </form>
     </div>
     <!-- /.card -->

 </div>
 </div>

 @endsection
