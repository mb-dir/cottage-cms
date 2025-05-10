<?php

namespace App\Http\Middleware;


use App\Facades\MenuFacade;
use App\Models\AddressInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;


class HandleInertiaRequests extends Middleware
{
  /**
   * The root template that is loaded on the first page visit.
   *
   * @var string
   */
  protected $rootView = 'app';


  /**
   * Define the props that are shared by default.
   *
   * @return array<string, mixed>
   */
  public function share(Request $request): array
  {

    return [
      ...parent::share($request),
      'auth' => [
        'user' => $request->user(),
      ],
      'admin_menu' => Auth::user() ? MenuFacade::getAdminMenu() : null,
      'client_menu' => MenuFacade::getClientMenu(),
      'errors' => fn() => $request->session()->get('errors') ? $request->session()->get('errors')->getBag('default')->getMessages() : [],
      'messages' => fn() => $request->session()->get('message') ? collect($request->session()->get('message')) : [],
      'address_info' => AddressInformation::all()->first(),
    ];
  }


  /**
   * Determine the current asset version.
   */
  public function version(Request $request): ?string
  {
    return parent::version($request);
  }
}
