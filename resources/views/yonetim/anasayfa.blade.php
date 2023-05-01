@extends('yonetim.layouts.sablon')
@section('title','Anasayfa')
@section('content')
    <h1 class="page-header">Kontrol Paneli</h1>

    <section class="row text-center placeholders">
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Bekleyen Sipariş Sayısı</div>
                <div class="panel-body">
                    <h4>{{$istatistikler['bekleyen_siparis']}}</h4>
                    <p>Adet</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Tamamlanan Sipariş Sayısı</div>
                <div class="panel-body">
                    <h4>{{$istatistikler['tamamlanan_siparis']}}</h4>
                    <p>Adet</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Toplam Ürün</div>
                <div class="panel-body">
                    <h4>{{$istatistikler['toplam_urun']}}</h4>
                    <p>Adet</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Toplam Kullanıcı</div>
                <div class="panel-body">
                    <h4>{{$istatistikler['toplam_kullanici']}}</h4>
                    <p>Kişi</p>
                </div>
            </div>
        </div>
    </section>


    <section class="row">
        <div class="col-sm-6">
            <div>
                <canvas id="coksatanchart"></canvas>
            </div>
        </div>

        <div class="col-sm-6">
            <div>
                <canvas id="ayagoresatischart"></canvas>
            </div>
        </div>
    </section>

@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <script>
        /* ÇOK SATAN ÜRÜNLER GRAFİĞİ*/
        @php
            $labels = "";
            $data = "";
            foreach($cok_satan_urunler as $rapor) {
                $labels .= "\"$rapor->urun_adi\", ";
                $data .= "$rapor->adet, ";
            }
        @endphp

        const ctx = document.getElementById('coksatanchart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [{!! $labels !!}],
                datasets: [{
                    label: 'Çok Satan Ürünler',
                    data: [{!! $data !!}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 2
                }]

            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }


        });

        /* AYLARA GÖRE SATIŞ GRAFİĞİ*/
        @php
            $labels = "";
            $data = "";
            foreach($aylara_gore_satislar as $rapor) {
                $labels .= "\"$rapor->ay\", ";
                $data .= "$rapor->adet, ";
            }
        @endphp
        const ctx1 = document.getElementById('ayagoresatischart');
         var ayagoresatischart=new Chart(ctx1, {
            type: 'line',
            data: {
                labels: [{!! $labels !!}],
                datasets: [{
                    label: 'Aylara Göre Satış Oranı',
                    data: [{!! $data !!}],
                    fill: false,
                    borderColor: 'rgb(180,9,72)',
                    tension: 0.1,
                    borderWidth: 2
                }]

            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }


        });


    </script>
@endsection
