
@extends('admin.dash')

@section('admin') 
<div class="page-content">

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0 fs-3">Tableau de bord</h4>
  </div>


  <div class="d-flex align-items-center flex-wrap text-nowrap">
  
    <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="printer"></i>
      Imprimer
    </button>
    <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
      <i class="btn-icon-prepend" data-feather="download-cloud"></i>
      Telecharger le rapport 
    </button>
  </div>
</div>

<hr>

<style>h6{margin: 10px  0 10px 0;}</style>

<div class="row d-flex justify-content-between">
  <!-- Left Column -->


  <!-- Right Column -->
  <div class="col-12">
    <div class="mb-5">
      <div class="card">
        <div  class="card-body ">
          <div class="row">
            <div class="d-flex justify-content-between align-items-baseline">
              <h4 class="mb-3 mb-md-0 fs-3">Informations générales sur le département  
                </h4>
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


</div>

<hr>

<h4 class="mb-3  fs-3">statistiques</h4>

<hr>



<div class="row">

  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
      <div class="col-md-4 grid-margin stretch-card">
        <div  class="card">
    
          <div  class="card-body">
            <div class="d-flex justify-content-center align-items-baseline">
              <h6 class="card-title mb-0">voiteur en service</h6>
            </div>
            <div class="row mt-4" >
              <div class="">
                <h3 style="text-align: center"  class="mb-2">{{  $carnumber }}</h3>
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
              <h6 class="card-title mb-0">condecteur en service</h6>
            </div>
            <div class="row mt-4" >
              <div class="">
                <h3 style="text-align: center"  class="mb-2">{{$driverumber}}</h3>
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
              <h6 class="card-title mb-0"> missions non completé </h6>
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

      <hr>

      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-center align-items-baseline">
              <h6 class="card-title mb-0">voitures en maintenance</h6>
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
              <h6 class="card-title mb-0">nombre d'élement en stock</h6>
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
              <h6 class="card-title mb-0">date next event</h6>
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


<hr>



<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">

      
      <div class="col-md-4 grid-margin stretch-card">
        <div  class="card">
          <div class="card-body">
            <div class="d-flex justify-content-center align-items-baseline">
              <h6 class="card-title mb-0">date next event</h6>
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
              <h6 class="card-title mb-0">date next event</h6>
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
              <h6 class="card-title mb-0">date next event</h6>
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
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">Vue</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Supprimé</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Imprimer</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Telechager</span></a>
            </div>
          </div>
        </div>
        <div class="row align-items-start">
          <div class="col-md-7">
            <p class="text-muted tx-13 mb-3 mb-md-0"></p>
          </div>
          <div class="col-md-5 d-flex justify-content-md-end">
            <div class="btn-group mb-3 mb-md-0" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-outline-primary">Jour</button>
              <button type="button" class="btn btn-outline-primary d-none d-md-block">semaine</button>
              <button type="button" class="btn btn-primary">Mois</button>
              <button type="button" class="btn btn-outline-primary">Anées</button>
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
          <h6 class="card-title  mb-0">ventes mensuelles</h6>
          <div class="dropdown mb-2">
            <a type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">Vue</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Supprimé</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Imprimer</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Telecharger</span></a>
            </div>
          </div>
        </div>
        <p class="text-muted"></p>
        <div class="" id="monthlySalesChart"></div>
      </div> 
    </div>
  </div>
  <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline">
          <h6 class="card-title mb-0">Stockage Cloud</h6>
          <div class="dropdown mb-2">
            <a type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">Vue</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Supprimé</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Imprimer</span></a>
              <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Telecharger</span></a>
            </div>
          </div>
        </div>
        <div id="storageChart"></div>
        <div class="row mb-3">
          <div class="col-6 d-flex justify-content-end">
            <div>
              <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Stockage Total <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
              <h5 class="fw-bolder mb-0 text-end">8TB</h5>
            </div>
          </div>
          <div class="col-6">
            <div>
              <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-primary"></span> Stockage Utilisé</label>
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
  <div class="col-lg-7 col-xl-6 stretch-card">
    
      <x-chat-aside :currentUserId="$currentUserId" :users="$users" />

  
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
                  <th class="pt-0">Name</th>
                  <th class="pt-0">Mission Type</th>
                  <th class="pt-0">Lieu Mission</th>
                  <th class="pt-0">Mission Start</th>
              </tr>
          </thead>
          <tbody>
              @foreach($missions as $key => $mission)
              <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $mission->name }}</td>
                  <td>{{ $mission->mission_type }}</td>
                  <td>{{ $mission->lieu_mission }}</td>
                  <td>{{ $mission->mission_start }}</td>
              </tr>
              @endforeach
          </tbody>
          </table>
        </div>
      </div> 
    </div>
  </div>
</div> <!-- row -->

    </div>


    @endsection