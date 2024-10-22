@extends('utama')

@section('judul_menu')
    Ini ditampilkan dari section judul menu. Dengan isi data adalah {{ $isi_data }} <br>

    @php
        
    @endphp

    @if ($isi_data == 1)
        Data diisi dengan angka 1 <br>
    @elseif ($isi_data > 1)
        Data diisi dengan angka lebih dari 1 <br>
    @else
        Tidak ada data atau data tidak valid <br>
    @endif

    @for ($i = 1 ; $i <= 5; $i++)
        <br> Nilainya adalah {{ $i }} <br>
    @endfor
    
@endsection

@section('isi_menu')
    <br><br> Ini ditampilkan dari section isi menu. 
@endsection