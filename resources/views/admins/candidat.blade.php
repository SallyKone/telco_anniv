<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminTELCO-ANNIV | Candidat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::asset('plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('dist/css/adminlte.min.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{URL::asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{URL::asset('plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{URL::asset('plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{URL::asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
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
          <div class="col-sm-6">
            <h1>Gestion des Candidats</h1>
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
          <form method="post" action="{{route('candidat')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-header">
              <h3 class="card-title">Modification</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputFile">Photo</label>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <img width="50%" id="imgaffiche" src="{{URL::asset('/images/img/avatar/'.$candidat->photo)}}" alt="photo de profil du Candidat">
                      </div>
                    </div>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="photo" type="file" class="custom-file-input" id="imgInp">
                        <label id="labelimg" class="custom-file-label" for="imgInp">Choisir une photo</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nom">Nom</label>
                    <input value="{{$candidat->nom}}" required type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom">
                  </div>
                  <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input value="{{$candidat->prenom}}" required type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez le prénom">
                  </div>
                  <div class="form-group">
                    <label>Date naissance</label>
                    <div class="row">
                      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <select name="jour" class="form-control select2" style="width: 100%;">
                          <option value="">Jour</option>
                          @for($i=1; $i <= 31; $i++)
                            <option {{ (int)$candidat->jour_naiss == $i ? 'selected' : ''}} value="{{$i}}">{{$i<10 ? '0'.$i : $i}}</option>
                          @endfor
                        </select>
                      </div>
                      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <select name="mois" class="form-control select2" style="width: 100%;">
                          <option value="">Mois</option>
                          @for($j=1; $j <= 12; $j++)
                            <option {{ (int)$candidat->mois_naiss == $j ? 'selected' : ''}} value="{{$j}}">{{$j<10 ? '0'.$j : $j}}</option>
                          @endfor
                        </select>
                      </div>
                      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <select name="annee" class="form-control select2" style="width: 100%;">
                          <option value="">Année</option>
                          @for($i=1960; $i <= 2100; $i++)
                            <option {{ (int)$candidat->annee_naiss == $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- Genre -->
                  <div class="form-group">
                    <label for="mtpass">Genre</label>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label>
                          <input {{$candidat->genre == 'm' ? 'checked' : ''}} type="radio" name="genre" value="m" class="minimal"> Masculin
                        </label>&nbsp;&nbsp;&nbsp;
                        <label>
                          <input {{$candidat->genre == 'f' ? 'checked' : ''}} type="radio" name="genre" value="f" class="minimal"> Feminin
                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- phone -->
                  <div class="form-group">
                    <label>Téléphone</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                      </div>
                      <input name="numero" value="{{$candidat->numero}}" type="text" class="form-control">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form-group -->
                  
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="codecandidat">Code de vote</label>
                    <input value="{{$candidat->codecandidat}}" disabled type="text" class="form-control" id="codecandidat" name="codecandidat">
                  </div>
                  <div class="form-group">
                    <label for="login">Login</label>
                    <input value="{{$candidat->login}}" disabled type="text" class="form-control" id="lelogin" name="lelogin">
                  </div>

                  <div class="form-group">
                    <label for="mtpass">Mot de passe</label>
                    <input disabled value="{{$candidat->motpass}}" type="text" class="form-control" placeholder="">
                  </div>
                  
                  <!-- Type de Pièces et identifiant -->
                  <div class="form-group">
                    <label>Type de Pièces</label>
                    <select name="idtypiece" class="form-control select2" style="width: 100%;">
                      <option value="">Sélectionnez un type</option>
                      @foreach($typepieces as $typepiece)
                        <option {{($candidat->id_typepiece == $typepiece->id) ? "selected":""}} value="{{$typepiece->id}}">{{$typepiece->abreviation}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="numpiece">ID de la Pièce</label>
                    <input value="{{$candidat->numpiece}}" type="text" class="form-control" id="numpiece" name="numpiece" placeholder="Entrez l'identifiant de la pièce">
                  </div>
                  <!-- Nationalité -->
                  <div class="form-group">
                    <label for="idpays">Pays</label>
                    <select id="idpays" name="idpays" class="form-control select2" style="width: 100%;">
                      <option value="">Sélectionner le pays</option>
                      @foreach($pays as $valeur)
                        <option {{($candidat->id_pays == $valeur->id) ? "selected":""}} value="{{$valeur->id}}">{{$valeur->nom_fr_fr}}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- Profil -->
                  <div class="form-group">
                    <label>
                      <input type="checkbox" class="minimal" disabled> Profil complet
                    </label>
                  </div>
                  <div class="form-group">
                    <label>Date dernière modification</label>
                    <input value="{{isset($candidat->updated_at)? date('d-m-Y',strtotime($candidat->updated_at)):''}}" disabled type="text" class="form-control">
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer" style="text-align:right;">
              <input type="hidden" name="id" value="{{$candidat->id}}">
              <input class="btn btn-primary push-rigth" type="submit" value="Valider">
            </div>
          </form>
          @if(!empty($candidat->id))
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
                @foreach($lists as $key => $valeur)
                <tr>
                  <td>{{$valeur->nom}}</td>
                  <td>{{$valeur->numero}}</td>
                  <td style="text-align: center;"><a href="{{route('ami')}}?id={{$valeur->id}}" class="btn btn-sm btn-primary modifier">Modifier</a></td>
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
<script src="{{URL::asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{URL::asset('plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{URL::asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{URL::asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{URL::asset('plugins/iCheck/icheck.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('plugins/fastclick/fastclick.js')}}"></script>
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
<!-- AdminLTE App -->
<script src="{{URL::asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('dist/js/demo.js')}}"></script>
<!-- Page script -->
<script>
  $(function () {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgaffiche').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
        $("#labelimg").html($("#imgInp").val());
    });
    //Initialize Select2 Elements
    $('.select2').select2();
    $('.js-example-basic-single').select2({
      placeholder: 'Select an option'
    });

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
  })
</script>
</body>
</html>
