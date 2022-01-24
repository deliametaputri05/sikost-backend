@extends('../admin.layout')

@section('title', 'Detail')

@section('container')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Detail </h4>
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
                        <a href="/dashboard/apply">Candidate</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Detail</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Lamaran Kerja</h4>
                        </div>
                        <div class="card-body">
                            <div class="card card-round">
								<div class="card-body">
									{{-- <div class="card-title fw-mediumbold">Suggested People</div> --}}
									<div class="card-list">
										<div class="item-list">
											<div class="avatar">
												<img src="{{ $item->user->profile_photo_url }}" alt="..." class="avatar-img rounded-circle">
											</div>
											<div class="info-user ml-3">
												<div class="username">{{ $item->user->name }}</div>
												<div class="status">{{ $item->status }}</div>
											</div>
                                            {{-- <p class="demo"> --}}
											<a href="{{ route('apply.changeStatus', ['id' => $item->id, 'status' => 'DIPROSES']) }}" class="btn btn-primary alert_demo_3_7" >
                                                <span class="btn-label">
                                                    <i class="fas fa-hourglass-half"></i>
                                                </span>
                                                Di proses
                                            </a>
                                            <a href="{{ route('apply.changeStatus', ['id' => $item->id, 'status' => 'DITERIMA']) }}" class="btn btn-success m-2 alert_demo_3_7" >
                                                <span class="btn-label">
                                                    <i class="fa fa-check"></i>
                                                </span>
                                                Di terima
                                            </a>
                                            <a href="{{ route('apply.changeStatus', ['id' => $item->id, 'status' => 'DITOLAK']) }}" class="btn btn-danger alert_demo_3_7" >
                                                <span class="btn-label">
                                                    <i class="far fa-times-circle"></i>
                                                </span>
                                                Di tolak
                                            </a>
                                            {{-- </p> --}}
										</div>
                                    </div>
                                
                            <ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-center" id="pills-tab-with-icon" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab-icon" data-toggle="pill" href="#pills-home-icon" role="tab" aria-controls="pills-home-icon" aria-selected="true">
                                        <i class="flaticon-interface-6"></i>
                                        Surat
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill" href="#pills-profile-icon" role="tab" aria-controls="pills-profile-icon" aria-selected="false">
                                        <i class="flaticon-file-1"></i>
                                        Cv
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab-icon" data-toggle="pill" href="#pills-contact-icon" role="tab" aria-controls="pills-contact-icon" aria-selected="false">
                                        <i class="flaticon-mailbox"></i>
                                        Kontak
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel" aria-labelledby="pills-home-tab">
                                    {{-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p> --}}

                                    <p>{{ $item->letter }}</p>
                                </div>
                                <div class="tab-pane fade" id="pills-profile-icon" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    {{-- <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                    <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.
                                    </p> --}}
                                    <div class="row row-demo-grid">
                                        <div class="col-xl-12">
                                            {{-- <p>Open a PDF file <a href="{{ asset('storage/assets/file/'.$item->file ) }}">example</a>.</p> --}}
                                        <embed width="500" height="500" src="{{ asset('storage/assets/file/'.$item->file
                                         ) }}" >
                                        {{-- <embed width="500" height="500" src="/assets/cv.pdf" > --}}
                                            {{-- <iframe src="/assets/cv.pdf" width="600" height="400"></iframe> --}}
                                            {{-- <embed type="application/pdf" src="/assets/cv.pdf" width="600" height="400"> --}}

                                        </div>
                                    </div>
                                
                                   
                                    {{-- <iframe src="assets/cv.pdf" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe> --}}
                                </div> 
                                <div class="tab-pane fade" id="pills-contact-icon" role="tabpanel" aria-labelledby="pills-contact-tab">
                                  <p>Email   : {{ $item->user->email }}</p>
                                  <p>Alamat  : {{ $item->user->address }}</p>
                                  <p>No Hp   : {{ $item->user->noHp }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection