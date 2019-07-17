@include('flash::message')

<div align="right">
    <a href="{{route('clients.selectvillage')}}"><div class="btn btn-success">Nouvelle Demande&nbsp;<i class="fas fa-user-plus"></i></div></a> 
</div>
<br />
{{-- <!-- Icon Cards--> --}}
@roles('Administrateur|Gestionnaire|Comptable|Agent')
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-comments"></i>
        </div>
       {{--  <div class="mr-5">26 New Messages!</div> --}}
       <div class="mr-5">{{ \App\Client::get()->count() }} Clients</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{ route('clients.index') }}">
        <span class="float-left">Voir les détails</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-list"></i>
        </div>
        <div class="mr-5">{{ \App\Abonnement::get()->count() }} Abonnements</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{ route('abonnements.index') }}">
        <span class="float-left">Voir les détails</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-shopping-cart"></i>
        </div>
        <div class="mr-5">{{ \App\Compteur::doesntHave('abonnement')->get()->count() }} Compteurs disponibles<br />
        </div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{ route('compteurs.index') }}">
        <span class="float-left">Voir les détails</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-life-ring"></i>
        </div>
        <div class="mr-5">{{ \App\Facture::doesntHave('reglement')->get()->count() }} Factures non réglées</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="{{ route('factures.index') }}">
        <span class="float-left">Voir les détails</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
</di    
      {{-- <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-chart-area"></i>
          Area Chart Example</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div> --}}

    {{--   @include('clients.index') --}}

@endroles

@push('scripts')
<script type="text/javascript">
$(document).ready(function () {
    $('#table-clients').DataTable( { 
      "processing": true,
      "serverSide": true,
      "ajax": "{{route('clients.list')}}",
      columns: [
              { data: 'id', name: 'id' },
              { data: 'user.name', name: 'user.name' },
              { data: 'user.firstname', name: 'user.firstname' },
              { data: 'user.email', name: 'user.email' },
              { data: null ,orderable: false, searchable: false}

          ],
          "columnDefs": [
                  {
                  "data": null,
                  "render": function (data, type, row) {
                  url_e =  "{!! route('clients.edit',':id')!!}".replace(':id', data.id);
                  url_d =  "{!! route('clients.destroy',':id')!!}".replace(':id', data.id);
                  return '<a href='+url_e+'  class=" btn btn-primary edit " title="Modifier"><i class="far fa-edit">&nbsp;Edit</i></a>&nbsp;'+
                  '<div class="btn btn-danger delete btn_delete_client" data-href='+url_d+'><i class="fas fa-times">&nbsp;Delete</i></div>';
                  },
                  "targets": 4
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

                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ],

                "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Tout"] ],
                
           


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


  $('#table-clients').off('click', '.btn_delete_client').on('click', '.btn_delete_client',
  function() { 
    var href=$(this).data('href');
    $('#form-delete-client').attr('action', href);
    $('#modal_delete_client').modal();
  });
  
});
</script> 
@endpush