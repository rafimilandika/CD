
@extends('layouts.nav')

@section('contentuser')
<section class="content" style=" margin: 10%; margin-top: 2%">
  <!-- <div class="container-fluid" style="margin: 10%; overflow-x: hidden;> -->
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h2 class="card-title"><strong>List Diagnosa</strong></h2><br/>
            <i>Silahkan centang diagnosa berikut ini</i>
          </div>
          <form method="POST" action="{{ route('diagnosa.store') }}">
            @csrf
            <div class="card-body">
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Gejala</th>
                      <th>Pilih</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key=> $value)
                    <tr>
                      <td style="text-align: center;">{{ $value -> id_gejala }}</td>
                      <td style="padding-left:8%;">{{ $value -> nama_gejala}}</td>
                      <td style="text-align: center;"><input type="checkbox" id="{{ $value -> id_gejala }}" value="{{ $value -> id_gejala }}" name="gejala[]"></td>
                      <input type="hidden" name="jum" id="jum" value="$jum">
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
                <input type="submit" name="submit" value="Diagnosa" class="btn btn-block btn-info btn-lg" style="width: 30%">
              </div>         
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">

            </div> -->
          </form>
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
