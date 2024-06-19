@extends('layouts.admin')
@section('content')
        {{-- START CONTENT INTI --}}
        <div class="container-fluid py-4">
            @if (session()->has('success'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Customers Suggestion</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Name
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Email</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Message</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($suggestions as $suggestion)
                                            <tr>
                                                <td> {{ $suggestion->name }} </td>
                                                <td>{{ $suggestion->email }}</td>
                                                <td>{{ $suggestion->message }}</td>
                                                <td>
                                                    <form action="{{ route('suggestion.destroy', $suggestion->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this suggestion?')">Delete</button>
                                                    </form>
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
        </div>
        {{-- END CONTENT INTI --}}
@endsection
