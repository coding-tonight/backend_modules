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
                                <th>Carousel name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $i = 1 ?>
                            @foreach( $carousel as $slides)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="recent-product-img">
                                                <img src="/upload/carousel/{{ $slides->image }}" alt="" width="400" height="400">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-1 font-14">{{ $slides->title }}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                       
                                        -
                                    </td>
                                    <td> - </td>
                                    <td>
                                        <div class="d-flex order-actions"> <a
                                                href=""
                                                class=""><i class="bx bxs-edit"></i></a>
                                            <a href="{{ route('delete.carousel' , $slides->id , $slides->image) }}"
                                                id="delete" class="ms-4"><i class="bx bxs-trash"></i></a>
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
