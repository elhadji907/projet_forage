@extends('layout.index')
@section('content')
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                {{--  
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">SenForage</h4>
                  <p class="card-category">Clients</p>
                </div>
                  --}}
                <div class="card-body">
                  <div class="table-responsive">
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
                                Prenom
                            </th>
                            <th>
                              Info
                            </th>
                          </thead>
                          <tbody>
                              @foreach ($clients as $client)
                            <tr>
                              <td>
                                {{$client->id}} 
                              </td>
                              <td>
                                  {{$client->user->name}} 
    
                              </td>
                              <td>
                                  {{$client->user->firstname}} 
                              </td>
                              <td>
                                  <a class="btn btn-primary" href={{route('clients.show',['client'=>$client->id])}}><i class="material-icons">edit</i> </a>
                                  <a class="btn btn-danger" href={{route('clients.destroy',['client'=>$client->id])}}><i class="material-icons">delete</i> </a>
                              </td>
                       
                            </tr>
                            @endforeach
                          </tbody>
                         
                        </table>
                        {{ $clients->links() }}
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endsection