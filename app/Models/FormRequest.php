<?php

namespace App\Models;

class FormRequest extends Model
{
    public static function validation($code = '')
    {
        $validateUnique = '';

        if (collect($code)->get('code') !== request()->get('code')) {
            $validateUnique = '|unique:articles';
        }

        $attributes = request()->validate([
            'code' => 'required|regex:/^[A-Za-z0-9_-]+$/' . $validateUnique,
            'name' => 'required|min:5|max:100',
            'description' =>'required|max:255',
            'detail' => 'required',
        ]);

        if (request('published')) {
            $attributes['published'] = true;
        } else {
            $attributes['published'] = false;
        };

        return $attributes;
    }
}
