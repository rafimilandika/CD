@extends('layouts.nav2')

@section('forum')      <!-- Direct Chat -->
@foreach($forum as $key=> $value)
<h1 style="color: white; text-align: center;">{{$value->nama_forum}}</h1>
<br>
@endforeach

<section class="content" style=" margin: 2%; margin-left: 8%;">
  <!-- <div class="container-fluid" style="margin: 10%; overflow-x: hidden;> -->
    <div class="row">
      <div class="col-11">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h2 class="card-title"><strong>Tambah Pesan</strong></h2>
            <i style="float: right;"></i>
          </div>
          <div class="card-body">
            <div class="card-body p-0">
              <form method="post" action="/kirim" enctype="multipart/form-data">
               {{ csrf_field() }}
               <input type="hidden" name="id" value="{{$value->nama_forum}}">
               <input type="hidden" name="user" value="{{Auth::user()->id}}">
               <div class="input-group" style="height: 5%;">
                <input type="textarea" name="text" placeholder="Masukkan pesan" class="form-control">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary btn-flat" name="kirim">Kirim</button>
                </span>
              </div> <br>
              <input type="file" name="gambar">
            </form>


            @foreach($chat as $key=> $value2)

            @if($value2->id_pengirim != Auth::user()->id)
            <div class="direct-chat-msg" style="margin-top: 2%;">
              <!-- /.direct-chat-info -->
              <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
              <div class="direct-chat-text">
                <b>{{$value2->name}}</b><i style="float: right;">{{$value2->waktu}}</i><br><br>
                {{$value2->chat}}<br>
                @if($value2->nama_gambar))
                <img src="{{ url('/data_file/'.$value2->nama_gambar) }}">
                @endif
              </div>
              <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
            @else
            <!-- Message to the right -->
            <div class="direct-chat-msg right" style="margin-top: 2%;">
              <!-- /.direct-chat-info -->
              <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
              <div class="direct-chat-text"  style="background-color:#25d366;">
                <i>{{$value2->waktu}}</i><b  style="float: right;">{{$value2->name}}</b><br><br>
                {{$value2->chat}}<br>
                @if($value2->nama_gambar))
                <img src="{{ url('/data_file/'.$value2->nama_gambar) }}">
                @endif
              </div>
              <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
            @endif

            @endforeach

          </div>         
        </div>

        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- </div> -->
</section>


@endsection