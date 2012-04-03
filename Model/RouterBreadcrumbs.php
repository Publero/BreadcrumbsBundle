<?php
namespace WhiteOctober\BreadcrumbsBundle\Model;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author mhlavac
 */
class RouterBreadcrumbs extends Breadcrumbs
{
    public function __construct(Request $request, Router $router)
    {
        $routes = $router->getRouteCollection()->all();
        $currentRouteName = $request->get('_route');
        $explodedRouteNames = explode('.', $currentRouteName);

        $checkRoute = '';
        foreach ($explodedRouteNames as $routeName) {
            if ($checkRoute) {
                $checkRoute .= '.';
            }
            $checkRoute .= $routeName;

            if (isset($routes[$checkRoute])) {
                $routePattern = $routes[$checkRoute]->getPattern();
                if (strpos($routePattern, '{') === null) {
                    $this->addItem($checkRoute, $routes[$checkRoute]->getPattern());
                }
            }
        }
    }
}
