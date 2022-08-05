@extends('layouts.app')

@push('scriptsSrc')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Company') }}</div>

                    <div class="card-body">
                        @if($company->exists)
                            <form method="POST" id="form_save_companies" action="{{ route('admin.companies.update',$company) }}" enctype="multipart/form-data">
                                @method('put')
                        @else
                            <form method="POST" id="form_save_companies" action="{{ route('admin.companies.store') }}" enctype="multipart/form-data">
                        @endif

                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $company->name) }}"  autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $company->address) }}"  autocomplete="address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="logo" class="col-md-4 col-form-label text-md-end">{{ __('Logo') }}</label>
                                <input type="file" class="form-control"  style="width: 49%;" name="logo" id="logo">
                            </div>
                            <input type="hidden" id="is-logo" value="{{$company->logo}}">
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" id="save_companies" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                            @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div>{{$error}}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script defer src="{{mix('/js/admin/validations.js')}}"></script>
@endpush
