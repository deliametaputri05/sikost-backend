@extends('../admin.layout')

@section('title', 'Create')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Create Kost</h4>
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
                        <a href="#">Kost</a>
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
                        <form class="w-full" action="{{ route('kost.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">


                                <div class="col-md-12">
                                    <div class="card">
                                        {{-- <div class="card-header">
                                            <div class="card-title">Form Company</div>
                                        </div> --}}
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-6 col-lg-8">
                                                    <div class="form-group">
                                                        <label for="name">Name Kost</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Name Kost">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="picturePath">Pic Kost</label>
                                                        <input type="file" class="form-control-file" id="picturePath" name="picturePath" placeholder="Pic Kost">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="desc">Desc Kost</label>
                                                        <textarea class="form-control" value="{{ old('desc') }}" name="desc" id="desc" rows="3" placeholder="Desc Kost"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="location">Location</label>
                                                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" placeholder="Location">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="position">Category</label>
                                                        <input type="text" class="form-control" name="category" id="category" value="{{ old('category') }}" placeholder="Category">
                                                    </div>
                                                 
                                                    <div class="card-action">
                                                        <button type="submit" class="btn btn-primary" id="alert_demo_3_5">Submit</button>
                                                        <a href="/dashboard/kost" class="btn btn-danger" on>Cancel</a>

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