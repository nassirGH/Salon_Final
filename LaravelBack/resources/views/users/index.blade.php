@extends('layouts.layout')

@section('title')
    Users <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
        <i class="fa fa-plus"></i>
    </a>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <div class="d-inline-block">
                                        <a href="{{ route('users.edit', $user->id)  }}"><i class="fa fa-edit"></i></a>
                                    </div>

                                    <div class="d-inline-block">
                                        <form action="{{ route('users.destroy', [$user->id]) }}" method="post" id="deleteForm">
                                            <button type="submit">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            {!! method_field('delete') !!}
                                            {!! csrf_field() !!}
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="col-12">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
