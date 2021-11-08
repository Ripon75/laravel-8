<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <div class="container">
            All Category

            <a href="{{route('categories.create')}}" style="float: right" class="btn btn-success btn-sm">Create Category</a>
            
          </div>
        </h2>
    </x-slot>

    {{-- category create message --}}
    @if (session('message'))
     <div class="row mt-3">
       <div class="col-6 offset-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('message')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       </div>
     </div>
    @endif
    
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="container">
                    <div class="row">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              {{-- @php( $i = 1 ) --}}
                              @foreach ($categories as $category)
                              <tr>
                                <td>{{$categories->firstItem() + $loop->index}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->user->name}}</td>
                                <td>
                                  @if($category->created_at == NULL)
                                  <span class="text-danger">Date note set</span>
                                  @else
                                  {{$category->created_at->diffForHumans()}}
                                  @endif
                                </td>
                                <td>
                                  <form action="{{route('categories.update',$category->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                  </form>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <!--add pagination -->
                          {{-- @if(method_exists($categories, 'links'))
                          <div>
                            {!!$categories->links()!!}
                          </div>
                          @endif --}}
                          {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
