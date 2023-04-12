@extends('admin.layouts.main', ['caption' => 'Edit category'])

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <form action="{{ route('category.update', $category->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" value="{{ $category->title }}" placeholder="Наименование">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary col-md-4" value="Edit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
