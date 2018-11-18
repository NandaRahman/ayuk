@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kemitraan</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Kemitraan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="mytable">

                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                            <thead>
                            <tr>
                                <th>Konten</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($partnerships))
                                @foreach($partnerships as $partnership)
                                    <tr class="odd gradeX">
                                        <td>{{$partnership->content}}</td>
                                        <td>{{$partnership->price}}</td>
                                        <td>
                                            @if(!empty($partnership->discount) && strtotime($partnership->discount_end) > strtotime(date('Y-m-d')))
                                                {{$partnership->discount}}<br/>{{date('d M y',strtotime($partnership->discount_start))}} s/d {{date('d M y',strtotime($partnership->discount_end))}}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>@if($partnership->active) Publish @else Belum Publish @endif</td>
                                        <td>
                                            <a style="color: white; text-decoration: none" href="{{route('admin.partnership.detail',["id"=>$partnership->id])}}"><button type="button" class="btn btn-primary">Detail</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form action="{{route('admin.partnership.add')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group" hidden>
                            <label class="control-label col-sm-12" for="active">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control four-input" name="active" id="active" value="0" required><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="content">Konten</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control four-input" name="content" id="content" placeholder="Konten Kemitraan" required><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="price">Harga</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control four-input" name="price" id="price" placeholder="Harga Produk"><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="promo_products">Produk Promo</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="promo_products" id="promo_products" placeholder="Produk Promo"></textarea><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="promo_facilities">Fasilitas</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="promo_facilities" id="promo_facilities" placeholder="Fasilitas"></textarea><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="shipping_costs">Harga Diskon</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="shipping_costs" id="shipping_costs" placeholder="Harga Diskon"></textarea><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="protection_area">Perlindungan</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="protection_area" id="protection_area" placeholder="Perlindungan"></textarea><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="partnership_status">Status Kemitraan</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="partnership_status" id="partnership_status" placeholder="Status Kemitraan"></textarea><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="repeat_order">Pesanan Berulang</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="repeat_order" id="repeat_order" placeholder="Pesanan Berulang"></textarea><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="sales_target">Target Penjualan</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="sales_target" id="sales_target" placeholder="Target Penjualan"></textarea><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="form-control btn btn-primary " type="submit">Masukan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
