@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{ $company->name }}
            </div>
            <div class="card-body">
                <a href="{{ route('companies.index') }}" role="button" class="btn btn-sm btn-success">{{ __('messages.to_list') }}</a>

                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                @endif

                <form action="{{ route('companies.update', ['id' => $company->id]) }}" method="post" class="mt-4" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-xs-12 required">
                        <label for="name">{{ __('company/messages.name') }}</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name', $company->name) }}" id="name" required>
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="web_site">{{ __('company/messages.web_site') }}</label>
                        <input class="form-control" type="text" name="web_site" value="{{ old('web_site', $company->web_site) }}" id="web_site">
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="email">{{ __('company/messages.email') }}</label>
                        <input class="form-control" type="text" name="email" value="{{ old('email', $company->email) }}" id="email">
                    </div>
                    @if ($company->logo)
                        <img src="{{ asset('storage/' . $company->logo) }}" width="100" height="100" />
                        <label for="remove_logo" class="form-check-label"><input type="checkbox" name="remove_logo" value="Y" id="remove_logo" class="form-check-input" />{{ __('company/messages.remove_logo') }}</label>
                    @endif
                    <div class="form-group col-xs-12">
                        <label for="logo">{{ __('company/messages.logo') }}</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="logo" name="logo">
                            <label class="custom-file-label" for="logo">{{ __('messages.choose_file') }}</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">{{ __('messages.save') }}</button>

                    <a href="{{ route('companies.index') }}" class="btn btn-default">{{ __('messages.cancel') }}</a>
                </form>

            </div>
        </div>
    </div>
@endsection
