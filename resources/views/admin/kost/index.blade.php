@extends('../admin.layout')

@section('title', 'Data Kost')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Kost</h4>
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
                        <a href="#">Data</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title"></h4>
                                <a href="/dashboard/kost/create" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Kost
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Picture Path</th>
                                            <th>Desc</th>
                                            <th>Location</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($kost as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->id }}</td>
                                            <td class="text-center">{{ $item->name }}</td>
                                            <td>
                                                <br>
                                                <div class="avatar avatar-xl ">                                               
                                                <img src="{{ $item->picturePath }}" alt="..." class="avatar-img rounded-circle" width="100px">
                                                
                                            </div>
                                            <br>
                                            <br>
                                        </td>
                                            <td class="text-center">{{ $item->desc }}</td>
                                            <td class="text-center">{{ $item->category }}</td>
                                            <td class="text-center">{{ $item->location }}</td>
                                           
                                       
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('kost.edit', $item->id) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Kost">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('kost.destroy', $item->id) }}" method="POST" class="inline-block">
                                                        {!! method_field('delete') . csrf_field() !!}
                                                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger alert_demo_7" data-original-title="Remove">
                                                            <!-- onclick="return initDemos('.alert_demo_7')"    -->
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="border text-center p-5">Data Tidak Ditemukan</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
