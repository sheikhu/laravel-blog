@extends('contacts.layout')

@section('content')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($contacts as $contact)
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <a href="#" class="btn btn-primary">Show</a>
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@stop
