<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <div class="container">
            All Image

            <a href="{{route('multiImage.create')}}" style="float: right" class="btn btn-success btn-sm">Create Image</a>
            
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
                                <th scope="col">Image</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                             
                            </tbody>
                          </table>
                          {{-- {{$brands->links()}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
