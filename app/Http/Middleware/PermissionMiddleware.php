<?php
namespace App\Http\Middleware;
use Closure;
use App\Exceptions\UnauthorizedException;
class PermissionMiddleware
{
	public function handle($request, Closure $next, $permission)
	{
		if (app('auth')->guest()) {
			throw UnauthorizedException::notLoggedIn();
		}
		$permissions = is_array($permission)
			? $permission
			: explode('|', $permission);
		foreach ($permissions as $permission) {
			if (app('auth')->user()->can($permission)) {
				return $next($request);
			}
		}
		throw UnauthorizedException::forPermissions($permissions);
	}
}