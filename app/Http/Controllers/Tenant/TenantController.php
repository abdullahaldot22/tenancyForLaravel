<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Str;

class TenantController extends Controller
{

    public function store(Request $request)
    {
        // dd(config('app.domain'));
        $tenant = Tenant::create([
            'name' => $request->name,
        ]);

        $tenant->domains()->create([
            'domain' => Str::lower(str_replace(' ', '', $request->name)).'.'.config('app.domain'),
        ]);
        return redirect()->route('dashboard');
    }

    public function delete($id)
    {
        // dd($id);
        $tenant = Tenant::with('domains')->find($id);
        $tenant->delete();
        // tenant()->delete(tenant()->getTenantIdByDomain($id));
        return redirect()->route('dashboard');
    }
}
