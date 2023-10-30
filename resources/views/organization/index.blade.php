@extends('layouts.app')

@section('content')
    <section data-aos="fade-right" data-aos-duration="1000" class="hero-section2">
        <div class="hero-content2">
            <h1>Follow-Up with your elections results</h1>
            <p>Make your voice heard and shape the future of your community.</p>
            <a href="#elections">Create Elections</a>
            <button TYPE="button" ONCLICK="alert('Your Organization Code is {{$organization->id}}')">Organization Code</button>
        </div>
        <div class="hero-image">
            <img src="{{ asset('assets/img/second section.svg') }}" alt="Hero Image">
        </div>
    </section>
    <div data-aos="fade-up" data-aos-duration="1000" class="new">
        <h2>New to YourVote? No problem.</h2>
        <p class="description">We have designed our poll maker to be as easy and intuitive to use as possible.</p>
        <div class="new-one row">
            <div class="create col-lg-4 col-md-6 col-sm-12">
                <div class="icon">1</div>
                <h3>create election</h3>
                <p>choose title , voting type ,set of options and who can vote</p>
            </div>
            <div class="create col-lg-4 col-md-6 col-sm-12">
                <div class="icon">2</div>
                <h3>create layout</h3>
                <p>choose the layout you want</p>
            </div>
            <div class="create col-lg-4 col-md-6 col-sm-12">
                <div class="icon">3</div>
                <h3>make payment</h3>
                <p>choose your payment method and enter the payment details</p>
            </div>
        </div>
    </div>
    <div class="payment">
        <section class="btn-group" style="width:100%">
            <button class="btn1 details"
                style="width:33.3%; border-bottom-left-radius: 5px; border-top-left-radius: 5px;">Details <i
                    class='fas fa-angle-right'></i></button>
            <button class="btn2" style="width:33.3%">Method <i class='fas fa-angle-right'></i></button>
            <button class="btn3"
                style="width:33.3%; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">Payment </button>
        </section>
        <section class="voting row">
            <form class="vote-form col-lg-4 col-md-6 col-sm-12" style="display: block;">
                <h2>vote details</h2>
                <label for="Vote-title">Voting Title</label>
                <ul id="optionss">
                    <li><input type="text" name="CEO 2023" placeholder="Name"></li>
                </ul>
                <div class="Sub-button">
                    <button class="btn2">Save</button>
                    <span class="btn3" id="continueone">Continue <i class="arrow right"></i></span>
                </div>

            </form>
            <form class="vote-form-two" style="display: none;">
                <div class="photo-container p-5">
                    <img class="imgone mt-5 mb-5 me-5" src="{{asset('assets/img/Visa_Logo.png')}}">
                    <img class="imgtwo mt-5 mb-5 ms-5" src="{{asset('assets/img/MasterCard_Logo.svg.webp')}}">
                </div>
            </form>
            <form class="vote-form-three col-lg-4 col-md-6 col-sm-12" style="display: none;">
                <h2>Payment Details</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="YourVote@email.com">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Credit Card Number</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="xxxx xxxx xxxx">
                </div>
                <div class="expiry mb-3">
                    <label for="exampleInputEmail1" class="form-label">Expiry date</label>
                    <input type="date" class="form-control" id="exampleInputEmail1" placeholder="mm/yy">
                </div>
                <div class="expiry mb-3">
                    <label for="exampleInputEmail1" class="form-label">CVV</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="X X X">
                </div>
                <div class="total mb-5 mt-3">
                    <div class="p">
                        <p>Subtotal</p>
                        <p>Fees</p>
                        <p>Total</p>
                    </div>
                    <div class="span">
                        <p><i class="fa-solid fa-dollar-sign"></i>900</p>
                        <p><i class="fa-solid fa-dollar-sign"></i>0</p>
                        <p><i class="fa-solid fa-dollar-sign"></i>900</p>
                    </div>
                </div>
                <hr>
                <br>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Agree on terms and privacy</label>
                </div>
                <div class="buttoons">
                    <button type="submit" class="btn btn-primary">Make payment</button>
                    <button type="button" class="btn3 btn-primary">Finish</button>
                </div>
            </form>
        </section>
    </div>

    <div class="section-title">
        <h2 class="mt-5 ml-2">Employees</h2>
        <p>Check our Employees</p>
    </div>
    <div class="container col-6 my-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>SSN Number</th>
                        <th>Organization Code</th>
                        <th>ACTION</th>
                    </tr>

                    @foreach ($organization->voters as $data)
                        <tr>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->email }} </td>
                            <td> {{ $data->SSN }} </td>
                            <td> {{ $data->org_code }} </td>
                            <td> <a href="{{ route('voter.destroy', $data->id) }}" class="btn btn-danger"> Delete
                                </a></td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>


    <section  id="elections" class="my-4 px-4">
        <div class=" textt  px-5 py-3">
            <h2>Your Elections</h2>
        </div>
        <div class="row justify-content-center">
            @foreach ($organization->polls as $poll)
                <div class="col-lg-4 col-md-6 col-sm-12 item rounded-5 mx-5 mb-5">
                    <p>
                        {{ $poll->title }}<br />
                        <a class="btn btn-danger" href="{{ route('poll.delete', $poll->id) }}">Delete</a>
                        <a class="btn btn-success"href="{{ route('poll.show.details', $poll->id) }}">show poll details</a>
                    </p>
                </div>
            @endforeach
            <div id="addd" class="addd col-lg-4 col-md-6 col-sm-12 item rounded-5 mx-5 mb-5">
                <a href="{{ route('poll.create') }}"><i class="fas fa-plus"></i></a>
            </div>
        </div>
    </section>
@endsection
