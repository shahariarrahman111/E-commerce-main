@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.add.category')}}">Product Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Product Category</li>
        </ol>
    </nav>


    <div class="row">

        <div class="col-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product Category Name</h4>
    
                    <form action="{{route('admin.store.category')}}" method="post" enctype="multipart/form-data">
                        @csrf
    
                        <div class="mb-3">
                            <label for="category" class="form-label">Product Category</label>
                            <input type="text" id="category" class="form-control" name="category_name">
                        </div>
    
                        
                        <div class="mb-3">
                            <label for="category" class="form-label">Product Photo</label>
                            <input type="file" name="photo" class="form-control" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <img id="showImage" class="wd-150 rounded" height="150px"
                             src="{{url('upload/no_image.jpg')}}" alt="profile">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Add Category">    

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);

                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>    




</div>
@endsection

