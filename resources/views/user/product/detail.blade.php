
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$product->name}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-sm-4">
            <img class="img-thumbnail" src="{{asset('gallery/photo/product')}}/{{$product->photo}}" alt="Foto Siswa">
        </div>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-right">
                        @if($product->active)
                            <a style="color: white; text-decoration: none" href="{{route('admin.product.status',["id"=>$product->id,"active"=>0])}}"><button type="button" class="btn btn-primary">Hentikan Pemasaran</button></a>
                        @else
                            <a style="color: white; text-decoration: none" href="{{route('admin.product.status',["id"=>$product->id,"active"=>1])}}"><button type="button" class="btn btn-primary">Pasarkan</button></a>
                        @endif
                    </div>
                    <div id="mytable">
                        <table width="100%" class="table table-hover borderless">
                            <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>: {{$product->name}}</td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>: Rp. {{number_format($product->price,0,',','.')}},-</td>
                            </tr>
                            <tr>
                                <td>Diskon</td>
                                <td>
                                    @if(!empty($product->discount) && strtotime($product->discount_end) > strtotime(date('Y-m-d')))
                                        {{$product->discount}}<br/>{{date('d M y',strtotime($product->discount_start))}} s/d {{date('d M y',strtotime($product->discount_end))}}
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Status Produk</td>
                                <td>@if($product->active) Publish @else Belum Publish @endif</td>
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