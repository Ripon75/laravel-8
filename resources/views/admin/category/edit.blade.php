
@extends('layouts.index')

@section('content')

            <div class="card mt-3">

                <div class="row mt-2">
                    <div class="col-10 offset-1">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>Edit Category</h4>
                            <a href="{{route('categories.index')}}" class="btn btn-success btn-sm">All Category</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <form action="{{route('categories.update', $category->id)}}" method="post">
                                 @csrf
                                 @method('PUT')

                                <div class="form-group">
                                    <label for="category_name">Category name</label>
                                    <input type="text" class="form-control mt-2" name="category_name" placeholder="Enter Category Name" id="category_name" value="{{$category->category_name}}">
                                    @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                  </div>

                                  <div class="mt-2">
                                      <button type="submit" class="btn btn-success btn-sm">Update</button>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection