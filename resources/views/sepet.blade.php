@extends('layouts.sablon')
@section('title','Sepet')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>

            @if(count(Cart::content())>0)  <!-- Sepette ürün varsa çalıştırır. -->

            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Ürün</th>
                    <th>Adet Fiyatı</th>
                    <th>Adet</th>
                    <th>Tutar</th>
                </TR>

                @foreach(Cart::content() as $urunCartItem)
                    <tr>
                        <td style="width: 120px;">
                            <a href="{{ route('urun', $urunCartItem->options->slug) }}">
                                <img src="http://via.placeholder.com/120x100?text=UrunResmi">
                            </a>
                        </td>
                        <td>
                             <a href="{{route('urun',str_slug($urunCartItem->name))}}">
                                {{ $urunCartItem->name }}
                             </a>

                              <!-- SEPETTEN ÜRÜN KALDIRMA-->
                            <form action="{{route('sepet.kaldir',$urunCartItem->rowId)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" class="btn btn-danger btn-xs" value="Sepetten Kaldır">
                            </form>
                        </td>

                        <td>{{ $urunCartItem->price }} ₺</td>

                        <td>
                            <a href="#" class="btn btn-xs btn-default urun-adet-azalt" data-id="{{$urunCartItem->rowId}}" data-adet="{{$urunCartItem->qty-1}}">-</a>
                            <span style="padding: 10px 20px">{{ $urunCartItem->qty }}</span>
                            <a href="#" class="btn btn-xs btn-default urun-adet-artir" data-id="{{$urunCartItem->rowId}}" data-adet="{{$urunCartItem->qty+1}}">+</a>
                        </td>

                        <td class="text-right">
                            {{ $urunCartItem->subtotal }} ₺
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Toplam</th>
                    <td class="text-right">{{ Cart::subtotal() }} ₺</td>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">KDV</th>
                    <td class="text-right">{{ Cart::tax() }} ₺</td>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Genel Toplam</th>
                    <td class="text-right">{{ Cart::total() }} ₺</td>
                </tr>
            </table>
            <div>
                <!-- SEPETİ BOŞALTMA -->
                <form action="{{route('sepet.bosalt',$urunCartItem->rowId)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input type="submit" class="btn btn-info pull-left" value="Sepeti Boşalt">
                </form>

                <a href="{{route('odeme')}}" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
            </div>

            @else <!-- Sepette ürün yoksa çalıştırır. -->
                <p>Sepetinizde ürün yok!</p>
            @endif


        </div>
    </div>
@endsection
