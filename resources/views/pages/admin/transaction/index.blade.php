@extends('layouts.admin')

@section('title')
    Transactions
@endsection

@section('content')
      <section
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Transactions</h2>
                <p class="dashboard-subtitle">List Of Transactions</p>
              </div>
              <div class="dashboard-content">
               <div class="row">
                <div class="col-md-12">
                 <div class="card bg-white">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Harga</th>
                                        <th>Dibuat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                        </div>
                        </div>
               </div>
              </div>
            </div>
          </section>
@endsection

@push('addon-script')
    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering:true,
            ajax:{
                url: '{!! url()->current() !!}',
            },
            columns:[
                {data:'id',name:'id'},
                {data:'user.name',name:'user.name'},
                {data:'transaction_status',name:'transaction_status'},
                {data:'total_price',name:'total_price'},
                {data:'created_at',name:'created_at'},
                   {
                    data:'action',
                    name:'action',
                    orderable:false,
                    searcable:false,
                    width:'15%'
                   }
            ]
        })
    </script>
@endpush