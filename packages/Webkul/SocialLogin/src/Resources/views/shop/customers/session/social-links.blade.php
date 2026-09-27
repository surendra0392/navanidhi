@php
    $socialPlatforms = [
        'enable_facebook'        => 'facebook',
        'enable_twitter'         => 'twitter',
        'enable_google'          => 'google',
        'enable_linkedin-openid' => 'linkedin-openid',
        'enable_linkedin'        => 'linkedin-openid',
        'enable_github'          => 'github',
    ];

    $activeSocials = [];

    foreach ($socialPlatforms as $configKey => $provider) {
        if (isset($activeSocials[$provider])) {
            continue;
        }

        if (core()->getConfigData('customer.settings.social_login.' . $configKey)) {
            $activeSocials[$provider] = $provider;
        }
    }
@endphp

@if (! empty($activeSocials))
    <div class="mt-6 flex items-center justify-center gap-3">
        @foreach ($activeSocials as $provider)
            <a
                href="{{ route('customer.social-login.index', $provider) }}"
                class="transition-all hover:opacity-80 hover:scale-105"
                aria-label="{{ ucfirst($provider) }}"
            >
                @include('social_login::icons.' . $provider)
            </a>
        @endforeach
    </div>
@endif