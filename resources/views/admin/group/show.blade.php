@extends('admin.layouts.main', ['caption' => 'Group'])

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                               <a href="{{ route('group.edit', $group->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <form action="{{ route('group.destroy', $group->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $group->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $group->title }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
