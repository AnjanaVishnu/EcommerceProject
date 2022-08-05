 @extends('admin.layouts.layout')
 @section('title','Dashboard')
 @section('content')
 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1>DataTables</h1>

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
                     {{-- {{dd($client)}} --}}
                     <!-- /.card-header -->
                     <div class="card-body">
                         <table id="example2" class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     {{-- <th>id</th> --}}
                                     <th>Client Name</th>
                                     <th>Product Name</th>
                                     <th>product Description</th>
                                     <th>product Image</th>
                                     <th>Count</th>
                                 </tr>
                             </thead>

                             <tbody>
                                 @foreach($cart as $value)
                                 <tr>
                                     <td>{{$value->client['name']}}</td>
                                     <td>{{$value->product['product']}}</td>
                                     <td>{{$value->product['desc']}}</td>
                                     <td><img src="{{url('public/'.$value->product['img'])}}" alt="" width="100px" height="100px"></td>
                                     <td>{{$value->count}}</td>
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
