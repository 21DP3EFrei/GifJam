@extends('layout')

@section('title', 'Approved Memes')

@section('content')
    <h2>Approved Memes</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('verification.index') }}" method="GET">
    @csrf
    <button type="submit">Show Pending</button>
</form>

    <table class="table">
        <thead>
            <tr>
                <th>Picture Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
                <th>Download</th>
                <th>Category</th> <!-- Changed column header -->
                <th>Image</th> <!-- Added column -->
            </tr>
        </thead>
        <tbody>
            @foreach ($approvedMems as $mem)
                <tr>
                    <td>{{ $mem->Nosaukums }}</td>
                    <td>{{ $mem->Apraksts }}</td>
                    <td>{{ $mem->Status == 0 ? 'Pending' : ($mem->Status == 1 ? 'Approved' : 'Rejected') }}</td>
                    <td>
                        <form action="{{ route('verification.index', $mem) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="unapprove{{ $mem->id }}" value="0">
                                <label class="form-check-label" for="unapprove{{ $mem->id }}">Unapprove</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ asset('storage/' . $mem->Attels) }}" download="{{ $mem->Attels }}">Download</a>
                    </td>
                    <td>
                        {{ $mem->kategorija->Nosaukums }}
                    </td>
                    <td>
                        <img src="{{ asset('storage/' . $mem->Attels) }}" alt="{{ $mem->Nosaukums }}" width="100" height="100">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
