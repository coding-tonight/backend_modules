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
                                    <th>subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>
                                            {{ $contact->subject }}
                                        </td>

                                        <td>
                                            {{ $contact->message }}
                                        </td>
                                        <td>
                                            <a href=""  class="ms-4"><i class="bx bxs-layer"></i></a>
                                            <a href="{{ route('delete.contact' , $contact->id) }}" id="delete" class="ms-4"><i class="bx bxs-trash"></i></a>
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
