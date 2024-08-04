@extends('layouts.front.master')

@section('content')
<section class="contact_page_section">
    <!--contact map start-->
    <div class="contact_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2897.941676057003!2d31.355258443273524!3d30.258375800581273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14580d721ee6bc9b%3A0x9f4f5ecb09f24699!2z2YXYtdmG2Lkg2KfYqtmK2YPZiA!5e0!3m2!1sar!2seg!4v1690874956831!5m2!1sar!2seg" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!--contact map end-->
    <div class="contact_page_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact_info">
                        <div class="contact_info_title">
                            <h3 class="wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">{{ trans('contact.write_us') }}, {{ trans('contact.call_us') }} {{ trans('contact.or') }} <br>
                                {{ trans('contact.drop_by_our_office_at') }}</h3>
                        </div>
                        <div class="contact_info_inner d-flex justify-content-between">
                            <div class="contact_info_list wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                                <span>{{ trans('contact.egypt') }}</span>
                                <p>{{ trans('contact.address') }}</p>
                                <p>{{ trans('contact.fax') }}:0222634596</p>

                                <p>{{ trans('contact.phone') }}: <a href="tel:0222634591">0222634592/0222634593</a> </p>
                                <p>{{ trans('contact.email') }}:<a href="mailto:aticofactory@hotmail.com">aticofactory@hotmail.com</a></p>
                            </div>
                            {{-- <div class="contact_info_list wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                                <span>Tokyo</span>
                                <p>3-6 Ginza, Chuo City,</p>
                                <p>Phone: <a href="tel:657/4872-51475">657/4872-51475</a> </p>
                                <p><a href="#">lekker@hastheme.com</a></p>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact_form wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                        <form id="contact-form" method="POST" action="{{ route('message.user.store') }}">
                            @csrf
                            <div class="form_input_inner d-flex">
                                <div class="form_input">
                                    <input name="name" class="border-0" placeholder="{{ trans('contact.full_name') }}" type="text">
                                </div>
                                <div class="form_input">
                                    <input name="email" class="border-0"  placeholder="{{ trans('contact.email_address') }}" type="text">
                                </div>
                            </div>
                            <div class="form_textarea">
                                <textarea name="message" class="border-0" placeholder="{{ trans('contact.write_us_message') }}"></textarea>
                            </div>
                            <div class="form_input_btn">
                                <button type="submit" class="btn btn-link">Send message</button>
                            </div>
                            <p class="form-messege"></p>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
@endsection
@section('scripts')

@endsection
