</div>
@extends('layouts.web')
@section('content')

<style>
    .jumbotron.ui-hero {
        padding: 0;
    }

</style>
<div class="jumbotron ui-hero ui-mh-100vh text-white overflow-hidden"
    style="background: #e8cbc0; background: linear-gradient(180deg, #3949ab, #2962ff);">
    <div class="container flex-shrink-1 my-5">
        <div class="row justify-content-between">

            <div class="col-lg-5 col-xl-5 text-lg-left text-center my-5">
                <h1 class="tx-40 tx-white tx-bold">MIKRO LAUNDRY</h1>
                <p class="lead pb-2 my-4">
                    Kelola bisnis laundry Anda dengan mudah dan terjangkau.
                    Mikro Laundry didesain untuk usaha laundry skala mikro,
                    kini bisnis laundry rumahan anda bisa lebih profesional.
                </p>
                <a href="#" class="btn btn-default">Pelajari lebih lanjut</a>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0 pd-md-30">
                <div class="ui-presentation-right ui-window float-left rounded">
                    <div class="window-content"><img src="{{ asset('') }}images/gallery/dashboard.gif"
                            alt></div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
