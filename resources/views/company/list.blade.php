@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ __('company/messages.companies') }}
            </div>
            <div class="card-body">
                <a href="{{ route('companies.create') }}" role="button" class="btn btn-success">{{ __('company/messages.add_company') }}</a>

                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('company/messages.name') }}</th>
                            <th scope="col">{{ __('company/messages.web_site') }}</th>
                            <th scope="col">{{ __('company/messages.email') }}</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->web_site }}</td>
                                <td>{{ $company->email }}</td>
                                <td>
                                    <a href="{{ route('companies.edit', ['id' => $company->id]) }}" role="button" class="btn btn-outline-primary btn-sm">{{ __('messages.edit') }}</a>
                                    <form method="post" action="{{ route('companies.destroy', ['id' => $company->id]) }}">
                                        @method('delete')
                                        @csrf
                                        <button onclick="confirm({{ __('messages.are_you_sure') }})" class="btn btn-danger btn-sm">{{ __('messages.delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>

                {{ $companies->links() }}
            </div>
        </div>
    </div>
@endsection
