@extends('layouts.dashboard')

@section('title')
    Account Settings
@endsection

@section('content')
     <section
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update your current profile</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="{{route('dashboard-settings-redirect','dashboard-settings-account')}}" method="POST" enctype="multipart/form-data" id="locations">
                      @csrf
                      <div class="card bg-white">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="addressOne">Your Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="emailHelp"
                                  name="name"
                                  value="{{$user->name}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="addressTwo">Your Email</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  aria-describedby="emailHelp"
                                  name="email"
                                  value="{{$user->email}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="address_one">Address 1</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="address_one"
                                  name="address_one"
                                  value="{{$user->address_one}}"
                                  placeholder="{{$user->address_one ?? 'Silahkan Isi Terlebih Dahulu'}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="address_two">Address 2</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="address_two"
                                  name="address_two"
                                  value="{{$user->address_two}}"
                                  placeholder="{{$user->address_two ?? 'Silahkan Isi Terlebih Dahulu'}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label for="provinces_id">Province</label>
                                  <select name="provinces_id" id="provinces_id" class="form-control"
                                  v-if="provinces" v-model="provinces_id">
                                    <option v-for="province in provinces" :value="province.id" >
                                      @{{province.name}}
                                    </option>
                                  </select>
                                  <select v-else class="form-control"></select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label for="regencies_id">City</label>
                                  <select name="regencies_id" id="regencies_id" class="form-control"
                                  v-if="regencies" v-model="regencies_id">
                                    <option v-for="regency in regencies" :value="regency.id" >@{{regency.name}}</option>
                                  </select>
                                  <select v-else class="form-control"></select>
                                </div>
                              </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="zip_code">Postal Code</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="zip_code"
                                  name="zip_code"
                                  value="{{$user->zip_code}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="country">Country</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="country"
                                  name="country"
                                  value="Indonesia"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="mobile"
                                  name="mobile"
                                  value="+628 2020 11111"
                                />
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

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      let provinces_dat = {{json_encode($user->provinces_id),JSON_HEX_TAG}};
      let regencies_dat = {{json_encode($user->regencies_id),JSON_HEX_TAG}};
      var gallery = new Vue({
        el: "#locations",
        mounted() {
          AOS.init();
          this.getProvincesData();
          this.getRegenciesData();
        },
        data: {
          provinces: null,
          regencies: null,
          provinces_id:provinces_dat,
          regencies_id:regencies_dat
        },
        methods: {
          getProvincesData(){
            var self = this;
              axios.get('{{ route('api-provinces') }}')
              .then(function(response){
                self.provinces = response.data;
              })
          },
          getRegenciesData(){
            var self = this;
              axios.get('{{ url('api/regencies')}}/' + self.provinces_id)
              .then(function(response){
                self.regencies = response.data;
              })
          },
        },
        watch:{
          provinces_id: function(val,oldVal){
            this.regencies_id = null;
            this.getRegenciesData();
          }
        }
      });
    </script>
@endpush