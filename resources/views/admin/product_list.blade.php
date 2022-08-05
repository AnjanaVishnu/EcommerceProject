

 @extends('admin.layouts.layout')
 @section('title','Dashboard')
 @section('content')

    <div class="container">
        <div class="row">
          
            <div class="col-12 table-responsive">
                <table class="table table-bordered user_datatable" id="mytable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Prize</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th>image </th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <input type="hidden" value="{{route('product_list',$id)}}" id="ajax_list">

@endsection

@push('js')
    

<script type="text/javascript">
    var route = $('#ajax_list').val()
    $(function() {
        var table = $('.user_datatable').DataTable({
               
             serverSide: true
            , ajax: route
            , columns: [{
                    data: 'id'
                    , name: 'id'
                }
                , {
                    data: 'product'
                    , name: 'product'
                }
                , {
                    data: 'prize'
                    , name: 'prize'
                }
                , {
                    data: 'desc'
                    , name: 'desc'       
                }

                , {
                    data: 'stock'
                    , name: 'stock'
                }

                , {
                    data: 'img'
                    , name: 'img'
                }      
                , {
                    data: 'action'
                    , name: 'action'
                    , orderable: false
                    , searchable: false
                }
            , ]
        });
    });

</script>
  <script>
        $(document).ready(function() {
            $('#mytable thead tr').clone(true).appendTo( '#mytable thead' );
            $('#mytable thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder=" Search " />' );

                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                });
            });

            var table = $('#mytable').DataTable( {
                orderCellsTop: true,
                fixedHeader: true
            });
        });
    </script>
@endpush    