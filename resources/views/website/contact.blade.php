@extends('layouts.app')

@section('content')

<!--==============================
Breadcumb
============================== -->
<div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/bg/breadcumb-bg.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Contact Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</div>

<!--==============================
Contact Area   
==============================-->
<div class="space">
    <div class="container">
        <div class="row gy-30 gx-30">
            <div class="col-md-6 col-xl-3 contact-info_wrapp">
                <div class="contact-info">
                    <div class="contact-info_icon">
                        <img src="{{ asset('website/assets/img/icon/address.svg') }}" alt="">
                    </div>
                    <div class="media-body">
                        @php
                        $contact = DB::table('contact_us')->first();
                        @endphp
                        <p class="contact-info_label">Address</p>
                        <a href="{{ $contact->map_url ?? '#' }}" class="contact-info_link">
                            {{ $contact->address }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3 contact-info_wrapp">
                <div class="contact-info">
                    <div class="contact-info_icon">
                        <img src="{{ asset('website/assets/img/icon/call-2.svg') }}" alt="">
                    </div>
                    <div class="media-body">
                        <p class="contact-info_label">Phone</p>
                        @foreach(explode(',', $contact->phone) as $phone)
                            <a href="tel:{{ trim($phone) }}" class="contact-info_link">{{ trim($phone) }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3 contact-info_wrapp">
                <div class="contact-info">
                    <div class="contact-info_icon">
                        <img src="{{ asset('website/assets/img/icon/mail-2.svg') }}" alt="">
                    </div>
                    <div class="media-body">
                        <p class="contact-info_label">Email</p>
                        @foreach(explode(',', $contact->email) as $email)
                            <a href="mailto:{{ trim($email) }}" class="contact-info_link">{{ trim($email) }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3 contact-info_wrapp">
                <div class="contact-info">
                    <div class="contact-info_icon">
                        <img src="{{ asset('website/assets/img/icon/qus.svg') }}" alt="">
                    </div>
                    <div class="media-body">
                        <p class="contact-info_label">Have Questions?</p>
                        <span class="contact-info_text">Discover more by visiting us or joining our community</span>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="contact-map style2">
                    <iframe src="{{ $contact->map_url ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.7310056272386!2d89.2286059153658!3d24.00527418490799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe9b97badc6151%3A0x30b048c9fb2129bc!2sAngfuztheme!5e0!3m2!1sen!2sbd!4v1651028958211!5m2!1sen!2sbd' }}" allowfullscreen="" loading="lazy"></iframe>
                    <div class="contact-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Contact Area  
==============================-->
<div class="space-bottom">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-7">
                <div class="">
                    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form2 ajax-contact">
                        @csrf
                        <h2 class="sec-title">Get In Touch</h2>
                        <p class="mb-20">We'd love to hear from you about our entire service. Please complete the form below.</p>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number">
                            </div>
                            <div class="form-group col-md-6">
                                <select name="subject" id="subject" class="form-select">
                                    <option value="" disabled selected hidden>Subject</option>
                                    <option value="General Query">General Query</option>
                                    <option value="Help Support">Help Support</option>
                                    <option value="Sales Support">Sales Support</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Type Your Message" required></textarea>
                            </div>
                            <div class="form-btn col-12">
                                <button class="th-btn">Submit Now</button>
                            </div>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="contact-image">
                    <img src="{{ asset('storage/' .$contact->image) }}" alt="Contact">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection