@extends('layout')

@section('title', 'Picture Verification')

@section('content')
    <h2>Verification</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="mb-3">
    <form action="{{ route('unverification.index') }}" method="GET">
    @csrf
    <button type="submit">Show Approved</button>
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
            @foreach ($unverifiedMems as $mem)
                <tr>
                    <td>{{ $mem->Nosaukums }}</td>
                    <td>{{ $mem->Apraksts }}</td>
                    <td>{{ $mem->Status == 0 ? 'Pending' : ($mem->Status == 1 ? 'Approved' : 'Rejected') }}</td>
                    <td>
                        <form action="{{ route('verification.verify', $mem) }}" method="POST">
                            @csrf
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="approve{{ $mem->id }}" value="1">
                                <label class="form-check-label" for="approve{{ $mem->id }}">
                                    {{ $mem->Status == 0 ? 'Approve' : 'Re-Approve' }}
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="reject{{ $mem->id }}" value="0">
                                <label class="form-check-label" for="reject{{ $mem->id }}">Reject</label>
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
