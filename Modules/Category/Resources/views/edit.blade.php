@extends('dashboard::layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card border-top border-0 border-4 border-dark">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <h5 class="mb-0">edit category</h5>
                </div>
                <hr>
                <form class="row g-3" method="post" action="{{ route('update.category') }}" enctype="multipart/form-data">
                    @csrf
                     <input type="hidden" name="id" value="{{ $category->id }}" />
                    <div class="col-12">
                        <hr />
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-3 rounded">
                                    <div class="mb-3">
                                        <label class="form-label">Select Parent Category</label>
                                        <select class="single-select form-control border-start-0" name="parent">
                                        <option selected></option>
                                            @foreach($categories as $category)  
                                             @if($category->parent_category != null)
                                            <option value="{{ $category->parent_category->category_name }}">{{ $category->parent_category->category_name }}</option>
                                             @else
                                             <option value="">-</option>
                                             @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputEmailAddress" class="form-label">Category Name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-start-0"
                                                id="inputEmailAddress" placeholder="Enter Category Name" name="category_name"  value="{{ $category->category_name}}" />
                                        </div>
                                    </div>
                            
                                    <div class="col-12">
                                        <label for="inputAddress3" class="form-label">Image</label>
                                        <input id="fancy-file-upload" type="file" name="image" accept=".jpg, .png, image/jpeg, image/png" multiple />
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-dark px-5">Create</button>
                                    </div>
                                </div>
                            </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection