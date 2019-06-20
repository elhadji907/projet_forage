@extends('layout.index')
@section('content')
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card"> 
                  <div class="card-header">
                      <i class="fas fa-table"></i>
                      Liste des utilisateurs
                  </div>              
                <div class="card-body">
                      <div class="table-responsive">
                          <div align="right">
                            <a href="{{route('administrateurs.create')}}"><div class="btn btn-success">Nouveau Utilisateur&nbsp;<i class="fas fa-user-plus"></i></div></a>
                          </div>
                          <br />
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-administrateurs">
                          <thead class="table-dark">
                            <tr>
                              <th>ID</th>
                              <th>Matricule</th>
                              <th>Nom</th>
                              <th>Prenom</th>
                              <th>Email</th>
                              <th>Téléphone</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tfoot class="table-dark">
                              <tr>
                                <th>ID</th>
                                <th>Matricule</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
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

      @push('scripts')
      <script type="text/javascript">
      $(document).ready(function () {
          $('#table-administrateurs').DataTable( { 
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('administrateurs.list')}}",
            columns: [
                    { data: 'id', name: 'id' },
                    { data: 'matricule', name: 'matricule' },
                    { data: 'user.name', name: 'user.name' },
                    { data: 'user.firstname', name: 'user.firstname' },
                    { data: 'user.email', name: 'user.email' },
                    { data: 'user.telephone', name: 'user.telephone' },
                    { data: null ,orderable: false, searchable: false}

                ],
                "columnDefs": [
                        {
                        "data": null,
                        "render": function (data, type, row) {
                        url_e =  "{!! route('administrateurs.edit',':id')!!}".replace(':id', data.id);
                        url_d =  "{!! route('administrateurs.destroy',':id')!!}".replace(':id', data.id);
                        return '<a href='+url_e+'  class=" btn btn-primary edit " title="Modifier"><i class="far fa-edit">&nbsp;Edit</i></a>&nbsp;'+
                        '<a class="btn btn-danger delete" title="Supprimer" href='+url_d+'><i class="fas fa-times">&nbsp;Delete</i></a>';
                        },
                        "targets": 6
                        },
                    // {
                    //     "data": null,
                    //     "render": function (data, type, row) {
                    //         url =  "{!! route('clients.edit',':id')!!}".replace(':id', data.id);
                    //         return check_status(data,url);
                    //     },
                    //     "targets": 1
                    // }
                ],
                language: {
                  "sProcessing":     "Traitement en cours...",
                  "sSearch":         "Rechercher&nbsp;:",
                  "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                  "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                  "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                  "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                  "sInfoPostFix":    "",
                  "sLoadingRecords": "Chargement en cours...",
                  "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                  "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                  "oPaginate": {
                      "sFirst":      "Premier",
                      "sPrevious":   "Pr&eacute;c&eacute;dent",
                      "sNext":       "Suivant",
                      "sLast":       "Dernier"
                  },
                  "oAria": {
                      "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                      "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                  },
                  "select": {
                          "rows": {
                              _: "%d lignes séléctionnées",
                              0: "Aucune ligne séléctionnée",
                              1: "1 ligne séléctionnée"
                          } 
                  }
                },
              
          });

          //supprimer une donnée
          {{-- /*  $(document).on('click', '.delete', function(){
            var id = $(this).attr('id');
            if(confirm("Êtes-vous sûr de bien vouloir cette donnée !"))
            {
              $.ajax({
                url:"{{route('clients.removedata')}}",
                mehtod:"get",
                data:{id:id},
                success:function(data)
                {
                    alert(data);
                    $('#table-clients').DataTable().ajax.reload();
                }
            })
            }
            else
            {
              return false;
            }
          });  */ --}}

      });
{{--  
      $(function() {
 
        // Récupération des id pour pays et role
        var country_id = {{ old('country', $author->city->country->id) }};
        var city_id = {{ old('city', $author->city->id) }};
     
        // Sélection du pays
        $('#country').val(country_id).prop('selected', true);
        // Synchronisation des villes
        cityUpdate(country_id);
     
        // Changement de pays
        $('#country').on('change', function(e) {
            var country_id = e.target.value;
            city_id = false;
            cityUpdate(country_id);
        });
     
        // Requête Ajax pour les villes
        function cityUpdate(countryId) {
            $.get('{{ url('cities') }}/'+ countryId + "'", function(data) {
                $('#city').empty();
                $.each(data, function(index, cities) {
                    $('#city').append($('<option>', { 
                        value: cities.id,
                        text : cities.name 
                    }));
                });
                if(city_id) {
                    $('#city').val(city_id).prop('selected', true);
                }
            });
        }
         
    });  --}}
    </script>
      </script> 
  @endpush