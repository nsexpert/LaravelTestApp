@extends('app')

@section('title', 'Contact')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left my-5">
                    <h2>CRUD Example</h2>
                </div>
                <div class="pull-right my-4">
                    <a class="btn btn-success" href="{{ route('contacts.create') }}"> Create Contact</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->contact }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>
                            <form action="{{ route('contacts.destroy',$contact->id) }}" method="Post">
                                <a class="btn btn-secondary" href="{{ route('contacts.show',$contact->id) }}">detail</a>
                                <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection