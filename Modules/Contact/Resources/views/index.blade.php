@extends('dashboard::layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>S.NO</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $i=1 ?>
                            <tr>
                                <td>{{ $i ++ }}</td>
                                <td>-</td>
                                <td>
                                    -
                                </td>

                                <td>
                                   -
                                </td>
                                <td>
                                    <div class="d-flex order-actions"> <a href="" class=""><i
                                                class="bx bxs-edit"></i></a>
                                        <a href="" id="delete" class="ms-4"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
