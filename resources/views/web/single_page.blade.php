@extends('web.layout.template')
@section('title','main')
@section('content')

@push('css')
@endpush
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
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{route('index')}}">Home</a></span>/ <span>Shop</span></p>
                    <h1 class="mb-0 bread">Shop</h1>
                </div>
            </div>
        </div>
    </div>
    @php
    $id=$product->id;
    $stock=$product->stock;
    @endphp

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <input type="hidden" value="{{$product->id}}" id="product_id">
                    <a href="{{url('public/'.$product->img)}}" class="image-popup prod-img-bg"><img src="{{url('public/'.$product->img)}}" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{$product->product}}</h3>
                    <div class="rating d-flex">


                    </div>
                    <p class="price"><span>Rs.{{$product->prize}}</span></p>

                    <p>{{$product->desc}}
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>

                                </div>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="ion-ios-remove"></i>
                                </button>
                            </span>

                            <input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="{{$stock}}">

                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                            </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12"> 
                         
                            <p style="color: #000;">{{$product->available_stock}} Piece available</p>

                        </div>
                    </div>
                    <p><a href="" id="cart" class="btn btn-black py-3 px-5 mr-2">Add to Cart</a>
                        <a href="cart.html" class="btn btn-primary py-3 px-5">Buy now</a></p>
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>

                        <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Manufacturer</a>

                        <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>

                    </div>
                </div>
                <div class="col-md-12 tab-wrap">

                    <div class="tab-content bg-light" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                            <div class="p-4">
                                <h3 class="mb-4">Nike Free RN 2019 iD</h3>
                                <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn???t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                            <div class="p-4">
                                <h3 class="mb-4">Manufactured By Nike</h3>
                                <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn???t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                            <div class="row p-4">
                                <div class="col-md-7">
                                    <h3 class="mb-4">23 Reviews</h3>
                                    <div class="review">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                </span>
                                                <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                </span>
                                                <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                        <div class="desc">
                                            <h4>
                                                <span class="text-left">Jacob Webb</span>
                                                <span class="text-right">14 March 2018</span>
                                            </h4>
                                            <p class="star">
                                                <span>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                    <i class="ion-ios-star-outline"></i>
                                                </span>
                                                <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                            </p>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="rating-wrap">
                                        <h3 class="mb-4">Give a Review</h3>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                (98%)
                                            </span>
                                            <span>20 Reviews</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                (85%)
                                            </span>
                                            <span>10 Reviews</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                (98%)
                                            </span>
                                            <span>5 Reviews</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                (98%)
                                            </span>
                                            <span>0 Reviews</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                <i class="ion-ios-star-outline"></i>
                                                (98%)
                                            </span>
                                            <span>0 Reviews</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection

    @push('js')
    <script>
        $(document).ready(function() {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });

    </script>
    <script>
        $("#cart").click(function(e) {
            e.preventDefault();

            var count = $('#quantity').val();
            var id = $("#product_id").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            , });
            $.ajax({
                type: "POST"
                , url: "{{url('add_cart')}}"
                , data: {
                    "status": count
                    , "count": count
                    , "product_id": id
                },

                success: function(result) {
                    var result = JSON.parse(result);
                    if (result.status) {
                        location.href = "{{route('cart')}}";
                    } else {
                        alert(result.message);
                    }
                }

            });
        });

    </script>
    @endpush
