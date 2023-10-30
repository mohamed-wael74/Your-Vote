@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Election Title</th>
                            <th>Vote</th>

                        </tr>
                        @foreach ($poll->polls as $data)
                            <tr>
                                <td>
                                    <h1> {{ $data->title }}</h1>
                                </td>
                                <td> <a href="{{ route('poll.show', $data->id) }}" role="button"
                                        class="btn btn-success btn-small"> Vote </a></td>
                            </tr>
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>
    <div data-aos="zoom-in" data-aos-duration="1000" class="why-us">
        <h2>why us?</h2>
        <div class="section-3 row">
            <div class="customize col-lg-4 col-md-6 col-md-6">
                <div class="icon">
                    <i class="fa-regular fa-circle-check" style="color: #0b2447;"></i>
                </div>
                <h3>secured elections</h3>
                <p>you can restrict who can vote</p>
            </div>
            <div class="customize col-lg-4 col-md-6 col-md-6">
                <div class="icon">
                    <i class="fa-regular fa-clock" style="color: #0b2447;"></i>
                </div>
                <h3>deadlines</h3>
                <p>Our polls run indefinetly. You can change that by setting a deadline.</p>
            </div>
            <div class="customize col-lg-4 col-md-6 col-md-6">
                <div class="icon">
                    <i class="fa-solid fa-life-ring" style="color: #0b2447;"></i>
                </div>
                <h3>customized polls</h3>
                <p>you can custom your election with many options</p>
            </div>
            <div class="customize col-lg-4 col-md-6 col-md-6">
                <div class="icon">
                    <i class="fa-solid fa-list-check " style="color: #0b2447;"></i>
                </div>
                <h3>flexible elections</h3>
                <p>easy to create elections</p>
            </div>
            <div class="customize col-lg-4 col-md-6 col-md-6">
                <div class="icon">
                    <i class="fa-solid fa-square-poll-vertical fa-lg" style="color: #0b2447;"></i>
                </div>
                <h3>live results</h3>
                <p>we provide realtime service</p>
            </div>
            <div class="customize col-lg-4 col-md-6 col-md-6">
                <div class="icon">
                    <i class="fa-solid fa-user-gear" style="color: #0b2447;"></i>
                </div>
                <h3>multiple voting options</h3>
                <p>you can choose many options in your vote</p>
            </div>
        </div>
    </div>
    <div data-aos="zoom-in-up" data-aos-duration="1000" class="pricing-plans">
        <h2>Pricing Plans</h2>
        <div class="plans row">
            <div class="offers col-lg-6 col-md-6 col-sm-12">
                <h3>Free</h3>
                <p class="p-one">for individuals</p>
                <p class="p-two"><i class="fa-solid fa-dollar-sign"></i> 0</p>
                <p class="p-three"><i class="fa-regular fa-circle-check"></i> Up to 50 voters</p>
                <p class="p-three"><i class="fa-regular fa-circle-check"></i> E-mail reminder</p>
                <p class="p-three"><i class="fa-regular fa-circle-check"></i> Candidate bios and photos</p>
                <form action="">
                    <button class="one">Try for free</button>
                </form>
            </div>
            <div class="offers col-lg-6 col-md-6 col-sm-12">
                <h3>Premium</h3>
                <p class="p-one">for small and medium business</p>
                <p class="p-two"><i class="fa-solid fa-dollar-sign"></i> 900/month</p>
                <p class="p-three"><i class="fa-regular fa-circle-check"></i> Up to 1000 voters</p>
                <p class="p-three"><i class="fa-regular fa-circle-check"></i> All free features</p>
                <p class="p-three"><i class="fa-regular fa-circle-check"></i> Priority e-mail support</p>
                <p class="p-three"><i class="fa-regular fa-circle-check"></i> Reports and graphs</p>
                <form action="">
                    <button class="two">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
@endsection
