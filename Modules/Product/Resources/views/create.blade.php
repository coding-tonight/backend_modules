@extends('dashboard::layouts.app')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Product</h5>
                <hr />
                <form class="form-body mt-4" action="{{ route('add.product') }}" method="post"
                    enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="inputProductTitle"
                                        placeholder="Enter product title" name="product_name">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Code</label>
                                    <input type="text" class="form-control" id="inputProductTitle"
                                        placeholder="Enter Product Code" name="product_code">
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
                                    <img src="{{ asset('no_image.jpg') }}" height="200"
                                        class="thumbnail img-thumbnail thumbnail-img" alt="Thumbnail">
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
                                    <img src="{{ asset('no_image.jpg') }}" height="200"
                                        class="thumbnail1 img-thumbnail thumbnail-img" alt="Thumbnail1">
                                    <img src="{{ asset('no_image.jpg') }}"
                                        class="thumbnail2 img-thumbnail thumbnail-img" alt="">
                                    <img src="{{ asset('no_image.jpg') }}" height="200"
                                        class="thumbnail3 img-thumbnail thumbnail-img" alt="Thumbnail3">
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
                                                    <option value="{{ $category->id }}">
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
                                            <option value="Feature">Feature</option>
                                            <option value="New">New</option>
                                            <option value="Collection">Collection</option>
                                        </select>
                                        @error('section')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label">Wholesale Price</label>
                                        <input type="text" class="form-control" id="inputPrice" placeholder="00.00"
                                            name="wholesale_price">
                                        @error('wholesale_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label">Retail Price</label>
                                        <input type="text" class="form-control" id="inputCompareatprice"
                                            placeholder="00.00" name="retail_price">
                                        @error('retail_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCostPerPrice" class="form-label">Market Price</label>
                                        <input type="text" class="form-control" id="inputCostPerPrice"
                                            placeholder="00.00" name="market_price">
                                        @error('market_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Qauntity</label>
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="qty">
                                        @error('qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Height</label>
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="height">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">breadth</label>
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="width">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">color</label>
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="color">
                                        @error('color')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Length</label>
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="length">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Thread</label>
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="thread">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">farbic</label>
                                        <input type="text" class="form-control" id="inputStarPoints" placeholder="00.00"
                                            name="farbic">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Zipper</label>
                                        <input type="text" class="form-control" id="inputStarPoints" name="zipper">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputStarPoints" class="form-label">Tape</label>
                                        <input type="text" class="form-control" id="inputStarPoints" name="tape">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">foam</label>
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Inter Febric" name="extra_field_1">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">fiber</label>
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Inter Febric" name="extra_field_2">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">Inter Febric</label>
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Inter Febric" name="tofada">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">Runner</label>
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Runner" name="running">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputProductTags" class="form-label">Buckle</label>
                                        <input type="text" class="form-control" id="inputProductTags"
                                            placeholder="Enter Buckle" name="extra_field">
                                    </div>
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
