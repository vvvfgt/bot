@extends('admin.layouts.main', ['caption' => 'Add tag'])

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <form action="{{ route('tag.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary col-md-4" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
