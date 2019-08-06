@extends('layouts.app')

{{-- Descripción sobre esta página --}}
@section('title', '')
@section('description', '')
@section('keywords', '')

{{-- Etiquetas para Redes sociales --}}
@section('rs-title', '')
@section('rs-sitename', '')
@section('rs-description', '')
@section('rs-image', '')
@section('rs-url', '')
@section('rs-image-alt', '')

@section('twitter-site', '')
@section('twitter-creator', '')

@section('content')
    @include('layouts.breadcrumbs')
    <div class="row">

        <div class="col-md-8 mb-5 contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post">
                <h3>Drop Us a Message</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4 mb-5">
            @include('layouts.sidebar')
        </div>
    </div>
@endsection
