<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Good extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sku',
        'price',
        'desc'
    ];

    public function validated(Request $request)
    {
        $validated = $request->validate([
            'name'=> ['required', 'max:255', Rule::unique('goods')->ignore($this->id)],
            'sku' => ['required', 'max:255', Rule::unique('goods')->ignore($this->id)],
            'price' => 'required|decimal:2',
            'desc'=> 'required',
        ]);

        return $validated;
    }
}
