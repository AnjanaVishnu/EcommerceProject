@extends('web.layout.template')
@section('title','main')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endpush
@section('content')


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


    <div class="hero-wrap hero-bread" style="background-image: url({{url('public/images/fff.jpg')}});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('index')}}">Home</a></span>/ <span>CART</span></p>
                    <h1 class="mb-0 bread">CART</h1>
                </div>
            </div>
        </div>
    </div>
    @php
    $grandTotal=0;
    @endphp
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">

                <div class="col-md-12 ftco-animate">

                    <center> <a href="{{url('clear/'.$client_id)}}" class="fa fa-trash">Clear Cart</a></center>
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach($cart as $value)
                                <tr class="text-center">


                                    <td class="image-prod">
                                        <div class="img" style="background-image:url('{{url('public/'.$value->product['img'])}}');"></div>
                                    </td>

                                    <td class="product-name">
                                        <h3>{{$value->product['product']}}</h3>

                                    </td>
                                    @php
                                    $prize=$value->product['prize'];
                                    $count=$value->count;
                                    $total=$prize * $count;
                                    $grandTotal+=$total;
                                    @endphp
                                    <td class="price">Rs.{{$value->product['prize']}}</td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity" class="quantity form-control input-number" value="{{$value->count}}" min="1" max="100">
                                        </div>
                                    </td>

                                    <td class="total">Rs.{{$total}}</td>
                                    <td><a href="{{url('/delete_product/'.$value->id)}}" class="fa fa-trash"></a></td>
                                </tr><!-- END TR-->

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>Rs.{{$grandTotal}}</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="{{route('processTransaction')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                    <div class="card-body text-center">
                        <form action="{{ route('razorpay.payment.store') }}" method="POST">
                            @csrf
                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="{{$grandTotal   }}" data-buttontext="Razor Pay" data-name="ItSolutionStuff.com" data-description="Rozerpay" data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png" data-prefill.name="name" data-prefill.email="email" data-theme.color="#ff7529">
                            </script>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        </div>
    </section>
    @endsection
