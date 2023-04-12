@extends('admin.layouts.main', ['caption' => 'Edit color'])

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('color.update', $color->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" value="{{ $color->title }}" placeholder="Наименование">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
