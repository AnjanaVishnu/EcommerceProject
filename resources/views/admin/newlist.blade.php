
 @extends('admin.layouts.layout')
 @section('title','Dashboard')
 @section('content')

 {{-- <button class="btn btn-sm btn-default text-danger rem_img" type="button" data-path=""><i class="fa fa-trash"></i></button>-----delete icon  --}}
<div class="container">
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-bordered user_datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
    
    @include('admin.layouts.datatable   ')
@include('admin.layouts.datatable')     
<script type="text/javascript">
  $(function () {
    var table = $('.user_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('newlist') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'category_name', name: 'category_name'},
            {data: 'description', name: 'description'},
            {data: 'image', name: 'image'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>
@endpush