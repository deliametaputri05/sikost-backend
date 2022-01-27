@extends('../admin.layout')

@section('title', 'Edit')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Facilities</h4>
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
                        <a href="#">Facilities</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $facilities->id }}</a>
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
                        <form class="w-full" action="{{ route('facilities.update', $facilities->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
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
                                                        <label for="exampleFormControlSelect1">Kost</label>
                                                        <select class="form-control" id="kos_id" name="kos_id">
                                                            <option value selected>-- Kost --</option>

                                                        @foreach ($room as $c)
                                                            <option value="{{$c->id }}">  {{$c->id }} - {{ $c->name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>   
                                                                                        
                                                    <div class="form-group">
                                                        <label for="description">Name</label>
                                                        <input class="form-control" value="{{ old('name') ?? $facilities->name }}" name="name" id="name" placeholder="Name">
                                                    </div>
                                                    
                                                    <div class="card-action">
                                                        <button type="submit" class="btn btn-primary" id="alert_demo_3_6">Update</button>
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
</div>
</div>
</div>
</div>


@endsection