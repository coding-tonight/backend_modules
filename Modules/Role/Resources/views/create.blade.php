@extends('dashboard::layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card border-top border-0 border-4 border-dark">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0">Add category</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="{{ route('add.category') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <hr />
                            <div class="card">
                                <div class="card-body">
                                    <div class="border p-3 rounded">
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Role Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control border-start-0"
                                                    id="inputEmailAddress" placeholder="Enter the role name"
                                                    name="category_name" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Permission</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control border-start-0"
                                                    id="inputEmailAddress" placeholder="" name="category_name" />
                                            </div>
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
