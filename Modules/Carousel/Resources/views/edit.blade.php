@extends('dashboard::layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card border-top border-0 border-4 border-dark">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0">Edit Carousel</h5>
                    </div>
                    <hr>
                    <form class="row g-3" method="post" action="{{ route('update.carousel') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <hr />
                            <div class="card">
                                <div class="card-body">
                                    <div class="border p-3 rounded">
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Title</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control border-start-0"
                                                    id="inputEmailAddress" placeholder="Enter carousel Title"
                                                    value="{{ $slide->title }}" name="title" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Description</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control border-start-0"
                                                    id="inputEmailAddress" placeholder="Enter description"
                                                    value="{{ $slide->description }}" name="description" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress3" class="form-label">Image</label>
                                            <input id="fancy-file-upload" type="file" name="image"
                                                onchange="previewFile()" accept=".jpg, .png, image/jpeg, image/png"
                                                multiple />
                                        </div>

                                        <div class="col-12 mb-2">
                                            @if ($slide->image !== null)
                                                <img src="/upload/carousel/{{ $slide->image }}" height="200" width="200"
                                                    class="thumbnail" alt="Thumbnail">
                                            @else
                                                <img src="{{ asset('no_image.jpg')}}" height="200" width="200"
                                                    class="thumbnail" alt="Thumbnail">
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-dark px-5">Edit</button>
                                            <button type="submit" class="btn btn-dark px-5"><a href="{{ route('all.carousel') }}" class="text-white">Back</a></button>
                                        </div>
                                    </div>
                                </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewFile() {
            var preview = document.querySelector('.thumbnail');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>
@endsection
