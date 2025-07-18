namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!$request->user() || $request->user()->role !== $role) {
            return response()->json([
                'message' => 'Akses ditolak. Role dibutuhkan: ' . $role
            ], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
