<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminTELCO-ANNIV | Liste</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
            <h1>Etat de control</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{$titreliste}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="overflow-x: scroll;">
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
                  @if($nomtable == 'candidat')
                  <td>{{$valeur->nom.' '.$valeur->prenom}}</td>
                  <td>{{$valeur->login}}</td>
                  <td>{{$valeur->codecandidat}}</td>
                  <td>{{$valeur->jour_naiss}}</td>
                  <td>{{$valeur->mois_naiss}}</td>
                  <td>{{$valeur->annee_naiss}}</td>
                  <td>{{$valeur->genre}}</td>
                  <td>{{$valeur->numero}}</td>
                  <td>{{$valeur->nbramis}}</td>
                  <td>{{($valeur->profil_complet)?'Complet':'Incomplet'}}</td>
                  <td style="text-align: center;"><a href="{{route('candidat')}}?id={{$valeur->id}}" class="btn btn-sm btn-primary modifier">Modifier</a></td>
                  @endif
                  @if($nomtable == 'anniversaire')
                  <td>{{$valeur->libelle}}</td>
                  <td style="text-align: right;">{{$valeur->nbrparticipe}}</td>
                  <td>{{($valeur->anniv_cloture)?'Cloturé':'Ouvert'}}</td>
                  <td style="text-align: center;"><a href="{{route('anniversaire')}}?id={{$valeur->id}}" class="btn btn-sm btn-primary modifier">Modifier</a></td>
                  @endif
                  @if($nomtable == 'recompense')
                  <td>{{$valeur->libelle}}</td>
                  <td>{{$valeur->description}}</td>
                  <td style="text-align: center;"><a href="{{route('recompense')}}?id={{$valeur->id}}" class="btn btn-sm btn-primary modifier">Modifier</a></td>
                  @endif
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admins/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{URL::asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{URL::asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{URL::asset('datatables/DataTables-1.10.16/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{URL::asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('plugins/fastclick/fastclick.js')}}"></script>
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
<!-- page script -->
<script>
  $(function () {
    
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
  });
</script>
</body>
</html>