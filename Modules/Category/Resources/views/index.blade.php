@extends('dashboard::layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>S.NO</th>
                                <th>Category name</th>
                                <th>Parent</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $categories as $category)
                            <tr>
                                <td>{{ $category->id}}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="recent-product-img">
                                            <img src="{{ $category->image}}" alt="">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-1 font-14">{{ $category->category_name }}</h6>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    @if($category->parent_category != null)
                                    {{ $category->parent_category->category_name }}
                                    @else
                                     -
                                     @endif
                                </td>
                                <td>
                                    <div class="d-flex order-actions"> <a href="{{ route('edit.category' , $category->id)}}" class=""><i
                                                class="bx bxs-edit"></i></a>
                                        <a href="{{ route('delete.category' , $category->id )}}" class="ms-4"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
