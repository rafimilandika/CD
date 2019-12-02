

@extends('layouts.nonav')

@section('contentuser')
<section class="content" style=" margin: 10%; margin-top: 10%">
  <!-- <div class="container-fluid" style="margin: 10%; overflow-x: hidden;> -->
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h2 class="card-title"><strong>List Diagnosa</strong></h2><br/>
            <i>Hsil Diagnosa Anda</i>
          </div>
          @csrf
          <div class="card-body">
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr style="text-align: center;">
                    <th>Nama Penyakit</th>
                    <th>Persentase</th>
                    <th>Pilih</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($akhir4 as $key=> $value)
                  <tr>
                    <td style="text-align: center;">{{$value -> nama_penyakit}}</td>
                    <td style="text-align: center;">{{$value -> persentase}}</td>
                    <td style="text-align: center;" id="{{$value -> id_penyakit}}" value="{{$value -> id_penyakit}}" name="id"><a href="{{ route('hasil',[$value -> id_penyakit])}}" class=""><button><i class="fa fa-fw fa-eye"></i> Detail</button></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <br>

            </div>         
          </div>
          <!-- /.card-body -->
            <!-- <div class="card-footer">

            </div> -->
            <a href="{{ route('kembali') }}"><button style="margin-bottom:3%; margin-left: 3% ">Kembali</button></a>
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
     
      