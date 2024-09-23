@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">



        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category List</li>
            </ol>
        </nav>
      



         
  
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="card-title">Category List</h6>
                        <a href="{{ route('admin.add.category') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Add Category</a>
                    </div>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-hover text-center">
                            <thead class="table-primary">
                                
                        
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Product Category</th>
                                        <th class="text-center">Action</th>  <!-- Added this header for action button -->
                                       
                                    </tr>

                            </thead>
                            <tbody>
                                @foreach ( $categories as $category )
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('upload/admin_images/' . $category->photo) }}" alt="Category Image"
                                            style="width: 50px; height: 50px;">
                                        </td>
                                        <td>{{$category->category_name}}</td>
                                        <td>
                                            <a href="{{route('admin.edit.category', $category->id)}}"
                                                 class="btn btn-info btn-sm">Edit</a>
                                            <form action="{{route('admin.delete.category', $category->id)}}" method="post"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Delete</button>

                                            </form>
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
