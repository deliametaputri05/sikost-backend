@extends('../admin.layout')

@section('title', 'Create')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Create Company</h4>
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
                        <a href="#">Company</a>
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
                        <form class="w-full" action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
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
                                                        <label for="name">Nama Perusahaan</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Perusahaan">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="picturePath">Logo</label>
                                                        <input type="file" class="form-control-file" id="picturePath" name="picturePath" placeholder="Logo Perusahaan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="desc">Deskripsi Perusahaan</label>
                                                        <textarea class="form-control" value="{{ old('desc') }}" name="desc" id="desc" rows="3" placeholder="Deskripsi Perusahaan"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="location">Lokasi</label>
                                                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" placeholder="Lokasi Perusahaan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Tahun Berdiri</label>
                                                        <input type="number" class="form-control" id="founded_year" name="founded_year" value="{{ old('founded_year') }}" placeholder="Tahun Berdiri">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basic-url">Email Perusahaan</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                
                                                                <span class="input-group-text" id="basic-addon1">@</span>
                                                            </div>
                                                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="basic-url">Website</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon3">https://perusahaan.com</span>
                                                            </div>
                                                            <input type="text" name="website" value="{{ old('website') }}" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="position">Kategori</label>
                                                        <input type="text" class="form-control" name="category" id="category" value="{{ old('category') }}" placeholder="Posisi Pekerjaan">
                                                    </div>
                                                 
                                                
                                                  
                                                    

                                                    
                                                  
                                                  
                                                    <div class="card-action">
                                                        <button type="submit" class="btn btn-primary" id="alert_demo_3_5">Submit</button>
                                                        <a href="/dashboard/company" class="btn btn-danger" on>Cancel</a>

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