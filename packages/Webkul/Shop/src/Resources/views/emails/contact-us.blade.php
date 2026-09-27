@component('shop::emails.layout')
    @if (! empty($contactUs['subject']))
        <div style="margin-bottom: 24px; padding: 12px 18px; background-color: #ECFDF5; border-left: 4px solid #0D5C3A; border-radius: 6px;">
            <p style="font-size: 12px; font-weight: 700; color: #0D5C3A; margin: 0; text-transform: uppercase; letter-spacing: 0.08em;">
                Inquiry Topic / What You Are Looking For:
            </p>
            <p style="font-size: 16px; font-weight: 600; color: #062E1A; margin: 4px 0 0 0;">
                {{ $contactUs['subject'] }}
            </p>
        </div>
    @endif

    <div style="margin-bottom: 34px;">
        <p style="font-size: 16px;color: #205132;line-height: 24px;">
            {{ $contactUs['message'] }}
        </p>
    </div>

    <p style="font-size: 16px;color: #205132;line-height: 24px;margin-bottom: 40px">
        @lang('shop::app.emails.contact-us.to')
        
        <a href="mailto:{{ $contactUs['email'] }}">{{ $contactUs['email'] }}</a>,

        @lang('shop::app.emails.contact-us.reply-to-mail')

        @if($contactUs['contact'])
            @lang('shop::app.emails.contact-us.reach-via-phone')

            <a href="tel:{{ $contactUs['contact'] }}">{{ $contactUs['contact'] }}</a>.
        @endif
    </p>
@endcomponent