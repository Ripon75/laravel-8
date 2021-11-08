
@extends('layouts.index')

@section('content')

            <div class="card mt-3">

                <div class="row mt-2">
                    <div class="col-10 offset-1">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Create Category</h4>
                            <a href="{{route('categories.index')}}" class="btn btn-success btn-sm">All Category</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <form action="{{route('categories.store')}}" method="post">
                                 @csrf

                                <div class="form-group">
                                    <label for="category_name">Category name</label>
                                    <input type="text" class="form-control" name="category_name" placeholder="Enter Category Name" id="category_name">
                                    @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                  </div>

                                  <div class="mt-2">
                                      <button type="submit" class="btn btn-success btn-sm">Create</button>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection