@extends('web/layouts/app')
@section('content')

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2925132859955!2d105.78486297593956!3d20.98090848941918!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135accdd8a1ad71%3A0xa2f9b16036648187!2zSOG7jWMgdmnhu4duIEPDtG5nIG5naOG7hyBCxrB1IGNow61uaCB2aeG7hW4gdGjDtG5n!5e0!3m2!1svi!2s!4v1683276942508!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="contact-form">
                <div id="success"></div>
                <form name="sentMessage" id="contactForm" novalidate="novalidate" action="{{route('page.contact.question')}}" method="POST">
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control" id="name" placeholder="Họ và tên" name="name"
                            required="required" data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                            required="required" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="subject" placeholder="Vấn đề" name="subject"
                            required="required" data-validation-required-message="Please enter a subject" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" rows="6" id="message" placeholder="Message" name="message"
                            required="required"
                            data-validation-required-message="Nội dung"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-5">
            <h5 class="font-weight-semi-bold mb-3">Liên hệ</h5>
            <p>Cảm ơn bạn đã ghé thăm shop của chúng tôi! Mọi thắc mắc liên hệ theo thông tin:</p>
            <div class="d-flex flex-column mb-3">
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Nguyễn Việt Tùng</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>tungnguyen0603202@gmail.com</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>0334463900</p>
            </div>
            <div class="d-flex flex-column">
                <div class="col-md-12">
                    <h4 class="mb-4">Support</h4>
                    @foreach ($contacts as $comment)
                        <div class="media mb-4">
                            <div class="media-body">
                                <h6>{{$comment->name}}<small> -<i> {{$comment->email}}</i> - <i> {{$comment->message}}</i></small></h6></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
