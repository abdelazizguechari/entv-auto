@extends('admin.dash')

@section('admin') 
<div class="page-content">

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0 fs-3">Welcome to Dashboard</h4>
  </div>


  <div class="d-flex align-items-center flex-wrap text-nowrap">
  
    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="printer"></i>
      Print
    </button>
    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="download-cloud"></i>
      Download Report
    </button>
  </div>
</div>

<hr>

<style>h6{margin: 10px  0 10px 0;}</style>

<div class="row d-flex justify-content-between">
  <!-- Left Column -->


  <!-- Right Column -->
  <div class="col-8">
    <div class="mb-5">
      <div class="card">
        <div  class="card-body ">
          <div class="row">
            <div class="d-flex justify-content-between align-items-baseline">
              <h4 class="mb-3 mb-md-0 fs-3">Informations générales sur le département</h4>
              <div class="dropdown mb-2">
                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" href="">
                    <i data-feather="eye" class="icon-sm me-2"></i> <span class="">Voir</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="{{route('update.section')}}">
                    <i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Modifier</span>
                  </a>
                 
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;">
                    <i data-feather="printer" class="icon-sm me-2"></i> <span class="">Imprimer</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;">
                    <i data-feather="download" class="icon-sm me-2"></i> <span class="">Télécharger</span>
                  </a>
                </div>
              </div>
            </div>
            <hr>
            <div class="col-12">
              <h6>Nom du département : <span style="font-weight: 100">{{ $data->nom }}</span></h6>
              <hr pt-3>
              
              <h6>Nombre d'employés dans ce département : <span style="font-weight: 100">{{ $data->nb_employes }} employés</span></h6>
              <hr pt-3>
              
              <h6>Responsable du département :<span style="font-weight: 100">{{ $data->responsable }}</span></h6>
              <hr pt-3>
              
              <h6>Localisation du département :<span style="font-weight: 100">{{ $data->localisation }}</span></h6>
              <hr pt-3>
              
              <h6>Contact du département :<span style="font-weight: 100">{{ $data->email }} | {{ $data->telephone }}</span></h6>
              <hr pt-3>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-4">
    <div class="mb-5">
      <div class="card">
        <div class="card-body ">
          <div class="row">
            <div class="d-flex justify-content-between align-items-baseline">
              <h4 class="mb-3 mb-md-0 fs-3">introduction</h4>
              <div class="dropdown mb-2">
                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;">
                    <i data-feather="eye" class="icon-sm me-2"></i> <span class="">Voir</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" >
                    <i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Modifier</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;">
                    <i data-feather="trash" class="icon-sm me-2"></i> <span class="">Supprimer</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;">
                    <i data-feather="printer" class="icon-sm me-2"></i> <span class="">Imprimer</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;">
                    <i data-feather="download" class="icon-sm me-2"></i> <span class="">Télécharger</span>
                  </a>
                </div>
              </div>
            </div>
            <hr>
            <div class="col-12">
              <h6>Nom du département :</h6>
              <p>Direction des transports</p>

             <h6>Nom du département :</h6>
            

              <h6>Nombre d'employés dans ce département :</h6>
              <p>150 employés</p>

              <h6>Responsable du département :</h6>
              <p>Monsieur Ahmed Benali</p>

              <h6>Localisation du département :</h6>
              <p>Bureau 3, Bâtiment principal</p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<hr>

<h4 class="mb-3  fs-3">statistce</h4>

<hr>



<div class="row">

  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
      <div class="col-md-4 grid-margin stretch-card">
        <div  class="card">
    
          <div  class="card-body">
            <div class="d-flex justify-content-center align-items-baseline">
              <h6 class="card-title mb-0 fs-4">voiteur en service</h6>
            </div>
            <div class="row mt-4" >
              <div class="">
                <h3 style="text-align: center"  class="mb-2">25</h3>
                <div class="d-flex align-items-baseline">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-center align-items-baseline">
              <h6 class="card-title mb-0"></h6>
            </div>
            <div class="row mt-4" >
              <div class="">
                <h3 style="text-align: center"  class="mb-2">25</h3>
                <div class="d-flex align-items-baseline">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-center align-items-baseline">
              <h6 class="card-title mb-0">number mission non complete</h6>
            </div>
            <div class="row mt-4" >
              <div class="">
                <h3 style="text-align: center"  class="mb-2">25</h3>
                <div class="d-flex align-items-baseline">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-center align-items-baseline">
              <h6 class="card-title mb-0">number mission non complete</h6>
            </div>
            <div class="row mt-4" >
              <div class="">
                <h3 style="text-align: center"  class="mb-2">25</h3>
                <div class="d-flex align-items-baseline">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-center align-items-baseline">
              <h6 class="card-title mb-0">number mission non complete</h6>
            </div>
            <div class="row mt-4" >
              <div class="">
                <h3 style="text-align: center"  class="mb-2">25</h3>
                <div class="d-flex align-items-baseline">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-md-4 grid-margin stretch-card">
        <div  class="card">
          <div class="card-body">
            <div class="d-flex justify-content-center align-items-baseline">
              <h6 class="card-title mb-0">number mission non complete</h6>
            </div>
            <div class="row mt-4" >
              <div class="">
                <h3 style="text-align: center"  class="mb-2">25</h3>
                <div class="d-flex align-items-baseline">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

     
      
    </div>
  </div>
</div> <!-- row -->


<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">CARS</h6>

              <div class="dropdown mb-2">
                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">25</h3>
                <div class="d-flex align-items-baseline">
                  <p class="text-success">
                    <span>+3.3%</span>
                    <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                  </p>
                </div>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
                <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div  class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">oil consumption</h6>
              <div class="dropdown mb-2">
                <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">35,084</h3>
                <div class="d-flex align-items-baseline">
                  <p class="text-danger">
                    <span>-2.8%</span>
                    <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                  </p>
                </div>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
                <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body ">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Growth</h6>
              <div class="dropdown mb-2">
                <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">89.87%</h3>
                <div class="d-flex align-items-baseline">
                  <p class="text-success">
                    <span>+2.8%</span>
                    <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                  </p>
                </div>
              </div>
              <div class="col-6 col-md-12 col-xl-7">
                <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row -->

<hr>

<div class="row">
  <div class="col-12 col-xl-12 grid-margin stretch-card">
    <div class="card overflow-hidden">
      <div class="card-body ">
        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
          <h6 class="card-title mb-0">Revenue</h6>
          <div class="dropdown">
            <a type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
            </div>
          </div>
        </div>
        <div class="row align-items-start">
          <div class="col-md-7">
            <p class="text-muted tx-13 mb-3 mb-md-0">Revenue is the income that a business has from its normal business activities, usually from the sale of goods and services to customers.</p>
          </div>
          <div class="col-md-5 d-flex justify-content-md-end">
            <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-outline-primary">Today</button>
              <button type="button" class="btn btn-outline-primary d-none d-md-block">Week</button>
              <button type="button" class="btn btn-primary">Month</button>
              <button type="button" class="btn btn-outline-primary">Year</button>
            </div>
          </div>
        </div>
        <div id="revenueChart" ></div>
      </div>
    </div>
  </div>
</div> <!-- row -->

<div class="row">
  <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title  mb-0">Monthly sales</h6>
          <div class="dropdown mb-2">
            <a type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
            </div>
          </div>
        </div>
        <p class="text-muted">Sales are activities related to selling or the number of goods or services sold in a given time period.</p>
        <div class="" id="monthlySalesChart"></div>
      </div> 
    </div>
  </div>
  <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline">
          <h6 class="card-title mb-0">Cloud storage</h6>
          <div class="dropdown mb-2">
            <a type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
            </div>
          </div>
        </div>
        <div id="storageChart"></div>
        <div class="row mb-3">
          <div class="col-6 d-flex justify-content-end">
            <div>
              <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total storage <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
              <h5 class="fw-bolder mb-0 text-end">8TB</h5>
            </div>
          </div>
          <div class="col-6">
            <div>
              <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-primary"></span> Used storage</label>
              <h5 class="fw-bolder mb-0">~5TB</h5>
            </div>
          </div>
        </div>
        <div class="d-grid">
          <button class="btn btn-primary">Upgrade storage</button>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row -->

<div class="row">
  <div class="col-lg-5 col-xl-6 grid-margin grid-margin-xl-0 stretch-card">
    <div class="card">
      <div class="card-body ">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title mb-0">Inbox</h6>
          <div class="dropdown mb-2">
            <a type="button" id="dropdownMenuButton6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
            </div>
          </div>
        </div>
        <div class="d-flex flex-column">
          <a href="javascript:;" class="d-flex align-items-center border-bottom pb-3">
            <div class="me-3">
              <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
            </div>
            <div class="w-100">
              <div class="d-flex justify-content-between">
                <h6 class="text-body mb-2">Leonardo Payne</h6>
                <p class="text-muted tx-12">12.30 PM</p>
              </div>
              <p class="text-muted tx-13">Hey! there I'm available...</p>
            </div>
          </a>
          <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
            <div class="me-3">
              <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
            </div>
            <div class="w-100">
              <div class="d-flex justify-content-between">
                <h6 class="text-body mb-2">Carl Henson</h6>
                <p class="text-muted tx-12">02.14 AM</p>
              </div>
              <p class="text-muted tx-13">I've finished it! See you so..</p>
            </div>
          </a>
          <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
            <div class="me-3">
              <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
            </div>
            <div class="w-100">
              <div class="d-flex justify-content-between">
                <h6 class="text-body mb-2">Jensen Combs</h6>
                <p class="text-muted tx-12">08.22 PM</p>
              </div>
              <p class="text-muted tx-13">This template is awesome!</p>
            </div>
          </a>
          <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
            <div class="me-3">
              <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
            </div>
            <div class="w-100">
              <div class="d-flex justify-content-between">
                <h6 class="text-body mb-2">Amiah Burton</h6>
                <p class="text-muted tx-12">05.49 AM</p>
              </div>
              <p class="text-muted tx-13">Nice to meet you</p>
            </div>
          </a>
          <a href="javascript:;" class="d-flex align-items-center border-bottom py-3">
            <div class="me-3">
              <img src="https://via.placeholder.com/35x35" class="rounded-circle wd-35" alt="user">
            </div>
            <div class="w-100">
              <div class="d-flex justify-content-between">
                <h6 class="text-body mb-2">Yaretzi Mayo</h6>
                <p class="text-muted tx-12">01.19 AM</p>
              </div>
              <p class="text-muted tx-13">Hey! there I'm available...</p>
            </div>
          </a>
        </div>
      </div> 
    </div>
  </div>

  <div class="col-lg-7 col-xl-6 stretch-card">
    <div class="card">
      <div class="card-body ">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title mb-0">mission de jour</h6>
          <div class="dropdown mb-2">
            <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th class="pt-0">#</th>
                <th class="pt-0">Draiver Name</th>
                <th class="pt-0">Start Date</th>
                <th class="pt-0">Due Date</th>
                <th class="pt-0">Status</th>
            
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>AZIZ GR</td>
                <td>01/01/2022</td>
                <td>26/04/2022</td>
                <td><span class="badge bg-danger">Released</span></td>
              </tr>
              <tr>
          
            </tbody>
          </table>
        </div>
      </div> 
    </div>
  </div>
</div> <!-- row -->

    </div>


    @endsection