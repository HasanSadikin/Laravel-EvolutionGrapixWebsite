@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    Edit Product
                    <a href="{{url('admin/products')}}" class="btn btn-danger text-white btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                @if(session('message'))
                <div class="">
                    <h5 class="alert alert-success">{{session('message')}}</h5>
                </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach($errors->all() as $error)
                            <div class="">{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag" type="button" role="tab" aria-controls="seotag" aria-selected="false">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">
                                Product Image
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="container pt-3">
                                <div class="mb-3">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $product->category->id ? 'selected' : ''}}>
                                            {{$category->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" value="{{$product->slug}}" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Product Brand</label>
                                    <select name="brand_id" class="form-control">
                                        @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}" {{$brand->id == $product->brand->id ? 'selected' : ''}}>
                                            {{$brand->name}}
                                        </option>
                                        @endforeach
                                    </select></div>
                                <div class="mb-3">
                                    <label>Small Description (500 Words)</label>
                                    <textarea name="small_description" class="form-control" rows="4">{{$product->small_description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{$product->description}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="seotag" role="tabpanel" aria-labelledby="seotag-tab">
                            <div class="container pt-3">
                                <div class="mb-3">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{$product->meta_title}}"/>
                                </div>
                                <div class="mb-3">
                                    <label>Meta Description </label>
                                    <textarea name="meta_description" class="form-control" rows="4">{{$product->meta_description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Meta Keywords</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{$product->meta_keyword}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="row container pt-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Original Price</label>
                                        <input type="number" name="original_price" value="{{$product->original_price}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Selling Price</label>
                                        <input type="number" name="selling_price" value="{{$product->selling_price}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending" {{$product->trending == '1' ? 'checked' : ''}}/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <input type="checkbox" name="status" {{$product->status == '1' ? 'checked' : ''}}/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                            <div class="row container pt-3">
                                <div class="mb-3">
                                    <label>Upload Product Images</label>
                                    <input type="file" name="image[]" class="form-control" multiple>
                                </div>
                                <div class="">
                                    @if($product->productImages)
                                    <div class="row">
                                        @foreach($product->productImages as $image)
                                        <div class="col-md-2">
                                            <img src="{{asset($image->image)}}" style="height: 80px; width: 80px" class="m-3 border" alt="Img">
                                            <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="d-block">Remove</a>
                                        </div>
                                        @endforeach    
                                    </div>
                                    @else
                                        <h5>No Image Added</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary float-end text-white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection