@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="my-5 text-center">
                <h1>The Best Free Online Resume Builder</h1>
                <p>
                    A Quick and Easy Way to Create Your Professional Resume. 30+ Professional Resume Templates Choose from over thirty modern and professional templates. All of which can be customized to your liking. Fast and Easy to Use Our resume builder lets you easily and quickly create a resume using our resume wizard.
                </p>
                @guest
                <a href="/register" class="btn btn-primary">START CREATE FREE RESUME</a>
                @else
                <a href="/dashboard" class="btn btn-primary">MANAGE RESUME</a>
                @endguest
            </section>
            <section>
                <h2>A Free, Quick and Easy Way to Create Your Professional Resume.</h2>
                <div class="row my-3">
                    <div class="col-12 col-md-6 my-auto">
                        <div>
                            <h3 class="fs-4"><i class="fa-regular fa-circle-check text-primary"></i> 30+ Professional Resume Templates</h3>
                            <p>Choose from over thirty modern and professional templates. All of which can be customized to your liking.</p>
                        </div>
                        <div>
                            <h3 class="fs-4"><i class="fa-regular fa-circle-check text-primary"></i> Fast and Easy to Use</h3>
                            <p>Choose from over thirty modern and professional templates. All of which can be customized to your liking.</p>
                        </div>
                        <div>
                            <h3 class="fs-4"><i class="fa-regular fa-circle-check text-primary"></i> Robust Text Editor</h3>
                            <p>Choose from over thirty modern and professional templates. All of which can be customized to your liking.</p>
                        </div>
                        <div>
                            <h3 class="fs-4"><i class="fa-regular fa-circle-check text-primary"></i> Download your resume as PDF</h3>
                            <p>Choose from over thirty modern and professional templates. All of which can be customized to your liking.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="/img/resume-builder.png" alt="resume-builder" class="w-100 p-3">
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection