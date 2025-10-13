<?php

namespace App\Http\Controllers\Collection;

class VerifyCollectionController extends Controller
{
    public function index(Request $request): RedirectResponse
    {
        return redirect()->intended(route('/', absolute: false).'?verified=1');
    }
}