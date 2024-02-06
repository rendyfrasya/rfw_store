@extends('layouts.dashboard')

@section('title')
    Store Settings
@endsection

@section('content')
     <section
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Store Settings</h2>
                <p class="dashboard-subtitle">Make store that profitable</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="{{route('dashboard-settings-redirect','dashboard-settings-store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card bg-white">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Nama Toko</label>
                                <input
                                  type="text"
                                  name="store_name"
                                  class="form-control form-control-register"
                                  aria-describedby="storeHelp"
                                  value="{{ $user->store_name}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Store</label>
                                <p class="text-muted">
                                  Apakah anda juga ingin membuka toko?
                                </p>
                                <div
                                  class="custom-control custom-radio custom-control-inline"
                                >
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    name="store_status"
                                    id="openStoreTrue"
                                    value="1"
                                    {{$user->store_status == 1 ? 'checked' : ''}}
                                  />
                                  <label
                                    class="custom-control-label"
                                    for="openStoreTrue"
                                    >Buka</label
                                  >
                                </div>
                                <div
                                  class="custom-control custom-radio custom-control-inline"
                                >
                                  <input
                                    class="custom-control-input"
                                    type="radio"
                                    name="store_status"
                                    id="openStoreFalse"
                                    value="0"
                                    {{$user->store_status == 0 || $user->store_status == NULL ? 'checked' : ''}}
                                  />
                                  <label
                                    makasih
                                    class="custom-control-label"
                                    for="openStoreFalse"
                                    >Tutup Sementara</label
                                  >
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-right">
                              <button
                                type="submit"
                                class="btn btn-success px-5"
                              >
                                Save Now
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
@endsection