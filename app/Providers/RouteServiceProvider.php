<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // MODULO CONTABLE 
            Route::middleware('web')
                ->prefix('cuentas')
                ->group(base_path('routes/cuentas.php'));

            Route::middleware('web')
                ->prefix('subcuentas')
                ->group(base_path('routes/subcuentas.php'));

            Route::middleware('web')
                ->prefix('librodiario')
                ->group(base_path('routes/librodiario.php'));


            Route::middleware('web')
                ->prefix('libromayor')
                ->group(base_path('routes/libromayor.php'));

            Route::middleware('web')
                ->prefix('resultado')
                ->group(base_path('routes/resultado.php'));

            Route::middleware('web')
                ->prefix('balance')
                ->group(base_path('routes/balance.php'));

            Route::middleware('web')
                ->prefix('periodo')
                ->group(base_path('routes/periodo.php'));

            // mantenimiento
            Route::middleware('web')
                ->prefix('clasificaciones')
                ->group(base_path('routes/clasificacion.php'));
            Route::middleware('web')
                ->prefix('grupos')
                ->group(base_path('routes/grupos.php'));


            Route::middleware('web')
                ->prefix('objetos')
                ->group(base_path('routes/objeto.php'));

            Route::middleware('web')
                ->prefix('personas')
                ->group(base_path('routes/personas.php'));

            /* SEGURIDAD */

            Route::middleware('web')
                ->prefix('admins')
                ->group(base_path('routes/admins.php'));

            Route::middleware('web')
                ->prefix('usuarios')
                ->group(base_path('routes/usuarios.php'));

            Route::middleware('web')
                ->prefix('preguntas')
                ->group(base_path('routes/preguntas.php'));

            Route::middleware('web')
                ->prefix('ajustes')
                ->group(base_path('routes/configs.php'));

            Route::middleware('web')
                ->prefix('parametros')
                ->group(base_path('routes/parametro.php'));
            Route::middleware('web')
                ->prefix('roles')
                ->group(base_path('routes/roles.php'));
            Route::middleware('web')
                ->prefix('permisos')
                ->group(base_path('routes/permisos.php'));
            Route::middleware('web')
                ->prefix('bitacoras')
                ->group(base_path('routes/bitacoras.php'));

            // default 
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            
           
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
