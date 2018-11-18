@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Produk</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Produk
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="mytable">

                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                            <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($products))
                                @foreach($products as $product)
                                    <tr class="odd gradeX">
                                        <td><img height="100px" src="{{asset('gallery/photo/product')}}/{{$product->photo}}" alt="Foto Siswa"><br></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>
                                            @if(!empty($product->discount) && strtotime($product->discount_end) > strtotime(date('Y-m-d')))
                                                {{$product->discount}}<br/>{{date('d M y',strtotime($product->discount_start))}} s/d {{date('d M y',strtotime($product->discount_end))}}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>@if($product->active) Publish @else Belum Publish @endif</td>
                                        <td>
                                            <a style="color: white; text-decoration: none" href="{{route('admin.product.detail',["id"=>$product->id])}}"><button type="button" class="btn btn-primary">Detail</button></a>
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
                    <form action="{{route('admin.product.add')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="name">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control four-input" name="name" id="name" placeholder="Nama Produk" required><br>
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <label class="control-label col-sm-12" for="active">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control four-input" name="active" id="active" value="0" required><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="description">Keterangan</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="description" id="description" placeholder="Keterangan"></textarea><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="price">Harga</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control four-input" name="price" id="price" placeholder="Harga Produk"><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="photo">Foto (3x4 Max. 100kb)</label>
                            <div class="col-sm-12">
                                <img id="blah" src="#" alt="your image" />
                                <input type="file" class="form-control" name="photo" id="photo">
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
