@extends('layouts.index')

@section('content')

<div class="row">
    <div class="col-8 offset-2">
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Multiple Image</h4>
                <a href="{{route('brands.index')}}" class="btn btn-success btn-sm">All Image</a>
            </div>
            <div class="card-body">
                <form action="{{route('multiImage.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        {{-- multiple="" take multiple image --}}
                        <label for="image">Select Image</label>
                        <input type="file" class="form-control" name="image[]" id="image" multiple="">
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-info btn-sm">Add Image</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection