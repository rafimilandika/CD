
@extends('layouts.nav')

@section('contentuser')
<section class="content" style="margin-left: 25%; margin-top: 10%">
      <!-- <div class="container-fluid" style="margin-left: 25%;margin-top: 10%; overflow-x: hidden;> -->
        <div class="row">
          <div class="col-8">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><strong>PERTANYAANN</strong></h2>
              </div>
              <div class="card-body">

              <h3>{{ $tanya -> pertanyaan}}</h3>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <table style="width: 100%;">
                  <?php $number = $tanya->id; ?>
                  <tr>
                    <td><a href="{{ route('pertanyaan.show',[$number.'|b']) }}" class="btn btn-block btn-success btn-lg">BENAR</a></td>
                    <td style="width: 10%"></td>
                    <td><a onclick="" href="{{ route('pertanyaan.show',[$number.'|t']) }}" class="btn btn-block btn-danger btn-lg">TIDAK</a></td>
                  </tr>
                </table>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      <!-- </div> -->
    </section>
    <!-- /.content -->
  <!-- </div> -->
@endsection
