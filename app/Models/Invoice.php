<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['company_id', 'from','to', 'date_of_create' , 'invoice_number', 'status'];

    public function company() :BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function calculateTotalWithVat()
    {
        $totalWithVat = 0;

        // Assuming you have a relationship to get products linked to the invoice
        // Fetch products belonging to the company of this invoice
        $products = Product::where('company_id', $this->company_id)->get();

        foreach ($products as $product) {
            // Calculate total with VAT for each product
            $totalWithVat += $product->getTotalPriceWithVat();
        }

        return $totalWithVat;
    }
}