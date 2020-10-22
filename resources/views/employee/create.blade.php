@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ __('employee/messages.new_employee') }}
            </div>
            <div class="card-body">
                <a href="{{ route('employees.index') }}" role="button" class="btn btn-sm btn-success">{{ __('messages.to_list') }}</a>

                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                @endif

                <form action="{{ route('employees.store') }}" method="post" class="mt-4">
                    @csrf
                    <div class="form-group col-xs-12 required">
                        <label for="first_name">{{ __('employee/messages.first_name') }}</label>
                        <input class="form-control" type="text" name="first_name" value="{{ old('first_name') }}" id="first_name">
                    </div>
                    <div class="form-group col-xs-12 required">
                        <label for="last_name">{{ __('employee/messages.last_name') }}</label>
                        <input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}" id="last_name">
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="phone">{{ __('employee/messages.phone') }}</label>
                        <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" id="phone">
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="email">{{ __('employee/messages.email') }}</label>
                        <input class="form-control" type="text" name="email" value="{{ old('email') }}" id="email">
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="company_id">{{ __('employee/messages.company') }}</label>
                        <select class="form-control" name="company_id" id="company_id">
                            <option value="">...</option>
                            @foreach ($companies as $company)
                                @if ($company->id == old('company_id'))
                                    <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
                                @else
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">{{ __('messages.save') }}</button>

                    <a href="{{ route('employees.index') }}" class="btn btn-default">{{ __('messages.cancel') }}</a>
                </form>

            </div>
        </div>
    </div>
@endsection
