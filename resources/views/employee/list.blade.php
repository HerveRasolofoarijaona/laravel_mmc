@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ __('employee/messages.employees') }}
            </div>
            <div class="card-body">
                <a href="{{ route('employees.create') }}" role="button" class="btn btn-success">{{ __('employee/messages.add_employee') }}</a>

                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('employee/messages.name') }}</th>
                            <th scope="col">{{ __('employee/messages.company') }}</th>
                            <th scope="col">{{ __('employee/messages.phone') }}</th>
                            <th scope="col">{{ __('employee/messages.email') }}</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->full_name }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>
                                    <a href="{{ route('employees.edit', ['id' => $employee->id]) }}" role="button" class="btn btn-outline-primary btn-sm">{{ __('messages.edit') }}</a>
                                    <form method="post" action="{{ route('employees.destroy', ['id' => $employee->id]) }}">
                                        @method('delete')
                                        @csrf
                                        <button onclick="confirm({{ __('messages.are_you_sure') }})" class="btn btn-danger btn-sm">{{ __('messages.delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>

                {{ $employees->links() }}
            </div>
        </div>
    </div>
@endsection
