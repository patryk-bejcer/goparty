@extends('backpack::layout')

@section('after_styles')
    <style media="screen">
        .backpack-profile-form .required::after {
            content: ' *';
            color: red;
        }
    </style>
@endsection

@section('header')
    <section class="content-header">

        <h1>
            <span class="text-capitalize">Send email to: {{$user->first_name}} <small>({{$user->email}}) </small></span>
        </h1>

        <ol class="breadcrumb">

            <li>
                <a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a>
            </li>

            <li>
                <a href="{{ route('backpack.account.info') }}">{{ trans('backpack::base.my_account') }}</a>
            </li>

            <li class="active">
                {{ trans('backpack::base.update_account_info') }}
            </li>

        </ol>

    </section>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-6">

            <form class="form" action="{{url('/admin/user/' .$user->id . '/send-email' )}}" method="post">

                {!! csrf_field() !!}

                <div class="box">

                    <div class="box-body backpack-profile-form">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->count())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="form-group">
                            <label for="">Subject</label> <br>
                            <input style="width: 100%;" type="text" name="title">
                        </div>

                        <div class="form-group">
                            <label for="">Message body:</label>
                            <textarea name="content" style="width:100%;" name="" id=""  rows="10"></textarea>
                        </div>
                    </div>

                    <div class="box-footer">

                        <button type="submit" class="btn btn-success"><span class="ladda-label"><i class="fa fa-send"></i> {{ 'Send' }}</span></button>
                        <a href="{{ backpack_url() }}" class="btn btn-default"><span class="ladda-label">{{ trans('backpack::base.cancel') }}</span></a>

                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
