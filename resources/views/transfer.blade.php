<!doctype html>
<html>
    <head></head>
    @extends('layout')

@section('content')
    <body>
        <div class="row d-flex justify-content-center" style=" position: relative; margin-top: 10%; padding-bottom: 20%" id="div-body" >
            <div class="container mt-4 text-center" >
                <form method="POST" id="profile_setup_frm" action="{{ route('update.profile') }}" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <h1 class="text-center">Transfer Ke No.rekening 0023300255</h1><br><br>
                                <p class="font-weight-bold"> Masukkan Bukti Transfer<br>
                                    <input type="file" name="profile" id="profile_image"  class="form-control text-center">
                                </p>
                            </div>
                        </div>
                    </div>   
                    <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>
    </body>
</html>