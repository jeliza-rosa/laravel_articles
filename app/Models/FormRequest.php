<?php

namespace App\Models;

class FormRequest extends Model
{
    public static function validation($code = '')
    {
        $validateUnique = '';

        if ($code !== request()->get('code')) {
            $validateUnique = '|unique:articles';
        }

        $attributes = request()->validate([
            'code' => 'required|regex:/^[A-Za-z0-9_-]+$/' . $validateUnique,
            'name' => 'required|min:3|max:100',
            'description' =>'required|max:255',
            'detail' => 'required',
        ]);

        if (request('published')) {
            $attributes['published'] = 1;
        } else {
            $attributes['published'] = 0;
        };

        $attributes['owner_id'] = auth()->id();

        return $attributes;
    }
}
