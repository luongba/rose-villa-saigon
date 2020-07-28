@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')))

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_header')
    <h1 class="page-title">Add Member Registration</h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
              action="{{route('users.post_create_member')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
           
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                    {{-- <div class="panel"> --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Phone Number</label>
                                <input type="text" class="form-control" name="phone" placeholder="phone number"
                                       value="{{ old('phone') }}">
                            </div>

                            
                            <div class="form-group">
                                <label for="password">{{ __('voyager::generic.password') }}</label>
                                <input type="password" class="form-control" id="password" name="password" value="" autocomplete="new-password">
                            </div>

                            @can('add_users')
                            @endcan
                           
                            <div class="form-group">
                                <label for="locale">Member Registration</label>
                                <select class="form-control select2" id="locale" name="type_user">
                                    <option value="" selected="selected">Select Member Registration</option>
                                   <option value="1" {{(old('type_user') == 1)?'selected':''}}>early founder</option>
                                   <option value="2" {{(old('type_user') == 2)?'selected':''}}>regular</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="file" data-name="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>

            <button type="submit" class="btn btn-primary pull-left save">
                {{ __('voyager::generic.save') }}
            </button>
        </form>
    </div>
@stop

@section('javascript')
   
@stop
