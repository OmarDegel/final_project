<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MainModel extends Model
{
    public function nameLang($lang = null)
    {
        $data = $this->name;
        if ($lang == null) {
            $user = User::find(session('user')->id);
            $lang = $user ? $user->lang : app()->getLocale();
            $defaultLang = app()->getLocale();
            return $data[$lang] ? $data[$lang] : $data[$defaultLang];
        }
        return $data[$lang] ?? null;
    }

    public function descriptionLang($lang = null)
    {
        $data = $this->description;
        if ($lang == null) {
            $user = User::find(session('user')->id);
            $lang = $user ? $user->lang : app()->getLocale();
            $defaultLang = app()->getLocale();
            return $data[$lang] ? $data[$lang] : $data[$defaultLang];
        }
        return $data[$lang] ?? null;
    }
}
