<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{URL::asset('plugins/datatables/dataTables.bootstrap4.css')}}">
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
            <div class="card-body">
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
                  <td>{{$valeur->nom.' '.$valeur->prenom}}</td>
                  <td>{{$valeur->login}}</td>
                  <td>{{$valeur->codecandidat}}</td>
                  <td>{{$valeur->jour_naiss}}</td>
                  <td>{{$valeur->mois_naiss}}</td>
                  <td>{{$valeur->annee_naiss}}</td>
                  <td>{{$valeur->genre}}</td>
                  <td>{{$valeur->numero}}</td>
                  <td>{{$valeur->nbramis}}</td>
                  <td>{{$valeur->profil_complet}}</td>
                  <td><a href="{{route('candidat')}}?id={{$valeur->id}}" class="btn btn-sm btn-primary modifier">Modifier</a></td>
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
<script src="{{URL::asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<!-- SlimScroll -->
<script src="{{URL::asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
