<?php

return [
    'disk_name' => env('MEDIA_DISK', 'public'),

    'max_file_size' => 1024 * 1024 * 10,

    'temporary_directory_path' => null,

    'file_namer' => Spatie\MediaLibrary\Support\FileNamer\DefaultFileNamer::class,

    'path_generator' => App\Support\CustomPathGenerator::class,

    'url_generator' => Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator::class,

    'moves_media_to_trash' => false,

    'version_urls' => false,

    'image_optimizers' => [
        Spatie\ImageOptimizer\Optimizers\Jpegoptim::class => [
            '-m85',
            '--strip-all',
            '--all-progressive',
        ],
        Spatie\ImageOptimizer\Optimizers\Pngquant::class => [
            '--force',
        ],
        Spatie\ImageOptimizer\Optimizers\Optipng::class => [
            '-i0',
            '-o2',
            '-quiet',
        ],
        Spatie\ImageOptimizer\Optimizers\Svgo::class => [
            '--disable=cleanupIDs',
        ],
        Spatie\ImageOptimizer\Optimizers\Gifsicle::class => [
            '-b',
            '-O3',
        ],
    ],

    'image_generators' => [
        Spatie\MediaLibrary\Conversions\ImageGenerators\Image::class,
        Spatie\MediaLibrary\Conversions\ImageGenerators\Webp::class,
        Spatie\MediaLibrary\Conversions\ImageGenerators\Pdf::class,
        Spatie\MediaLibrary\Conversions\ImageGenerators\Svg::class,
        Spatie\MediaLibrary\Conversions\ImageGenerators\Video::class,
    ],

    'media_dir' => storage_path('app/public'),

    'image_driver' => env('IMAGE_DRIVER', 'gd'),

    'ffmpeg_path' => env('FFMPEG_PATH', '/usr/bin/ffmpeg'),
    'ffprobe_path' => env('FFPROBE_PATH', '/usr/bin/ffprobe'),

    'media_model' => Spatie\MediaLibrary\MediaCollections\Models\Media::class,

    'strict_mode' => false,
];
