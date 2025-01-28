@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Rating Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/ratings">Rating</a></li>

      </ol>
    </nav>
  </div><!-- End Page Title -->


{{--TODO:  MORE Detail IN MODAL  QUANTITY  DETAIL ADDTIONAL INFO.. --}}
 

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Rating</h5>
            {{-- <div class="d-flex justify-content-end">

                <button class="btn btn-primary ">+ Add Rating</button>
            </div> --}}
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th>Rating ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Tilte</th>
                    <th>Descripton</th>
                    <th>Rating</th>
                    <th>Status</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($ratings as  $rating)
                    
                <tr>
                    <td>{{$rating->id}}</td>
                    <td>{{$rating->productId}}</td>
                    <td>{{$rating->userId}}</td>
                    <td>{{$rating->title}}</td>
                    <td>{{$rating->description}}</td>
                    <td>{{$rating->rating}}</td>
                    <td>@if ($rating->status=='active')
                    <a href="{{ URL::to('/') }}/admin/rating/status/{{$rating->id}}"><span class="badge text-bg-success">Active</span></a>    
                    @elseif($rating->status=='inactive')   
                    <a href="{{ URL::to('/') }}/admin/rating/status/{{$rating->id}}"><span class="badge text-bg-warning">Inactive</span></a>                    
                    @endif</td>    
                    <td>
                        <div>
                            <i class="ri-edit-box-fill text-warning"></i>
                            <i class="ri-delete-bin-6-fill text-danger"></i>
                        </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection