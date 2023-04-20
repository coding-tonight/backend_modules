@extends('dashboard::layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Edit New Product</h5>
                <hr />
                <form class="form-body mt-4" action="{{ route('update.product') }}" method="post"
                    enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="id">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
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
                                    <img src="/upload/product/{{ $product->image }}" height="200"
                                        class="thumbnail img-thumbnail" alt="Thumbnail">
                                </div>
                                <!-- product details -->
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label img1">Product Images</label>
                                    <input id="image-uploadify" type="file"
                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                        onchange="previewFile1()" multiple name="image_one">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label img2">Product Images</label>
                                    <input id="image-uploadify" type="file"
                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                        onchange="previewFile2()" multiple name="image_two">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label img3">Product Images</label>
                                    <input id="image-uploadify" type="file"
                                        accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                        onchange="previewFile3()" multiple name="image_three">
                                </div>
                                <!-- product details -->
                                <div class="mb-3">
                                    <img src="{{ asset('no_image.jpg') }}" height="200"
                                        class="thumbnail1 img-thumbnail" alt="Thumbnail">
                                    <img src="{{ asset('no_image.jpg') }}" height="200"
                                        class="thumbnail2 img-thumbnail" alt="Thumbnail">
                                    <img src="{{ asset('no_image.jpg') }}" height="200"
                                        class="thumbnail3 img-thumbnail" alt="Thumbnail">
                                </div>
                                <div class="mb-3">
                                    @foreach($productDetail as $Detail)
                                        <label for="inputProductDescription" class="form-label">Description</label>
                                        @if($Detail->description != null)
                                            <textarea id="myeditorinstance"
                                                name="description">{{ $Detail->description }}</textarea>
                                        @else
                                            <textarea id="myeditorinstance" name="description"></textarea>
                                        @endif
                                    @endforeach
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Extra Field</label>
                                    <textarea id="myeditorinstance" name="extra_field"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Extra Field</label>
                                    <textarea id="myeditorinstance" name="extra_field_1"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Extra Field</label>
                                    <textarea id="myeditorinstance" name="extra_field_2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Wholesale Price</label>
                                        <input type="text" class="form-control" id="inputPrice" placeholder="00.00"
                                            name="wholesale_price" value="{{ $product->wholesale_price }}">
                                        @error('wholesale_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label">Retail Price</label>
                                        <input type="text" class="form-control" id="inputCompareatprice"
                                            placeholder="00.00" name="retail_price"
                                            value="{{ $product->retail_price }}">
                                        @error('retail_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCostPerPrice" class="form-label">Market Price</label>
                                        <input type="text" class="form-control" id="inputCostPerPrice"
                                            placeholder="00.00" name="market_price"
                                            value="{{ $product->market_price }}">
                                        @error('market_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Qauntity</label>
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="qty" value="{{ $product->qty }}">
                                        @error('qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- product detail -->
                                    @foreach($productDetail as $Detail)
                                        <div class="col-md-6">
                                            <label for="inputStarPoints" class="form-label">Height</label>
                                            @if($Detail->height != null)
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    placeholder="00.00" name="height" value="{{ $Detail->height }}">
                                            @else
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    placeholder="00.00" name="height" value="">
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputStarPoints" class="form-label">width</label>
                                            @if($Detail->width != null)
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    placeholder="00.00" name="width" value="{{ $Detail->width }}">
                                            @else
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    placeholder="00.00" name="width" value="">
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputStarPoints" class="form-label">color</label>
                                            @if($Detail->color != null)
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    placeholder="00.00" name="color" value="{{ $Detail->color }}">
                                            @else
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    placeholder="00.00" name="color" value="">
                                            @endif
                                            @error('color')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputStarPoints" class="form-label">Length</label>
                                            @if($Detail->length)
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    placeholder="00.00" name="length" value="{{ $Detail->length }}">
                                            @else
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    placeholder="00.00" name="length" value="">
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputStarPoints" class="form-label">Thread</label>
                                            @if($Detail->thread != null)
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    placeholder="00.00" name="thread" value="{{ $Detail->thread }}">
                                            @else
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    placeholder="00.00" name="thread" value="{{ $Detail->thread }}">
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputStarPoints" class="form-label">farbic/cloths</label>
                                            @if($Detail->farbic != null)
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    placeholder="00.00" name="farbic" value="{{ $Detail->farbic }}">
                                            @else
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    placeholder="00.00" name="farbic" value="{{ $Detail->farbic }}">
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputStarPoints" class="form-label">Zipper</label>
                                            @if($Detail->zipper != null)
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    name="zipper" value="{{ $Detail->zipper }}">
                                            @else
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    name="zipper" value="">
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputStarPoints" class="form-label">Tape</label>
                                            @if($Detail->tape != null)
                                                <input type="text" class="form-control" id="inputStarPoints" name="tape"
                                                    value="{{ $Detail->tape }}">
                                            @else
                                                <input type="text" class="form-control" id="inputStarPoints"
                                                    name="tape">
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <label for="inputProductType" class="form-label">Category</label>
                                            <select class="form-select" id="inputProductType" name="category_id">
                                                <option>Please select Category</option>
                                                @foreach($categories as $category)
                                                    @if(count($categories) > 0)
                                                        <option value="{{ $category->id }}"
                                                            {{ ($category->id == $product->category_id) ? 'selected': '' }}>
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
                                                    {{ $product->section == 'Feature' ? 'selected': '' }}>
                                                    Feature</option>
                                                <option value="New"
                                                    {{ $product->section == 'New' ? 'selected': '' }}>
                                                    New</option>
                                                <option value="Collection"
                                                    {{ $product->section == 'Collection' ? 'selected': '' }}>
                                                    Collection</option>
                                            </select>
                                            @error('section')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="inputProductTags" class="form-label">Material / Tofada</label>
                                            @if($Detail->tofada != null)
                                                <input type="text" class="form-control" id="inputProductTags"
                                                    placeholder="Enter Product Tags" name="tofada"
                                                    value="{{ $Detail->tofada }}">
                                            @else
                                                <input type="text" class="form-control" id="inputProductTags"
                                                    placeholder="Enter Product Tags" name="tofada" value="">
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
        var preview = document.querySelector('.thumbnail');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

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
        var preview = document.querySelector('.thumbnail1');
        var file = document.querySelector('.img1').files[0];
        var reader = new FileReader();

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
        var preview = document.querySelector('.thumbnail2');
        var file = document.querySelector('.img2]').files[0];
        var reader = new FileReader();

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
        var preview = document.querySelector('.thumbnail3');
        var file = document.querySelector('.img3').files[0];
        var reader = new FileReader();

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


<style lang="scss">
    .thumbnail {
        width: 300px;
        height: 300px;
    }

</style>
@endsection
