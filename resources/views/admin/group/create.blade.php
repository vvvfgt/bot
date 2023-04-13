@extends('admin.layouts.main', ['caption' => 'Add group'])

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <form action="{{ route('group.store') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Title">
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
