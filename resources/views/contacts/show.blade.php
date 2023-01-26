@extends('app')

@section('title', 'Contact | Detail')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left my-5">
                    <h2>Contact Details</h2>
                </div>
                <div class="pull-right my-4">
                    <a class="btn btn-primary" href="{{ route('contacts.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $contact->name }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contact:</strong>
                        <input type="text" name="contact" class="form-control" value="{{ $contact->contact }}" readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="email" name="email" value="{{ $contact->email }}" class="form-control"
                            readonly>
                    </div>
                </div>
                <form action="{{ route('contacts.destroy',$contact->id) }}" method="Post" class="mt-5">
                    <a class="btn btn-primary col-md-2" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ms-3 col-md-2">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection