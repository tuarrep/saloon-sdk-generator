<?php

use Crescat\SaloonSdkGenerator\Converters\OpenApiConverter;
use Crescat\SaloonSdkGenerator\Exceptions\ConversionFailedException;

it('will convert dintero-discounts.yaml from a swagger 2.0 file into an openapi 3.0.1 file', function () {
    $input = file_get_contents(sample_path('dintero-discounts.yaml'));
    OpenApiConverter::convert($input);
})->throws(ConversionFailedException::class);

it('will convert tripletex.json from a swagger 2.0 file into an openapi 3.0.1 file', function () {

    $input = file_get_contents(sample_path('tripletex.json'));

    $output = OpenApiConverter::convert($input);

    expect($output)->toBeString()
        ->and($output)->toContain('"3.0.1"')
        ->and($output)->toContain('Tripletex API');

});
