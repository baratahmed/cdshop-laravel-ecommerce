@extends('cdshop.layouts.master')


@section('title')
CDSHOP | Product Details
@endsection


@section('content')

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop Details</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active">Shop Details </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach ($product->images as $key=>$image)
                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}"> <img class="d-block w-100" src="{{ asset($image->image)}}" alt="First slide"> </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="sr-only">Previous</span>
                </a>
                    <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                </a>
                    <ol class="carousel-indicators">
                        @foreach ($product->images as $key=>$image)
                        <li data-target="#carousel-example-1" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
                            <img class="d-block w-100 img-fluid" src="{{ asset($image->image)}}" alt="" />
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <h2>Product Name: {{ $product->product_name }}</h2>
                    <h5 id="getPrice">Product Price: ${{ $product->product_price }}</h5>
                    <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span>
                        <p>
                            <h4>Short Description:</h4>
                            <p>{{ $product->product_description }}</p>
                            <ul>
                                <li>
                                    <div class="form-group size-st">
                                        <label class="size-label">Size</label>
                                        <select id="selSize" class="selectpicker show-tick form-control">
                                            <option value="0">Size</option>

                                            @foreach ($product->attributes as $attribute)
                                                <option value="{{ $product->id }}-{{ $attribute->size }}">{{ $attribute->size }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group quantity-box">
                                        <label class="control-label">Quantity</label>
                                        <input class="form-control" value="0" min="0" max="20" type="number">
                                    </div>
                                </li>
                            </ul>

                            <div class="price-box-bar">
                                <div class="cart-and-bay-btn">
                                    <a class="btn hvr-hover" data-fancybox-close="" href="#">Add to cart</a>
                                </div>
                            </div>

                            <div class="add-to-btn">
                                <div class="add-comp">
                                    <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
                                    <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>
                                </div>
                                <div class="share-bar">
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                </div>
                            </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Featured Products</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
                <div class="featured-products-box owl-carousel owl-theme">
                    @foreach ($featured_products as $fproduct)
                    <div class="item">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <img src="{{ asset($fproduct->product_image)}}" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>{{ $fproduct->product_name }}</h4>
                                <h5> ${{ $fproduct->product_price }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->


@endsection
