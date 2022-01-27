@extends('../admin.layout')

@section('title', 'Create')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Create Room</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Room</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Create</a>
                    </li>
                </ul>
            </div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div>
                        @if ($errors->any())
                        <div class="mb-5" role="alert">
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                There's something wrong!
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                                <p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </p>
                            </div>
                        </div>
                        @endif
                        <form class="w-full" action="{{ route('room.store') }}" method="post">
                            @csrf

                            <div class="row">


                                <div class="col-md-12">
                                    <div class="card">
                                        {{-- <div class="card-header">
                                            <div class="card-title">Form Job</div>
                                        </div> --}}
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-6 col-lg-8">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Name Kost</label>
                                                        <select class="form-control" id="kos_id" name="kos_id">
                                                            <option value selected>-- Name Kost --</option>

                                                        @foreach ($kost as $c)
                                                            <option value="{{$c->id }}">  {{$c->id }} - {{ $c->name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label for="name">kos_id</label>
                                                        <input type="number" class="form-control" id="kost_id" name="kost_id" value="{{ old('kost_id') }}" placeholder="Name">
                                                    </div> --}}
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Name">

                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label for="price">Price</label>
                                                        <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Price">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="rate">Rate</label>
                                                        <input type="number" class="form-control" step="0.01" max="5" name="rate" id="rate" value="{{ old('rate') }}" placeholder="Rating">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="stock">Stock</label>
                                                        <input type="number" class="form-control" name="stock" id="stock" value="{{ old('stock') }}" placeholder="stock">
                                                    </div>
                                            
                                                    <div class="form-group">
                                                        <label class="form-label">Types </label>
                                                        <br>
                                                        <div class="selectgroup selectgroup-pills">
                                                            <label class="selectgroup-item">
                                                                <input type="checkbox" name="types" value="new_kos" class="selectgroup-input" checked="">
                                                                <span class="selectgroup-button">New Kost</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="checkbox" name="types" value=",popular" class="selectgroup-input">
                                                                <span class="selectgroup-button">Popular</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="checkbox" name="types" value=",recommended" class="selectgroup-input">
                                                                <span class="selectgroup-button">Recommended</span>
                                                            </label>

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="card-action">
                                                        <button type="submit" class="btn btn-primary" id="alert_demo_3_5">Submit</button>
                                                        <a href="/dashboard/room" class="btn btn-danger" on>Cancel</a>

                                                    </div>

                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>


                    </div>
                </div>
            </div>


        </div>
    </div>


    @endsection