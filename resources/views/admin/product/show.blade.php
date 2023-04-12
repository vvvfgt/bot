@extends('admin.layouts.main', ['caption' => 'Product'])

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input type="text" value="{{ $product->category->title }}" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="{{ $product->title }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="3" readonly>{{ $product->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price" value="{{ $product->price }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Count</label>
                                        <input type="text" class="form-control" name="count" value="{{ $product->count }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>Tags</h3>
                                                </div>

                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-hover text-nowrap">
                                                        <tbody>
                                                        @foreach($product->tags as $tag)
                                                            <tr>
                                                                <td>{{ $tag->title }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3>Colors</h3>
                                                </div>

                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-hover text-nowrap">
                                                        <tbody>
                                                        @foreach($product->colors as $color)
                                                            <tr>
                                                                <td>{{ $color->title }}</td>
                                                                <td>
                                                                    <div style="width: 16px; height: 16px; background: {{ '#' . $color->title }}"></div>
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
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
