@extends('../admin.layout')

@section('title', 'Edit')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Kost</h4>
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
                        <a href="#">{{ $item->name }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit</a>
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
                        <form class="w-full" action="{{ route('kost.update', $item->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title">Form Kost</div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="col-md-6 col-lg-8">
                                                    <div class="form-group">
                                                        <label for="name">Name Kost</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $item->name }}" placeholder="Nama Perusahaan" >

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="picturePath">Pic Kost</label>
                                                        <input type="file" class="form-control-file"  id="picturePath" name="picturePath" placeholder="Logo Perusahaan" >
                                                        <br>
                                                        <div class="avatar avatar-xl">
                                                        <img src=" {{ $item->picturePath }}"   width="100" alt="Image" class="avatar-img rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="desc">Desc Kost</label>
                                                        <textarea class="form-control" value="{{ old('desc') ?? $item->desc }}" name="desc" id="desc" rows="3" placeholder="Deskripsi Perusahaan" required>{{$item->desc}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="location">Location</label>
                                                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location') ?? $item->location }}" placeholder="Lokasi Perusahaan" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category">Category</label>
                                                        <input type="text" class="form-control" name="category" id="category" value="{{ old('category') ?? $item->category }}" placeholder="Posisi Pekerjaan" required
                                                        >
                                                    </div>
                                                    
                                                   
                                                    <div class="card-action">
                                                        <button type="submit" class="btn btn-primary" id="alert_demo_3_6">Update</button>
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
</div>
</div>
</div>
</div>


@endsection