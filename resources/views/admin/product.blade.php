 @extends('admin.layouts.layout')
 @section('title','Dashboard')
 @section('content')
 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1>{{$category->category_name}}</h1>

             </div>
             <div class="col-sm-6">
                 {{-- <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">DataTables</li>
                 </ol> --}}
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>
 <section class="content">
     <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-header">
                         <h3 class="card-title"></h3>
                     </div>

                     <!-- /.card-header -->
                     <div class="card-body">
                         <table id="example2" class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     {{-- <th>id</th> --}}
                                     <th>Product Name</th>
                                     <th>Prize</th>
                                     <th>Description</th>
                                     <th>Stock</th>
                                     <th>image view</th>
                                     <th colspan="2">operation</th>
                                 </tr>
                             </thead>

                             <tbody>
                                 @foreach($product_list as $crud)
                                 {{-- dd($crud); --}}
                                 <tr>
                                     {{-- <td>{{$crud['id']}}</td> --}}

                                     <td>{{$crud['product']}}</td>
                                     <td>{{$crud['prize']}}</td>
                                     <td>{{$crud['desc']}}</td>
                                     <td>{{$crud['stock']}}</td>
                                     <td><img src="{{url('public/'.$crud->img)}}" alt="" width="80px" height="80px"></td>
                                     <td>

                                         <a href="{{route('edit_product',$crud->id)}}" class="btn btn-primary">Edit</a>
                                         <a href="{{route('delete_product',$crud->id)}}" class="btn btn-danger">Delete</a>

                                 </tr>
                                 @endforeach
                         </table>
                         </tbody>

                         </table>
                     </div>
                     <!-- /.card-body -->
                 </div>
                 <!-- /.card -->

           


                
      @endsection