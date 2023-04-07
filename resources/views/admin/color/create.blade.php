@extends('admin.layouts')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add color</h1>
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
