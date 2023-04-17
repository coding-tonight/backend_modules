@extends('auth::layouts.app')

@section('content')
<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-body">
                                @if(Session::has('error'))
                                    <p class="text-danger">{{ Session::get('error') }}</p>
                                @endif
                                <form class="row g-3" method="post" action="{{ route('adminlogin') }}">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputEmailAddress" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="inputEmailAddress"
                                            placeholder="Username" name="username">
                                        @error('username')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputChoosePassword" class="form-label">Password</label>
                                        <div class="input-group" id="show_hide_password">
                                            <input type="password" class="form-control border-end-0"
                                                id="inputChoosePassword" name="password" placeholder="Password"> <a
                                                href="javascript:;" class="input-group-text bg-transparent"><i
                                                    class='bx bx-hide'></i></a>
                                        </div>
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="bx bxs-lock-open"></i>Sign in</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
</div>
@endsection
