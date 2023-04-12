@extends('admin.layouts.main', ['caption' => 'Color'])

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('color.create') }}" class="btn btn-primary">Add</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Color</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($colors as $color)
                                <tr>
                                    <td>{{ $color->id }}</td>
                                    <td><a href="{{ route('color.show', $color->id) }}">{{ $color->title }}</a></td>
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
    </section>
@endsection
