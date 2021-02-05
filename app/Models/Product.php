<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laminas\Barcode\Barcode;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * @property int $id
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function qrCode()
    {
        return QrCode::size(200)->backgroundColor(255, 255, 204)
            ->generate(route('product.show', ['product' => $this->id]));
    }

    public function barCode()
    {
        $barcodeOptions = ['text' => route('product.show', ['product' => $this->id])];

        // No required options
        $rendererOptions = [];

        $renderer = Barcode::factory(
            'code39',
            'image',
            $barcodeOptions,
            $rendererOptions
        );

        return $renderer->draw();
    }
}
