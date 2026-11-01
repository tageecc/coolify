<?php

function loadLocalizationConfig(): array
{
    return require base_path('config/app.php');
}

afterEach(function () {
    putenv('APP_LOCALE');
    putenv('APP_FALLBACK_LOCALE');
});

it('uses English locales by default', function () {
    $config = loadLocalizationConfig();

    expect($config['locale'])->toBe('en')
        ->and($config['fallback_locale'])->toBe('en');
});

it('allows the application and fallback locales to be configured', function () {
    putenv('APP_LOCALE=zh-cn');
    putenv('APP_FALLBACK_LOCALE=en');

    $config = loadLocalizationConfig();

    expect($config['locale'])->toBe('zh-cn')
        ->and($config['fallback_locale'])->toBe('en');
});
