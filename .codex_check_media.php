<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
foreach (App\Models\MediaItem::where('type', 'hero_slide')->where('page_slug', 'home')->orderBy('sort_order')->get(['id','title','image','sort_order','status']) as $m) {
    echo $m->id.'|'.$m->title.'|'.$m->image.'|'.$m->sort_order.'|'.($m->status ? '1' : '0').PHP_EOL;
}
