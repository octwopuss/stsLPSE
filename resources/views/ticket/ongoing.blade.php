<?php $title = "Tiket yang Sedang Berjalan"; ?>
@extends('layout.base')
@section('content')
<div class="row">
    <div class="main-header">
      @if(session()->has('sukses'))
        <div class="alert alert-success alert-dismissible" style="width: 50%; margin: 0 20% 0 20%;">
          <strong><i class="icon-check"></i>&nbsp;{{ session()->get('sukses') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @elseif(session()->has('danger'))
        <div class="alert alert-danger alert-dismissible" style="width: 50%; margin: 0 20% 0 20%;">
          <strong><i class="icon-check"></i>&nbsp;{{ session()->get('danger') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <h4>On Going Ticket</h4>
    </div>
</div>
<div class="card">
    <div class="card-block">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <sup>Klik no. tiket untuk melacak tiket</sup>
                <table id="dataTable" class="display">
                    <thead>
                    <tr>
                        <th>No. Tiket</th>
                        <th>Urgensi</th>
                        <th>Judul Laporan</th>
                        <th>Kategori</th>
                        <th>Dibuat Pada</th>
                        <th>Limit Penyelesaian</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach($tickets as $ticket)
                        <td><a href="{{ route('trackTicket', $ticket->nomor_ticket) }}" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Lacak Tiket Ini"><u>{{$ticket->nomor_ticket}}</u></a></td>
                        @if($ticket->urgensi == "Darurat")
                          <td class="bg-danger">{{$ticket->urgensi}}</td>
                        @elseif($ticket->urgensi == "Penting")
                          <td class="bg-warning">{{$ticket->urgensi}}</td>
                        @elseif($ticket->urgensi == "Normal")
                          <td>{{$ticket->urgensi}}</td>
                        @endif
                        <td>{{$ticket->aduan->subjek}}</td>
                        <td>{{$ticket->aduan->kategori->kategori}}</td>
                        <td>{{date_format($ticket->created_at, 'd-m-Y H:i:s')}}</td>
                        <td>{{$ticket->expire}}</td>
                        <td>
                            @if(null !== $ticket->isAssigned)
                            <button class="btn btn-secondary" data-toggle="modal" data-target="#myModal" disabled>Assigned</button>
                            @else
                            <span data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Assign Ticket">
                              <button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$ticket->id}}"><i class="icon-flag"></i></button>
                            </span>
                            @endif
                          <a href="{{route('detailTicketOngoing', $ticket->id)}}" class="btn btn-info" target="_blank" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Detail Tiket"><i class="icon-info"></i></a>
                          <a href="{{route('editTicket', $ticket->aduan->id)}}" class="btn btn-success" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Edit"><i class="icon-pencil"></i></a>
                          <a class="btn btn-danger"
                             onclick="event.preventDefault();
                                    if(!confirm('apakah anda yakin untuk menghapus tiket?')) return false; document.getElementById('close-ticket').submit();" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" title="Hapus Tiket">
                              <i class="icon-trash"></i>
                          </a>

                          <form id="close-ticket" action="{{ route('destroyTicket') }}" method="POST" style="display: none;">
                              @csrf
                              <input type="hidden" name="id" value="{{ $ticket->id }}">
                              <input type="hidden" name="halaman" value="1">
                          </form>

                            <!-- MODAL -->
                          <div id="myModal{{$ticket->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Assign Ticket</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('assignTicket')}}" method="POST">
                                    @php
                                        $users = DB::table('users')->get();
                                    @endphp
                                        @csrf
                                        <label for="assign to"> Assign To</label>
                                        <select name="assignTo" class="form-control" style="width: 90%">
                                        @foreach($users as $user)
                                            @if($user->role != 3)
                                            <option value="{{$user->role}}">{{$user->jabatan}}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                        <input type="hidden" name="ticket_id" value="{{$ticket->id}}" class="form-control">
                                        <input type="hidden" name="nomor_ticket" value="{{$ticket->nomor_ticket}}" class="form-control">
                                        <button type="submit" class="btn btn-primary" style="margin-top: 10px">Submit</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </div>

                            </div>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@section('AddScript')
<script type="text/javascript">
    function actnav() {
      var element = document.getElementById("ongoing");
      element.classList.add("active");
    }
</script>
@stop
