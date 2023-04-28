@extends('dashboard::layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="font-22 ms-auto">
                         <a href="{{ route('create.product') }}"><i class="bx bx-plus"></i>
                      Add Product</a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Item code</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Qty</th>
                                <th>wholesale Price</th>
                                <th>Retail Price</th>
                                <th>Market Price</th>
                                <th>Description</th>
                                <th>Category</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product_code}}</td>
                                <td><img src="/upload/product/{{ $product->image }}" alt="" width="100" height="100"></td>
                                <td>
                                    @if($product->product_name != null)
                                    {{ $product->product_name }}
                                      @else
                                       - 
                                     @endif
                                </td>
                                <td>
                                   @if($product->qty != null)
                                    {{ $product->qty }}
                                   @else 
                                    - 
                                  @endif
                                </td>
                                <td>
                                  @if($product->wholesale_price != null)
                                    {{ $product->wholesale_price }}
                                  @else 
                                   -
                                   @endif
                                </td>
                                <td>
                                  @if($product->retial_price != null)
                                    {{ $product->retail_price }}
                                  @else 
                                   - 
                                   @endif
                                </td>
                                <td>
                                   @if($product->market_price != null)
                                    {{ $product->market_price }}
                                   @else 
                                    -
                                    @endif
                                </td>
                                <td>
                                   @if($product->market_price != null)
                                    {{ $product->market_price }}
                                   @else 
                                    -
                                    @endif
                                </td>
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
