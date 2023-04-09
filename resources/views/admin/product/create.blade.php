@extends('admin.layouts')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add product</h1>
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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Choose category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" cols="10" rows="10" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="price" placeholder="Price">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="count" placeholder="Count">
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
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
