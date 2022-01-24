@extends('../admin.layout')

@section('title', 'Edit')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Job</h4>
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
                        <a href="#">Job</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $item->position }}</a>
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
                        <form class="w-full" action="{{ route('job.update', $item->id) }}" method="post" enctype="multipart/form-data">
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
                                                        <label for="name">Posisi Pekerjaan</label>
                                                        <input type="text" class="form-control" id="position" name="position" value="{{ old('position') ?? $item->position}}" placeholder="Posisi Pekerjaan">

                                                    </div>   
                                                    <div class="form-group">
                                                        <label for="company_id">Perusahaan</label>
                                                        <select class="form-control" id="company_id" name="company_id">
                                                            
                                                            <option value={{ $item->company_id }}>{{ $item->company->name }}</option>
                                                            @foreach ($company as $cpy)
                                                            
                                                            <option value="{{ $cpy->id }}">{{ $cpy->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>                                    
                                                    <div class="form-group">
                                                        <label for="description">Deskripsi Pekerjaan</label>
                                                        <textarea class="form-control" value="{{ old('desc') ?? $item->descr }}" name="desc" id="description" rows="3" placeholder="Deskripsi Pekerjaan">{{ $item->desc }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="facilities">Fasilitas Pekerjaan</label>
                                                        <textarea class="form-control" value="{{ old('facilities') ?? $item->facilities }}" name="facilities" id="facilities" rows="2" placeholder="Fasilitas Pekerjaan">{{ $item->facilities }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="requirement">Syarat Pekerjaan</label>
                                                        <textarea class="form-control" value="{{ old('requirement') ?? $item->requirement }}" name="requirement" id="requirement" rows="5" placeholder="Syarat Pekerjaan">{{ $item->requirement }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="age">Batas Umur</label>
                                                        <input type="text" class="form-control" name="age" id="age" value="{{ old('age') ?? $item->age }}" placeholder="Batas Umur">
                                                    </div>
                                                    <div class="form-check">
                                                        <label>Gender</label><br />
                                                        <label class="form-radio-label">
                                                            <input class="form-radio-input" type="radio" name="gender" value="Laki-laki" checked="{{ $item->gender  }}">
                                                            <span class="form-radio-sign">Laki-laki</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="gender" value="Perempuan" checked="{{ $item->gender  }}">
                                                            <span class="form-radio-sign">Perempuan</span>
                                                        </label>
                                                        <label class="form-radio-label ml-3">
                                                            <input class="form-radio-input" type="radio" name="gender" value="Laki-laki/perempuan" checked="{{ $item->gender  }}">
                                                            <span class="form-radio-sign">Laki-laki/Perempuan</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Pendidikan Terakhir</label>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="last_edu">
                                                            <option value="{{ $item->last_edu }}">{{ $item->last_edu }}</option>
                                                            <option value="SMA">SMA</option>
                                                            <option value="SMK">SMK</option>
                                                            <option value="D3">D3</option>
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                            <option value="S3">S3</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="salary">Gaji</label>
                                                        <input type="number" class="form-control" name="salary" id="salary" value="{{ old('salary') ?? $item->salary }}" placeholder="Gaji">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="rate">Rate</label>
                                                        <input type="number" class="form-control" step="0.01" max="5" name="rate" id="rate" value="{{ old('rate') ?? $item->rate }}" placeholder="Rating">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Kategori </label>
                                                        <br>
                                                        <div class=" selectgroup selectgroup-pills">
                                                            <label class="selectgroup-item">
                                                                <input type="checkbox" name="category" value="new_job" class="selectgroup-input" checked="{{  $item->category }}">
                                                                <span class="selectgroup-button">New Job</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="checkbox" name="category" value=",popular" class="selectgroup-input" checked="{{  $item->category }}">
                                                                <span class="selectgroup-button">Popular</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="checkbox" name="category" value=",recommended" class="selectgroup-input" checked="{{  $item->category }}">
                                                                <span class="selectgroup-button">Recommended</span>
                                                            </label>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="qouta">Kouta</label>
                                                        <input type="number" class="form-control" name="qouta" id="qouta" value="{{ old('qouta') ?? $item->qouta}}" placeholder="Kouta">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="workday">Waktu Kerja</label>
                                                        <select class="form-control" id="workday" name="types">
                                                            <option value="{{ $item->types }}">{{ $item->types }}</option>

                                                            <option value="Full Time">Full Time</option>
                                                            <option value="Part Time">Part Time</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="last_date">Tenggat Waktu</label>
                                                        <input type="date" class="form-control" value="{{ old('last_date') ?? $item->last_date }}" name="last_date" id="last_date" placeholder="Kouta">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="work_exp">Pengalaman Kerja</label>
                                                        <input type="text" class="form-control" name="work_exp" id="work_exp" value="{{ old('work_exp') ?? $item->work_exp }}" placeholder="Pengalaman Kerja">
                                                    </div>
                                                    <div class="card-action">
                                                        <button type="submit" class="btn btn-primary" id="alert_demo_3_6">Update</button>
                                                        <a href="/dashboard/job" class="btn btn-danger" on>Cancel</a>

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