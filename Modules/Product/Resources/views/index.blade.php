@extends('dashboard::layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>wholesale Price</th>
                                <th>Retail Price</th>
                                <th>Market Price</th>
                                <th>Category</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product_code}}</td>
                                <td><img src="/upload/product/{{ $product->image }}" alt="" width="100" height="100"></td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>{{ $product->wholesale_price }}</td>
                                <td>{{ $product->retail_price }}</td>
                                <td>{{ $product->market_price }}</td>
                                <td>{{ $product->Getcategory->category_name }}</td>
                                <td>
                                <div class="d-flex order-actions"> <a href="{{ route('edit.product' , $product->id) }}" class=""><i
                                                class="bx bxs-edit"></i></a>
                                        <a href="{{ route('delete.product', $product->id)}}" id="deleteProduct" class="ms-4"><i class="bx bxs-trash"></i></a>
                                        <a href="" class="ms-4"><i class="bx bxs-view"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection
