<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminTELCO-ANNIV | Anniversaire</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::asset('plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{URL::asset('plugins/iCheck/all.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{URL::asset('plugins/select2/select2.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{URL::asset('datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <!-- Buttons-1.5.1 -->
  <link rel="stylesheet" type="text/css" href="{{URL::asset('datatables/Buttons-1.5.1/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{URL::asset('datatables/Buttons-1.5.1/css/buttons.dataTables.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('admins/navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admins/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Gestion des anniversaires</h1>
          </div>
          @if(isset($statut))
          <div class="col-sm-12">
            <div class="card bg-{{$statut?'success':'danger'}}-gradient">
              <div class="card-header">
                <h3 class="card-title">{{$message}}</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
            </div>
          </div>
          @endif
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          
            <div class="card-header">
              <h3 class="card-title">Modification</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <form method="post" action="{{route('anniversaire')}}">
            {{csrf_field()}}
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputFile">Photo de la recompense</label>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <img width="50%" id="affiche" src="{{URL::asset('images/cadeaux/'.$anniversaire->photo)}}" alt="Aucune image du cadeau">
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="custom-file">
                        <a href="{{route('recompense')}}?id={{$anniversaire->id_recompense}}">Modifier la recompense</a>
                      </div>
                    </div>
                  </div>
                  <!-- Choix de la recompense -->
                  <div class="form-group">
                    <label>Recompense</label>
                    <select id="idrecompense" name="idrecompense" class="form-control select2" style="width: 100%;">
                      <option value="">Sélectionnez</option>
                      @foreach($recompenses as $recompense)
                      <option {{($anniversaire->id_recompense == $recompense->id) ? "selected":""}} value="{{$recompense->id}}">{{$recompense->photo}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="nom">Libelle</label>
                    <input value="{{$anniversaire->libelle}}" required type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le nom">
                  </div>               
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date Anniversaire</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input value="{{date('d/m/Y',strtotime($anniversaire->date_anniv))}}" required id="dateanniv" name="dateanniv" type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label for="gagnant">Gagnant</label>
                    <input id="gagnant" value="{{isset($legagnant->nom)? $legagnant->nom.' '.$legagnant->prenom:'Aucun'}}" disabled type="text" class="form-control">
                  </div>
                  
                  <!-- Profil -->
                  <div class="form-group">
                    <label>
                      <input type="checkbox" class="minimal" checked="{($anniversaire->anniv_cloture)?'true':'false'}}"> Anniversaire Cloturé
                    </label>
                  </div>
                  <!-- <div class="form-group">
                    <label for="nombre">Nombre de candidats</label>
                    <input id="nombre" disabled type="text" class="form-control"  value="">
                  </div> -->
                  <div class="form-group">
                    <label for="derniere">Date dernière modification</label>
                    <input value="{{isset($anniversaire->updated_at)? date('d-m-Y',strtotime($anniversaire->updated_at)):''}}" disabled type="text" class="form-control" id="derniere">
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer" style="text-align:right;">
              <input type="hidden" name="id" value="{{$anniversaire->id}}">
              <input class="btn btn-primary push-rigth" type="submit" value="Valider">
            </div>
          </form>
          @if(!empty($anniversaire->id))
          <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  @foreach($colonnes as $key => $valeur)
                  <th>{{$valeur}}</th>
                  @endforeach
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($participants as $key => $valeur)
                <tr>
                  <td>{{$valeur->nom.' '.$valeur->prenom}}</td>
                  <td>{{$valeur->login}}</td>
                  <td>{{$valeur->codecandidat}}</td>
                  <td>{{$valeur->annee_naiss}}</td>
                  <td>{{$valeur->genre}}</td>
                  <td>{{$valeur->numero}}</td>
                  <td>{{($valeur->profil_complet)?'Complet':'Incomplet'}}</td>
                  <td style="text-align: center;"><a href="{{route('candidat')}}?id={{$valeur->id}}" class="btn btn-sm btn-primary modifier">Modifier</a></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  @foreach($colonnes as $key => $valeur)
                  <th>{{$valeur}}</th>
                  @endforeach
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
          </div>
          @endif
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admins/footer')
  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{URL::asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{URL::asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{URL::asset('plugins/select2/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{URL::asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{URL::asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{URL::asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{URL::asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- DataTables -->
<script src="{{URL::asset('datatables/DataTables-1.10.16/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons  -->
<script src="{{URL::asset('datatables/Buttons-1.5.1/js/buttons.colVis.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('datatables/Buttons-1.5.1/js/buttons.html5.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('datatables/Buttons-1.5.1/js/buttons.print.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('datatables/Buttons-1.5.1/js/dataTables.buttons.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('datatables/Buttons-1.5.1/js/jszip-3.1.3.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('datatables/Buttons-1.5.1/js/pdfmake-0.1.36.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('datatables/Buttons-1.5.1/js/vfs_fonts-0.1.36.js')}}" type="text/javascript"></script>
<!-- iCheck 1.0.1 -->
<script src="{{URL::asset('plugins/iCheck/icheck.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('dist/js/demo.js')}}"></script>
<!-- Page script -->
<script>
  $(function () {
    $("#idrecompense").on('click change',function(){
      $('#affiche').attr('src','../images/cadeaux/'+$(this).find('option:checked').text());
    });

    //Initialize Select2 Elements
    $('.select2').select2();
    $('.js-example-basic-single').select2({
      placeholder: 'Select an option'
    });

    var table = $('#table').DataTable({
      dom: 'Bfrtip',
      buttons: [
              'pageLength', 'print','copy','csv','excel', 'pdf'
            ],
      "responsive": true,
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Afficher Tous"]],
      "language" : {
        "decimal" : ',',
        "thousand" : '.',
        "lengthMenu": "Afficher _MENU_ lignes par page",
        "zeroRecords": "Aucun résultat - désolé",
        "info": "Vue de _START_ à _END_ sur _TOTAL_",
        "infoEmpty": "Pas de données enregistrées",
        "infoFiltered": "(filtré sur _MAX_ lignes total)",
        "search" : "Rechercher",
        "oPaginate" : {
            "sPrevious": "Préc",
            "sNext":     "Suiv"
        }
      },
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });

    $('#table tfoot th:not(th:last-child)').each(function(){
        var title = $(this).text();
        
        $(this).html('<input style="width:100%;" type="text" placeholder="'+title+'" />');
    });
 
    // Apply the search
    table.columns().every(function () {
        var that = this;
 
        $('input', this.footer() ).on('keyup change', function(){
            if (that.search() !== this.value ){
                that.search( this.value ).draw();
            }
        } );
    } );
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
    //Money Euro
    $('[data-mask]').inputmask();

    
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    
  })
</script>
</body>
</html>
