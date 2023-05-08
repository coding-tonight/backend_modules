@extends('dashboard::layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div class="page-wrapper">
    <div class="page-content">
        <div class="card radius-10">
            <div class="card-body">
            <div class="d-flex align-items-center">
                    <div class="font-22 ms-auto">
                         <a href="{{ route('create.category') }}"><i class="bx bx-plus"></i>
                      Add Role</a>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>S.NO</th>
                                <th>Role</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $i ++ }}</td>
                                    <td>
                                      @if($role->role === 'Admin')
                                        <span class="badge badge-info">{{ $role->role }}</span>
                                      @elseif($role->role === 'Wholesale')  
                                      <span class="badge badge-secondary">{{ $role->role }}</span>
                                      @elseif($role->role === 'Retailer')
                                      <span class="badge badge-success">{{ $role->role }}</span>
                                      @else
                                      <span class="badge badge-dark">{{ $role->role }}</span>
                                      @endif
                                    </td>
                                    <td>
                                       No Permission
                                    </td>

                                    <td>
                                        <div class="d-flex order-actions"> <a href="" class=""><i
                                                    class="bx bxs-edit"></i></a>
                                            <a href="" id="delete" class="ms-4"><i class="bx bxs-trash"></i></a>
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
