@php
header("Content-type: application/vnd-ms-excel");
$l = "Content-Disposition: attachment; filename=".$mulai."_sampai_".$sampai.".xls";
header($l);
@endphp
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Peserta</th>
            <th>Asal</th>
            <th>No. WA</th>
            <th>Email</th>
            <th>Tiket</th>
            <th>Kode Tiket</th>
            <th>Status</th>
            <th>Event</th>
            <th>Agen</th>
            <th>WA Agen</th>
            <th>Email Agen</th>
            <th>Tanggal Input</th>
            <th>Terakhir di update</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tiket as $t)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$t->nama_peserta}}</td>
            <td>{{$t->asal}}</td>
            <td>@if ($t->no_wa) +62{{$t->no_wa}} @endif</td>
            <td>{{$t->e_mail}}</td>
            <td>{{$t->nama_tiket}}</td>
            <td>{{$t->kode_tiket}}</td>
            <td>
                @if ($t->status)
                    <font color="green"> Sudah Lunas </font>
                @elseif ($t->status===0)
                    <font color="red"> Belum Lunas </font>
                @endif
            </td>
            <td>{{$t->nama_event}}</td>
            <td>{{$t->name}}</td>
            <td>{{$t->no_whatsapp}}</td>
            <td>{{$t->email}}</td>
            <td>{{$t->created_at}}</td>
            <td>{{$t->updated_at}}</td>
            <td>{{$t->keterangan}}</td>
        </tr>
        @endforeach
    </tbody>
</table>