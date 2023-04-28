@extends('dashboard::layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit Product</h5>
                <hr />
                <form class="form-body mt-4" action="{{ route('update.product') }}" method="post"
                    enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <input type="hidden" id="{{ $product->id }}" value="{{ $product->id }}">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="inputProductTitle"
                                        placeholder="Enter product title" name="product_name"
                                        value="{{ $product->product_name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Code</label>
                                    <input type="text" class="form-control" id="inputProductTitle"
                                        placeholder="Enter Product Code" name="product_code"
                                        value="{{ $product->product_code }}">
                                    @error('product_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Product Images</label>
                                    <input id="image-uploadify" type="file"
                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                        onchange="previewFile()" multiple name="image">
                                </div>
                                <div class="mb-3">
                                    @if($product->image != null)
                                        <img src="uploads/product/{{ $product->image }}" height="200"
                                            class="thumbnail img-thumbnail thumbnail-img" alt="Thumbnail">
                                    @else
                                        <img src="{{ asset('no_image.jpg') }}" height="200"
                                            class="thumbnail img-thumbnail thumbnail-img" alt="Thumbnail">
                                    @endif
                                </div>
                                <!-- product details -->
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Product Images</label>
                                    <input id="image-uploadify" class="img1" type="file"
                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                        onchange="previewFile1()" multiple name="image_one">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Product Images</label>
                                    <input id="image-uploadify" class="img2" type="file"
                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                        onchange="previewFile2()" multiple name="image_two">
                                </div>

                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Product Images</label>
                                    <input id="image-uploadify" type="file" class="img3"
                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                        onchange="previewFile3()" multiple name="image_three">
                                </div>
                                <!-- product details -->
                                <div class="mb-3">
                     @foreach($productDetail as $detail)

                                        @if($detail->image_one != null)
                                            <img src="uploads/product/{{ $detail->image_one }}" height="200"
                                                class="thumbnail1 img-thumbnail thumbnail-img" alt="Thumbnail1">
                                        @else
                                            <img src="{{ asset('no_image.jpg') }}" height="200"
                                                class="thumbnail1 img-thumbnail thumbnail-img" alt="Thumbnail1">
                                        @endif

                                        @if($detail->image_two != null)
                                            <img src="uploads/product/{{ $product->image_two }}"
                                                class="thumbnail2 img-thumbnail thumbnail-img" alt="">
                                        @else
                                            <img src="{{ asset('no_image.jpg') }}"
                                                class="thumbnail2 img-thumbnail thumbnail-img" alt="">
                                        @endif

                                        @if($detail->image_three != null)
                                            <img src="uploads/product/{{ $product->image_three }}" height="200"
                                                class="thumbnail3 img-thumbnail thumbnail-img" alt="Thumbnail3">
                                        @else
                                            <img src="{{ asset('no_image.jpg') }}" height="200"
                                                class="thumbnail3 img-thumbnail thumbnail-img" alt="Thumbnail3">
                                        @endif

                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Description</label>
                                    <textarea id="myeditorinstance" name="description"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="inputProductType" class="form-label">Category</label>
                                        <select class="form-select" id="inputProductType" name="category_id">
                                            <option>Please select Category</option>
                                            @foreach($categories as $category)
                                                @if(count($categories) > 0)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id === $product->category_id ? 'selected': '' }}>
                                                        {{ $category->category_name }}</option>
                                                @else
                                                    <option value="">-</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label">Section</label>
                                        <select class="form-select" id="inputCollection" name="section">
                                            <option></option>
                                            <option value="Feature"
                                                {{ $product->section === "Feature" ? 'selected':'' }}>
                                                Feature</option>
                                            <option value="New"
                                                {{ $product->section === "New" ? "selected": ' ' }}>
                                                New</option>
                                            <option value="Collection"
                                                {{ $product->section === "Collection" ? 'selected': '' }}>
                                                Collection</option>
                                        </select>
                                        @error('section')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Wholesale Price</label>
                                        @if($detail->wholesale_price != null)
                                        <input type="text" class="form-control" id="inputPrice" placeholder="00.00"
                                            name="wholesale_price" value="{{ $product->wholesale_price }}">
                                        @else 
                                        <input type="text" class="form-control" id="inputPrice" placeholder="00.00"
                                            name="wholesale_price">
                                        @endif
                                        @error('wholesale_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label">Retail Price</label>
                                        @if($detail->retail_price != null)
                                        <input type="text" class="form-control" id="inputCompareatprice"
                                            placeholder="00.00" name="retail_price" value="{{$detail->retail_price}}">
                                        @else 
                                        <input type="text" class="form-control" id="inputCompareatprice"
                                            placeholder="00.00" name="retail_price">
                                        @endif

                                        @error('retail_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCostPerPrice" class="form-label">Market Price</label>
                                        @if($detail->market_price != null)
                                        <input type="text" class="form-control" id="inputCostPerPrice"
                                            placeholder="00.00" name="market_price" value="{{$detail->market_price}}">
                                        @else
                                        <input type="text" class="form-control" id="inputCostPerPrice"
                                            placeholder="00.00" name="market_price">
                                        @endif
                                        @error('market_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Qauntity</label>
                                        @if($detail->qty != null)
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="qty" value="{{$detail->qty}}">
                                        @else 
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="qty">
                                        @endif
                                        @error('qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Height</label>
                                        @if($detail->height != null)
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="height">
                                        @else 
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="height">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Length</label>
                                         @if($detail->length != null)
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="length" value="{{ $detail->length }}">
                                        @else 
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="length">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">breadth</label>
                                        @if($detail->width != null)
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="width" value="{{ $detail->width }}">
                                        @else 
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="width">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">color</label>
                                        @if($detail->color != null)
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="color">
                                        @else 
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="color">
                                        @endif

                                        @error('color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Thread</label>
                                        @if($detail->thread != null)
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="thread" value="{{$detail->thread}}">
                                        @else 
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="thread">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">farbic</label>
                                        @if($detail->farbic != null)
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="farbic" value="{{$detail->farbic}}">
                                        @else 
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="farbic">
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Zipper</label>
                                         @if($detail->zipper != null)
                                        <input type="text" class="form-control" id="inputStarPoints" name="zipper" value="{{$detail->zipper}}">
                                         @else 
                                         <input type="text" class="form-control" id="inputStarPoints" name="zipper">
                                         @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Tape</label>
                                        @if($detail->tape != null)
                                        <input type="text" class="form-control" id="inputStarPoints" name="tape" value="{{ $detail->tape}}">
                                        @else 
                                        <input type="text" class="form-control" id="inputStarPoints" name="tape">
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">foam</label>
                                        @if($detail->extra_field_1 != null)
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Inter Febric" name="extra_field_1">
                                        @else 
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Inter Febric" name="extra_field_1" value="{{ $detail->extra_field_1}}">
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">fiber</label>
                                        @if($detail->extra_field_2 != null) 
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Inter Febric" name="extra_field_2" value="{{ $detail->extra_field_2 }}">
                                        @else
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Inter Febric" name="extra_field_2">
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">Inter Febric</label> 
                                        @if($detail->tofada != null)
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Inter Febric" name="tofada" value="{{ $detail->tofada }}">
                                        @else
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Inter Febric" name="tofada" value>
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">Runner</label>
                                        @if($detail->running != null)
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Runner" name="running" value="{{$detail->running}}">
                                        @else 
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Runner" name="running">
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">Buckle</label>
                                        @if($detail->extra_field != null)
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Buckle" name="extra_field">
                                        @else
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Buckle" name="extra_field">
                                        @endif
                                    </div>
                     @endforeach
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Save Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </form>
            </div>
        </div>

    </div>
</div>
<!--  script for thumbnail -->
<script>
    function previewFile() {
        let preview = document.querySelector('.thumbnail');
        let file = document.querySelector('input[type=file]').files[0];
        let reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    function previewFile1() {
        let preview = document.querySelector('.thumbnail1');
        let file = document.querySelector('.img1').files[0];
        let reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    function previewFile2() {
        let preview = document.querySelector('.thumbnail2');
        let file = document.querySelector('.img2').files[0];
        let reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    function previewFile3() {
        let preview = document.querySelector('.thumbnail3');
        let file = document.querySelector('.img3').files[0];
        let reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

</script>


<!-- end -->

<style lang="scss">
    .thumbnail-img {
        width: 300px;
        height: 300px;
    }

</style>
@endsection
