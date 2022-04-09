
@extends('layout.home')
@section('slider')
<section id="slider" >
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ URL::asset('images/39935_5.jpg')}}" class="" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ URL::asset('images/45272_3.jpg')}}" class="" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
@stop
@section('ads')
<section id="ads" class="container">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
@stop
@section('crad')
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 ">
        <div class="col">
            <div class="card">
                <a class="fornt" href="details">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                    <h5 class="card-title">
                        Supply and installation of solar energy systems for water sources in Abyan and Al Dhale’e governorates - Yemen
                    </h5>
                </a>
                <div class="back">
                    <ul class='list-items'>
                        <li>Added By: <span><i class="fa fa-building"></i> IRC</span></li>
                        <li>posted: <span><i class='fa fa-calendar'></i> 2 week ago</span></li>
                        <li>Location: <span> <i class="fa fa-compass"></i> Aden</li>
                        <li>Deadline: <span> <i class='fa fa-calendar'></i> 10 Feb 2022</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <a class="fornt" href="include/datile.html">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                    <h5 class="card-title">
                        Provision Of Rental Warehouses And Inventory Management Services
                    </h5>
                </a>
                <div class="back">
                    <ul class='list-items'>
                        <li>Added By: <span><i class="fa fa-building"></i> UNHCR</span></li>
                        <li>posted: <span><i class='fa fa-calendar'></i> 2 days ago</span></li>
                        <li>Location: <span> <i class="far fa-compass"></i> Sana'a</li>
                        <li>Deadline: <span> <i class='fa fa-calendar'></i> 30 Feb 2022</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <a class="fornt" href="include/datile.html">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                    <h5 class="card-title">
                        Supply, installation and operation of an integrated pumping unit with solar energy and its accessories
                    </h5>
                </a>
                <div class="back">
                    <ul class='list-items'>
                        <li>Added By: <span><i class="fa fa-building"></i> FHD</span></li>
                        <li>posted: <span><i class='fa fa-calendar'></i> 1 days ago</span></li>
                        <li>Location: <span> <i class="far fa-compass"></i> Hodidah</li>
                        <li>Deadline: <span> <i class='fa fa-calendar'></i> 10 Feb 2022</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <a class="fornt" href="include/datile.html">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                    <h5 class="card-title">
                        Integrated in order to develop the work of the organization ERP Add a system
                    </h5>
                </a>
                <div class="back">
                    <ul class='list-items'>
                        <li>Added By: <span><i class="fa fa-building"></i> Al-Ghayth</span></li>
                        <li>posted: <span><i class='fa fa-calendar'></i> 1 days ago</span></li>
                        <li>Location: <span> <i class="fa fa-compass"></i> Sana'a</li>
                        <li>Deadline: <span> <i class='fa fa-calendar'></i> 20 Feb 2022</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <a class="fornt" href="include/datile.html">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                    <h5 class="card-title">
                        Procurement Of Two Forklifts - Buy Two Forklifts
                    </h5>
                </a>
                <div class="back">
                    <ul class='list-items'>
                        <li>Added By: <span><i class="fa fa-building"></i> FAO</span></li>
                        <li>posted: <span><i class='fa fa-calendar'></i> 1 days ago</span></li>
                        <li>Location: <span> <i class="fa fa-compass"></i> Sana'a</li>
                        <li>Deadline: <span> <i class='fa fa-calendar'></i> 09 Feb 2022</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <a class="fornt" href="include/datile.html">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                    <h5 class="card-title">
                        Implementation Of Water & Solar Projects - Implementation of water and solar energy projects in Lahj and Al Hudaydah
                    </h5>
                </a>
                <div class="back">
                    <ul class='list-items'>
                        <li>Added By: <span><i class="fa fa-building"></i> DRC</span></li>
                        <li>posted: <span><i class='fa fa-calendar'></i> 3 Week ago</span></li>
                        <li>Location: <span> <i class="fa fa-compass"></i> Multiple Cities</li>
                        <li>Deadline: <span> <i class='fa fa-calendar'></i> 31 Jan 2022</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <a class="fornt" href="include/datile.html">
                    <img src="{{ URL::asset('images/62440_Magic Mouse.jpg')}}" class="card-img-top" alt="...">
                    <h5 class="card-title">
                        Provision Of Medical Insurance Service -
                        Providing health insurance services to Danish council employees
                    </h5>
                </a>
                <div class="back">
                    <ul class='list-items'>
                        <li>Added By: <span><i class="fa fa-building"></i> DRC</span></li>
                        <li>posted: <span><i class='fa fa-calendar'></i> 3 Weeks ago</span></li>
                        <li>Location: <span> <i class="fa fa-compass"></i> Sana'a</li>
                        <li>Deadline: <span> <i class='fa fa-calendar'></i> 09 Feb 2022</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <a class="fornt" href="include/datile.html">
                    <img src="layout/images/Care.png" class="card-img-top" alt="...">
                    <h5 class="card-title">
                        RFP For H2O Research Consultancy (WASH + Agriculture)
                    </h5>
                </a>
                <div class="back">
                    <ul class='list-items'>
                        <li>Added By: <span><i class="fa fa-building"></i> Care</span></li>
                        <li>posted: <span><i class='fa fa-calendar'></i> 1 days ago</span></li>
                        <li>Location: <span> <i class="fa fa-compass"></i> Sana'a</li>
                        <li>Deadline: <span> <i class='fa fa-calendar'></i> 09 Feb 2022</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
