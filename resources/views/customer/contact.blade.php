@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')

        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->

        <!-- Page Conttent -->
        <main class="page-content section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-sm-12">
                        <div class="contact-form">
                            <div class="contact-form-info">
                                <div class="contact-title">
                                    <h3>TELL US YOUR PROJECT</h3>
                                </div>
                                <form id="contact-form" action="http://hasthemes.com/file/mail.php" method="post">
                                    <div class="contact-page-form">
                                        <div class="contact-input">
                                            <div class="contact-inner">
                                                <input name="con_name" type="text" placeholder="Name *">
                                            </div>
                                            <div class="contact-inner">
                                                <input name="con_email" type="email" placeholder="Email *">
                                            </div>
                                            <div class="contact-inner">
                                                <input name="con_phone" type="text" placeholder="Phone *">
                                            </div>
                                            <div class="contact-inner">
                                                <input name="con_subject" type="text" placeholder="Subject *">
                                            </div>
                                            <div class="contact-inner contact-message">
                                                <textarea name="con_message" placeholder="Message *"></textarea>
                                            </div>
                                        </div>
                                        <div class="contact-submit-btn">
                                            <button class="submit-btn" type="submit">Send Email</button>
                                            <p class="form-messege"></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <div class="contact-infor">
                            <div class="contact-title">
                                <h3>CONTACT US</h3>
                            </div>
                            <div class="contact-dec">
                                <p>We provide quality and high-tech watches </p>
                            </div>
                            <div class="contact-address">
                                <ul>
                                    <li>Address : Ha noi</li>
                                    <li>Email: admin@Ruiz.com</li>
                                    <li>Phone: 0123 456 789</li>
                                </ul>
                            </div>
                            <div class="work-hours">
                                <h5>Working hours</h5>
                                <p><strong>Monday &ndash; Saturday</strong>: &nbsp;08AM &ndash; 22PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--// Page Conttent -->

@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('assets/js/page/checkout.js') }}"></script>
@endsection()
        
