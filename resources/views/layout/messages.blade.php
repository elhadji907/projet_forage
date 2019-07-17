@extends('layout.index')
@section('content')
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif 
          <div class="row">
            <div class="col-md-12">
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
              <div class="card"> 
                  <div class="card-header">
                      <i class="fas fa-table"></i>
                      Liste des messages
                  </div>              
                <div class="card-body">
                      <div class="table-responsive">
                         
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-messages">
                          <thead class="table-dark">
                            <tr>
                              <th>ID</th>
                              <th>Nom</th>
                              <th>Message</th>
                              <th>Email</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tfoot class="table-dark">
                              <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Message</th>
                                <th>Email</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                          <tbody>                           
                          </tbody>
                      </table>                        
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endsection
