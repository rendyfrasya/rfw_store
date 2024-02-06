@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Detail
@endsection

@section('content')
     <section
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Edit Product</h2>
                <p class="dashboard-subtitle">Edit your own product</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                     @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                   </div>
                   @endif
                    <form action="{{route('dashboard-product-update',$product->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
                      <div class="card bg-white">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Product Name</label>
                                <input
                                  type="text"
                                  name="name"
                                  class="form-control form-control-register"
                                  aria-describedby="storeHelp"
                                  value="{{$product->name}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Price</label>
                                <input
                                  type="number"
                                  name="price"
                                  class="form-control form-control-register"
                                  aria-describedby="storeHelp"
                                  value="{{$product->price}}"
                                />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Kategori</label>
                                <select name="categories_id" class="form-control form-control-register">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Descriptions</label>
                               <textarea name="description" id="editor">{{$product->description}}</textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col">
                              <button
                                type="submit"
                                class="btn btn-success btn-block px-5"
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
                <div class="row mt-3">
                  <div class="col-12">
                    <div class="card bg-white">
                      <div class="card-body">
                        <div class="row">
                          @foreach ($product->galleries as $gallery)
                              <div class="col-md-4">
                            <div class="gallery-container">
                              <img
                                src="{{Storage::url($gallery->photos ?? '')}}"
                                alt=""
                                class="w-100"
                              />
                              <a href="{{route('dashboard-product-gallery-delete',$gallery->id)}}" class="delete-gallery">
                                <img src="/images/icon-delete.svg" alt="" />
                              </a>
                            </div>
                          </div>
                          @endforeach
                          
                          <div class="col-12">
                            <form action="{{route('dashboard-product-gallery-upload')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="products_id" value="{{$product->id}}">
                               <input
                              type="file"
                              name="photos"
                              id="file"
                              style="display: none"
                              onchange="form.submit()"
                            />
                            <button
                              type="button"
                              class="btn btn-secondary btn-block mt-3"
                              onclick="thisFileUpload()"
                            >
                              Add Photos
                            </button>
                            </form>
                          </div>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
    <script>
      ClassicEditor.create(document.querySelector("#editor"))
        .then((editor) => {
          console.log(editor);
        })
        .catch((error) => {
          console.error(error);
        });
    </script>
@endpush
