@extends('admin.layouts.main', ['caption' => 'Edit product'])

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Category</label>
                                    </div>
                                    <div class="col-md-10">
                                        <select name="category_id" class="form-control select2" style="width: 100%;">
                                            <option selected="selected" value="{{ $product->category->id }}">{{ $product->category->title }}</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Price</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Count</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="count" value="{{ $product->count }}">
                                    </div>
                                </div>

                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="no_change_tags">
                                <label class="form-check-label">Don't change tags</label>
                            </div>
                            <div class="form-group">
                                <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Choose tag" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"  name="no_change_colors">
                                <label class="form-check-label" >Don't change colors</label>
                            </div>
                            <div class="form-group">
                                <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Choose color" style="width: 100%;">
                                    @foreach($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <h4 class="text-primary">Images</h4>
                            <div class="form-group">
                                <label>Primary image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <label>Additional images</label>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary col-md-4" value="Edit">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <h4>Primary image</h4>
                        <div class="form-group">
                            <img class="img-thumbnail" src="{{ $product->imageUrl }}" alt="" >
                        </div>
                        <form action="{{ route('updatePreviewImage', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary col-md-4" value="Edit Image">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <h4>Additional images</h4>
                        <div class="row">
                            @foreach($product->productImages as $productImage)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <img class="img-thumbnail" src="{{ $productImage->imageUrl }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <hr>

                        <form action="{{ route('updateProductImages', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="product_images_new[]" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="product_images_new[]" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="product_images_new[]" type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary col-md-4" value="Edit Additional images">
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
