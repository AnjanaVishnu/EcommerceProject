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


    <div class="hero-wrap hero-bread" style="background-image: url('{{url('public/images/fff.jpg')}}');height:500px;">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('index')}}">Home</a></span>/<span>Shop</span></p>
                    <h1 class="mb-0 bread">Shop</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="row">
                        @foreach($product as $crud)
                        <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                            <div class="product d-flex flex-column">
                               
                                <a     href="" data-cartId="{{$crud['id']}}" class="img-prod checkTest"><img class="img-fluid" src="{{url('public/'.$crud->img)}}" alt="Colorlib Template"></a>
                                    <form action="single_page" method="post" name="productTest_{{$crud['id']}}">@csrf<input type="hidden" name="cartId" value="{{$crud['id']}}"></form>


                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3">
                                    <div class="d-flex">
                                        <div class="cat">
                                            <span>{{$crud->category['category_name']}}</span>
                                        </div>
                                        <div class="rating">

                                        </div>
                                    </div>
                                    <h3><a href="#">{{$crud->product}}</a></h3>
                                    <div class="pricing">
                                        <p class="price"><span>{{$crud->prize}}</span></p>
                                    </div>
                                    <p class="bottom-area d-flex px-3">
                                        <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                                        <a href="#" class="buy-now text-center py-2">Buy now<span><i class="ion-ios-cart ml-1"></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        @endforeach


                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            {{-- <div class="block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2">
                    <div class="sidebar">
                        <div class="sidebar-box-2">
                            <a href="{{route('shop')}}">
                                <h2 class="heading">All</h2>
                            </a>
                            <div class="fancy-collapse-panel">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    @foreach($category as $value)


                                    <div class="panel panel-default">

                                        <a href="{{route('shop_product',$value->id)}}" style="color:black;">{{$value['category_name']}}
                                        </a>


                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">

                                            </div>
                                        </div>
                                    </div>

                                    @endforeach


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    @endsection
    @push('scripts')
    <script>
        $('.checkTest').on('click', function(e) {
            e.preventDefault();
            var cartId = $(this).data('cartid');
            $('form[name=productTest_' + cartId).submit();
        })

    </script>

    @endpush
