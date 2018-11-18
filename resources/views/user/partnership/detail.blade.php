@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$partnership->content}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-right">
                        @if($partnership->active)
                            <a style="color: white; text-decoration: none" href="{{route('admin.partnership.status',["id"=>$partnership->id,"active"=>0])}}"><button type="button" class="btn btn-primary">Hentikan Pemasaran</button></a>
                        @else
                            <a style="color: white; text-decoration: none" href="{{route('admin.partnership.status',["id"=>$partnership->id,"active"=>1])}}"><button type="button" class="btn btn-primary">Pasarkan</button></a>
                        @endif
                    </div>
                    <div id="mytable">
                        <table width="100%" class="table table-hover borderless">
                            <tbody>
                            <tr>
                                <td>Konten</td>
                                <td>:</td>
                                <td>{{$partnership->content}}</td>
                            </tr>
                            <tr>
                                <td>Produk Promo</td>
                                <td>:</td>
                                <td>{{$partnership->promo_products}}</td>
                            </tr>
                            <tr>
                                <td>Fasilitas</td>
                                <td>:</td>
                                <td>{{$partnership->promo_facilities}}</td>
                            </tr>
                            <tr>
                                <td>Harga Diskon</td>
                                <td>:</td>
                                <td>{{$partnership->shipping_costs}}</td>
                            </tr>
                            <tr>
                                <td>Perlindungan</td>
                                <td>:</td>
                                <td>{{$partnership->protection_area}}</td>
                            </tr>
                            <tr>
                                <td>Status Kemitraan</td>
                                <td>:</td>
                                <td>{{$partnership->partnership_status}}</td>
                            </tr>
                            <tr>
                                <td>Pesanan Berulang</td>
                                <td>:</td>
                                <td>{{$partnership->repeat_order}}</td>
                            </tr>
                            <tr>
                                <td>Target Penjualan</td>
                                <td>:</td>
                                <td>{{$partnership->sales_target}}</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td>Rp. {{number_format($partnership->price,0,',','.')}},-</td>
                            </tr>
                            <tr>
                                <td>Diskon</td>
                                <td>:</td>
                                <td>
                                    @if(!empty($partnership->discount) && strtotime($partnership->discount_end) > strtotime(date('Y-m-d')))
                                        {{$partnership->discount}}<br/>{{date('d M y',strtotime($partnership->discount_start))}} s/d {{date('d M y',strtotime($partnership->discount_end))}}
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Status Produk</td>
                                <td>:</td>
                                <td>@if($partnership->active) Publish @else Belum Publish @endif</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <style type="text/css">
        .borderless td, .borderless th {
            border: none !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable({
                ordering:false,
                sScrollX: "100%",
                bScrollCollapse: true
            });
            $("#photo").change(function(e) {
                console.log(this.files[0].size);
                if(this.files[0].size > 100000){
                    $(this).val(null);
                    $('#blah').attr('src', null);
                    alert("Ukuran File Terlalu Besar (Max. 100kb)")
                }
                printImage(this)
            });

        });
    </script>

@endsection