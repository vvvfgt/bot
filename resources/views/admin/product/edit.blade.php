@extends('admin.layouts')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Main</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('product.update', $product->id) }}" method="post">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="{{ $product->category->id }}">{{ $product->category->title }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" cols="10" rows="10">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="count" value="{{ $product->count }}">
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Choose tag" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Choose color" style="width: 100%;">
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
