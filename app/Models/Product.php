<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'date_of_create', 'name', 'price', 'vat'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function getPriceWithVat()
    {
        // Calculate the price with VAT
        $priceWithVAT = $this->price + ($this->price * ($this->vat / 100));
        return $priceWithVAT;
    }

    public function getPriceWithVatAndDiscount()
    {
        // Calculate the price with VAT
        $priceWithVAT = $this->price + ($this->price * ($this->vat / 100));

        // Calculate the discount amount
        $discountAmount = $priceWithVAT * ($this->company->discount / 100);

        // Calculate the final price after discount
        $finalPrice = $priceWithVAT - $discountAmount;

        return $finalPrice;
    }

    public function getTotalPriceWithVat()
{
    // Calculate the total price with VAT
    $totalPriceWithVAT = $this->price + ($this->price * $this->vat / 100);
    return $totalPriceWithVAT;
}

public function getTotalPriceWithVatAndDiscount()
{
    // Calculate the total price with VAT
    $totalPriceWithVAT = $this->price + ($this->price * $this->vat / 100);

    // Apply the company discount
    $discountAmount = $totalPriceWithVAT * ($this->company->discount / 100);
    $totalPriceWithVatAndDiscount = $totalPriceWithVAT - $discountAmount;

    return $totalPriceWithVatAndDiscount;
}




}