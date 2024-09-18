@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

   


    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
        </ol>
    </nav>


    <div class="row">

        <div class="col-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Product</h4>
    
                    <form action="{{route('admin.update.product', $product->id)}}" method="post" 
                    enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
    
                        <div class="mb-3">
                            <label class="form-label">Product Photo</label>
                            <input type="file" name="photo" class="form-control" id = "image" autocomplete="off">
                        </div>

                        <div class="mb-3">
                            <img id="showImage" class="wd-150 rounded" height="150px"
                             src="{{$product->photo ? asset('upload/amin_image/' . $product->photo) : url('upload/no_image.jpg')}}" 
                             alt="profile">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Product Category</label>
                            <select name="category_id" id="category" class="form-control" required>
                                <option value="" selected disabled>-- Select Product Category --</option>
                                @foreach ($categories as $category )
                                    <option value="{{$category->id}}">{{$category->category_id == $category->id ? 'selected' : ""}}>
                                    {{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                        <div class="mb-3">
                            <label for="product" class="form-label">Product Name</label>
                            <input type="text" id="name" class="form-control" name="name" autocomplete="off"
                            placeholder="Name" value="{{$product->name}}">
                        </div>

                        
                        <div class="mb-3">
                            <label for="product" class="form-label">Product Price</label>
                            <input type="text" id="price" class="form-control" name="price""
                            placeholder="Price" value="{{$product->price}}">
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label">Product Stock</label>
                            <input type="text" id="stock" class="form-control" name="stock"
                            placeholder="Stock" value="{{$product->stock}}">
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label">Product Description</label>
                            <textarea id="discription" class="form-control" name="discription" rows="8"
                            placeholder="Enter a detailed discription of your product..." value="{{$product->discription}}"></textarea>
                        </div>
    

                        <button type="submit" class="btn btn-primary me-2">Add Product</button>
                        <button class="btn btn-secondary">Cancle</button>


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

<