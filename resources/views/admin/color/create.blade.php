@extends('admin.layouts.main', ['caption' => 'Add color'])

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('color.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Наименование">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
