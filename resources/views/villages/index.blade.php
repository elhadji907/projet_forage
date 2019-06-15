@extends('layout.index')
@section('content')
    

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                {{--                                              
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">SenForage</h4>
                  <p class="card-category"> Villages</p>
                </div>
                --}}
                <div class="card-body">
                  <div class="table-responsive">
                      <div align="right">
                          <button type="button" name="add" id="add_data" class="btn btn-success btn-sm">Ajouter</button>
                      </div>
                      <br />
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Nom
                        </th>
                        <th>
                            Chef
                        </th>
                        <th>
                          Info
                        </th>
                      </thead>
                      <tbody>
                          @foreach ($villages as $village)
                        <tr>
                          <td>
                            {{$village->id}} 
                          </td>
                          <td>
                            {{$village->nom}}<br>
                            Region de {{$village->commune->arrondissement->departement->region->nom}}<br>
                            Commune de {{$village->commune->nom}}

                          </td>
                          <td>
                                {{$village->chef->user->name."  ".$village->chef->user->firstname}}
                          </td>
                          <td>
                              <a class="btn btn-primary" href={{route('villages.show',['village'=>$village->id])}}><i class="material-icons">edit</i> </a>
                          </td>
                   
                        </tr>
                        @endforeach
                      </tbody>
                     
                    </table>
                    {{ $villages->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endsection