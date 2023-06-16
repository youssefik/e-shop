@extends('layouts.admin')

@section('title','Orders')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">
                            Registred Users
                        </h4>
                        <a href="{{url('users')}}" class="btn btn-primary float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">role_as</label>
                                <div class="p-2 bordered">
                                    {{$user->role_as == '0' ?'User' :'Admin'}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">First Name</label>
                                <div class="p-2 bordered">
                                    {{$user->name}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Last Name</label>
                                <div class="p-2 bordered">
                                    {{$user->lname}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Email</label>
                                <div class="p-2 bordered">
                                    {{$user->email}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Phone</label>
                                <div class="p-2 bordered">
                                    {{$user->phone}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">adress 1</label>
                                <div class="p-2 bordered">
                                    {{$user->adress1}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">adress 2</label>
                                <div class="p-2 bordered">
                                    {{$user->adress2}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">City</label>
                                <div class="p-2 bordered">
                                    {{$user->city}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">state</label>
                                <div class="p-2 bordered">
                                    {{$user->state}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Country</label>
                                <div class="p-2 bordered">
                                    {{$user->country}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">pincode</label>
                                <div class="p-2 bordered">
                                    {{$user->pincode}}
                                </div>
                            </div>


                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

@endsection
