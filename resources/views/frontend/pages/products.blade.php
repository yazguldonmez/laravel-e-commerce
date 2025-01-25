@extends('frontend.layout.layout')

@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('page.home.index') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Shop</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-9 order-2">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4">
                                <h2 class="text-black h5">Shop All</h2>
                            </div>
                            <div class="d-flex">
                                <div class="dropdown mr-1 ml-md-auto">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Latest
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        @if (!empty($categories) && $categories->count() > 0)
                                            @foreach ($categories->where('cat_ust', null) as $category)
                                                <a class="dropdown-item"
                                                    href="{{ route($category->slug . '.clothing') }}">{{ $category->name }}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <a class="dropdown-item" href="#" data-order="order_by_a_z">Name, A to Z</a>
                                        <a class="dropdown-item" href="#" data-order="order_by_z_a">Name, Z to A</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" data-order="order_by_min_price">Price, low
                                            to high</a>
                                        <a class="dropdown-item" href="#" data-order="order_by_max_price">Price, high
                                            to low</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        @if (!empty($products) && $products->count() > 0)
                            @foreach ($products as $product)
                                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                    <div class="block-4 text-center border">
                                        <figure class="block-4-image">
                                            <a href="{{ route('product.detail', $product->slug) }}"><img
                                                    src="{{ asset($product->image) }}" alt="Image placeholder"
                                                    class="img-fluid"></a>
                                        </figure>
                                        <div class="block-4-text p-4">
                                            <h3><a
                                                    href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                                            </h3>
                                            <p class="mb-0">{{ $product->short_description }}</p>
                                            <p class="text-primary font-weight-bold">{{ $product->price . '$' }}</p>
                                            <p><a href="#" class="buy-now btn btn-sm btn-primary">Add to Cart</a></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row" data-aos="fade-up">
                        {{ $products->links('pagination::bootstrap-4') }}
                        {{-- <div class="col-md-12 text-center">
                            <div class="site-block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                        <ul class="list-unstyled mb-0">
                            @if (!empty($categories) && $categories->count() > 0)
                                @foreach ($categories->where('cat_ust', null) as $category)
                                    <li class="mb-1">
                                        <a class="d-flex" href="{{ route($category->slug . '.clothing') }}">
                                            <span>{{ $category->name }}</span>
                                            <span class="text-black ml-auto">({{ $category->items_count }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    <div class="border p-4 rounded mb-4">
                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                            <div id="slider-range" class="border-primary"></div>
                            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white"
                                disabled="" />
                        </div>

                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                            @if (!empty($sizeLists) && count($sizeLists) > 0)
                                @foreach ($sizeLists as $sizeList)
                                    <label for="s_sm" class="d-flex">
                                        <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span
                                            class="text-black">{{ $sizeList }}
                                        </span>
                                    </label>
                                @endforeach
                            @endif
                        </div>

                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
                            @if (!empty($colors) && count($colors) > 0)
                                @foreach ($colors as $color)
                                    <a href="#" class="d-flex color-item align-items-center">
                                        <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span
                                            class="text-black">{{ $color }}</span>
                                    </a>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="site-section site-blocks-2">
                        <div class="row justify-content-center text-center mb-5">
                            <div class="col-md-7 site-section-heading pt-4">
                                <h2>Categories</h2>
                            </div>
                        </div>
                        <div class="row">
                            @if (!empty($categories))
                                @foreach ($categories->where('cat_ust', null) as $category)
                                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade"
                                        data-aos-delay="">
                                        <a class="block-2-item" href="{{ route($category->slug . '.clothing') }}">
                                            <figure class="image">
                                                <img src="{{ asset($category->image) }}"
                                                    alt="{{ strtolower($category->name) . ' category image' }}"
                                                    class="img-fluid">
                                            </figure>
                                            <div class="text">
                                                <span class="text-uppercase">Collections</span>
                                                <h3>{{ $category->name }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
    <script>
        var minPrice = {{ $minPrice }}
        var maxPrice = {{ $maxPrice }}
    </script>
@endsection()
