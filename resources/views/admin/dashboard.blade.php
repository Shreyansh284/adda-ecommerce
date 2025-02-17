@extends('admin.master')
@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row d-flex justify-content-center">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

  <!-- Sales Card -->
  <div class="col-xxl-4 col-md-6">
    <div class="card info-card sales-card">
      <div class="card-body">
        <h5 class="card-title">Sales <span>| Today</span></h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-cart"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $sales['count'] }}</h6>
            <span class="text-{{ $sales['status'] == 'increase' ? 'success' : 'danger' }} small pt-1 fw-bold">
              {{ $sales['percentage'] }}%
            </span> 
            <span class="text-muted small pt-2 ps-1">{{ $sales['status'] }}</span>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Sales Card -->

  <!-- Revenue Card -->
  <div class="col-xxl-4 col-md-6">
    <div class="card info-card revenue-card">
      <div class="card-body">
        <h5 class="card-title">Revenue <span>| This Month</span></h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-currency-dollar"></i>
          </div>
          <div class="ps-3">
            <h6>${{ number_format($revenue['amount'], 2) }}</h6>
            <span class="text-{{ $revenue['status'] == 'increase' ? 'success' : 'danger' }} small pt-1 fw-bold">
              {{ $revenue['percentage'] }}%
            </span> 
            <span class="text-muted small pt-2 ps-1">{{ $revenue['status'] }}</span>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Revenue Card -->

  <!-- Customers Card -->
  <div class="col-xxl-4 col-xl-12">
    <div class="card info-card customers-card">
      <div class="card-body">
        <h5 class="card-title">Customers <span>| This Year</span></h5>
        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-people"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $customers['count'] }}</h6>
            <span class="text-{{ $customers['status'] == 'increase' ? 'success' : 'danger' }} small pt-1 fw-bold">
              {{ $customers['percentage'] }}%
            </span> 
            <span class="text-muted small pt-2 ps-1">{{ $customers['status'] }}</span>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Customers Card -->
          <!-- Reports -->
  
          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">


              <div class="card-body pb-0">
                <h5 class="card-title">Top Selling <span>| This Month</span></h5>

                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">Preview</th>
                      <th scope="col">Product</th>
                      <th scope="col">Price</th>
                      <th scope="col">Sold</th>
                      <th scope="col">Revenue</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                      <td>$64</td>
                      <td class="fw-bold">124</td>
                      <td>$5,828</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                      <td>$46</td>
                      <td class="fw-bold">98</td>
                      <td>$4,508</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                      <td>$59</td>
                      <td class="fw-bold">74</td>
                      <td>$4,366</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                      <td>$32</td>
                      <td class="fw-bold">63</td>
                      <td>$2,016</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                      <td>$79</td>
                      <td class="fw-bold">41</td>
                      <td>$3,239</td>
                    </tr>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->

    </div>
  </section>

@endsection